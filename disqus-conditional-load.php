<?php
/**
 * Plugin Name:     Disqus Conditional Load
 * Plugin URI:      https://dclwp.com
 * Description:     Best Diqus plugin for WordPress comments with advanced features like <strong>lazy loading, shortcode, widgets, Woocommerce/EDD support</strong> etc. Don't let Disqus to slow your site down.
 * Version:         11.0.0
 * Author:          Joel James
 * Author URI:      https://thefoxe.com/
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
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Stay lazy if our class is already there.
if ( ! class_exists( 'Disqus_Conditional_Load' ) ) :

	/**
	 * File that contains main DCL plugin class.
	 */
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-disqus-conditional-load.php';

	/**
	 * Setup plugin constants.
	 *
	 * We need a few constants in our plugin.
	 * These values should be constant and con't
	 * be altered later.
	 *
	 * @since  10.0.0
	 * @access private
	 *
	 * @return void
	 */
	function dcl_set_constants() {

		$constants = array(
			'DCL_NAME'       => 'disqus-conditional-load',
			'DCL_DOMAIN'     => 'disqus-conditional-load',
			'DCL_PLUGIN_DIR' => plugin_dir_path( __FILE__ ),
			'DCL_PLUGIN_URL' => plugin_dir_url( __FILE__ ),
			'DCL_BASE_FILE'  => __FILE__,
			'DCL_VERSION'    => '11.0.0',
			// Set who all can access dcl settings.
			// You can change this if you want to give others access.
			'DCL_ACCESS'     => 'manage_options',
		);

		foreach ( $constants as $constant => $value ) {
			if ( ! defined( $constant ) ) {
				define( $constant, $value );
			}
		}
	}

	/**
	 * The main function for that returns Disqus_Conditional_Load
	 *
	 * The main function responsible for returning the one true Disqus_Conditional_Load
	 * Instance to functions everywhere.
	 *
	 * Use this function like you would a global variable, except without needing
	 * to declare the global.
	 *
	 * Example: <?php $dcl = DCL_Plugin(); ?>
	 *
	 * @since 11.0.0
	 *
	 * @return Disqus_Conditional_Load|object
	 */
	function DCL_Plugin() {

		dcl_set_constants();

		return Disqus_Conditional_Load::instance();
	}

	DCL_Plugin();

endif; // End if class_exists check.