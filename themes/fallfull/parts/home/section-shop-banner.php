<?php
global $fallfull_options;
$heading_word = isset($fallfull_options['home-sale-text-color']) ? $fallfull_options['home-sale-text-color'] : '';
$highlight_heading_words = $heading_word ? array_map('trim', explode(',', $heading_word)) : array();


$sale_heading1 = get_field('sale_heading1', get_the_ID());
$sale_heading2 = get_field('sale_heading2', get_the_ID());
$sale_discount = get_field('sale_discount', get_the_ID());
$sale_btn_txt = get_field('sale_btn_txt', get_the_ID());
$sale_btn_slug = get_field('sale_btn_slug', get_the_ID());
$sale_btn_img = get_field('sale_bg_img', get_the_ID());

$img = $sale_btn_img ? $sale_btn_img : THEME_URI . '/assets/images/default-slide.jpg';
?>

<section class="shop-banner" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(<?php echo esc_url($img); ?>);">
	<div class="container">
		<h3 class="fallfull-color-white"><?php echo esc_html($sale_heading1); ?>&nbsp;<br>&nbsp;<?php echo fallfull_highlight_words(wp_kses_post($sale_heading2), $highlight_heading_words); ?></h3>
		<div class="sale-percent"><span class="fallfull-color-white">Sale! <br> Upto</span><?php echo esc_html($sale_discount); ?>%&nbsp;<span class="fallfull-color-white">off</span></div>
		<a href="<?php echo esc_url(home_url('/' . $sale_btn_slug)); ?>" class="cart-btn btn-lg"><?php echo esc_html($sale_btn_txt); ?></a>
	</div>
</section>