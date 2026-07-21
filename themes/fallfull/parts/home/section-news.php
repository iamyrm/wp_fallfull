<?php
$news_heading = get_field('news_heading', get_the_ID());
$news_desc = get_field('news_description', get_the_ID());
$news_btn_txt = get_field('news_btn_txt', get_the_ID());
$news_btn_slug = get_field('news_btn_slug', get_the_ID());
?>

<div class="latest-news pt-150 pb-150">
	<div class="container">

		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><?php echo fallfull_highlight_words(wp_kses_post($news_heading), array('Our')); ?></h3>
					<p><?php echo esc_html($news_desc); ?></p>
				</div>
			</div>
		</div>

		<div class="row">
			<?php get_template_part('parts/home/section', 'news-list'); ?>
		</div>

		<div class="row">
			<div class="col-lg-12 text-center">
				<a href="<?php echo esc_url(home_url('/' . $news_btn_slug)); ?>" class="boxed-btn"><?php echo esc_html($news_btn_txt); ?></a>
			</div>
		</div>
	</div>
</div>