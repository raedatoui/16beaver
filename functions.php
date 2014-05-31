<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

require(TEMPLATEPATH . "/includes/latest_posts.php");

function custom_excerpt_length( $length ) {
	return 40;
}



define('THEME_JS', THEME . '/js/', true);

register_nav_menus( array(
	'primary' => 'Primary Navigation'
) );


if ( function_exists('register_sidebar') )
    register_sidebar();


function theme_load_js() {
    if (is_admin()) return;
    wp_enqueue_script('jquery');
    wp_enqueue_script('nav', THEME_JS .'jquery.dropdown.js', array('jquery'));

}


/*
function the_excerpt_max_charlength($charlength) {
   $excerpt = get_the_excerpt();
   $charlength++;
   if(strlen($excerpt)>$charlength) {
       $subex = substr($excerpt,0,$charlength-5);
       $exwords = explode(" ",$subex);
       $excut = -(strlen($exwords[count($exwords)-1]));
       if($excut<0) {
            echo substr($subex,0,$excut);
       } else {
       	    echo "<p>".$subex . "</p>";
       }
       echo "[...]";
   } else {
	   echo "<p>".$excerpt. "</p>";
   }
}
*/

function custom_trim_excerpt($length) {
	$explicit_excerpt = get_the_excerpt();
  if ( '' == $explicit_excerpt ) {
    $text = get_the_content('');
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]>', $text);
  }
  else {
    $text = apply_filters('the_content', $explicit_excerpt);
  }
$text = strip_shortcodes( $text ); // optional
$text = strip_tags($text);
$excerpt_length = $length;
$words = explode(' ', $text, $excerpt_length + 1);
  if (count($words)> $excerpt_length) {
    array_pop($words);
    array_push($words, '&hellip;');
    $text = implode(' ', $words);
    $text = apply_filters('the_excerpt',$text);
  }
return $text;
}


global $wpdb;

$sites = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM wp_blogs ORDER BY blog_id", array()));


 function wptheme_setup() {
  /**
   * Makes 16 Beaver Custom Theme available for translation.
   *
   * Translations can be added to the /lang directory.
   * If you're building a theme based on 16 Beaver Custom Theme, use a find and replace
   * to change 'wptheme' to the name of your theme in all template files.
   */
  load_theme_textdomain( 'wptheme', get_template_directory() . '/languages' );
 }
 add_action( 'after_setup_theme', 'wptheme_setup' );

 /**
  * Enqueue scripts and styles for front-end.
  *
  * @since 0.1.0
  */
 function wptheme_scripts_styles() {
  $postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

  wp_enqueue_script( 'wptheme', get_template_directory_uri() . "/assets/js/script{$postfix}.js", array(), WPTHEME_VERSION, true );

  wp_enqueue_style( 'wptheme', get_template_directory_uri() . "/assets/css/styles{$postfix}.css", array(), WPTHEME_VERSION );
 }
 // add_action( 'wp_enqueue_scripts', 'wptheme_scripts_styles' );

 /**
  * Add humans.txt to the <head> element.
  */
 function wptheme_header_meta() {
  $humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';

  echo apply_filters( 'wptheme_humans', $humans );
 }
 add_action( 'wp_head', 'wptheme_header_meta' );


?>
