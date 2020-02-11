<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<?php get_header(); ?>
	<div class="container"> <!-- Inicia .container (coloca al centro la estructura de la página) -->

<!-- Contenido principal
================================================== -->
		<div class="main-content">

<!-- Todos los posts
================================================== -->
			<section class="recent-posts">
				<div class="section-title"><h2><span><?php echo $wp_query->found_posts; ?> resultados para: "<?php the_search_query(); ?>"</span></h2></div>
				<div id="search-results" class="row listrecent"> <!-- inicio fila recientes -->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<!-- inicio post -->
					<div id="post-<?php the_ID(); ?>" class="col-lg-12 col-md-6 mb-30px card-group">
						<div class="card h-100">
							<div class="card-body">
								<h2 class="card-title"><a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<!-- Inicio Tags -->
								<div class="after-post-tags">
<?php the_tags( '<ul class="tags">' . "\n" . '<li>', '</li>' . "\n" . '<li>', '</li>' . "\n" . '</ul>' . "\n" ); ?>
								</div>
								<!-- Fin Tags -->
								<p class="card-text"><?php the_excerpt(); ?></p>
								<span><a href="<?php echo get_permalink(); ?>"><?php echo get_permalink(); ?></a></span>
							</div>
							<div class="card-footer bg-white">
								<div class="wrapfooter">
									<span class="author-meta">
										<span class="post-date"><?php echo get_the_date('j M Y'); ?></span>
										<span class="dot"></span>
										<span class="post-read"><?php echo gallo_reading_time(); ?></span>
									</span>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- end post -->
<?php endwhile; ?>
<?php endif; ?>
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

		</div><!-- cierra .main-content -->
	</div> <!-- cierra .container -->
<?php get_footer(); ?>
