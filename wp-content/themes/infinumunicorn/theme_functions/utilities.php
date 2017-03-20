<?php 
/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function unicorn_infinum_boki_dj_head_cleanup() {
	// category feeds
	// remove_action( 'wp_head', 'feed_links_extra', 3 );
	// post and comment feeds
	// remove_action( 'wp_head', 'feed_links', 2 );
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	// remove WP version from css
	add_filter( 'style_loader_src', 'unicorn_infinum_boki_dj_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	add_filter( 'script_loader_src', 'unicorn_infinum_boki_dj_remove_wp_ver_css_js', 9999 );

} /* end boki_ head cleanup */

add_action( 'init', 'unicorn_infinum_boki_dj_head_cleanup' );

// remove WP version from RSS
function unicorn_infinum_boki_dj_rss_version() { return ''; }

// remove WP version from scripts
function unicorn_infinum_boki_dj_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

add_filter( 'the_generator', 'unicorn_infinum_boki_dj_rss_version' );


// Replace the default ellipsis

function unicorn_infinum_boki_dj_custom_excerpt_more( $excerpt ) {
	return str_replace( '[&hellip;]', '... ', $excerpt );
}
//add_filter( 'wp_trim_excerpt', 'unicorn_infinum_boki_dj_custom_excerpt_more' );


/* Modify the read more link on the_excerpt() */
 
function unicorn_infinum_boki_dj_excerpt_length($length) {
    return 80;
}
add_filter('excerpt_length', 'unicorn_infinum_boki_dj_excerpt_length');
 
/* Add a link  to the end of our excerpt contained in a div for styling purposes and to break to a new line on the page.*/
 
function unicorn_infinum_boki_dj_excerpt_more($excerpt) {
    global $post;
    return '<span class="view-full-post"><a href="'. get_permalink($post->ID) . '" class="view-full-post-btn">  Read more</a></span>';
}
add_filter('excerpt_more', 'unicorn_infinum_boki_dj_excerpt_more');


?>