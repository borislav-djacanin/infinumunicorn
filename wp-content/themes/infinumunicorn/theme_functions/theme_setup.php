<?php 
add_action( 'after_setup_theme', 'unicorn_infinum_boki_dj_setup' );

function unicorn_infinum_boki_dj_setup() {

	load_theme_textdomain( 'unicorn_infinum', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'menus' );
/*	
	add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);
*/
	add_theme_support( 'custom-background',
	    array(
	    'default-image' => '',    // background image default
	    'default-color' => '',    // background color default (dont add the #)
	    'wp-head-callback' => '_custom_background_cb',
	    'admin-head-callback' => '',
	    'admin-preview-callback' => ''
	    )
	);
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );

	register_nav_menus(
		array(
			'main-menu' => __( 'The Main Menu', 'unicorn_infinum' ),   // main nav in header
			'footer-links' => __( 'Footer Links', 'unicorn_infinum' ) // secondary nav in footer
		)
	);

}

function unicorn_infinum_disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'unicorn_infinum_disable_wp_emojicons' );

?>