<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<!-- Empieza Pie
================================================== -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 text-center text-lg-left">
				Algunos derechos reservados 2017 - <?php echo date("Y"); ?>. Funciona con WordPress.
			</div>
			<div id="socialicons" class="col-md-6 col-sm-6 text-center text-lg-right">
				<a target="_blank" href="#"><i class="fab fa-facebook-square"></i></a>
				<a target="_blank" href="#"><i class="fab fa-instagram"></i></a>
				<a target="_blank" href="#"><i class="fab fa-twitter-square"></i></a>
			</div>
		</div>
	</div>
</footer>
<!-- Termina Pie
================================================== -->
</div> <!-- Cierra .site-content -->

<!-- Scripts
================================================== -->
<script src=<?php bloginfo("template_url"); ?>/js/jquery.min.js"></script>
<script src="<?php bloginfo("template_url"); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo("template_url"); ?>/js/ie10-viewport-bug-workaround.js"></script>
<?php wp_footer(); ?>
</body>
</html>
