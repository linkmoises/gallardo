<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); }
//
// Extraido de https://ayudawp.com/seo-wordpress-sin-plugins/
// Modificaciones adicionales de meta tags extraidas de https://css-tricks.com/essential-meta-tags-social-media/
//
/* SEO WordPress a la brava
Uso: 
1. agrega este código a tu fichero functions.php
2. reempleza la cadena $default_keywords con las tuyas
3. añade <?php echo seo_wp_bravo(); ?> al archivo header.php
4. comprueba que todo funciona bien y no has roto nada

Opcional: añade palabras clave o una descripción, título a cualquier entrada o página usando estas claves de campo personalizado:

mm_seo_desc
mm_seo_keywords
mm_seo_title

Para migrar desde cualquier plugin SEO reemplaza sus claves de campo personalizado con las claves anteriores. Más información:

https://ayudawp.com/seo-wordpress-sin-plugins/
*/
function seo_wp_bravo() {
	global $page, $paged, $post;
	$default_keywords = 'edtech, openedx, edx, linux, ssh, medicina, red, internet, snippets, android, desarrollo'; // personaliza esto
	$output = '';

	// descripción
	$seo_desc = get_post_meta($post->ID, 'mm_seo_desc', true);
	$description = get_bloginfo('description', 'display');
	$pagedata = get_post($post->ID);
	if (is_singular()) {
		if (!empty($seo_desc)) {
			$content = $seo_desc;
		} else if (!empty($pagedata)) {
			$content = apply_filters('the_excerpt_rss', $pagedata->post_content);
			$content = substr(trim(strip_tags($content)), 0, 155);
			$content = preg_replace('#\n#', ' ', $content);
			$content = preg_replace('#\s{2,}#', ' ', $content);
			$content = trim($content);
		} 
	} else {
		$content = $description; 
	}
$output .= "\t" .'<meta name="description" content="' . esc_attr($content) . '">' . "\n";

// palabras clave
$keys = get_post_meta($post->ID, 'mm_seo_keywords', true);
$cats = get_the_category();
$tags = get_the_tags();
if (empty($keys)) {
	if (!empty($cats)) foreach($cats as $cat) $keys .= $cat->name . ', ';
	if (!empty($tags)) foreach($tags as $tag) $keys .= $tag->name . ', ';
	$keys .= $default_keywords;
}
$output .= "\t" . '<meta name="keywords" content="' . esc_attr($keys) . '">' . "\n";

// robots
if (is_category() || is_tag()) {
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	if ($paged > 1) {
		$output .=  "\t" . '<meta name="robots" content="noindex,follow">' . "\n";
	} else {
		$output .=  "\t" . '<meta name="robots" content="index,follow">' . "\n";
	}
	} else if (is_home() || is_singular()) {
		$output .=  "\t" . '<meta name="robots" content="index,follow">' . "\n";
	} else {
		$output .= "\t" . '<meta name="robots" content="noindex,follow">' . "\n";
	}

// títulos
$title_custom = get_post_meta($post->ID, 'mm_seo_title', true);
$url = ltrim(esc_url($_SERVER['REQUEST_URI']), '/');
$name = get_bloginfo('name', 'display');
$title = trim(wp_title('', false));
$cat = single_cat_title('', false);
$tag = single_tag_title('', false);
$search = get_search_query();

if (!empty($title_custom)) $title = $title_custom;
if ($paged >= 2 || $page >= 2) $page_number = ' | ' . sprintf('Página %s', max($paged, $page));
else $page_number = '';

if (is_home() || is_front_page()) $seo_title = $name . ' | ' . $description;
elseif (is_singular())            $seo_title = $title . ' | ' . $name;
elseif (is_tag())                 $seo_title = 'Archivo de la etiqueta: ' . $tag . ' | ' . $name;
elseif (is_category())            $seo_title = 'Archivo de la categoría: ' . $cat . ' | ' . $name;
elseif (is_archive())             $seo_title = 'Archivo: ' . $title . ' | ' . $name;
elseif (is_search())              $seo_title = 'Búsqueda: ' . $search . ' | ' . $name;
elseif (is_404())                 $seo_title = '404 - No encontrado: ' . $url . ' | ' . $name;
else                              $seo_title = $name . ' | ' . $description;

$output .= "\t" . '<title>' . esc_attr($seo_title . $page_number) . '</title>' . "\n";

return $output;

}
