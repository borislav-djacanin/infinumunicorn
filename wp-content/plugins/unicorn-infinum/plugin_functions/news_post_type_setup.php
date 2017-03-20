<?php 
add_action( 'init', 'unicorn_infinum_create_news_post_type' );

function unicorn_infinum_create_news_post_type() {

	$labels = array(
		'name' => __( 'News', 'unicorn_infinum' ),
		'singular_name' => __( 'News', 'unicorn_infinum' ),
		'add_new' => __( 'Add New News', 'unicorn_infinum' ),
		'add_new_item' => __( 'Add New News item', 'unicorn_infinum' ),
		'edit' => __( 'Edit', 'unicorn_infinum' ),
		'edit_item' => __( 'Edit News', 'unicorn_infinum' ),
		'new_item' => __( 'New News', 'unicorn_infinum' ),
		'view' => __( 'View', 'unicorn_infinum' ),
		'view_item' => __( 'View News', 'unicorn_infinum' ),
		'search_items' => __( 'Search News', 'unicorn_infinum' ),
		'not_found' => __( 'No News found', 'unicorn_infinum' ),
		'not_found_in_trash' => __( 'No News found in Trash', 'unicorn_infinum' ),
		'parent_item_colon' => __( 'Parent News', 'unicorn_infinum' ),
		'menu_name' => __( 'News', 'unicorn_infinum' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Unicorn Infinum News',
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies' => array( 'news' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-admin-site',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite'	=> array ( 'slug'  => _x( 'news' , 'URL slug', 'lista_places' ) ),
	);

	register_post_type( 'news', $args );
}

function unicorn_infinum_add_taxonomy ( $name, $post_type, $args = array() ) {
	$name   = strtolower($name);

	add_action( 'init', function() use( $name, $post_type, $args ) {
		//name of taxonomy, post type, options
		$upper = ucwords($name);

		$args = array_merge(
					array(
					// Hierarchical taxonomy (like categories)
					'hierarchical' => true,
					// This array of options controls the labels displayed in the WordPress Admin UI
					'labels' => array(
						'name' => _x( $upper, "taxonomy general name", 'unicorn_infinum' ),
						'singular_name' => _x( $name, "taxonomy singular name", 'unicorn_infinum' ),
						'search_items' =>  __( "Search $upper", 'unicorn_infinum' ),
						'all_items' => __( "All $upper", 'unicorn_infinum' ),
						'parent_item' => __( "Parent $name", 'unicorn_infinum' ),
						'parent_item_colon' => __( "Parent $name:", 'unicorn_infinum' ),
						'edit_item' => __( "Edit $name", 'unicorn_infinum' ),
						'update_item' => __( "Update $name", 'unicorn_infinum' ),
						'add_new' => __( "Add New $upper", 'unicorn_infinum' ),
						'add_new_item' => __( "Add New $upper", 'unicorn_infinum' ),
						'new_item_name' => __( "New $name Name", 'unicorn_infinum' ),
					),
					// Control the slugs used for this taxonomy
					'public'  => true,
					'show_tagcloud' => false,
					'show_admin_column' => true,
					'query_var' => true,
					'sort' => true,
					'exclude_from_search' => false,
					'show_tagcloud' => false,
					'rewrite' => array( 'slug' => _x( $name , 'URL slug', 'unicorn_infinum' ) ),
					),
					$args
				);

		register_taxonomy ( $name, $post_type, $args);
	});
}

$post_type_taxonomy_args = array(
							'labels' => array(
								   'name' => _x( "Categories", "taxonomy general name", 'unicorn_infinum' ),
								   'singular_name' => _x( "Category", "taxonomy singular name", 'unicorn_infinum'),     
							),
							'query_var' => 'unicorn_category',
							'hierarchical' => true,
							'rewrite' => false,
							);

$post_type_name = "news";
unicorn_infinum_add_taxonomy ( 'unicorn_category', $post_type_name, $post_type_taxonomy_args );


/**
 * Rewrite URL rule
 */
function unicorn_infinum_rewrite_url()
{
	add_rewrite_rule(
		'^news/category/([^/]*)$',
		'index.php?post_type=news&unicorn_category=$matches[1]',
		'top'
	);
	add_rewrite_rule(
		'news/category/([^/]+)/page/([0-9]+)?$',
		'index.php?post_type=news&unicorn_category=$matches[1]&paged=$matches[2]',
		'top');
	//flush_rewrite_rules();
}
add_action('init', 'unicorn_infinum_rewrite_url');
?>