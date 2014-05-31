<?php
  global $is_home;
  global $blog;
  global $color_class;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>
    <?php
      $title = bloginfo( 'name' );
      if($is_home)
        $title .= "  —  Platform Page";
      else
        $title .= wp_title(' -- ',true,'left');
      echo $title;
    ?>
  </title>

  <link rel="stylesheet" href="<?php echo bloginfo('url')?>/wp-content/themes/homepage/assets/css/styles.min.css">

  <?php
    if($is_home)
      $color_class = "green";
    elseif (isset($blog))
      $color_class = "blog";
    else {
      $meta = get_post_meta(get_the_ID(), "background-color");
      if(count($meta) > 0 && $meta[0] != '')
        $color_class =  $meta[0];
      else
        $color_class = "light-gray";
    }

  ?>

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

    wp_deregister_script('jquery');
    wp_head(); ?>

</head>

<body class="<?php echo $color_class ?>">
  <div class="container">
    <header id="header">
      <div class="header-top">
        <div class="logo-container"><a href="<?php echo network_home_url()?>"><div class="logo"></div></a></div>
      </div>

      <div class="header-bottom">
        <?php get_search_form(); ?>
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
      </div>
    </header>
