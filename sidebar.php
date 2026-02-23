<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
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
                <a href="https://facebook.com/linkmoises" target="_blank" class="flex flex-col items-center gap-1">
                    <span class="w-10 h-10 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-sm"><i class="fa-brands fa-facebook-f"></i></span>
                </a>
                <a href="https://instagram.com/linkmoises" target="_blank" class="flex flex-col items-center gap-1">
                    <span class="w-10 h-10 bg-pink-100 text-pink-600 rounded-full flex items-center justify-center text-sm"><i class="fa-brands fa-instagram"></i></span>
                </a>
                <a href="https://x.com/linkmoises" target="_blank" class="flex flex-col items-center gap-1">
                    <span class="w-10 h-10 bg-gray-100 text-black rounded-full flex items-center justify-center text-sm"><i class="fa-brands fa-x-twitter"></i></span>
                </a>
                <a href="https://www.linkedin.com/in/linkmoises/" target="_blank" class="flex flex-col items-center gap-1">
                    <span class="w-10 h-10 bg-gray-100 text-black rounded-full flex items-center justify-center text-sm"><i class="fa-brands fa-linkedin-in"></i></span>
                </a>
            </div>
        </div>

        <section id="gallo-books">
            <div class="bg-black rounded-2xl h-full flex items-center justify-center text-white p-8">
                <a href="/publicaciones" class="text-lg font-semibold text-white relative inline-block group">
                    Descubre más libros y publicaciones
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>
        </section>

    </aside>