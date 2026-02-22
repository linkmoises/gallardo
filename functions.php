<?php 
/**
 * Funciones y definiciones para el tema Gallardo
 * 
 * Este archivo contiene las funciones principales del tema, incluyendo:
 * - Configuración del tema
 * - Funciones de utilidad
 * - Limpieza del head de WordPress
 * 
 * @package Gallardo
 */

if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { 
    die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); 
}

/* ============================================================================
   CONFIGURACIÓN DEL TEMA
   ============================================================================ */

/**
 * Configuración básica del tema
 */
function gallardo_theme_setup() {
    // Activa las miniaturas (featured images) para posts y páginas
    add_theme_support('post-thumbnails');
    
    // Oculta la barra de admin de WordPress en el frontend
    add_filter('show_admin_bar', '__return_false');
}
add_action('after_setup_theme', 'gallardo_theme_setup');

/* ============================================================================
   FUNCIONES DE INCLUSIÓN DE TEMPLATES
   ============================================================================ */

/**
 * Incluye el archivo navbar.php
 */
function get_navbar() {
    include 'navbar.php';
}

/**
 * Incluye el archivo hero.php
 */
function get_hero() {
    include 'hero.php';
}

/**
 * Incluye el archivo series.php
 */
function get_series() {
    include 'series.php';
}

/* ============================================================================
   TAXONOMÍAS PERSONALIZADAS
   ============================================================================ */

/**
 * Crea la taxonomía Series
 */
function crear_taxonomia_series() {
    register_taxonomy(
        'series',
        'post',
        array(
            'label' => 'Series',
            'hierarchical' => true,
            'show_ui' => true,
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'crear_taxonomia_series');
include 'include/function-series.php';


/* ============================================================================
   FUNCIONES DE UTILIDAD
   ============================================================================ */

/**
 * Estima el tiempo de lectura de un post
 * 
 * @return string Tiempo estimado de lectura en minutos
 */
function gallo_reading_time() {
    global $post;
    $content = get_post_field('post_content', $post->ID);
    $word_count = str_word_count(strip_tags($content));
    $readingtime = ceil($word_count / 200);
    
    $timer = " min";
    $totalreadingtime = $readingtime . $timer;
    
    return $totalreadingtime;
}

/**
 * Muestra una cita célebre aleatoria
 * 
 * Selecciona y muestra una cita aleatoria de un conjunto predefinido
 * con formato HTML y estilos Tailwind CSS
 */
function gallo_cita_random() {
    $vector = array(
        1 => array(
            'texto' => 'Es posible robar las ideas, pero nadie puede robar su puesta en práctica ni la pasión por ellas.',
            'autor' => 'Timothy Ferriss'
        ),
        2 => array(
            'texto' => 'La medicina es una ciencia de la incertidumbre y un arte de la probabilidad.',
            'autor' => 'William Osler'
        ),
        3 => array(
            'texto' => 'La medicina es el arte de disputar los hombres a la muerte de hoy, para cedérselos en mejor estado, un poco más tarde.',
            'autor' => 'Noel Clarasó'
        ),
    );
    
    $numero = rand(1, 3);
    $cita = $vector[$numero];
    
    echo '<span class="block mb-2">' . $cita['texto'] . '</span>';
    echo '<span class="block text-right text-sm italic">— ' . $cita['autor'] . '</span>';
}

/**
 * Muestra enlaces a redes sociales
 * 
 * Muestra enlaces para compartir el contenido
 */
function gallo_share() {
	$url = urlencode(get_the_permalink());
	$title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
	$media = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));

include( locate_template('include/gallo-share.php', false, false) );
}

/* ============================================================================
   LIMPIEZA Y OPTIMIZACIÓN DE WORDPRESS
   ============================================================================ */

/**
 * Elimina scripts y estilos de emojis de WordPress
 * Los emojis nativos del navegador son suficientes
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

/**
 * Elimina estilos embebidos
 * de Gutenberg
 */
add_filter( 'should_load_separate_core_block_assets', '__return_false' );

/**
 * Elimina enlaces RSS del head
 * Útil si no se usan feeds RSS
 */
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

/**
 * Elimina sugerencias de recursos (dns-prefetch, preconnect)
 */
remove_action('wp_head', 'wp_resource_hints', 2);

/**
 * Elimina enlaces de la REST API
 * Útil si no se usa la API REST de WordPress
 */
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head', 'rest_output_link_wp_head', 10);

/**
 * Elimina enlaces de descubrimiento de oEmbed
 */
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

/**
 * Elimina shortlinks automáticos
 */
remove_action('wp_head', 'wp_shortlink_wp_head');

/**
 * Elimina el enlace RSD (Really Simple Discovery)
 * Usado por clientes XML-RPC antiguos
 */
remove_action('wp_head', 'rsd_link');

/**
 * Elimina el enlace de Windows Live Writer
 * Cliente de blog descontinuado
 */
remove_action('wp_head', 'wlwmanifest_link');

/**
 * Elimina la etiqueta meta generator
 * Oculta la versión de WordPress por seguridad
 */
remove_action('wp_head', 'wp_generator');

/**
 * Elimina el script wp-embed.js del frontend
 * No es necesario si no se usan embeds de WordPress
 */
function gallo_deregister_scripts() {
    wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'gallo_deregister_scripts');

/* ============================================================================
   CONFIGURACIÓN DE PAGINACIÓN
   ============================================================================ */

/**
 * Establece 8 posts por página en archivos
 */
function gallo_posts_per_page($query) {
    if (!is_admin() && $query->is_main_query() && (is_archive() || is_category() || is_tag() || is_tax())) {
        $query->set('posts_per_page', 8);
    }
}
add_action('pre_get_posts', 'gallo_posts_per_page');

/* ============================================================================
   MENÚS DE NAVEGACIÓN
   ============================================================================ */

/**
 * Registra los menús de navegación
 */
function gallo_register_menus() {
    register_nav_menus(array(
        'nav-primary' => 'Menú principal',
    ));
}
add_action('init', 'gallo_register_menus');

/**
 * Genera el menú de navegación personalizado con íconos
 * 
 * Para añadir íconos, agrega la clase CSS del ícono en "Clases CSS" 
 * del item del menú en WordPress (ej: fa-solid fa-microchip)
 */
function gallo_custom_menu() {
    $menu_name = 'nav-primary';
    
    if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        $menu_items = wp_get_nav_menu_items($menu->term_id);
        
        $menu_list = '';
        
        foreach ((array) $menu_items as $key => $menu_item) {
            $title = $menu_item->title;
            $url = $menu_item->url;
            $classes = implode(' ', $menu_item->classes);
            
            // Extraer clases de FontAwesome si existen
            $icon = '';
            if (preg_match('/(fa-[a-z]+ fa-[a-z0-9-]+)/i', $classes, $matches)) {
                $icon = '<i class="' . esc_attr($matches[1]) . '"></i> ';
            }
            
            $menu_list .= '<a href="' . esc_url($url) . '" class="flex items-center gap-2 border border-gray-300 rounded-lg px-8 py-4 hover:shadow-md transition bg-white justify-center text-base font-semibold">';
            $menu_list .= $icon . esc_html($title);
            $menu_list .= '</a>' . "\n";
        }
        
        echo $menu_list;
    } else {
        // Menú por defecto si no hay menú configurado
        echo '<p class="col-span-full text-center text-gray-500">Configure el menú en Apariencia → Menús</p>';
    }
}
