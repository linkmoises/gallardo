<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<?php get_header(); ?>
<!-- Inicia página
================================================== -->
<div class="container">
	<div class="row">

		<!-- Begin Fixed Left Share -->
		<div class="col-md-2 col-xs-12">
			<div class="share">
				<p>
					Comparte
				</p>
				<ul>
					<li>
						<a target="_blank" href="#">
							<i class="fab fa-twitter"></i>
						</a>
					</li>
					<li>
						<a target="_blank" href="#">
							<i class="fab fa-facebook-f"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fab fa-whatsapp"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- End Fixed Left Share -->

		<!-- Inicio Post -->
		<div class="col-md-8 col-md-offset-2 col-xs-12">
<?php if ( have_posts() ) : ?> 
<?php while ( have_posts() ) : the_post(); ?>
<div class="mainheading">
	<h1 class="posttitle"><?php the_title(); ?></h1>
</div>
<div class="article-post"> 
<?php the_content(); ?>
</div>
<?php endwhile;  
endif; 
?>
		</div>
		<!-- Fin Post -->

	</div>
</div>
<!-- Termina página
================================================== -->

<div class="hideshare"></div>

<?php get_footer(); ?>
