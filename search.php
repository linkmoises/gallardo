<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<?php get_header(); ?>
<?php get_navbar();?>

    <section class="w-full mx-auto px-6 mb-6">
        <div class="p-12 bg-gray-200 rounded-xl text-center">
            <nav class="text-lg text-gray-600 mb-4">
                <a href="<?php echo home_url(); ?>" class="hover:text-black">Inicio</a>
                <span class="mx-2">/</span>
                <span class="text-black font-semibold">Resultados de Búsqueda</span>
            </nav>
                <div class="text-gray-700 leading-relaxed max-w-3xl mx-auto">
                    <?php
                    // Contar el número total de coincidencias del término de búsqueda
                    global $wp_query;
                    $search_term = get_search_query();
                    $total_matches = 0;
                    $num_posts = $wp_query->found_posts;
                    
                    // Crear query para obtener TODOS los posts encontrados
                    $all_posts_args = array(
                        's' => $search_term,
                        'posts_per_page' => -1,
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'fields' => 'all' // Obtener todos los campos
                    );
                    $all_posts = get_posts($all_posts_args);
                    
                    // Contar coincidencias en todos los posts
                    foreach ($all_posts as $post_item) {
                        // Obtener título y contenido
                        $title = $post_item->post_title;
                        $content = $post_item->post_content;
                        $full_text = $title . ' ' . $content;
                        
                        // Limpiar HTML y decodificar
                        $full_text = wp_strip_all_tags($full_text);
                        $full_text = html_entity_decode($full_text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                        
                        // Contar coincidencias sin distinguir acentos ni mayúsculas
                        $search_normalized = remove_accents(strtolower($search_term));
                        $text_normalized = remove_accents(strtolower($full_text));
                        
                        $count = substr_count($text_normalized, $search_normalized);
                        $total_matches += $count;
                    }
                    ?>
                    <p>Mostrando <?php echo $total_matches; ?> resultado<?php echo ($total_matches != 1) ? 's' : ''; ?> en <?php echo $num_posts; ?> entrada<?php echo ($num_posts != 1) ? 's' : ''; ?> para: <span class="font-semibold bg-yellow-200 px-2 py-1 rounded">"<?php echo get_search_query(); ?>"</span></p>
                </div>
        </div>
    </section>

    <section class="w-full mx-auto px-6 mb-6 grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

        <div class="lg:col-span-9 space-y-6">

            <div class="flex justify-between items-center bg-white border border-gray-300 p-6 rounded-2xl mb-6">
                <h2 class="hidden md:block text-xl font-bold"><?php echo $wp_query->found_posts; ?> entrada<?php echo ($wp_query->found_posts != 1) ? 's' : ''; ?> encontradas:</h2>
                <div class="w-full md:w-auto flex justify-center md:justify-end">
                    <p class="text-sm text-gray-500 font-semibold">Página <?php echo max(1, get_query_var('paged')); ?></p>
                </div>
            </div>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
    $search_term = get_search_query();
    $title = get_the_title();
    
    // Obtener excerpt sin filtros HTML
    $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 55, '...');
    
    // Función para resaltar el término de búsqueda (con y sin acentos)
    if (!empty($search_term)) {
        // Decodificar entidades HTML primero
        $title = html_entity_decode($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $excerpt = html_entity_decode(strip_tags($excerpt), ENT_QUOTES | ENT_HTML5, 'UTF-8');
        
        // Crear versión sin acentos del término de búsqueda
        $search_term_normalized = remove_accents($search_term);
        
        // Crear patrón que coincida con o sin acentos
        $pattern = '';
        for ($i = 0; $i < mb_strlen($search_term_normalized); $i++) {
            $char = mb_substr($search_term_normalized, $i, 1);
            // Mapeo de caracteres con sus variantes acentuadas
            $variants = array(
                'a' => '[aáàäâ]',
                'e' => '[eéèëê]',
                'i' => '[iíìïî]',
                'o' => '[oóòöô]',
                'u' => '[uúùüû]',
                'n' => '[nñ]',
                'c' => '[cç]',
            );
            $pattern .= isset($variants[strtolower($char)]) ? $variants[strtolower($char)] : preg_quote($char, '/');
        }
        
        $title = preg_replace('/(' . $pattern . ')/iu', '<mark class="bg-yellow-200 font-bold px-1 rounded">$1</mark>', $title);
        $excerpt = preg_replace('/(' . $pattern . ')/iu', '<mark class="bg-yellow-200 font-bold px-1 rounded">$1</mark>', $excerpt);
    }
?>
            <article id="post-<?php the_ID(); ?>" class="bg-white border border-gray-300 rounded-2xl p-6 hover:shadow-lg transition-shadow">
                <h2 class="text-xl font-bold mb-3">
                    <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-cyan-600 transition"><?php echo $title; ?></a>
                </h2>
                
                <?php if (has_tag()) : ?>
                <div class="after-post-tags mb-4">
                    <?php the_tags('<ul class="tags"><li>', '</li><li>', '</li></ul>'); ?>
                </div>
                <?php endif; ?>
                
                <p class="text-gray-600 text-sm leading-relaxed mb-4"><?php echo $excerpt; ?></p>
                
                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                    <div class="flex items-center gap-3 text-xs text-gray-500">
                        <span class="post-date"><?php echo get_the_date('j M Y'); ?></span>
                        <span class="w-1 h-1 bg-gray-400 rounded-full"></span>
                        <span class="post-read"><?php echo gallo_reading_time(); ?></span>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="text-sm font-semibold text-cyan-600 hover:text-cyan-700 transition">
                        Leer más →
                    </a>
                </div>
            </article>
<?php endwhile; ?>

            <?php if ($wp_query->max_num_pages > 1) : ?>
            <div class="flex justify-center items-center bg-white border border-gray-300 p-6 rounded-2xl mb-6">
                <div class="pagination-wrapper flex justify-center">
                    <?php
                    // Paginación
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '← Anterior',
                        'next_text' => 'Siguiente →',
                        'screen_reader_text' => ' ',
                    ));
                    ?>
                </div>
            </div>
            <?php endif; ?>

<?php else : ?>
            <div class="bg-white border border-gray-300 rounded-2xl p-12 text-center">
                <div class="max-w-md mx-auto">
                    <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">No se encontraron resultados</h2>
                    <p class="text-gray-600 mb-6">No pudimos encontrar ningún resultado para "<span class="font-semibold bg-yellow-200 px-2 py-1 rounded"><?php echo get_search_query(); ?></span>"</p>
                    <a href="<?php echo home_url(); ?>" class="inline-flex items-center gap-2 bg-cyan-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-cyan-700 transition">
                        Volver al inicio
                    </a>
                </div>
            </div>
<?php endif; ?>

        </div>

        <?php get_sidebar(); ?>

    </section>

<?php get_footer(); ?>