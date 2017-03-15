<?php 

function unicorn_infinum_boki_dj_fonts() {
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css');
	wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Oregano|Roboto' );
}
add_action( 'wp_enqueue_scripts', 'unicorn_infinum_boki_dj_fonts' );


function unicorn_infinum_boki_dj_enqueue_my_css() {
	$my_css = get_template_directory_uri(). '/css/style.css';
	wp_enqueue_style( 'my_css', $my_css );
}
add_action( 'wp_enqueue_scripts', 'unicorn_infinum_boki_dj_enqueue_my_css' );





function boki_dj_load_jquery_from_cdn() {
	if (!is_admin()) {

		$script = get_template_directory_uri() . '/js/modernizr.min.js';
		wp_register_script(
			'modernizr',
			$script,
			false,
			'2.8.3'
		);		
 		$script = get_template_directory_uri() . '/js/main.js';
		wp_register_script(
			'moja_aplikacija',
			$script,
			'jquery',
			''
		);	

		$script = get_template_directory_uri() . '/js/bootstrap.min.js';
		wp_register_script(
			'bootstrap_js',
			$script,
			false,
			'3.3.7'
		);

		$script = get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js';
		wp_register_script(
			'IE10_viewport_hack_js',
			$script,
			false,
			''
		);

		wp_enqueue_script( 'modernizr', '', '', '', false ); // Load modernizr in header of page
		wp_enqueue_script( 'bootstrap_js', '', '', '', true ); // Load bootstrap_js in footer of page
		wp_enqueue_script( 'IE10_viewport_hack_js', '', '', '', true ); // Load IE10_viewport_hack_js in footer of page
		wp_enqueue_script( 'moja_aplikacija', '', '', '', true ); // Load moja_aplikacija in footer of page
	}
}

add_action( 'init', 'boki_dj_load_jquery_from_cdn' );


/**
 * IE Fallbacks
 */

function load_IE_fallback() {
    wp_register_script(
    	'ie_html5shiv',
    	'https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js',
    	false,
    	'3.7.3'
    );
    
    wp_enqueue_script( 'ie_html5shiv');
    wp_script_add_data( 'ie_html5shiv', 'conditional', 'lt IE 9' );

    wp_register_script(
    	'ie_respond',
    	'https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js',
    	false,
    	'1.4.2'
    );
    wp_enqueue_script( 'ie_respond');
    wp_script_add_data( 'ie_respond', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'load_IE_fallback' ); 

?>