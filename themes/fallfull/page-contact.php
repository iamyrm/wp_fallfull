<?php get_header(); ?>

<!-- breadcrumb-section -->
<?php get_template_part('parts/global/breadcrumb'); ?>
<!-- end breadcrumb section -->

<!-- contact form -->
<?php get_template_part('parts/contact/section', 'form'); ?>
<!-- end contact form -->

<!-- google map section -->
<?php get_template_part('parts/contact/section', 'map'); ?>
<!-- end google map section -->

<?php get_footer(); ?>