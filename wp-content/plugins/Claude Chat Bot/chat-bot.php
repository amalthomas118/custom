<?php
/*
Plugin Name: Claude Integration
Description: Integrate Claude into your WordPress site.
Version: 1.0
Author: Your Name
*/

// Enqueue script for frontend
function claude_enqueue_script() {
    wp_enqueue_script('claude-script', plugin_dir_url(__FILE__) . 'claude-script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'claude_enqueue_script');

// Shortcode for embedding Claude interface
function claude_shortcode() {
    ob_start();
    ?>
    <div id="claude-chat-container">
        <div id="claude-chat-messages"></div>
        <input type="text" id="claude-input" placeholder="Ask me anything...">
        <button id="claude-send">Send</button>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('claude', 'claude_shortcode');

// AJAX handler for sending user message to Claude
function claude_send_message() {
    $message = $_POST['message'];
    $response = claude_process_message($message); // Call function to send message to Claude API
    echo json_encode($response);
    wp_die();
}
add_action('wp_ajax_claude_send_message', 'claude_send_message');
add_action('wp_ajax_nopriv_claude_send_message', 'claude_send_message');

// Function to send message to Claude API and get response
function claude_process_message($message) {
    // Replace 'YOUR_CLAUDE_API_ENDPOINT' with the actual Claude API endpoint
    $api_endpoint = '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';
    $response = wp_remote_post($api_endpoint, array(
        'body' => json_encode(array('message' => $message)),
        'headers' => array('Content-Type' => 'application/json'),
    ));

    if (is_wp_error($response)) {
        return array('error' => 'Failed to communicate with Claude API.');
    } else {
        $body = wp_remote_retrieve_body($response);
        return json_decode($body, true);
    }
}
