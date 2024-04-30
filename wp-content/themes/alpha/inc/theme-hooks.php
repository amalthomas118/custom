<?php 

function enqueue_custom_css() {
    $current_template = get_page_template_slug();
    // Get the directory URI of the assets folder
    $assets_uri = get_template_directory_uri() . '/assets';

    // Enqueue your custom CSS file
    wp_enqueue_style('custom-style', $assets_uri . '/css/custom_style.css');

    if($current_template == 'template-wp-form.php'){
         // Get the directory URI of the assets folder
    $assets_uri = get_template_directory_uri() . '/assets';

    // Enqueue your custom CSS file
    wp_enqueue_style('form-style', $assets_uri . '/css/form.css');

    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_css');

// Enqueue custom JavaScript
function enqueue_custom_js() {
    // Get the directory URI of the assets folder
    $assets_uri = get_template_directory_uri() . '/assets/js';

    // Enqueue your custom JavaScript file
    wp_enqueue_script('script', $assets_uri . '/script.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'enqueue_custom_js');

?>