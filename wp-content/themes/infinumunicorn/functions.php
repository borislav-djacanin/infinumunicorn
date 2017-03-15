<?php 

require get_template_directory() . '/theme_functions/theme_setup.php';

require get_template_directory() . '/theme_functions/images_setup.php';

require get_template_directory() . '/theme_functions/enqueue_scripts.php';

require get_template_directory() . '/theme_functions/title_functions.php';

require get_template_directory() . '/theme_functions/widget_functions.php';

require get_template_directory() . '/theme_functions/comments_functions.php';

require get_template_directory() . '/theme_functions/pings_functions.php';

require get_template_directory() . '/theme_functions/customizer_functions.php';

require get_template_directory() . '/theme_functions/template_tags.php';

require get_template_directory() . '/theme_functions/pagination.php';

require get_template_directory() . '/theme_functions/meta_boxes.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/theme_functions/wp_bootstrap_navwalker.php';

/**
 * Load a utilities library.
 */
require get_template_directory() . '/theme_functions/utilities.php';



?>