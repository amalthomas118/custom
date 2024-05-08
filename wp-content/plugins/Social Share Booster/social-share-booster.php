<?php
/**
 * Plugin Name: Social Share Booster
 * Plugin URI: https://example.com/social-share-booster
 * Description: A plugin that enhances the social sharing capabilities of your WordPress site.
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://example.com
 * Text Domain: social-share-booster
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('SSB_PLUGIN_FILE', __FILE__);
define('SSB_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('SSB_PLUGIN_URL', plugin_dir_url(__FILE__));
define('SSB_PLUGIN_VERSION', '1.0.0');

// Include plugin files
require_once SSB_PLUGIN_DIR . 'includes/share-buttons.php';
require_once SSB_PLUGIN_DIR . 'includes/click-to-share.php';
require_once SSB_PLUGIN_DIR . 'includes/floating-icon.php';

// Activation and deactivation hooks
register_activation_hook(__FILE__, 'ssb_activate_plugin');
register_deactivation_hook(__FILE__, 'ssb_deactivate_plugin');

/**
 * Plugin activation function
 */
function ssb_activate_plugin() {
    // Activation code goes here
}

/**
 * Plugin deactivation function
 */
function ssb_deactivate_plugin() {
    // Deactivation code goes here
}

// Add plugin settings page
add_action('admin_menu', 'ssb_add_settings_page');
function ssb_add_settings_page() {
    add_options_page(
        'Social Share Booster Settings',
        'Social Share Booster',
        'manage_options',
        'social-share-booster',
        'ssb_render_settings_page'
    );
}

/**
 * Render plugin settings page
 */
function ssb_render_settings_page() {
    require_once SSB_PLUGIN_DIR . 'admin/settings.php';
}

// Enqueue scripts and styles
add_action('wp_enqueue_scripts', 'ssb_enqueue_scripts');
function ssb_enqueue_scripts() {
    wp_enqueue_style('ssb-style', SSB_PLUGIN_URL . 'assets/css/style.css', array(), SSB_PLUGIN_VERSION);
    wp_enqueue_script('ssb-script', SSB_PLUGIN_URL . 'assets/js/script.js', array('jquery'), SSB_PLUGIN_VERSION, true);
}