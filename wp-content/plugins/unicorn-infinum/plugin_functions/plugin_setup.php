<?php 
add_action( 'init', 'unicorn_infinum_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function unicorn_infinum_load_textdomain() {
	load_plugin_textdomain( 'unicorn_infinum', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}

//Page Slug Body Class
function unicorn_infinum_add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type;
	}
	return $classes;
}
add_filter( 'body_class', 'unicorn_infinum_add_slug_body_class' );

?>