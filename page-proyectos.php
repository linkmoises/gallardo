<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta página directamente. ¡Gracias!'); } ?>
<?php
/*
Template Name: Proyectos
*/
?>
<?php get_header(); ?>
<?php get_navbar(); ?>

<section class="w-full mx-auto px-6 mb-6 grid grid-cols-1 lg:grid-cols-12 gap-6">

    <div class="lg:col-span-9 flex gap-6">

        <div class="hidden lg:block w-[5%] sticky top-6 self-start">
            <?php gallo_share(); ?>
        </div>

        <article class="flex-1 bg-white border border-gray-300 rounded-2xl p-6 lg:p-12 overflow-hidden">

            <h1 class="text-4xl font-bold mb-4"><?php the_title(); ?></h1>

            <div class="post-content mb-12">
                <?php the_content(); ?>
            </div>

            <?php
            $secciones = array(
                'publicacion' => 'Libros y publicaciones',
                'investigacion' => 'Investigación académica',
                'tecnologia' => 'Desarrollos tecnológicos'
            );

            foreach ($secciones as $tipo_seccion => $titulo_seccion) :
                
                // Query para cada sección
                $args = array(
                    'post_type'      => 'proyecto',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'meta_query'     => array(
                        array(
                            'key'     => 'tipo_proyecto',
                            'value'   => $tipo_seccion,
                            'compare' => '='
                        )
                    ),
                    'meta_key'       => 'anio_proyecto',
                    'orderby'        => 'meta_value_num',
                    'order'          => 'DESC'
                );

                $proyectos = new WP_Query($args);

                if ($proyectos->have_posts()) :
            ?>

            <h2 class="text-2xl font-bold mb-8 mt-12 pb-4 border-b-2 border-gray-200"><?php echo esc_html($titulo_seccion); ?></h2>

            <?php
                while ($proyectos->have_posts()) : $proyectos->the_post();

                    $img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $tipo   = get_post_meta(get_the_ID(), 'tipo_proyecto', true);
                    $estado = get_post_meta(get_the_ID(), 'estado_proyecto', true);
                    $enlace = get_post_meta(get_the_ID(), 'enlace_externo', true);
                    $anio   = get_post_meta(get_the_ID(), 'anio_proyecto', true);
            ?>

            <div class="flex flex-col md:flex-row gap-8 mb-6 pb-6 border-b border-gray-200 last:border-0">

                <?php if ($img_url): ?>
                <div class="md:w-1/6 flex-shrink-0">
                    <img src="<?php echo esc_url($img_url); ?>" 
                         alt="<?php the_title_attribute(); ?>" 
                         class="w-full h-auto rounded-xl border border-gray-200">
                </div>
                <?php endif; ?>

                <div class="flex-1">

                    <h3 class="text-xl font-bold mb-3"><?php the_title(); ?></h3>

                    <div class="flex gap-2 mb-4 flex-wrap">

                        <?php if ($estado): ?>
                            <span class="px-3 py-1 text-[11px] border border-gray-300 rounded-full text-gray-600">
                                <?php echo esc_html(ucfirst(str_replace('_',' ', $estado))); ?>
                            </span>
                        <?php endif; ?>

                        <?php if ($anio): ?>
                            <span class="px-3 py-1 text-[11px] border border-gray-300 rounded-full text-gray-600">
                                <?php echo esc_html($anio); ?>
                            </span>
                        <?php endif; ?>

                    </div>

                    <div class="text-gray-500 text-sm leading-relaxed mb-6">
                        <?php the_content(); ?>
                    </div>

                    <?php if ($enlace): ?>
                        <a href="<?php echo esc_url($enlace); ?>" 
                           target="_blank" 
                           rel="noopener"
                           class="inline-block px-5 py-2 border border-black text-black text-xs font-medium rounded-full hover:bg-black hover:text-white transition">
                            Ver proyecto →
                        </a>
                    <?php endif; ?>

                </div>

            </div>

            <?php
                endwhile;
                wp_reset_postdata();
                
                endif; // if have_posts
            endforeach; // foreach secciones
            
            // Verificar si hay algún proyecto
            $total_args = array(
                'post_type'      => 'proyecto',
                'posts_per_page' => 1,
                'post_status'    => 'publish'
            );
            $total_proyectos = new WP_Query($total_args);
            
            if (!$total_proyectos->have_posts()) :
            ?>

            <p class="text-gray-400">Aún no hay proyectos publicados.</p>

            <?php 
            endif;
            wp_reset_postdata();
            ?>

        </article>

    </div>

    <aside class="lg:col-span-3 sticky top-6 self-start">
        <?php get_sidebar(); ?>
    </aside>

</section>

<?php get_footer(); ?>