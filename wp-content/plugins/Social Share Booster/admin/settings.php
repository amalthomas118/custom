<?php
/**
 * Social Share Booster Settings Page
 */

// Register settings and sections
add_action('admin_init', 'ssb_register_settings');
function ssb_register_settings() {
    register_setting('ssb_settings_group', 'ssb_settings', 'ssb_sanitize_settings');

    add_settings_section(
        'ssb_general_section',
        'General Settings',
        'ssb_general_section_callback',
        'ssb-settings-page'
    );

    add_settings_field(
        'ssb_enabled_platforms',
        'Enabled Platforms',
        'ssb_enabled_platforms_callback',
        'ssb-settings-page',
        'ssb_general_section'
    );

    add_settings_field(
        'ssb_button_styles',
        'Button Styles',
        'ssb_button_styles_callback',
        'ssb-settings-page',
        'ssb_general_section'
    );
}

// Sanitize settings
function ssb_sanitize_settings($settings) {
    $sanitized_settings = array();

    if (isset($settings['enabled_platforms']) && is_array($settings['enabled_platforms'])) {
        $sanitized_settings['enabled_platforms'] = array_map('sanitize_text_field', $settings['enabled_platforms']);
    }

    if (isset($settings['button_styles'])) {
        $sanitized_settings['button_styles'] = sanitize_textarea_field($settings['button_styles']);
    }

    return $sanitized_settings;
}

// General section callback
function ssb_general_section_callback() {
    echo '<p>Configure the general settings for the Social Share Booster plugin.</p>';
}

// Enabled platforms callback
function ssb_enabled_platforms_callback() {
    $settings = get_option('ssb_settings');
    $enabled_platforms = isset($settings['enabled_platforms']) ? $settings['enabled_platforms'] : array();
    ?>
    <fieldset>
        <legend class="screen-reader-text"><span>Enabled Platforms</span></legend>
        <label>
            <input type="checkbox" name="ssb_settings[enabled_platforms][]" value="facebook" <?php checked(in_array('facebook', $enabled_platforms)); ?> />
            Facebook
        </label>
        <br>
        <label>
            <input type="checkbox" name="ssb_settings[enabled_platforms][]" value="instagram" <?php checked(in_array('instagram', $enabled_platforms)); ?> />
            Instagram
        </label>
        <br>
        <label>
            <input type="checkbox" name="ssb_settings[enabled_platforms][]" value="linkedin" <?php checked(in_array('linkedin', $enabled_platforms)); ?> />
            LinkedIn
        </label>
    </fieldset>
    <?php
}

// Button styles callback
function ssb_button_styles_callback() {
    $settings = get_option('ssb_settings');
    $button_styles = isset($settings['button_styles']) ? $settings['button_styles'] : '';
    ?>
    <textarea name="ssb_settings[button_styles]" rows="5" cols="50"><?php echo esc_textarea($button_styles); ?></textarea>
    <p class="description">Enter custom CSS styles for the share buttons.</p>
    <?php
}



// Render the settings page
function ssb_render_settings_pagee() {
    ?>
    <div class="wrap">
        <h1>Social Share Booster Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('ssb_settings_group');
            do_settings_sections('ssb-settings-page');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}