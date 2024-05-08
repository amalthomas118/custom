<?php
/**
 * Functions for handling the "Click to Share" feature
 */

/**
 * Generate "Click to Share" link
 *
 * @param string $platform  The social media platform (facebook, instagram, linkedin)
 * @param string $url       The URL to share
 * @param string $text      The text to share
 *
 * @return string           The "Click to Share" link
 */
function ssb_get_click_to_share_link($platform, $url, $text) {
    switch ($platform) {
        case 'facebook':
            $share_link = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url) . '&quote=' . urlencode($text);
            break;
        case 'instagram':
            $share_link = 'https://www.instagram.com/share?url=' . urlencode($url) . '&title=' . urlencode($text);
            break;
        case 'linkedin':
            $share_link = 'https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode($url) . '&title=' . urlencode($text);
            break;
        default:
            $share_link = '';
    }

    return $share_link;
}

/**
 * Render "Click to Share" links
 *
 * @param string $url       The URL to share
 * @param string $title     The title of the content to share
 */
function ssb_render_click_to_share_links($url, $title) {
    ?>
    <div class="ssb-click-to-share-links">
        <?php ssb_render_click_to_share_link('facebook', $url, $title); ?>
        <?php ssb_render_click_to_share_link('instagram', $url, $title); ?>
        <?php ssb_render_click_to_share_link('linkedin', $url, $title); ?>
    </div>
    <?php
}

/**
 * Render "Click to Share" link
 *
 * @param string $platform  The social media platform (facebook, instagram, linkedin)
 * @param string $url       The URL to share
 * @param string $text      The text to share
 */
function ssb_render_click_to_share_link($platform, $url, $text) {
    $share_link = ssb_get_click_to_share_link($platform, $url, $text);

    if (!empty($share_link)) {
        echo '<a href="' . $share_link . '" target="_blank" class="ssb-click-to-share ssb-' . $platform . '">' . $text . '</a>';
    }
}