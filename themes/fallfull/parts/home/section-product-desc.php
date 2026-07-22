<?php
global $fallfull_options;
$word = isset($fallfull_options['home-prod-desc-text-color']) ? $fallfull_options['home-prod-desc-text-color'] : '';
$highlight_words = $word ? array_map('trim', explode(',', $word)) : array();

$heading = get_field('product_heading', get_the_ID());
$prod_desc = get_field('product_description', get_the_ID());

?>

<div class="row">
	<div class="col-lg-8 offset-lg-2 text-center">
		<div class="section-title">
			<h3><?php echo fallfull_highlight_words(wp_kses_post($heading), $highlight_words); ?></h3>
			<p><?php echo esc_html($prod_desc); ?></p>
		</div>
	</div>
</div>