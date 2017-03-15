<?php 

function unicorn_infinum_customize_register( $wp_customize )
{
	$wp_customize->add_section(
		'unicorn_infinum_advanced_options',
			array(
				'title'     => 'Advanced Options',
				'priority'  => 201
		)
	);

	$wp_customize->add_section(
		'unicorn_infinum_footer_options',
			array(
				'title'     => 'Footer Options',
				'priority'  => 202
		)
	);

	$wp_customize->add_setting(
		'unicorn_infinum_footer_naslov',
		array(
			'default'      			=> 'Javi se za više informacija',
			'sanitize_callback'  	=> 'unicorn_infinum_sanitize_footer',
			'transport'    			=> 'postMessage'
		)
	);

	$wp_customize->add_control(
		'unicorn_infinum_footer_naslov',
		array(
			'section'  => 'unicorn_infinum_footer_options',
			'label'    => 'Footer naslov',
			'type'     => 'text'
		)
	);

	$wp_customize->add_setting(
		'unicorn_infinum_footer_text',
		array(
			'default'      			=> 'Lorem ipsum dolor sit amet, consectetur adipisici elit, 
										sed eiusmod tempor incidunt ut labore et dolore magna aliqua. 
										Ut enim ad minim veniam, quis nostrud',
			'sanitize_callback'  	=> 'unicorn_infinum_sanitize_footer',
			'transport'    			=> 'postMessage'
		)
	);

	$wp_customize->add_control(
		'unicorn_infinum_footer_text',
		array(
			'section'  => 'unicorn_infinum_footer_options',
			'label'    => 'Footer text',
			'type'     => 'textarea'
		)
	);


	$wp_customize->add_setting(
		'unicorn_infinum_footer_instagram_url',
		array(
			'default'      			=> 'https://www.instagram.com/',
			'sanitize_callback'  	=> 'unicorn_infinum_sanitize_footer',
			'transport'    			=> 'postMessage'
		)
	);

	$wp_customize->add_control(
		'unicorn_infinum_footer_instagram_url',
		array(
			'section'  => 'unicorn_infinum_footer_options',
			'label'    => 'Instagram link',
			'type'     => 'text'
		)
	);

	$wp_customize->add_setting(
		'unicorn_infinum_footer_twitter_url',
		array(
			'default'      			=> 'https://www.twitter.com/',
			'sanitize_callback'  	=> 'unicorn_infinum_sanitize_footer',
			'transport'    			=> 'postMessage'
		)
	);

	$wp_customize->add_control(
		'unicorn_infinum_footer_twitter_url',
		array(
			'section'  => 'unicorn_infinum_footer_options',
			'label'    => 'Twitter link',
			'type'     => 'text'
		)
	);

	$wp_customize->add_setting(
		'unicorn_infinum_footer_facebook_url',
		array(
			'default'      			=> 'https://www.facebook.com/',
			'sanitize_callback'  	=> 'unicorn_infinum_sanitize_footer',
			'transport'    			=> 'postMessage'
		)
	);

	$wp_customize->add_control(
		'unicorn_infinum_footer_facebook_url',
		array(
			'section'  => 'unicorn_infinum_footer_options',
			'label'    => 'Facebook link',
			'type'     => 'text'
		)
	);

	$wp_customize->add_setting(
		'unicorn_infinum_background_image',
		array(
			'default'      => '',
			'transport'    => 'postMessage'
		)
	);

	$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
			'unicorn_infinum_background_image',
			array(
			'label'    => 'Background Image',
			'settings' => 'unicorn_infinum_background_image',
			'section'  => 'unicorn_infinum_advanced_options'
		)
	)
	);

    $wp_customize->add_setting(
        'unicorn_infinum_link_color',
        array(
            'default'     => '#23547f',
            'transport'    => 'postMessage'
        )
    );
 
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'link_color',
            array(
                'label'      => __( 'Link Color', 'boki' ),
                'section'    => 'unicorn_infinum_advanced_options',
                'settings'   => 'unicorn_infinum_link_color'
            )
        )
    );

	function unicorn_infinum_sanitize_footer( $input ) {
		return strip_tags( stripslashes( $input ) );
	}
}

add_action( 'customize_register', 'unicorn_infinum_customize_register' );


function unicorn_infinum_customizer_live_preview() {
	wp_enqueue_script(
		'evp-theme-customizer',
		get_stylesheet_directory_uri() . '/js/theme-customizer.js',
		array( 'customize-preview' ),
		'0.1.0',
		true
	);
} // end unicorn_infinum_customizer_live_preview
add_action( 'customize_preview_init', 'unicorn_infinum_customizer_live_preview' );


function unicorn_infinum_customizer_css() {

    $background_image = get_theme_mod( 'unicorn_infinum_background_image' );

    /**
     * Provera da li je uključen https
     * ako jest, zamenjujemo http u https u linko od background slike
     */

	if ( is_ssl() ) {
		$background_image = str_replace( "http", "https", $background_image );
	}

    ?>
	<style type="text/css">
        a { color: <?php echo get_theme_mod( 'unicorn_infinum_link_color' ); ?>; }
		.custom-background { background: url( <?php echo $background_image; ?> );
		background-size: cover;
		background-repeat: no-repeat;
	}
    </style>
    <?php
}
add_action( 'wp_head', 'unicorn_infinum_customizer_css' );

?>