<?php

namespace DCL;

// If this file is called directly, abort.
defined( 'ABSPATH' ) or exit;

/**
 * Main class for Disqus plugin.
 *
 * This class is the core/main class that is responsible for all the
 * functionality of this plugin. All hooks and filters are registered
 * in this class.
 *
 * Functionality of this plugin is mainly taken from Disqus official
 * WordPress plugin and improved for better performance and extensibility.
 * Disqus official plugin (https://wordpress.org/plugins/disqus-comment-system/).
 *
 * @since	 11.0.0
 * @category Core
 * @package  DCL\Disqus
 * @author   Joel James <me@joelsays.com>
 * @license  http://www.gnu.org/licenses/ GNU General Public License
 */
class Disqus {

	/**
	 * Main Disqus class instance.
	 *
	 * @var	   DCL\Disqus
	 * @since  11.0.0
	 * @access private
	 */
	private static $instance;

	/**
	 * Main Disqus class instance.
	 *
	 * Insures that only one instance of JJ_404_to_301 exists in memory
	 * at any one time. lso prevents needing to define globals all over
	 * the place.
	 *
	 * @since  11.0.0
	 * @access public
	 *
	 * @staticvar array $instance
	 *
	 * @return DCL\Disqus|object
	 */
	public static function instance() {

		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof DCL\Disqus ) ) {

			self::$instance = new DCL\Disqus();
		}

		return self::$instance;
	}
}
