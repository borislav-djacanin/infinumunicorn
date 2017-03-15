<?php 
add_action( 'admin_menu' , 'unicorn_infinum_boki_dj_remove_meta_boxes_from_page_admin' );
 
/**
 * Remove meta box
 */
function unicorn_infinum_boki_dj_remove_meta_boxes_from_page_admin() {
	remove_meta_box( 'postcustom' , 'page' , 'normal' ); 
	remove_meta_box( 'authordiv','page','normal' ); // Author Metabox
	remove_meta_box( 'commentstatusdiv','page','normal' ); // Comments Status Metabox
	remove_meta_box( 'commentsdiv','page','normal' ); // Comments Metabox
	remove_meta_box( 'postcustom','page','normal' ); // Custom Fields Metabox
	remove_meta_box( 'postexcerpt','page','normal' ); // Excerpt Metabox
	remove_meta_box( 'revisionsdiv','page','normal' ); // Revisions Metabox
	remove_meta_box( 'slugdiv','page','normal' ); // Slug Metabox
	remove_meta_box( 'trackbacksdiv','page','normal' ); // Trackback Metabox
}

function unicorn_infinum_boki_remove_editor_from_admin_pages() {
	remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'unicorn_infinum_boki_remove_editor_from_admin_pages');


function unicorn_infinum_boki_dj_add_meta_boxes_page() {
	global $post;
	if(!empty($post)) {
		$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
		
		if( $pageTemplate == 'template-home.php' ) {
			//remove_meta_box( 'slugdiv', 'page', 'normal' );
			add_meta_box('my_meta_2', 'My Custom Meta Box 2', 'my_meta_setup_2', 'page', 'normal', 'high');

		}
	}
}
add_action( 'admin_init', 'unicorn_infinum_boki_dj_add_meta_boxes_page' );
?>