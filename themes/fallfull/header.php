<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<!--PreLoader-->
	<?php echo get_template_part('parts/global/preloader'); ?>
	<!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<?php fallfull_logo(); ?>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<?php
							wp_nav_menu(array(
								'theme_location' => 'primary-menu',
								'menu_class'     => '',
								'container'      => false,
								'fallback_cb'    => false,
								'items_wrap'     => '<ul>%3$s</ul>',
								'depth'          => 2,
							));
							?>
						</nav>

						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<?php echo get_template_part('parts/global/search'); ?>
	<!-- end search area -->