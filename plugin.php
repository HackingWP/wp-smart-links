<?php
/**
 * Plugin Name: WP Smart Links
 * Plugin URI: https://github.com/HackingWP/wp-smart-links
 * Description: Avoid 404s when adding links in WP
 * Version: v0.1.0
 * Author: Martin Adamko
 * Author URI: http://martinadamko.sk
 * License: MIT
 */

/**
 * Change `permalink` attribute to return links that will eventually resolve to a link
 *
 * @param array $results Results of link query for the XHR response
 * @returns array Modified results
 *
 */
function WPSmartLinksModifyLinkQuery($results)
{
    foreach ($results as &$post) {
        if ($post['post_type'] === 'post') {
            $post['permalink'] = '/?p='.$post['ID'];
        } else {
            $post['permalink'] = '/?page_id='.$post['ID'];
        }
    }

    return $results;
};

// Hook
add_filter('wp_link_query', 'WPSmartLinksModifyLinkQuery', 10, 1);

/**
 * Remove any instance of current host when linking to media
 *
 * @param string $html Generated HTML tag
 * @return string Modified result
 *
 */
function WPSmartLinksRemoveHomeURL($html)
{
    static $host = null;

    if ($host === null) {
        $host = rtrim(str_replace(parse_url(get_home_url(), PHP_URL_PATH), '', get_home_url()), '/');
    }
    return str_replace($host, '', $html);
}

add_filter( 'media_send_to_editor', 'WPSmartLinksRemoveHomeURL', 10, 1);
