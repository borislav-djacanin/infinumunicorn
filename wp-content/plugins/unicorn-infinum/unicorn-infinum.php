<?php
/*
Plugin Name: Unicorn Infinum News
Plugin URI: http://djacanin.com
Description: Unicorn Infinum Plugin
Version: 1.0
Author: Borislav Djacanin
Author URI: http://djacanin.com
License: GPLv2
*/

$plugin_path = plugin_dir_path( __FILE__ );
$plugin_url  = plugin_dir_url( __FILE__ );

define( "UNICORN_INFINUM_PLUGIN_PATH", $plugin_path );
define( "UNICORN_INFINUM_PLUGIN_URL", $plugin_url);

require UNICORN_INFINUM_PLUGIN_PATH . 'plugin_functions/plugin_setup.php';

require UNICORN_INFINUM_PLUGIN_PATH . 'plugin_functions/news_post_type_setup.php';

require UNICORN_INFINUM_PLUGIN_PATH . 'plugin_functions/creating_featured_post_meta_box.php';

require UNICORN_INFINUM_PLUGIN_PATH . 'plugin_functions/pagination.php';

require UNICORN_INFINUM_PLUGIN_PATH . 'plugin_functions/load-more.php';

require UNICORN_INFINUM_PLUGIN_PATH . 'plugin_functions/shortcode.php';

function unicorn_infinum_include_template_function( $template_path ) {
    if ( get_post_type() == 'news' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-news.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = UNICORN_INFINUM_PLUGIN_PATH . 'template_files/single-news.php';
            }
        } elseif ( is_tax() and is_archive() ) {
            if ( $theme_file = locate_template( array ( 'taxonomy-unicorn_category.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = UNICORN_INFINUM_PLUGIN_PATH . 'template_files/taxonomy-unicorn_category.php';
            }
        } elseif ( is_archive() ) {
            if ( $theme_file = locate_template( array ( 'archive-news.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = UNICORN_INFINUM_PLUGIN_PATH . 'template_files/archive-news.php';
            }
        }

    }
    return $template_path;
}
add_filter( 'template_include', 'unicorn_infinum_include_template_function', 1 );

?>
