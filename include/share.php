<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
		<!-- Begin Fixed Left Share -->
		<div class="col-md-2 col-xs-12">
			<div class="share">
				<p>Comparte</p>
				<ul>
					<li>
						<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp;via=linkmoises"><i class="fab fa-twitter"></i></a>
					</li>
					<li>
						<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>"><i class="fab fa-facebook-f"></i></a>
					</li>
					<li>
						<a href="https://wa.me/?text=Hola,%20te%20comparto%20este%20enlace:%20<?php echo $title; ?>%20|%20<?php echo $url; ?>"><i class="fab fa-whatsapp"></i></a>
					</li>
					<li>
						<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>"><i class="fab fa-linkedin"></i></a>
					</li>
				</ul>
<?php if ( is_single() ) { ?>
				<div class="d-none d-lg-block">
					<div class="sep"></div>
					<p>Comenta</p>
					<ul>
						<li>
							<a href="#comments"><?php echo get_comments_number($post->ID); ?> <i class="far fa-comments"></i></a>
						</li>
					</ul>
					<div class="sep"></div>
					<p><span class="post-read"><?php echo gallo_reading_time(); ?></span></p>
					<p><span class="post-date"><?php echo get_the_date('j M Y', get_the_ID()) ?></span></p>
<?php edit_post_link( 'Editar', '<p>', '</p>' ); ?>
				</div>
<?php } elseif ( is_page() ) { ?>
				<!--<p><span class="post-date"><?php echo get_the_date('j M Y', get_the_ID()) ?></span></p>-->
<?php } ?>
			</div>
		</div>
		<!-- End Fixed Left Share -->
