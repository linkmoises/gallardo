<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<!-- Empieza Pie
================================================== -->
<footer id="mediumdark" class="page-footer font-small">
	<div class="container">
		<div class="row text-center d-flex justify-content-center pt-5 mb-3">
			<div class="col-md-2 mb-3">
				<img src="<?php bloginfo("template_url"); ?>/img/mini.png" />
			</div>
		</div>
		<hr class="inter-meta">
		<div class="row d-flex text-center justify-content-center mb-md-0 mb-4">
			<div class="col-md-8 col-12 mt-5">
				<p id="footer-text"><?php gallo_cita_random(); ?></p>
			</div>
		</div>
		<div id="footer-links" class="row">
			<div class="col-md-12">
				<div class="text-center">
					<a target="_blank" href="https://twitter.com/linkmoises" class="tw-ic"><i class="fab fa-twitter fa-lg white-text"> </i></a>
					<a target="_blank" href="https://facebook.com/linkmoises" class="fb-ic"><i class="fab fa-facebook-f fa-lg white-text"> </i></a>
					<a target="_blank" href="https://linkedin.com/in/linkmoises" class="li-ic"><i class="fab fa-linkedin-in fa-lg white-text"> </i></a>
					<a target="_blank" href="https://instagram.com/linkmoises" class="ins-ic"><i class="fab fa-instagram fa-lg white-text"> </i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-copyright text-center py-3">
		<small><i class="fab fa-creative-commons"></i> <i class="fab fa-creative-commons-by"></i> <i class="fab fa-creative-commons-sa"></i> Contenido bajo licencia <a target="_blank" href="http://creativecommons.org/licenses/by-sa/4.0/">CC-BY-SA</a> 2017 - <?php echo date("Y"); ?>. Funciona con <a href="#">WordPress</a>. <?php if (is_user_logged_in()) : ?><a href="<?php echo admin_url(); ?>">Tablero</a>. <a href="<?php echo admin_url(); ?>/post-new.php">Crear nueva entrada</a>. <a href="<?php echo wp_logout_url(home_url()); ?>">Cerrar sesión</a><?php else : ?><a href="<?php echo wp_login_url(home_url()); ?>">Acceder</a><?php endif;?>.</small>
	</div>
</footer>
<!-- Termina Pie
================================================== -->


</div> <!-- Cierra .site-content -->

<!-- Scripts
================================================== -->
<script src="<?php bloginfo("template_url"); ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo("template_url"); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo("template_url"); ?>/js/ie10-viewport-bug-workaround.js"></script>
<!-- <?php echo get_num_queries(); ?> consultas, carga completa en <?php timer_stop(1); ?> s.-->
<!-- inicia wp_footer()
================================================== -->
<?php wp_footer(); ?>
<!-- fin wp_footer()
================================================== -->
</body>
</html>
