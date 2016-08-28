<?php

/**
 * Global Functions for DCL.
 *
 * @category   Core
 * @package    DCL
 * @subpackage FUnctions
 * @author     Joel James <me@joelsays.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://dclwp.com
 */
// If this file is called directly, abort.
if (! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Creating comments output.
 *
 * Output the Disqus comments box to the
 * by including comment file.
 * Sample usage - dcl_comments_output();
 *
 * @since  10.0.0
 * @access public
 *
 * @return File|Comments file content.
 */
function dcl_comments_output() {

    ob_start();
    // DCL customized comments file.
    require_once DCL_PLUGIN_DIR . 'includes/public/comments.php';

    $content = ob_get_contents();
    
    ob_end_clean();

    return $content;
}

/**
 * Verify shortcode existance in current page.
 *
 * Check if given shortcode is already exists in
 * current page's content.
 * Sample usage - dcl_shortcode_exists('test_shortcode');
 *
 * @since  10.0.0
 * @access public
 *
 * @return File|Comments file content.
 */
function dcl_shortcode_exists( $shortcode = 'js-disqus' ) {

    global $post;

    if ( ! empty( $post->post_content ) ) {
        return stripos( $post->post_content, '[' . $shortcode . ']' );
    }

    return false;
}

/**
 * Disqus comments scroll script.
 *
 * This function will output the script
 * which can load Disqus comments when visitor
 * scroll downs to the comments area of the
 * page.
 *
 * @since  11.0.0
 * @access public
 *
 * @return JS|JavaScript.
 */
function dcl_scroll_script() {

    $public = DCL_Plugin()->dcl_public();

    return $public->scroll_script();
}

/**
 * Disqus comments click script.
 *
 * This function will output the script
 * which can load Disqus comments when visitor
 * clicks on a button in comments area.
 *
 * @since  11.0.0
 * @access public
 *
 * @return JS|JavaScript.
 */
function dcl_click_script() {

    $public = DCL_Plugin()->dcl_public();

    return $public->click_script();
}

/**
 * Disqus comments normal script.
 *
 * This function will output the script
 * which can load Disqus comments normally
 * as how Disqus loads it without any
 * lazy load effect.
 *
 * @since  11.0.0
 * @access public
 *
 * @return JS|JavaScript.
 */
function dcl_normal_script() {

    $public = DCL_Plugin()->dcl_public();

    return $public->normal_script();
}

/**
 * Disqus comments loading method.
 *
 * Get the loading method set by user
 * to load Disqus comments.
 * 
 * Possible outputs:
 * - click (Load after clicking).
 * - scroll (Load on scroll).
 * - normal (No lazy load).
 *
 * @since  11.0.0
 * @access public
 *
 * @return string click|scroll|normal.
 */
function dcl_load_method() {

    $public = DCL_Plugin()->dcl_public();

    return $public->load_method();
}

/**
 * Check if real user browser is found.
 *
 * Helper function to verify if the current visitor
 * is a real user or bot.
 * This can't be 100% accurate, so do not relay
 * on this function if you are doing a serious
 * functionality.
 * 
 * @global bool $is_gecko
 * @global bool $is_opera
 * @global bool $is_safari
 * @global bool $is_chrome
 * @global bool $is_IE
 * @global bool $is_edge
 * @global bool $is_NS4
 * @global bool $is_lynx
 * 
 * @return boolean If real user or not.
 */
function dcl_real_user() {
        
    // If mobile OS is found it is real user.
    if ( wp_is_mobile() ) {
        return true;
    }
        
    global $is_gecko, $is_opera, $is_safari, $is_chrome, $is_IE, $is_edge, $is_NS4, $is_lynx;
        
    return $is_gecko || $is_opera || $is_safari || $is_chrome || $is_IE || $is_edge || $is_NS4 || $is_lynx;        
}