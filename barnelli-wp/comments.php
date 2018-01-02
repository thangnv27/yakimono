<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
	die('Do not load this page directly!');
}

if (post_password_required()) {
	?>
	<p class="no-comments"><?php _t('This post is password protected. Enter the password to view comments.'); ?></p>
	<?php
	return;
}
?>
<?php if (have_comments()): ?>
	<section id="comments">
		<div class="title"><h2><?php comments_number(__t('No Comments'), __t('One Comment'), __t('% Comments')); ?></h2></div>
		<ul class="comments animate_element animate_content">
			<?php wp_list_comments('type=comment&callback=barnelli_comment'); ?>
		</ul>
		<div class="comments-navigation">
			<div class="alignleft"><?php previous_comments_link(); ?></div>
			<div class="alignright"><?php next_comments_link(); ?></div>
		</div>
	</section>
<?php else : ?>
	<?php if (comments_open()) : ?>
	<?php else : ?>
		<p class="no-comments"><?php _t('Comments are closed.'); ?></p>
	<?php endif; ?>
<?php endif; ?>
<?php if (comments_open()) : ?>
	<div class="section <?php if ( have_comments() == false ) { echo 'no-comments-so-far'; } ?>">
		<section class="form">
			<?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
				<p><?php _t('You must be'); ?> <a href="<?php echo wp_login_url(get_permalink()); ?>"><?php _t('logged in'); ?></a> <?php _t('to post a comment.'); ?></p>
				<?php else : ?>
				<?php $comments_args = array(
					'label_submit' => 'send',
					'title_reply' => __t('Leave a reply'),
					'id_submit' => 'buttonform',
					'comment_notes_after' => '',
					'comment_notes_before' => '',
					'fields' => array(
						'author' => '<div class="input-wrapper name"><input class="contact-form required" type="text" placeholder="Name" name="author" id="author" aria-required="true" tabindex="1"></div>',
						'email' => '<div class="input-wrapper email"><input class="contact-form required" type="text" placeholder="Email" name="email" id="email" aria-required="true" tabindex="2"></div>'
					),
					'comment_field' => '<div class="input-wrapper message"><textarea class="contact-form" placeholder="'. __t('Write a comment').'" tabindex="6" name="comment" id="comment"></textarea></div>',
				);
				comment_form($comments_args);
			endif;
			?>
		</section>
	</div>
<?php endif; ?>