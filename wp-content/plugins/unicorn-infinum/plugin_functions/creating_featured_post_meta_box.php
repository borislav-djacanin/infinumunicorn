<?php

function unicorn_infinum_custom_meta() {
	add_meta_box( 'unicorn_infinum_meta', __( 'Featured Posts', 'unicorn_infinum' ), 'unicorn_infinum_meta_callback', 'news' );
}
function unicorn_infinum_meta_callback( $post ) {
	$featured = get_post_meta( $post->ID );
	?>
	<p>
	<div class="sm-row-content">
		<label for="featured-post">
			<input type="checkbox" name="featured-post" id="featured-post" value="yes" <?php if ( isset ( $featured['featured-post'] ) ) checked( $featured['featured-post'][0], 'yes' ); ?> />
			<?php _e( 'Featured this post', 'unicorn_infinum' )?>
		</label>
		
	</div>
	</p> 
	<?php
}
add_action( 'add_meta_boxes', 'unicorn_infinum_custom_meta' );

/**
 * Saves the custom meta input
 */
function unicorn_infinum_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
 // Checks for input and saves
if( isset( $_POST[ 'featured-post' ] ) ) {
    update_post_meta( $post_id, 'featured-post', 'yes' );
} else {
    update_post_meta( $post_id, 'featured-post', 'no' );
}
 
}
add_action( 'save_post', 'unicorn_infinum_meta_save' );
?>