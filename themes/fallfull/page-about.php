<?php get_header(); ?>

<!-- breadcrumb-section -->
<?php get_template_part('parts/global/breadcrumb'); ?>
<!-- end breadcrumb section -->

<!-- featured section -->
<?php get_template_part('parts/about/section', 'feature'); ?>
<!-- end featured section -->

<!-- shop sale -->
<?php echo get_template_part('parts/global/section', 'shop-sale'); ?>
<!-- end shop sale -->

<!-- team section -->
<?php echo get_template_part('parts/about/section', 'teams'); ?>
<!-- end team section -->

<!-- testimonail-section -->
<?php echo get_template_part('parts/global/section', 'testimonial'); ?>
<!-- end testimonail-section -->

<!-- logo carousel -->
<?php echo get_template_part('parts/global/section', 'carousel'); ?>
<!-- end logo carousel -->

<?php get_footer(); ?>