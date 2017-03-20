<?php 
	set_post_thumbnail_size( 125, 125, true );
	/************* THUMBNAIL SIZE OPTIONS *************/

	// Thumbnail sizes
	add_image_size( 'unicorn_infinum-thumb-600', 600, '', true );
	add_image_size( 'unicorn_infinum-thumb-300', 300, 100, true );
	add_image_size( 'unicorn_infinum-thumb-400', 400, '', true ); // Large Thumbnail
	add_image_size( 'unicorn_infinum-large', 700, '', true ); // Large Thumbnail	
	add_image_size( 'unicorn_infinum-medium', 250, '', true ); // Medium Thumbnail
	add_image_size( 'unicorn_infinum-small', 120, '', true ); // Small Thumbnail
	add_image_size( 'unicorn_infinum-custom-size', 700, 200, true ); // Custom Thumbnail Size call using 
	add_image_size( 'unicorn_infinum-logo', 50, 50, true );
	/*
	to add more sizes, simply copy a line from above
	and change the dimensions & name. As long as you
	upload a "featured image" as large as the biggest
	set width or height, all the other sizes will be
	auto-cropped.

	To call a different size, simply change the text
	inside the thumbnail function.

	For example, to call the 300 x 100 sized image,
	we would use the function:
	<?php the_post_thumbnail( 'lider-thumb-300' ); ?>
	for the 600 x 150 image:
	<?php the_post_thumbnail( 'lider-thumb-600' ); ?>

	You can change the names and dimensions to whatever
	you like. Enjoy!
	*/

	add_filter( 'image_size_names_choose', 'unicorn_infinum_boki_dj__custom_image_sizes' );

	function unicorn_infinum_boki_dj__custom_image_sizes( $sizes ) {
		return array_merge( $sizes, array(
		    'unicorn_infinum-logo' 			=> __('Logo'),                              
			'unicorn_infinum-small' 		=> __('small image'),
			'unicorn_infinum-medium' 		=> __('medium image'),
			'unicorn_infinum-large' 		=> __('large image'),
			'unicorn_infinum-thumb-600' 	=> __('600px'),
			'unicorn_infinum-thumb-300' 	=> __('300px by 100px'),
			'unicorn_infinum-thumb-400' 	=> __('400px'),
			'unicorn_infinum-custom-size' 	=> __('Custom size'),
	    ) );
	}

?>