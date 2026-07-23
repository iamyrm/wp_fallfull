<!-- footer -->
<?php
global $fallfull_options;

$col_heading1 = isset($fallfull_options['footer_column_1']) ? $fallfull_options['footer_column_1'] : '';
$col_heading2 = isset($fallfull_options['footer_column_2']) ? $fallfull_options['footer_column_2'] : '';
$col_heading3 = isset($fallfull_options['footer_column_3']) ? $fallfull_options['footer_column_3'] : '';
$col_heading4 = isset($fallfull_options['footer_column_4']) ? $fallfull_options['footer_column_4'] : '';
$col1_content = isset($fallfull_options['footer_column_1_content']) ? $fallfull_options['footer_column_1_content'] : '';
$col4_content = isset($fallfull_options['footer_column_4_content']) ? $fallfull_options['footer_column_4_content'] : '';

$site_address = isset($fallfull_options['fallfull_site_address']) ? $fallfull_options['fallfull_site_address'] : '';
$site_emial = isset($fallfull_options['fallfull_site_email']) ? $fallfull_options['fallfull_site_email'] : '';
$site_phone_no = isset($fallfull_options['fallfull_site_phoneno']) ? $fallfull_options['fallfull_site_phoneno'] : '';

$footer_copyright_text = isset($fallfull_options['footer_copyright_text']) ? $fallfull_options['footer_copyright_text'] : '';

?>
<div class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="footer-box about-widget">
					<h2 class="widget-title"><?php echo esc_html($col_heading1); ?></h2>
					<p><?php echo esc_html($col1_content); ?></p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box get-in-touch">
					<h2 class="widget-title"><?php echo esc_html($col_heading2); ?></h2>
					<ul>
						<li><?php echo esc_html($site_address); ?></li>
						<li><?php echo esc_html($site_emial); ?></li>
						<li><?php echo esc_html($site_phone_no); ?></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box pages">
					<h2 class="widget-title"><?php echo esc_html($col_heading3); ?></h2>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'footer-menu',
						'menu_class'     => '',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					));
					?>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box subscribe">
					<h2 class="widget-title"><?php echo esc_html($col_heading4); ?></h2>
					<p><?php echo esc_html($col4_content); ?></p>

					<?php get_template_part('parts/global/subscribe', 'form'); ?>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- end footer -->

<!-- copyright -->
<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<p>Copyrights &copy; <?php echo date('Y') ?> - <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(bloginfo('name')); ?></a>, <?php echo esc_html($footer_copyright_text); ?> | Yyagya</p>
			</div>
			<div class="col-lg-6 text-right col-md-12">
				<div class="social-icons">
					<ul>
						<?php
						$social_icons = array(
							'fallfull_site_socialmedia_urls_1' => 'fab fa-facebook-f',
							'fallfull_site_socialmedia_urls_2' => 'fab fa-twitter',
							'fallfull_site_socialmedia_urls_3' => 'fab fa-instagram',
							'fallfull_site_socialmedia_urls_4' => 'fab fa-linkedin',
							'fallfull_site_socialmedia_urls_5' => 'fab fa-github',
						);

						foreach ($social_icons as $option_key => $icon_class) {
							if (! empty($fallfull_options[$option_key])) {
								$url = esc_url($fallfull_options[$option_key]);
						?>
								<li>
									<a href="<?php echo $url; ?>" target="_blank" rel="noopener">
										<i class="<?php echo esc_attr($icon_class); ?>"></i>
									</a>
								</li>
						<?php
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end copyright -->
<?php wp_footer(); ?>
</body>

</html>