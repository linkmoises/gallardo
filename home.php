<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<?php get_header(); ?>
<?php get_navbar(); ?>
<?php get_hero(); ?>
<?php get_series(); ?>

	<section class="w-full mx-auto px-6 mb-6">
        
        <div class="flex justify-between items-center bg-white border border-gray-300 p-6 rounded-2xl mb-6">
            <h2 class="text-xl font-bold">Últimas entradas</h2>
            <a href="<?php echo get_post_type_archive_link('post'); ?>" class="flex items-center gap-2 text-sm font-semibold hover:opacity-70 transition">
                Ver el archivo completo 
                <span class="bg-black text-white w-6 h-6 rounded-full flex items-center justify-center">
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            // Obtener el ID del último post
            $latest_post_args = array(
                'posts_per_page' => 1,
                'post_status' => 'publish',
                'fields' => 'ids'
            );
            $latest_post_query = new WP_Query($latest_post_args);
            $exclude_id = $latest_post_query->posts ? $latest_post_query->posts[0] : 0;
            wp_reset_postdata();
            
            // Query para los siguientes 8 posts
            $args = array(
                'posts_per_page' => 8,
                'post_status' => 'publish',
                'post__not_in' => array($exclude_id)
            );
            $recent_posts = new WP_Query($args);
            
            if ($recent_posts->have_posts()) :
                while ($recent_posts->have_posts()) : $recent_posts->the_post();
                    $home_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                    if (!$home_img_url) {
                        $home_img_url = get_bloginfo('template_url') . '/images/blank.jpg';
                    }
                    $categories = get_the_category();
                    $category_name = !empty($categories) ? esc_html($categories[0]->name) : 'Sin categoría';
                    $category_link = !empty($categories) ? get_category_link($categories[0]->term_id) : '#';
                    $excerpt = get_the_excerpt();
                    $comments_count = get_comments_number();
            ?>
            
            <article class="bg-white p-5 rounded-2xl border border-gray-300 shadow-sm hover:shadow-md transition group">
                <a href="<?php the_permalink(); ?>">
                    <span class="inline-block px-4 py-1.5 border border-gray-200 rounded-full text-[10px] font-medium text-gray-500 mb-4 hover:bg-gray-100 transition" onclick="event.stopPropagation(); window.location.href='<?php echo esc_url($category_link); ?>'"><?php echo $category_name; ?></span>
                    <h3 class="text-xl font-bold leading-tight mb-6 min-h-[3.5rem]"><?php the_title(); ?></h3>
                    <div class="aspect-[2/1] rounded-2xl overflow-hidden mb-4">
                        <img src="<?php echo esc_url($home_img_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>
                    <p class="text-gray-400 text-xs leading-relaxed mb-6 line-clamp-3">
                        <?php echo esc_html($excerpt); ?>
                    </p>
                    <div class="flex justify-between items-center pt-4 border-t border-gray-50">
                        <div class="text-[10px] text-gray-400">
                            <?php echo get_the_date('M d, Y'); ?> <span class="mx-1">por</span> <span class="font-bold text-black"><?php the_author(); ?></span>
                        </div>
                        <div class="flex items-center gap-1 text-gray-400 text-[10px]">
                            <i class="fa-regular fa-comment"></i> <?php echo $comments_count; ?>
                        </div>
                    </div>
                </a>
            </article>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
            
            <div class="col-span-full text-center py-12">
                <p class="text-gray-400">No hay más publicaciones disponibles.</p>
            </div>
            
            <?php endif; ?>
        </div>

    </section>

<?php get_footer(); ?>