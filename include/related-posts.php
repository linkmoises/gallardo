<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<?php if (!empty($related_posts)) { ?>
<?php
	foreach ($related_posts as $post) {
		setup_postdata($post); ?>
<!-- begin post -->
<div class="col-lg-4 col-md-6 mb-30px card-group">
	<div class="card h-100">
		<div class="maxthumb">
			<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail( 'large' , array( 'class' => 'img-fluid') ) ; ?>
			</a>
		</div>
		<div class="card-body">
			<h2 class="card-title">
				<a class="text-dark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2>
		</div>
		<div class="card-footer bg-white">
			<div class="wrapfooter">
				<span class="meta-footer-thumb">
					<a href="#"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 72 ); ?></a>
				</span>
				<span class="author-meta">
					<span class="post-name"><a target="_blank" href="#"><?php the_author(); ?></a></span><br/>
					<span class="post-date"><?php echo get_the_date('j M Y'); ?></span> - 
					<span class="post-read"><?php echo gallo_reading_time(); ?></span>
				</span>
				<span class="post-read-more"><a href="<?php the_permalink(); ?>" title="Leer historia"><i class="fas fa-bookmark"></i></a></span>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!-- end post -->
<?php } ?>
<?php } ?>

