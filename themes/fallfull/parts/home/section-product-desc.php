<div class="row">
	<div class="col-lg-8 offset-lg-2 text-center">
		<div class="section-title">
			<h3>
				<?php
				$heading = get_field('product_heading');

				if (!empty($heading)) {
					// Find the position of the first space character
					$first_space = strpos($heading, ' ');

					if ($first_space !== false) {
						// Cut the string right at the first space to separate the first word
						$first_word  = substr($heading, 0, $first_space);
						$rest_text   = substr($heading, $first_space);

						echo '<span class="orange-text">' . esc_html($first_word) . '</span>' . esc_html($rest_text);
					}
				}
				?>
			</h3>
			<p><?php echo esc_html(get_field('product_description')); ?></p>
		</div>
	</div>
</div>