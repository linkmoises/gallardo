<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<?php get_header(); ?>
<!-- Inicia página
================================================== -->
<div class="container">
	<div class="row">

<?php gallo_share(); ?>

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
