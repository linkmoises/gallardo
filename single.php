<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<?php get_header(); ?>
<!-- Inicia página
================================================== -->
<div class="container">
	<div class="row">

		<!-- Begin Fixed Left Share -->
		<div class="col-md-2 col-xs-12">
			<div class="share">
				<p>Comparte</p>
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
				<div class="d-none d-lg-block">
				<div class="sep">
				</div>
				<p>
					Comenta
				</p>
				<ul>
					<li>
						<a href="#comments">
<?php echo get_comments_number($post->ID); ?> <i class="far fa-comments"></i>
						</a>
					</li>
				</ul>
				<div class="sep">
				</div>
				<p><span class="post-read"><?php echo gallo_reading_time(); ?></span></p>
				<p><span class="post-date"><?php echo get_the_date('j M Y', get_the_ID()) ?></span></p>
<?php edit_post_link( 'Editar', '<p>', '</p>' ); ?>
				</div>
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
			<!-- Inicio Tags -->
			<div class="after-post-tags">
<?php the_tags( '<ul class="tags">' . "\n" . '<li>', '</li>' . "\n" . '<li>', '</li>' . "\n" . '</ul>' . "\n" ); ?>
			</div>
			<!-- Fin Tags -->
			<hr class="inter-meta" />
			<!-- Inicio Meta -->
			<div class="row post-top-meta">
				<div class="col-4 col-sm-3 col-md-2">
					<a href="#"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 72 ); ?></a>
				</div>
				<div class="col-8 col-sm-9 col-md-10">
					<a class="link-dark" href="#">Moisés Serrano Samudio</a><a href="#" class="btn follow"><i class="far fa-address-card"></i> Follow</a>
					<span class="author-description d-none d-lg-block">Médico de atención primaria, fotógrafo aficionado, apasionado de las tecnologías relacionadas con el EdTech y el eHealth y diseñador/desarrollador de sitios web de salud.</span>
					<span class="author-description d-lg-none">Médico de atención primaria, apasionado del EdTech y el eHealth y diseñador/desarrollador de sitios web de salud.</span>
				</div>
			</div>
			<!-- Fin Meta -->
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

<?php gallo_related_posts(array( 'limit' => 3 )); ?>

<?php wp_reset_query();
global $withcomments;
$withcomments = 1;
comments_template( '', true ); ?>

<?php get_footer(); ?>
