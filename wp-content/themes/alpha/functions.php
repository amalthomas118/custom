<?php

/**
 * Hook actions and filters file
 *
 * @category WordPress
 *
 */

// Hooks for  theme
require get_template_directory() . '/inc/theme-hooks.php';

// api function
require get_template_directory() . '/inc/api-function.php';

 $current_template = get_page_template_slug();
if ($current_template == 'template-wp-form.php'){
// podio forms
require get_template_directory() . '/inc/podio-forms.php';
}
?>

