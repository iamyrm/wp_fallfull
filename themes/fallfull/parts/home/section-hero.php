<?php
$home_ID = get_the_ID();
$subheading = get_field('hero_subheading', $home_ID);
$heading = get_field('hero_heading', $home_ID);
$btn1txt = get_field('hero_btn1txt', $home_ID);
$btn1slug = get_field('hero_btn1url_slug', $home_ID);
$btn2txt = get_field('hero_btn2txt', $home_ID);
$btn2slug = get_field('hero_btn2url_slug', $home_ID);

$bannerimg = get_field('hero_heroimg', $home_ID);
$img = $bannerimg ? $bannerimg : THEME_URI . '/assets/images/default-slide.jpg';
?>

<div class="hero-area hero-bg" style="background-image: url(<?php echo esc_url($img); ?>);">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 offset-lg-2 text-center">
				<div class="hero-text">
					<div class="hero-text-tablecell">
						<p class="subtitle"><?php echo esc_html($subheading); ?></p>
						<h1><?php echo esc_html($heading); ?></h1>
						<div class="hero-btns">
							<a href="<?php echo esc_url(home_url('/' . $btn1slug)) ?>" class="boxed-btn"><?php echo esc_html($btn1txt); ?></a>
							<a href="<?php echo esc_url(home_url('/' . $btn2slug)) ?>" class="bordered-btn"><?php echo esc_html($btn2txt); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>