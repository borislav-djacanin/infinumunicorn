<?php 
add_action( 'comment_form_before', 'unicorn_infinum_boki_dj_enqueue_comment_reply_script' );
function unicorn_infinum_boki_dj_enqueue_comment_reply_script() {
	if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
function unicorn_infinum_boki_dj_comments_number( $count ) {
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}
?>