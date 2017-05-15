<?php
/**
 * Plugin Name:     Disqus Conditional Load
 * Plugin URI:      https://dclwp.com
 * Description:     Best Diqus plugin for WordPress comments with advanced features like <strong>lazy loading, shortcode, widgets, Woocommerce/EDD support</strong> etc. Don't let Disqus to slow your site down.
 * Version:         11.0.0
 * Author:          Joel James
 * Author URI:      https://duckdev.com/
 * Donate link:     https://paypal.me/JoelCJ
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:     disqus-conditional-load
 * Domain Path:     /languages
 *
 * Disqus Conditional Load is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Disqus Conditional Load is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Disqus Conditional Load. If not, see <http://www.gnu.org/licenses/>.
 *
 * @category Core
 * @package  DCL
 * @author   Joel James <me@joelsays.com>
 * @license  http://www.gnu.org/licenses/ GNU General Public License
 * @link     https://dclwp.com
 */
// If this file is called directly, abort.
defined( 'ABSPATH' ) or exit;

use DCL\Disqus;

/**
 * DCL autoloader to autoload required files.
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/autoloader.php';

/**
 * Setup plugin constants.
 *
 * We need a few constants in our plugin. To avoid
 * fatal error, please verify the constants are not
 * set before defining it. This also makes it easy
 * to overwrite the constant values.
 *
 * @since  11.0.0
 * @access private
 *
 * @return void
 */
function dcl_set_constants() {

	// These constants can not be overwritten.
	$default_constants = array(
		// DCL custom constants.
		'DCL_NAME'           => 'disqus-conditional-load',
		'DCL_TEXTDOMAIN'     => 'disqus-conditional-load',
		'DCL_PLUGIN_DIR'     => plugin_dir_path( __FILE__ ),
		'DCL_PLUGIN_URL'     => plugin_dir_url( __FILE__ ),
		'DCL_BASE_FILE'      => __FILE__,
		'DCL_VERSION'        => '11.0.0',
		// Disqus core constans.
		'DCL_DOMAIN'         => 'disqus.com',
		'DCL_IMPORTER_URL'   => 'https://import.disqus.com/',
		'DCL_API_URL'        => 'https://disqus.com/api/',
		'DCL_RSS_PATH'       => '/latest.rss',
		'DCL_DISQUS_VERSION' => '2.86',
	);

	// These constants can be overwritten.
	$public_constants = array(
		// Capability of the user role for accessing settings.
		'DCL_ACCESS'         => 'manage_options',
		'DCL_CAN_EXPORT'     => true,
		'DCL_DEBUG'          => false,
		'DCL_SYNC_TIMEOUT'   => 30,
	);

	// Define default constants.
	foreach ( $default_constants as $constant => $value ) {
		define( $constant, $value );
	}

	// Define if not defined somewhere else.
	foreach ( $public_constants as $constant => $value ) {
		if ( ! defined( $constant ) ) {
			define( $constant, $value );
		}
	}
}

/**
 * The main function for that returns DCL\Disqus
 *
 * The main function responsible for returning the one true DCL\Disqus
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $dcl = DCL_Diqus(); ?>
 *
 * @since  11.0.0
 * @access public
 *
 * @return DCL\Disqus|object
 */
function DCL_Diqus() {

	dcl_set_constants();

	return DCL\Disqus::instance();
}

DCL_Diqus();

//***** Thanks for using Disqus Conditional Load *****//