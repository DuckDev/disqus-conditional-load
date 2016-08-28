<?php

// If this file is called directly, abort.
if (! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The public-facing functionality of the plugin.
 *
 * @category   Core
 * @package    DCL
 * @subpackage Public
 * @author     Joel James <me@joelsays.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://dclwp.com
 */
class DCL_Public {

    /**
     * Initialize the class.
     *
     * Register all hooks in this class.
     * All public facing functionality.
     *
     * @since  10.0.0
     * @access private
     *
     * @return void
     */
    public function __construct() {

        add_filter( 'respond_link', array( $this, 'respond_link' ) );
    }

    /**
     * Change the respond/comments links
     * 
     * By default the respond links may be #respond.
     * Incase Disqus is unable to do that,
     * We will change that to #disqus_thread
     * 
     * @since  10.2.0
     * @access public
     * 
     * @return void
     */
    public function respond_link(){

        return get_permalink() . '#disqus_thread';
    }

    /**
     * Change the respond/comments links
     * 
     * By default the respond links may be #respond.
     * Incase Disqus is unable to do that,
     * We will change that to #disqus_thread
     * 
     * @since  10.2.0
     * @access public
     * 
     * @return void
     */
    public function scroll_script() {

    }

    /**
     * Change the respond/comments links
     * 
     * By default the respond links may be #respond.
     * Incase Disqus is unable to do that,
     * We will change that to #disqus_thread
     * 
     * @since  10.2.0
     * @access public
     * 
     * @return void
     */
    public function click_script() {
        
    }

    /**
     * Change the respond/comments links
     * 
     * By default the respond links may be #respond.
     * Incase Disqus is unable to do that,
     * We will change that to #disqus_thread
     * 
     * @since  10.2.0
     * @access public
     * 
     * @return void
     */
    public function normal_script() {
        
    }

    /**
     * Change the respond/comments links
     * 
     * By default the respond links may be #respond.
     * Incase Disqus is unable to do that,
     * We will change that to #disqus_thread
     * 
     * @since  10.2.0
     * @access public
     * 
     * @return void
     */
    public function hash_script() {
        
    }

    /**
     * Change the respond/comments links
     * 
     * By default the respond links may be #respond.
     * Incase Disqus is unable to do that,
     * We will change that to #disqus_thread
     * 
     * @since  10.2.0
     * @access public
     * 
     * @return void
     */
    public function load_method() {
        
    }
}
