<?php
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Main DCL plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 * This is used to define dashboard-specific hooks, and public-facing site hooks.
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @link       http://dclwp.com
 * @since      10.0.0
 * @package    DCL
 * @subpackage DCL/includes
 * @author     Joel James <me@joelsays.com>
 */
final class Disqus_Conditional_Load {

    /**
     * @var Disqus_Conditional_Load
     * @since  11.0.0
     * @access private
     */
    private static $instance;

    /**
	 * Main Disqus_Conditional_Load Instance.
	 *
	 * Insures that only one instance of Disqus_Conditional_Load exists in memory at any one
	 * time. Also prevents needing to define globals all over the place.
	 *
	 * @since     Disqus_Conditional_Load
	 * @static
	 * @staticvar array $instance
     *
	 * @return Disqus_Conditional_Load|object
	 */
    public static function instance() {

        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Disqus_Conditional_Load ) ) {
          self::$instance = new Disqus_Conditional_Load;
        }

        return self::$instance;
    }
}