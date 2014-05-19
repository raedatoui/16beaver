<div class="grid_1  col" id="sidebar">
	<div id="barcontent">
   		<h2><div class="thin_rule arrow-link"><a href="<?=network_home_url()?>/contact">POST / CONTACT</a></div></h2>
    	<h2><div class="thin_rule arrow-link"><a href="#"></a><a href="#mondays">SUBSCRIBE TO OUR NEWSLETTER</a></div></h2>
    	<?php if (get_the_title(get_the_ID()) != "About") { ?>
    	<div class="spacer"></div>

		<?php if (function_exists('flexo_standalone_archives')): ?>
		<h2 class="sidetitle">Archives</h2>
		<ul>
			<?php flexo_standalone_archives(); ?>
		</ul>
		<?php endif;?>

		<?php
		if(is_single()) { ?>
			<div class="spacer"></div>
			<h2 class="sidetitle">Recent</h2>
			<ul>
			<?php
			$my_query = new WP_Query('posts_per_page=6');
			if ( $my_query->have_posts() ) {

		    	while ( $my_query->have_posts() ) {
		      		$my_query->the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php } ?>
			<?php } ?>
		<?php } ?>
		</ul>

		<div class="spacer"></div>
		<?php if (sizeof(get_categories()) > 1) : ?>
		<h2 class="sidetitle">Categories</h2>
		<ul id="catlist">
				<?php wp_list_categories('title_li='); ?>
		</ul>
		<?php endif; ?>
		<?php } ?>
	</div>

</div>
