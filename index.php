<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<?php get_header(); ?>
<?php get_navbar(); ?>

    <section class="w-full mx-auto px-6 mb-6 grid grid-cols-1 lg:grid-cols-12 gap-6">

        <div class="lg:col-span-9 flex gap-6">

            <div class="w-[5%] sticky top-6 self-start">
                <?php gallo_share(); ?>
            </div>

            <article class="flex-1 bg-white border border-gray-300 rounded-2xl p-12">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h1 class="text-4xl font-bold mb-4"><?php the_title(); ?></h1>
                    <div class="after-post-tags mb-6">
<?php the_tags( '<ul class="tags">' . "\n" . '<li>', '</li>' . "\n" . '<li>', '</li>' . "\n" . '</ul>' . "\n" ); ?>
                    </div>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; endif; ?>
            </article>

        </div>

        <aside class="lg:col-span-3 sticky top-6 self-start">
            <?php get_sidebar(); ?>
        </aside>

    </section>

<?php get_footer(); ?>