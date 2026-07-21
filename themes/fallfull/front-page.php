<?php get_header(); ?>

<!-- home page slider -->
<?php echo get_template_part('parts/home/section', 'hero'); ?>
<!-- end home page slider -->

<!-- features list section -->
<?php echo get_template_part('parts/home/section', 'features'); ?>
<!-- end features list section -->

<!-- product section -->
<div class="product-section mt-150 mb-150">
	<div class="container">

		<?php
		get_template_part('parts/home/section', 'product-desc');
		get_template_part('parts/home/section', 'products');
		?>

	</div>
</div>
<!-- end product section -->

<!-- deals section -->
<?php echo get_template_part('parts/home/section', 'deals'); ?>
<!-- end deals section -->

<!-- testimonail-section -->
<?php echo get_template_part('parts/home/section', 'testimonial'); ?>
<!-- end testimonail-section -->

<!-- advertisement section -->
<?php echo get_template_part('parts/home/section', 'ad'); ?>
<!-- end advertisement section -->

<!-- shop banner -->
<?php echo get_template_part('parts/home/section', 'shop-banner'); ?>
<!-- end shop banner -->

<!-- latest news -->
<?php echo get_template_part('parts/home/section', 'news'); ?>
<!-- end latest news -->

<!-- logo carousel -->
<div class="logo-carousel-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="logo-carousel-inner">
					<div class="single-logo-item">
						<img src="assets/img/company-logos/1.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/2.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/3.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/4.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/5.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end logo carousel -->

<?php get_footer(); ?>