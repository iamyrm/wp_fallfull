<?php
/*
Template Name: Cart Template
*/

get_header(); ?>

<!-- breadcrumb-section -->
<?php get_template_part('parts/global/breadcrumb'); ?>
<!-- end breadcrumb section -->

<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2 text-center">
			<div class="section-title">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_template_part('parts/global/section', 'carousel');
get_footer(); ?>