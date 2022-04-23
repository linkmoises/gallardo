<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<?php get_header(); ?>
<!-- Inicia página
================================================== -->
<div class="container-fluid">
	<div class="row">

<?php gallo_share(); ?>

		<!-- Inicio Post -->
		<div class="gallardo-post pt-3 px-5 mb-5 col-md-8 col-md-offset-2 col-xs-12">
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
			<div class="mainheading">
				<h1 class="posttitle"><?php the_title(); ?></h1>
			</div>
			<!-- Inicio Tags -->
			<div class="after-post-tags">
<?php the_tags( '<ul class="tags">' . "\n" . '<li>', '</li>' . "\n" . '<li>', '</li>' . "\n" . '</ul>' . "\n" ); ?>
			</div>
			<!-- Fin Tags -->
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
				<div class="col-4 col-sm-3 col-md-2 text-center">
					<a href="#"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 90 ); ?></a>
				</div>
				<div class="col-8 col-sm-9 col-md-10">
					<a class="link-dark" href="#">Moisés Serrano Samudio</a><a href="#" class="btn follow"><i class="fab fa-twitter"></i> Seguir</a>
					<span class="author-description d-none d-lg-block">Médico de atención primaria, fotógrafo aficionado, apasionado de las tecnologías relacionadas con el EdTech y el eHealth y diseñador/desarrollador de sitios web de salud.</span>
					<span class="author-description d-lg-none">Médico, apasionado del EdTech/eHealth y diseñador/desarrollador de sitios web de salud.</span>
				</div>
			</div>
			<!-- Fin Meta -->
<?php endwhile;
endif;
?>
		</div>
		<!-- Fin Post -->

		<!-- Inicio Meta Autor -->
		<div class="col-md-3 col-xs-12 mb-5">
			<div id="gallardo-profile" class="profile-card text-center sticky-top sticky-offset">
				<img src="https://www.moisesserrano.com/core/wp-content/uploads/2019/09/linkmoises-square-90x90.jpg" class="img img-responsive">
				<div class="profile-content">
				<div class="profile-name">Moisés Serrano Samudio
					<p>@linkmoises</p>
				</div>
				<div class="profile-description">Médico de atención primaria, fotógrafo aficionado, apasionado de las tecnologías relacionadas con el EdTech y el eHealth.</div>
				</div>
				<div class="profile-social">
					<a href="#"><i class="fa fa-facebook-official"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-instagram"></i></a></div>
				</div>
			</div>
		</div>
		<!-- Fin Meta Autor -->

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
