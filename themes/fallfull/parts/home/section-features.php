<div class="list-section pt-80 pb-80">
	<div class="container">
		<div class="row">

			<?php
			$features = array(
				array(
					'icon'        => get_field('features_icon1'),
					'heading'       => get_field('features_heading1'),
					'subheading'        => get_field('features_subheading1'),
					'column_css'  => 'col-lg-4 col-md-6 mb-4 mb-lg-0',
					'listbox_css' => 'list-box d-flex align-items-center'
				),
				array(
					'icon'        => get_field('features_icon2'),
					'heading'       => get_field('features_heading2'),
					'subheading'        => get_field('features_subheading2'),
					'column_css'  => 'col-lg-4 col-md-6 mb-4 mb-lg-0',
					'listbox_css' => 'list-box d-flex align-items-center'
				),
				array(
					'icon'        => get_field('features_icon3'),
					'heading'       => get_field('features_heading3'),
					'subheading'        => get_field('features_subheading3'),
					'column_css'  => 'col-lg-4 col-md-6',
					'listbox_css' => 'list-box d-flex justify-content-start align-items-center'
				)
			);

			foreach ($features as $feature) {
				// Skip if no content
				if (empty($feature['icon']) && empty($feature['heading']) && empty($feature['subheading'])) {
					continue;
				}
			?>
				<div class="<?php echo esc_attr($feature['column_css']); ?>">
					<div class="<?php echo esc_attr($feature['listbox_css']); ?>">
						<div class="list-icon">
							<i class="<?php echo esc_attr($feature['icon']); ?>"></i>
						</div>
						<div class="content">
							<h3><?php echo esc_html($feature['heading']); ?></h3>
							<p><?php echo esc_html($feature['subheading']); ?></p>
						</div>
					</div>
				</div>
			<?php
			}
			?>

		</div>
	</div>
</div>