<?php
/**
 * Functions for rendering the floating share icon
 */

/**
 * Render the floating share icon
 */
function ssb_render_floating_share_icon() {
    ?>
    <div class="ssb-floating-share-icon">
        <span class="ssb-share-icon">Share</span>
    </div>
    <?php
}

/**
 * Render the share panel
 *
 * @param string $url    The URL to share
 * @param string $title  The title of the content to share
 */
function ssb_render_share_panel($url, $title) {
    ?>
    <div class="ssb-share-panel">
        <div class="ssb-share-panel-content">
            <?php ssb_render_share_buttons($url, $title); ?>
            <?php ssb_render_click_to_share_links($url, $title); ?>
        </div>
    </div>
    <?php
}