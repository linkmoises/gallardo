<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
    <footer class="bg-white pt-16 border-t border-gray-300">
        <div class="w-full px-6">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-16 text-center">
                
                <div class="lg:col-span-12 mx-auto flex flex-col items-center justify-center">
                    <img src="<?php bloginfo("template_url"); ?>/images/mini-neg.png" class="mb-6" />
                    <p class="text-gray-400 text-lg leading-relaxed max-w-md mb-8">
                        <?php gallo_cita_random(); ?>
                    </p>

                    <div class="flex gap-6 justify-center">
                        <a target="_blank" href="https://twitter.com/linkmoises" class="tw-ic"><i class="fab fa-twitter fa-lg white-text" aria-hidden="true"> </i></a>
                        <a target="_blank" href="https://facebook.com/linkmoises" class="fb-ic"><i class="fab fa-facebook-f fa-lg white-text" aria-hidden="true"> </i></a>
                        <a target="_blank" href="https://linkedin.com/in/linkmoises" class="li-ic"><i class="fab fa-linkedin-in fa-lg white-text" aria-hidden="true"> </i></a>
                        <a target="_blank" href="https://instagram.com/linkmoises" class="ins-ic"><i class="fab fa-instagram fa-lg white-text" aria-hidden="true"> </i></a>
				    </div>
                </div>

            </div>

        </div>
        <div id="copyright" class="py-8 border-t border-gray-300 bg-gray-100 text-center">
            <div class="text-sm font-medium">
                <span><i class="fab fa-creative-commons"></i> <i class="fab fa-creative-commons-by"></i> <i class="fab fa-creative-commons-sa"></i> Contenido bajo licencia <a target="_blank" href="http://creativecommons.org/licenses/by-sa/4.0/">CC-BY-SA</a> 2017 - <?php echo date("Y"); ?>. Funciona con <a href="#">WordPress</a>. <?php if (is_user_logged_in()) : ?><a href="<?php echo admin_url(); ?>">Tablero</a>. <a href="<?php echo admin_url(); ?>/post-new.php">Crear nueva entrada</a>. <a href="<?php echo wp_logout_url(home_url()); ?>">Cerrar sesión</a><?php else : ?><a href="<?php echo wp_login_url(home_url()); ?>">Acceder</a><?php endif;?>.</span>
            </div>
        </div>
    </footer>

<!-- === inicia wp_footer() ========================== -->
<!-- <?php echo get_num_queries(); ?> consultas, carga completa en <?php timer_stop(1); ?> s.-->
<?php wp_footer(); ?>
<!-- === fin wp_footer() ============================= -->
 
</body>
</html>