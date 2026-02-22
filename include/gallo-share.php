<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
		<!-- Begin Fixed Left Share -->
		<div class="w-full md:w-auto mb-5">
			<div class="share sticky top-0">
				<ul class="space-y-4">
					<li>
						<a target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp;via=linkmoises"><i class="fa-brands fa-x-twitter"></i></a>
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
				<div class="hidden lg:block">
					<hr class="m-4" />
					<ul class="space-y-3">
						<li>
							<a href="#comments"><?php echo get_comments_number($post->ID); ?> <i class="far fa-comments"></i></a>
						</li>
					</ul>
					<hr class="m-4" />
					<p class="mb-3"><span class="post-read"><?php echo gallo_reading_time(); ?></span></p>
					<p class="mb-3"><span class="post-date"><?php echo get_the_date('j M Y', get_the_ID()) ?></span></p>
<?php edit_post_link( 'Editar', '<p>', '</p>' ); ?>
				</div>
<?php } elseif ( is_page() ) { ?>
<?php edit_post_link( 'Editar', '<p>', '</p>' ); ?>
				<!--<p><span class="post-date"><?php echo get_the_date('j M Y', get_the_ID()) ?></span></p>-->
<?php } ?>
			</div>
		</div>
		<!-- End Fixed Left Share -->
