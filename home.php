<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<?php get_header(); ?>
	<div class="container-fluid"> <!-- Inicia .container (coloca al centro la estructura de la página) -->

<!-- Jumbotron
================================================== -->
		<div id="jumbohome" class="jumbotron mb-30px p-4 p-md-5 text-white rounded bg-dark">
			<div class="col-md-6 px-0">
				<h1 class="display-4 font-italic">Bienvenido a mi blog personal</h1>
				<p class="lead my-3">Desde aquí hablo un poco de EdTech, Thinkpads, LEGO, Linux, Redes, Seguridad y Medicina.</p>
				<p class="lead mb-0"><a href="https://moisesserrano.com/sobre-mi/" class="text-white font-weight-bold">Conoce un poco más sobre lo que hago...</a></p>
			</div>
		</div>
<!-- Cierra Jumbotron
================================================== -->

<!-- Contenido principal
================================================== -->
		<div class="main-content">

<?php
$featured_loop = new WP_Query(
	array(
		'post_type' => 'post',
		'posts_per_page' => 2,
		'category_name' => 'destacado',
		//'order' => 'ASC',
		//'orderby' => 'name'
	)
);
?>
<?php if ( $featured_loop->have_posts() ): ?>
<!-- Posts Destacados
================================================== -->
			<section class="featured-posts">
				<div class="section-title"><h2><span>Más visitados</span></h2></div>
				<div class="row"><!-- inicio fila -->
<?php while ( $featured_loop->have_posts() ) : $featured_loop->the_post(); ?>
<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');?>
					<!-- inicio post -->
					<div class="col-md-6 mb-30px">
						<div class="listfeaturedtag h-100">
							<div class="row h-100">
								<div class="col-12 col-md-12 col-lg-5 pr-lg-0">
									<div class="h-100">
										<div class="wrapthumbnail">
											<a href="<?php the_permalink(); ?>"><img class="featured-box-img-cover" src="<?php echo $featured_img_url; ?>" alt="<?php the_title(); ?>" /></a>
										</div>
									</div>
								</div>
								<div class="col-12 col-md-12 col-lg-7">
									<div class="h-100 card-group">
										<div class="card">
											<div class="card-body">
												<h2 class="card-title"><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
												<h4 class="card-text"><?php the_excerpt(); ?></h4>
											</div>
											<div class="card-footer b-0 bg-white mt-auto">
								<div class="wrapfooter">
									<span class="meta-footer-thumb">
										<a href="#"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 72 ); ?></a>
									</span>
									<span class="author-meta">
										<span class="post-name"><a target="_blank" href="#"><?php the_author(); ?></a></span><br/>
										<span class="post-date"><?php echo get_the_date('j M Y'); ?></span>
										<span class="dot"></span>
										<span class="post-read"><?php echo gallo_reading_time(); ?></span>
									</span>
									<span class="post-read-more"><a href="<?php the_permalink(); ?>" title="Leer historia"><i class="fas fa-bookmark"></i></a></span>
									<div class="clearfix"></div>
								</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- fin post -->
<?php endwhile; ?>
				</div> <!-- fin fila -->
			</section>
<?php endif; ?>
<?php wp_reset_query(); ?>
<!-- intermezzo -->
<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$home_loop = new WP_Query(
	array(
		'post_type' => 'post',
		'posts_per_page' => 6,
		'paged' => $paged,
		//'order' => 'ASC',
		//'orderby' => 'name'
	)
);
?>
<?php if ( $home_loop->have_posts() ) { ?>
<!-- Todos los posts
================================================== -->
			<section class="recent-posts">
				<div class="section-title"><h2><span>Todas las historias</span></h2></div>
				<div class="row listrecent"> <!-- inicio fila recientes -->
<?php while ( $home_loop->have_posts() ) : $home_loop->the_post(); ?>
<?php $home_img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');?>
					<!-- inicio post -->
					<div id="post-<?php the_ID(); ?>" class="col-lg-4 col-md-6 mb-30px card-group">
						<div class="card h-100">
							<div class="maxthumb">
								<a href="<?php the_permalink(); ?>"><img class="img-fluid" src="<?php echo $home_img_url; ?>" alt="<?php the_title(); ?>" /></a>
							</div>
							<div class="card-body">
								<h2 class="card-title"><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<h4 class="card-text"><?php the_excerpt(); ?></h4>
							</div>
							<div class="card-footer bg-white">
								<div class="wrapfooter">
									<span class="meta-footer-thumb">
										<a href="#"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 72 ); ?></a>
									</span>
									<span class="author-meta">
										<span class="post-name"><a target="_blank" href="#"><?php the_author(); ?></a></span><br/>
										<span class="post-date"><?php echo get_the_date('j M Y'); ?></span>
										<span class="dot"></span>
										<span class="post-read"><?php echo gallo_reading_time(); ?></span>
									</span>
									<span class="post-read-more"><a href="<?php the_permalink(); ?>" title="Leer historia"><i class="fas fa-bookmark"></i></a></span>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- end post -->
<?php endwhile; ?>
				</div> <!-- fin fila recientes -->
			</section>

<!-- Paginación
================================================== -->
			<div class="bottompagination">
				<div class="pointerup"><i class="fa fa-caret-up"></i></div>
				<span class="navigation" role="navigation">
<?php gallo_posts_nav(); ?>
				</span>
			</div>
<!-- Fin Paginación
================================================== -->
<?php } ?>

		</div><!-- cierra .main-content -->
	</div> <!-- cierra .container -->
<?php get_footer(); ?>
