<!-- footer -->
<?php
global $fallfull_options;

$col_heading1 = isset($fallfull_options['footer_column_1']) ? $fallfull_options['footer_column_1'] : '';
$col_heading2 = isset($fallfull_options['footer_column_2']) ? $fallfull_options['footer_column_2'] : '';
$col_heading3 = isset($fallfull_options['footer_column_3']) ? $fallfull_options['footer_column_3'] : '';
$col_heading4 = isset($fallfull_options['footer_column_4']) ? $fallfull_options['footer_column_4'] : '';
$col1_content = isset($fallfull_options['footer_column_1_content']) ? $fallfull_options['footer_column_1_content'] : '';

?>
<div class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="footer-box about-widget">
					<h2 class="widget-title"><?php echo esc_html($col_heading1); ?></h2>
					<p><?php echo esc_html($col1_content); ?></p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box get-in-touch">
					<h2 class="widget-title"><?php echo esc_html($col_heading2); ?></h2>
					<ul>
						<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
						<li>support@fruitkha.com</li>
						<li>+00 111 222 3333</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box pages">
					<h2 class="widget-title"><?php echo esc_html($col_heading3); ?></h2>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="services.html">Shop</a></li>
						<li><a href="news.html">News</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="footer-box subscribe">
					<h2 class="widget-title"><?php echo esc_html($col_heading4); ?></h2>
					<p>Subscribe to our mailing list to get the latest updates.</p>
					<form action="index.html">
						<input type="email" placeholder="Email">
						<button type="submit"><i class="fas fa-paper-plane"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end footer -->

<!-- copyright -->
<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights Reserved.</p>
			</div>
			<div class="col-lg-6 text-right col-md-12">
				<div class="social-icons">
					<ul>
						<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
						<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end copyright -->
<?php wp_footer(); ?>
</body>

</html>