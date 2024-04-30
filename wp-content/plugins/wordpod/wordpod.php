<?php
/*
Plugin Name: Wordpod
Plugin URI: https://example.com/podio-form-submission
Description: A plugin to submit form data to Podio as a new item
Version: 1.0
Author: Your Name
Author URI: https://example.com
*/

// Create a custom form for user input
function podio_form_submission_form() {
    ?>
    <div class="wrap">
        <h1>Podio Form Submission</h1>
        <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
            <input type="hidden" name="action" value="podio_form_submission">
            <table class="form-table">
                <tr>
                    <th><label for="title">Title</label></th>
                    <td><input type="text" id="title" name="title" required></td>
                </tr>
                <tr>
                    <th><label for="last_name">Last Name</label></th>
                    <td><input type="text" id="last_name" name="last_name" required></td>
                </tr>
                <tr>
                    <th><label for="email">Email</label></th>
                    <td><input type="email" id="email" name="email" required></td>
                </tr>
            </table>
            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Submit"></p>
        </form>
    </div>
    <?php
}

// Hook the form into the WordPress admin area
add_action('admin_menu', 'podio_form_submission_menu');
function podio_form_submission_menu() {
    add_menu_page('Podio Form Submission', 'Podio Form Submission', 'manage_options', 'podio-form-submission', 'podio_form_submission_form', 'dashicons-feedback', 30);
}

// Handle form submission and send data to Podio
add_action('admin_post_podio_form_submission', 'podio_form_submission_handler');
function podio_form_submission_handler() {
    $title = sanitize_text_field($_POST['title']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $email = sanitize_email($_POST['email']);

    $data = array(
        'fields' => array(
            // Replace the field IDs with the actual field IDs from your Podio app
            'title' => $title,
            'last-name' => $last_name,
            'email' => $email
        )
    );

    $args = array(
        'method' => 'POST',
        'headers' => array(
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . 'df8663e15f56b92cbb72bdf075ecf8f0'
        ),
        'body' => json_encode($data)
    );

    $response = wp_remote_post('https://api.podio.com/item/app/29450853/filter/', $args);

    if (is_wp_error($response)) {
      var_dump($response);
        $error_message = $response->get_error_message();
        echo "Error: $error_message";
    } else {
        $response_code = wp_remote_retrieve_response_code($response);
        if ($response_code == 201) {
            echo "Form data submitted to Podio successfully!";
        } elseif ($response_code == 301){
          echo "Not gooddddd";
        } else {
            echo "Error: Unable to submit form data to Podio.";
        }
    }

    // Redirect back to the form page
    wp_redirect(admin_url('admin.php?page=podio-form-submission'));
    exit;
}