<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>

    <div class="w-full px-6 mb-6 flex gap-6">
        
        <section id="gallo-series" class="w-3/4 bg-white relative group">
            
            <div class="flex justify-between items-center bg-white border border-gray-300 p-6 rounded-2xl mb-6">
                <h2 class="text-xl font-bold">Series</h2>
                <a href="#" class="flex items-center gap-2 text-sm font-semibold hover:opacity-70 transition">
                    Archivo de Series
                    <span class="bg-black text-white w-6 h-6 rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </span>
                </a>
            </div>

            <div class="relative overflow-hidden">
                
                <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 bg-white/90 hover:bg-white text-black w-12 h-12 rounded-full shadow-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                
                <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 bg-white/90 hover:bg-white text-black w-12 h-12 rounded-full shadow-lg flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>

                <div id="sliderTrack" class="flex transition-transform duration-700 ease-out gap-6 cursor-grab active:cursor-grabbing">
                    <?php
                    // Obtener todas las series
                    $series_terms = get_terms(array(
                        'taxonomy' => 'series',
                        'hide_empty' => false,
                    ));
                    
                    if (!empty($series_terms) && !is_wp_error($series_terms)) :
                        // Mostrar series originales
                        foreach ($series_terms as $term) :
                            $image_id = get_term_meta($term->term_id, 'serie-image-id', true);
                            $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'large') : get_bloginfo('template_url') . '/images/blank.jpg';
                            $term_link = get_term_link($term);
                    ?>
                    
                    <div class="min-w-[800px] h-[400px] relative overflow-hidden rounded-2xl shrink-0">
                        <img src="<?php echo esc_url($image_url); ?>" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent p-10 flex flex-col justify-end">
                            <span class="w-fit px-4 py-1 border border-white/30 rounded-full text-[10px] text-white mb-4 backdrop-blur-md">Serie</span>
                            <h3 class="text-white text-3xl font-bold leading-tight drop-shadow-lg"><?php echo esc_html($term->name); ?></h3>
                            <?php if ($term->description) : ?>
                                <p class="text-white/80 text-sm mt-2 line-clamp-2 drop-shadow-md"><?php echo esc_html($term->description); ?></p>
                            <?php endif; ?>
                            <a href="<?php echo esc_url($term_link); ?>" class="inline-flex items-center mt-4 text-sm font-semibold text-white group drop-shadow-md">
                                Ver serie
                                <span class="ml-2 bg-white text-black w-8 h-8 rounded-full flex items-center justify-center group-hover:bg-gray-200 transition">
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                    <?php 
                        endforeach;
                    else : 
                    ?>
                    
                    <div class="min-w-[800px] h-[400px] relative overflow-hidden rounded-2xl shrink-0 flex items-center justify-center bg-gray-200">
                        <p class="text-gray-500 text-lg">No hay series disponibles</p>
                    </div>
                    
                    <?php endif; ?>
                </div>
            </div>

        </section>

        <section id="gallo-books" class="w-1/4">
            <div class="bg-black rounded-2xl h-full flex items-center justify-center text-white p-8">
                <a href="/publicaciones" class="text-lg font-semibold text-white relative inline-block group">
                    Descubre más libros y publicaciones
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>
        </section>

    </div>

<script>
    const track = document.getElementById('sliderTrack');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    
    let index = 0;
    let direction = 1; // 1 = adelante, -1 = atrás
    const totalItems = track.children.length;
    const gap = 24;

    function moveSlider() {
        const itemWidth = track.children[0].offsetWidth + gap;
        track.style.transform = `translateX(-${index * itemWidth}px)`;
    }

    function advance() {
        index += direction;
        
        // Si llegamos al final, cambiamos dirección
        if (index >= totalItems - 1) {
            direction = -1;
        }
        // Si llegamos al inicio, cambiamos dirección
        else if (index <= 0) {
            direction = 1;
        }
        
        moveSlider();
    }

    nextBtn.addEventListener('click', () => {
        if (index < totalItems - 1) {
            index++;
            direction = 1;
            moveSlider();
            resetTimer();
        }
    });

    prevBtn.addEventListener('click', () => {
        if (index > 0) {
            index--;
            direction = -1;
            moveSlider();
            resetTimer();
        }
    });

    // Auto-avance cada 4 segundos
    let autoSlide = setInterval(advance, 4000);

    function resetTimer() {
        clearInterval(autoSlide);
        autoSlide = setInterval(advance, 4000);
    }

    window.addEventListener('resize', moveSlider);
</script>