<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<?php get_header(); ?>
<!-- Inicia página
================================================== -->
<div class="container-fluid">
	<div class="row">

<?php gallo_share(); ?>

		<!-- Inicio Post -->
		<div id="gallardo-<?php the_ID(); ?>" class="gallardo-post pt-3 px-5 mb-5 col-md-8 col-md-offset-2 col-xs-12">
			<!-- Inicio Tags -->
			<div class="after-post-tags">
<?php the_tags( '<ul class="tags">' . "\n" . '<li>', '</li>' . "\n" . '<li>', '</li>' . "\n" . '</ul>' . "\n" ); ?>
			</div>
			<!-- Fin Tags -->
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
						<a href="#"><i class="fa fa-instagram"></i></a>
					</div>
					<div id="gallardo-certif" class="row">
						<div class="col-4">
							<img src="https://moisesserrano.com/core/wp-content/themes/gallardo/img/bls-certif-logo.png" />
						</div>
						<div class="col-8">BLS
							
						</div>
						<div class="col-4">
							<img src="https://moisesserrano.com/core/wp-content/themes/gallardo/img/bls-certif-logo.png" />
						</div>
						<div class="col-8">ACLS
							
						</div>
						<div class="col-4">
							<img src="https://moisesserrano.com/core/wp-content/themes/gallardo/img/bls-certif-logo.png" />
						</div>
						<div class="col-8">PALS
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Fin Meta Autor -->
		
	</div>
</div>
<!-- Termina página
================================================== -->

<div class="hideshare"></div>

<?php get_footer(); ?>
