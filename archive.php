<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<?php get_header(); ?>
<?php get_navbar(); ?>

    <section class="w-full mx-auto px-6 mb-6">
        <div class="p-12 bg-gray-200 rounded-xl text-center">
            <nav class="text-lg text-gray-600 mb-4">
                <a href="<?php echo home_url(); ?>" class="hover:text-black">Inicio</a>
                <span class="mx-2">/</span>
                <span class="text-black font-semibold"><?php single_cat_title(); ?></span>
            </nav>
            <?php if (is_category() && category_description()) : ?>
                <div class="text-gray-700 leading-relaxed max-w-3xl mx-auto">
                    <?php echo category_description(); ?>
                </div>
            <?php elseif (is_tag() && tag_description()) : ?>
                <div class="text-gray-700 leading-relaxed max-w-3xl mx-auto">
                    <?php echo tag_description(); ?>
                </div>
            <?php elseif (is_tax() && term_description()) : ?>
                <div class="text-gray-700 leading-relaxed max-w-3xl mx-auto">
                    <?php echo term_description(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="w-full mx-auto px-6 mb-6">

        <div class="flex justify-between items-center bg-white border border-gray-300 p-6 rounded-2xl mb-6">
            <h2 class="hidden md:block text-xl font-bold"><?php echo get_the_archive_title(); ?></h2>
            <div class="pagination-wrapper w-full md:w-auto flex justify-center md:justify-end">
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
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
            else :
            ?>
            
            <div class="col-span-full text-center py-12">
                <p class="text-gray-400">No hay publicaciones disponibles.</p>
            </div>
            
            <?php endif; ?>
        </div>

        <div class="flex justify-between items-center bg-white border border-gray-300 p-6 rounded-2xl mb-6">
            <h2 class="hidden md:block text-xl font-bold"><?php echo get_the_archive_title(); ?></h2>
            <div class="pagination-wrapper w-full md:w-auto flex justify-center md:justify-end">
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

    </section>

<?php get_footer(); ?>