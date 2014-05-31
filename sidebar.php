<?php
  $klass2 = get_the_title(get_the_ID()) == "Events" ? "col-xs-12 col-sm-12 col-md-12 col-lg-3" : "col-xs-12 col-sm-12 col-md-3";
?>
<div class="<?php echo  $klass2 ?> col" id="sidebar">
	<div id="barcontent">
   		<h2><div class="thin_rule arrow-link"><a href="<?php echo network_home_url()?>/contact">POST / CONTACT</a></div></h2>
    	<h2><div class="thin_rule arrow-link"><a href="#"></a><a href="#mondays">SUBSCRIBE TO OUR NEWSLETTER</a></div></h2>
    	<?php if (get_the_title(get_the_ID()) != "About") { ?>
    	<div class="spacer"></div>

		<?php if (function_exists('flexo_standalone_archives') && get_query_var('pagename') != 'events'): ?>
		<h2 class="sidetitle">Archives</h2>
		<ul class="archives">
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
		<ul class="catlist">
				<?php wp_list_categories('title_li='); ?>
		</ul>
		<?php endif; ?>

		<div class="spacer"></div>
		<?php if (get_query_var('pagename') == 'events') : ?>
		<h2 class="sidetitle">Categories</h2>
		<ul class="catlist">
			<?php
				$args = (array) $args;
				$args['ajax'] = isset($args['ajax']) ? $args['ajax']:(!defined('EM_AJAX') || EM_AJAX );
				$args['format'] = ($format != '' || empty($args['format'])) ? $format : $args['format'];
				$args['format'] = html_entity_decode($args['format']); //shorcode doesn't accept html
				$args['orderby'] = !empty($args['orderby']) ? $args['orderby'] : get_option('dbem_categories_default_orderby');
				$args['order'] = !empty($args['order']) ? $args['order'] : get_option('dbem_categories_default_order');
				$args['pagination'] = isset($args['pagination']) ? $args['pagination'] : !isset($args['limit']);
				$args['limit'] = 1000;
				if( empty($args['format']) && empty($args['format_header']) && empty($args['format_footer']) ){
					ob_start();
					if( !empty($args['ajax']) ){ echo '<div class="em-search-ajax">'; } //open AJAX wrapper
					em_locate_template('templates/categories-list.php', true, array('args'=>$args));
					if( !empty($args['ajax']) ) echo "</div>"; //close AJAX wrapper
					$return = ob_get_clean();
				}else{
					$args['ajax'] = false;
					$args['page'] = ( !empty($args['pagination']) && !empty($args['page']) && is_numeric($args['page']) )? $args['page'] : 1;
					$args['page'] = ( !empty($args['pagination']) && !empty($_GET['pno']) && is_numeric($_GET['pno']) )? $_GET['pno'] : $args['page'];
					$return = EM_Categories::output($args);
				}
				print_r($return);
			?>
		</ul>
		<?php endif; ?>

		<?php } ?>




	</div>
</div>
