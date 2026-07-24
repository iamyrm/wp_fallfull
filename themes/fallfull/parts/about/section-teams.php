<?php
global $fallfull_options;
$word = isset($fallfull_options['about-team-sec-text-color']) ? $fallfull_options['about-team-sec-text-color'] : '';
$highlight_words = $word ? array_map('trim', explode(',', $word)) : array();

$heading = get_field('about_team_heading', get_the_ID());
$desc = get_field('about_pg_teams_desc', get_the_ID());

?>

<div class="mt-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><?php echo fallfull_highlight_words(wp_kses_post($heading), $highlight_words); ?></h3>
					<p><?php echo esc_html($desc); ?></p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="single-team-item">
					<div class="team-bg team-bg-1"></div>
					<h4>Jimmy Doe <span>Farmer</span></h4>
					<ul class="social-link-team">
						<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="single-team-item">
					<div class="team-bg team-bg-2"></div>
					<h4>Marry Doe <span>Farmer</span></h4>
					<ul class="social-link-team">
						<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
				<div class="single-team-item">
					<div class="team-bg team-bg-3"></div>
					<h4>Simon Joe <span>Farmer</span></h4>
					<ul class="social-link-team">
						<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>