<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
    <main class="w-full px-6 grid grid-cols-1 lg:grid-cols-12 mb-6 gap-6">
        
        <?php
        $args = array(
            'posts_per_page' => 1,
            'post_status' => 'publish'
        );
        $latest_post = new WP_Query($args);
        
        if ($latest_post->have_posts()) :
            while ($latest_post->have_posts()) : $latest_post->the_post();
                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $categories = get_the_category();
                $category_name = !empty($categories) ? esc_html($categories[0]->name) : 'Sin categoría';
        ?>
        <section id="gallo-last" class="lg:col-span-9 relative rounded-2xl overflow-hidden aspect-square lg:aspect-[2/1] lg:min-h-[500px] flex items-center bg-cyan-500">
            <div class="absolute inset-0 bg-gradient-to-r from-black/20 to-transparent">
                <?php if ($featured_img_url) : ?>
                    <img src="<?php echo esc_url($featured_img_url); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover mix-blend-overlay">
                <?php else : ?>
                    <img src="<?php bloginfo("template_url"); ?>/images/blank.jpg" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover mix-blend-overlay">
                <?php endif; ?>
            </div>
            
            <div class="relative z-10 p-6 lg:p-12 text-white max-w-2xl">
                <span class="bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-xs font-medium uppercase tracking-wider border border-white/30"><?php echo $category_name; ?></span>
                <h1 class="text-3xl lg:text-6xl font-bold mt-4 lg:mt-6 leading-tight drop-shadow-lg"><?php the_title(); ?></h1>
                <a href="<?php the_permalink(); ?>" class="inline-flex items-center mt-6 lg:mt-10 text-base lg:text-lg font-semibold group drop-shadow-md">
                    Leer más
                    <span class="ml-3 bg-white text-cyan-600 w-10 h-10 rounded-full flex items-center justify-center group-hover:bg-cyan-100 transition">
                        <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </a>
            </div>
        </section>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
        <section id="gallo-last" class="lg:col-span-9 relative rounded-2xl overflow-hidden aspect-square lg:aspect-[2/1] lg:min-h-[500px] flex items-center bg-cyan-500">
            <div class="absolute inset-0 bg-gradient-to-r from-black/20 to-transparent">
                <img src="<?php bloginfo("template_url"); ?>/images/blank.jpg" alt="Hero" class="w-full h-full object-cover mix-blend-overlay">
            </div>
            
            <div class="relative z-10 p-6 lg:p-12 text-white max-w-2xl">
                <span class="bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-xs font-medium uppercase tracking-wider border border-white/30">Blog</span>
                <h1 class="text-3xl lg:text-6xl font-bold mt-4 lg:mt-6 leading-tight drop-shadow-lg">No hay publicaciones disponibles</h1>
            </div>
        </section>
        <?php endif; ?>

        <aside class="lg:col-span-3 flex flex-col gap-6">
            
            <div class="bg-white p-8 rounded-2xl border border-gray-300 shadow-sm text-center flex-grow flex flex-col justify-center">
                <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-6">¡Bienvenido a mi Blog!</p>
                <div class="w-48 h-48 mx-auto rounded-full overflow-hidden mb-4 border-4 border-gray-50">
                    <img src="<?php bloginfo("template_url"); ?>/images/mass.jpg" alt="Moisés Serrano Samudio" class="w-full h-full object-cover">
                </div>
                <h2 class="text-2xl font-extrabold mb-3">Moisés Serrano Samudio</h2>
                <p class="text-gray-500 text-sm leading-relaxed mb-6">
                    Hola, soy Moisés. Me interesa cómo la innovación y la tecnología pueden mejorar la práctica médica y la educación. En este espacio comparto tips, reflexiones y aprendizajes del día a día.
                </p>
                <div class="flex gap-4 justify-center">
                    <a href="<?php echo home_url('/sobre-mi'); ?>" class="text-sm font-semibold text-gray-700 hover:text-black transition">Sobre mí</a>
                    <span class="text-gray-300">|</span>
                    <a href="<?php echo home_url('/proyectos'); ?>" class="text-sm font-semibold text-gray-700 hover:text-black transition">Proyectos</a>
                    <span class="text-gray-300">|</span>
                    <a href="<?php echo home_url('/contacto'); ?>" class="text-sm font-semibold text-gray-700 hover:text-black transition">Contacto</a>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-gray-300 shadow-sm">
                <p class="text-xs font-bold text-center uppercase tracking-widest text-gray-400 mb-6">Mis Redes Sociales</p>
                <div class="grid grid-cols-4 gap-4">
                    <a href="https://x.com/linkmoises" target="_blank" class="flex flex-col items-center gap-1">
                        <span class="w-10 h-10 bg-gray-100 text-black hover:bg-gradient-to-br hover:from-gray-700 hover:to-black hover:text-white rounded-full flex items-center justify-center text-sm transition-all"><i class="fa-brands fa-x-twitter"></i></span>
                    </a>
                    <a href="https://facebook.com/linkmoises" target="_blank" class="flex flex-col items-center gap-1">
                        <span class="w-10 h-10 bg-blue-100 text-blue-600 hover:bg-gradient-to-br hover:from-[#1877F2] hover:to-[#0C63D4] hover:text-white rounded-full flex items-center justify-center text-sm transition-all"><i class="fa-brands fa-facebook-f"></i></span>
                    </a>
                    <a href="https://instagram.com/linkmoises" target="_blank" class="flex flex-col items-center gap-1">
                        <span class="w-10 h-10 bg-pink-100 text-pink-600 hover:bg-gradient-to-br hover:from-[#833AB4] hover:via-[#E1306C] hover:to-[#F77737] hover:text-white rounded-full flex items-center justify-center text-sm transition-all"><i class="fa-brands fa-instagram"></i></span>
                    </a>
                    <a href="https://www.linkedin.com/in/linkmoises/" target="_blank" class="flex flex-col items-center gap-1">
                        <span class="w-10 h-10 bg-blue-100 text-blue-600 hover:bg-gradient-to-br hover:from-[#0A66C2] hover:to-[#004182] hover:text-white rounded-full flex items-center justify-center text-sm transition-all"><i class="fa-brands fa-linkedin-in"></i></span>
                    </a>
                </div>
            </div>

        </aside>

    </main>