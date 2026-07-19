<div class="search-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<span class="close-btn"><i class="fas fa-window-close"></i></span>
				<div class="search-bar">
					<div class="search-bar-tablecell">
						<h3>Search For:</h3>
						<form role="search" method="get" action="<?php echo home_url('/'); ?>">
							<input type="text" placeholder="Type here..." value="<?php echo get_search_query(); ?>" name="s">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>