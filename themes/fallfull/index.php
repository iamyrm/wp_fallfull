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
<?php echo get_template_part('parts/global/section', 'testimonial'); ?>
<!-- end testimonail-section -->

<!-- advertisement section -->
<?php echo get_template_part('parts/home/section', 'ad'); ?>
<!-- end advertisement section -->

<!-- shop sale -->
<?php echo get_template_part('parts/global/section', 'shop-sale'); ?>
<!-- end shop sale -->

<!-- latest news -->
<?php echo get_template_part('parts/home/section', 'news'); ?>
<!-- end latest news -->

<!-- logo carousel -->
<?php echo get_template_part('parts/global/section', 'carousel'); ?>
<!-- end logo carousel -->

<?php get_footer(); ?>