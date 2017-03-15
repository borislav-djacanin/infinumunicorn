<?php 
add_action( 'widgets_init', 'unicorn_infinum_boki_dj_widgets_init' );

function unicorn_infinum_boki_dj_widgets_init() {
	register_sidebar( array (
		'id' => 'primary-widget-area',
		'name' => __( 'Primary Widget', 'unicorn_infinum' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array (
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'unicorn_infinum' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array (
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'unicorn_infinum' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array (
		'id' => 'sidebar3',
		'name' => __( 'Sidebar 3', 'unicorn_infinum' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
?>