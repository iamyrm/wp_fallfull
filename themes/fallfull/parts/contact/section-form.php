<?php
global $fallfull_options;

$site_address = isset($fallfull_options['fallfull_site_address']) ? $fallfull_options['fallfull_site_address'] : '';
$site_emial = isset($fallfull_options['fallfull_site_email']) ? $fallfull_options['fallfull_site_email'] : '';
$site_phone_no = isset($fallfull_options['fallfull_site_phoneno']) ? $fallfull_options['fallfull_site_phoneno'] : '';

$form_heading = get_field('contact_form_heading');
$word = isset($fallfull_options['contact-form-sec-text-color']) ? $fallfull_options['contact-form-sec-text-color'] : '';
$highlight_words = $word ? array_map('trim', explode(',', $word)) : array();

$form_desc = get_field('contact_form_desc');

?>

<div class="contact-from-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mb-5 mb-lg-0">
				<div class="form-title">
					<h2><?php echo fallfull_highlight_words(wp_kses_post($form_heading), $highlight_words); ?></h2>
					<p><?php echo esc_html($form_desc); ?></p>
				</div>

				<?php get_template_part('parts/contact/form'); ?>

			</div>

			<div class="col-lg-4">
				<div class="contact-form-wrap">
					<div class="contact-form-box">
						<h4><i class="fas fa-map"></i> Shop Address</h4>
						<p><?php echo esc_html($site_address); ?></p>
					</div>
					<div class="contact-form-box">
						<h4><i class="fas fa-address-book"></i> Contact</h4>
						<p>Phone: <?php echo esc_html($site_phone_no); ?> <br> Email: <?php echo esc_html($site_emial); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>