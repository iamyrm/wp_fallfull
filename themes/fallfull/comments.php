<?php /*

<div id="comments">
<?php
if ( have_comments() ) :
global $comments_by_type;
$comments_by_type = separate_comments( $comments );
if ( !empty( $comments_by_type['comment'] ) ) :
?>
<section id="comments-list" class="comments">
<h2 class="comments-title"><?php comments_number(); ?></h2>
<?php if ( get_comment_pages_count() > 1 ) : ?>
<nav id="comments-nav-above" class="comments-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Comments Navigation', 'fallfull' ); ?>">
<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
</nav>
<?php endif; ?>
<ul>
<?php wp_list_comments( 'type=comment' ); ?>
</ul>
<?php if ( get_comment_pages_count() > 1 ) : ?>
<nav id="comments-nav-below" class="comments-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Comments Navigation', 'fallfull' ); ?>">
<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
</nav>
<?php endif; ?>
</section>
<?php
endif;
if ( !empty( $comments_by_type['pings'] ) ) :
$ping_count = count( $comments_by_type['pings'] );
?>
<section id="trackbacks-list" class="comments">
<h2 class="comments-title"><?php echo '<span class="ping-count">' . esc_html( $ping_count ) . '</span> ' . esc_html( _nx( 'Trackback or Pingback', 'Trackbacks and Pingbacks', $ping_count, 'comments count', 'fallfull' ) ); ?></h2>
<ul>
<?php wp_list_comments( 'type=pings&callback=fallfull_custom_pings' ); ?>
</ul>
</section>
<?php
endif;
endif;
if ( comments_open() && !post_password_required() ) { comment_form(); }
?>
</div>
*/ ?>

<?php
/**
 * Template for displaying comments
 */

// Return early if post is password protected
if (post_password_required()) {
	return;
}
?>

<div class="comments-list-wrap">
	<?php if (have_comments()) : ?>
		<h3 class="comment-count-title">
			<?php
			$comment_count = get_comments_number();
			if (1 === $comment_count) {
				printf(
					esc_html__('1 Comment', 'textdomain'),
					number_format_i18n($comment_count)
				);
			} else {
				printf(
					esc_html__('%s Comments', 'textdomain'),
					number_format_i18n($comment_count)
				);
			}
			?>
		</h3>
		<div class="comment-list">
			<?php
			wp_list_comments(array(
				'style'       => 'div',
				'callback'    => 'custom_comment_callback',
				'max_depth'   => 3,
				'avatar_size' => 70,
			));
			?>
		</div>

		<?php
		// Comment pagination
		the_comments_navigation(array(
			'prev_text' => __('Older Comments', 'textdomain'),
			'next_text' => __('Newer Comments', 'textdomain'),
		));
		?>

	<?php endif; ?>

	<!-- If comments are closed and there are comments -->
	<?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
		<p class="no-comments"><?php esc_html_e('Comments are closed.', 'textdomain'); ?></p>
	<?php endif; ?>

	<div class="comment-template">
		<h4><?php esc_html_e('Leave a comment', 'textdomain'); ?></h4>
		<p><?php esc_html_e('If you have a comment dont feel hesitate to send us your opinion.', 'textdomain'); ?></p>
		<?php
		comment_form(array(
			'title_reply'          => false,
			'comment_field'        => '<p><textarea name="comment" id="comment" cols="30" rows="10" placeholder="' . esc_attr__('Your Message', 'textdomain') . '"></textarea></p>',
			'fields'               => apply_filters('comment_form_default_fields', array(
				'author' => '<input type="text" name="author" id="author" placeholder="' . esc_attr__('Your Name', 'textdomain') . '" required>',
				'email'  => '<input type="email" name="email" id="email" placeholder="' . esc_attr__('Your Email', 'textdomain') . '" required>',
			)),
			'comment_notes_before' => false,
			'comment_notes_after'  => false,
			'submit_button'        => '<p><input type="submit" name="%1$s" id="%2$s" class="%3$s" value="' . esc_attr__('Submit', 'textdomain') . '" /></p>',
			'class_form'           => false,
		));
		?>
	</div>
</div>