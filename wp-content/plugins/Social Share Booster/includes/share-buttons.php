<?php
/**
 * Functions for generating and rendering social share buttons
 */

/**
 * Generate Facebook share link
 *
 * @param string $url    The URL to share
 * @param string $title  The title of the content to share
 *
 * @return string        The Facebook share link
 */
function ssb_get_facebook_share_link($url, $title) {
    $share_link = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url) . '&quote=' . urlencode($title);
    return $share_link;
}

/**
 * Generate Instagram share link
 *
 * @param string $url    The URL to share
 * @param string $title  The title of the content to share
 *
 * @return string        The Instagram share link
 */
function ssb_get_instagram_share_link($url, $title) {
    $share_link = 'https://www.instagram.com/share?url=' . urlencode($url) . '&title=' . urlencode($title);
    return $share_link;
}

/**
 * Generate LinkedIn share link
 *
 * @param string $url    The URL to share
 * @param string $title  The title of the content to share
 *
 * @return string        The LinkedIn share link
 */
function ssb_get_linkedin_share_link($url, $title) {
    $share_link = 'https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode($url) . '&title=' . urlencode($title);
    return $share_link;
}

/**
 * Render share buttons
 *
 * @param string $url    The URL to share
 * @param string $title  The title of the content to share
 */
function ssb_render_share_buttons($url, $title) {
    $facebook_link = ssb_get_facebook_share_link($url, $title);
    $instagram_link = ssb_get_instagram_share_link($url, $title);
    $linkedin_link = ssb_get_linkedin_share_link($url, $title);

    // Output the share buttons HTML
    echo '<div class="ssb-share-buttons">';
    echo '<a href="' . $facebook_link . '" target="_blank" class="ssb-share-button ssb-facebook">Facebook</a>';
    echo '<a href="' . $instagram_link . '" target="_blank" class="ssb-share-button ssb-instagram">Instagram</a>';
    echo '<a href="' . $linkedin_link . '" target="_blank" class="ssb-share-button ssb-linkedin">LinkedIn</a>';
    echo '</div>';
}