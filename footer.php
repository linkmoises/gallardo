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
					<a href="#" class="fb-ic"><i class="fab fa-facebook-f fa-lg white-text"> </i></a>
					<a href="#" class="tw-ic"><i class="fab fa-twitter fa-lg white-text"> </i></a>
					<a href="#" class="li-ic"><i class="fab fa-linkedin-in fa-lg white-text"> </i></a>
					<a href="#" class="ins-ic"><i class="fab fa-instagram fa-lg white-text"> </i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-copyright text-center py-3">
		<small>© Algunos derechos reservados 2017 - <?php echo date("Y"); ?>. Funciona con <a href="#">WordPress</a>.</small>
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
