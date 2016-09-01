<?php

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @category   Core
 * @package    DCL
 * @subpackage Internationalization
 * @author     Joel James <me@joelsays.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://dclwp.com
 */
class DCL_i18n {

    /**
     * Initialize the class.
     *
     * @since  11.0.0
     * @access private
     *
     * @return void
     */
    public function __construct() {

        add_action( 'plugins_loaded', array( $this, 'textdomain' ) );
    }

    /**
     * Load the plugin text domain for translation.
     *
     * @since  11.0.0
     * @access private
     *
     * @return void
     */
    public function textdomain() {

        load_plugin_textdomain(
            DCL_DOMAIN,
            false,
            DCL_PLUGIN_DIR . '/languages/'
        );
    }

}
