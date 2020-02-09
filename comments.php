<?php if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { die('Por favor no cargue esta p&aacute;gina directamente. &iexcl;Gracias!'); } ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div id="comments" class="comments-area">
<?php if(!empty($post->post_password)) : ?>
<?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
<?php endif; ?>
<?php endif; ?>
<?php if($comments) : ?>
				<h2 class="comments-title">Comentarios</h2>
				<ol class="comment-list">
<?php foreach($comments as $comment) : ?>
					<li id="comment-<?php comment_ID(); ?>" class="comment even thread-even depth-1">
<?php if ($comment->comment_approved == '0') : ?>
					<li id="comment-no" class="comment even thread-even depth-1">
						<article>
							<div class="comment-content">
								<p>Su comentario está pendiente de aprobación.</p>
							</div>
						</article>
					</li>
<?php endif; ?>
						<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
							<footer class="comment-meta">
								<div class="comment-author vcard">
									<?php echo get_avatar($author_email, 36 ); ?>
									<b class="fn"><?php comment_author_link(); ?></b> <span class="says">dice:</span>
								</div><!-- .comment-author -->

								<div class="comment-metadata">
									<a href="#"><time datetime="2018-06-14T04:16:44+00:00"><?php comment_date(); ?> a las <?php comment_time(); ?></time></a>
								</div><!-- .comment-metadata -->
							</footer><!-- .comment-meta -->
							<div class="comment-content">
<?php comment_text(); ?>
							</div><!-- .comment-content -->
<?php edit_comment_link( '<i class="fas fa-edit"></i>', '<div class="reply">', '</div>' . "\n" ); ?>
						</article><!-- .comment-body -->
					</li>
<?php endforeach; ?>
				</ol>
<?php else : ?>
				<ol class="comment-list">
					<li id="comment-no" class="comment even thread-even depth-1">
						<article>
							<div class="comment-content">
								<p><i class="far fa-comment"></i> Aún no hay comentarios...</p>
							</div>
						</article>
					</li>
				</ol>
<?php endif; ?>
<?php if(comments_open()) : ?>
<?php if(get_option('comment_registration') && !$user_ID) : ?>
		<p>Debes haber <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">iniciado sesión</a> para dejar un comentario.</p>
<?php else : ?>
				<div id="respond" class="comment-respond">
					<h3 id="reply-title" class="comment-reply-title">Deja una respuesta</h3>
					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate="">
<?php if($user_ID) : ?>
						<p class="comment-notes">
							<span id="email-notes">Has iniciado sesión como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Cerrar sesión &raquo;</a></span>
						</p>
<?php else : ?>
						<p class="comment-notes">
							<span id="email-notes">Su email no será publicado</span>. Required fields are marked <span class="required">*</span>
						</p>
						<div class="row">
							<p class="comment-form-author col-md-4">
								<input id="author" name="author" type="text" placeholder="Nombre" value="<?php echo $comment_author; ?>" size="30" aria-required="true">
							</p>
							<p class="comment-form-email col-md-4">
								<input id="email" name="email" type="email" placeholder="E-mail" value="" size="30" aria-required="true">
							</p>
							<p class="comment-form-url col-md-4">
								<input id="url" name="url" type="url" placeholder="Sitio web" value="<?php echo $comment_author_url; ?>" size="30">
							</p>
						</div>
<?php endif; ?>
						<p class="comment-form-comment">
							<textarea required="" id="comment" name="comment" placeholder="Escribe una respuesta..." cols="45" rows="8" aria-required="true"></textarea>
						</p>
						<p class="form-submit">
							<input name="submit" type="submit" id="submit" class="submit" value="Enviar comentario">
							<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
							<input type="hidden" name="comment_parent" id="comment_parent" value="0">
							<?php do_action('comment_form', $post->ID); ?>
						</p>
					</form>
				</div><!-- cierra #respond -->
<?php endif; ?>
<?php else : ?>
<p>Comentarios cerrados.</p>
<?php endif; ?>
			</div><!-- cierra #comments -->
		</div>
	</div>
</div>
