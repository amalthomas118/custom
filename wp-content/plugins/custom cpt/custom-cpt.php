<?php
/*
Plugin Name: Custom Post Type Manager
Description: This plugin allows users to easily create and manage custom post types.
Version: 1.0
Author: Your Name
*/

// Add menu item in the admin panel
function custom_post_type_manager_menu() {
    add_menu_page(
        'Custom Post Types',
        'Custom Post Types',
        'manage_options',
        'custom-post-type-manager',
        'custom_post_type_manager_page',
        'dashicons-admin-generic',
        30
    );
}
add_action('admin_menu', 'custom_post_type_manager_menu');

// Render the custom post type manager page
function custom_post_type_manager_page() {
    ?>
    <div class="wrap">
        <h2>Custom Post Type Manager</h2>
        <form method="post" action="">
            <label for="post_type_name">Post Type Name:</label>
            <input type="text" id="post_type_name" name="post_type_name" required><br><br>

            <label for="post_type_singular">Singular Name:</label>
            <input type="text" id="post_type_singular" name="post_type_singular" required><br><br>

            <label for="post_type_plural">Plural Name:</label>
            <input type="text" id="post_type_plural" name="post_type_plural" required><br><br>

            <input type="submit" name="create_post_type" value="Create Post Type" class="button button-primary">
        </form>
    </div>
    <?php
}

// Create custom post type when the form is submitted
function custom_post_type_manager_create_post_type() {
    if (isset($_POST['create_post_type'])) {
        $post_type_name = sanitize_text_field($_POST['post_type_name']);
        $post_type_singular = sanitize_text_field($_POST['post_type_singular']);
        $post_type_plural = sanitize_text_field($_POST['post_type_plural']);

        $labels = array(
            'name'               => $post_type_plural,
            'singular_name'      => $post_type_singular,
            'menu_name'          => $post_type_plural,
            'name_admin_bar'     => $post_type_singular,
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New ' . $post_type_singular,
            'new_item'           => 'New ' . $post_type_singular,
            'edit_item'          => 'Edit ' . $post_type_singular,
            'view_item'          => 'View ' . $post_type_singular,
            'all_items'          => 'All ' . $post_type_plural,
            'search_items'       => 'Search ' . $post_type_plural,
            'parent_item_colon'  => 'Parent ' . $post_type_plural . ':',
            'not_found'          => 'No ' . $post_type_plural . ' found.',
            'not_found_in_trash' => 'No ' . $post_type_plural . ' found in Trash.'
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => $post_type_name),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array('title', 'editor', 'comments')
        );

        register_post_type($post_type_name, $args);

        echo '<div class="updated"><p>Custom post type ' . $post_type_singular . ' created successfully.</p></div>';
    }
}
add_action('admin_init', 'custom_post_type_manager_create_post_type');
