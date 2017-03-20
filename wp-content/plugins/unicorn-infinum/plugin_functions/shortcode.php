<?php 


function quote( $atts, $content = null ) {
    extract(shortcode_atts(array(
        "float" => 'widget-text-left'
    ), $atts));
    if ( $float == "left" ) {
    	$float = "widget-text-left";
    } else {
    	$float = "widget-text-right";
    }
	return '<span class="'.$float.'">"'.$content.'"</span>';
}
add_shortcode("quote", "quote");

?>