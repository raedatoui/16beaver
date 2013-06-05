<?php global $is_home; global $blog; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php
		$title = bloginfo( 'name' );
		if($is_home)
			$title.= "  —  Platform Page";
		else $title .= wp_title(' -- ',true,'left');
		echo $title;
	?></title>
	<link rel="stylesheet" href="<?=bloginfo('url')?>/wp-content/themes/homepage/css/bp5.css">
	<link rel="stylesheet" href="<?=bloginfo('url')?>/wp-content/themes/homepage/css/grid.css" type="text/css" media="screen">
	<link rel="stylesheet" href="<?=bloginfo('url')?>/wp-content/themes/homepage/css/style.css" />
	<link rel="stylesheet" href="<?=bloginfo('url')?>/wp-content/themes/homepage/css/colors/<?
		if($is_home)
			echo "green.css";
		elseif (isset($blog))
			echo "blog.css";
		else {
			$meta = get_post_meta(get_the_ID(), "background-color");
			echo $meta[0].".css";
		}

	?>" />
	<script src="<?=bloginfo('url')?>/wp-content/themes/homepage/js/libs/modernizr-2.0.6.min.js"></script>
	<script defer src="<?=bloginfo('url')?>/wp-content/themes/homepage/js/libs/jquery-1.6.2.min.js"></script>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php

		remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
		remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
		remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
		remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
		remove_action( 'wp_head', 'index_rel_link' ); // index link
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
		remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
		remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version


		//wp_deregister_script('jquery');


		wp_head(); ?>

</head>

<body>
	<div class="container_4">
	<header id="header">
		<?php get_search_form(); ?>

		<div id="bottom_strip">
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</div>
		<div id="title"><a href="<?=network_home_url()?>"><img src="<?=bloginfo('url')?>/wp-content/themes/homepage/images/16beaver_logo.png"></img></a></div>
	</header>