<?php

// If this file is called directly, abort.
if (! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Main DCL plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 * This is used to define dashboard-specific hooks, and public-facing site hooks.
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @category   Core
 * @package    DCL
 * @subpackage Admin
 * @author     Joel James <me@joelsays.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://dclwp.com
 */
final class Disqus_Conditional_Load {

    /**
     * Main DCL class instance.
     *
     * @var    Disqus_Conditional_Load
     * @since  11.0.0
     * @access private
     */
    private static $instance;

    /**
     * Main Disqus_Conditional_Load Instance.
     *
     * Insures that only one instance of Disqus_Conditional_Load exists in memory
     * at any one time. Also prevents needing to define globals all over the place.
     *
     * @since     11.0.0
     * @access    public
     * @staticvar array  $instance
     *
     * @return Disqus_Conditional_Load|object
     */
    public static function instance() {

        if ( ! isset( self::$instance ) && !( self::$instance instanceof Disqus_Conditional_Load ) ) {
            self::$instance = new Disqus_Conditional_Load;
            self::$instance->includes();
            self::$instance->locale_init();
            self::$instance->admin_init();
            self::$instance->public_init();
        }

        return self::$instance;
    }

    /**
     * Throw error on object clone.
     *
     * The whole idea of the singleton design pattern is that there is a single
     * object therefore, we don't want the object to be cloned.
     *
     * @since  11.0.0
     * @access protected
     *
     * @return void
     */
    public function __clone() {

        // Cloning instances of the class is forbidden.
        _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', DCL_DOMAIN ), '11.0.0' );
    }

    /**
     * Disable unserializing of the class.
     *
     * @since  11.0.0
     * @access protected
     *
     * @return void
     */
    public function __wakeup() {

        // Unserializing instances of the class is forbidden.
        _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', DCL_DOMAIN ), '11.0.0' );
    }

    /**
     * Include plugin's required files.
     *
     * Load all required files for this plugin's
     * perfect functionality.
     * We will handle the conditional checks inside
     * these files.
     *
     * @since  11.0.0
     * @access private
     *
     * @return void
     */
    private function includes() {

        include_once DCL_PLUGIN_DIR . 'includes/class-dcl-i18n.php';
        include_once DCL_PLUGIN_DIR . 'includes/class-dcl-activator.php';
        include_once DCL_PLUGIN_DIR . 'includes/admin/class-dcl-admin.php';
        include_once DCL_PLUGIN_DIR . 'includes/public/class-dcl-public.php';
        include_once DCL_PLUGIN_DIR . 'includes/dcl-functions.php';
    }

    /**
     * Initialize administrative class.
     *
     * Register all of the hooks related to the dashboard
     * functionality.
     *
     * @since  10.0.0
     * @access private
     *
     * @return void
     */
    public function admin_init() {

        return new DCL_Admin();
    }

    /**
     * Initialize public class.
     *
     * Register all of the hooks related to the public
     * functionality.
     *
     * @since  10.0.0
     * @access private
     *
     * @return void
     */
    public function public_init() {

        return new DCL_Public();
    }

    /**
     * Initialize public class.
     *
     * Register all of the hooks related to the public
     * functionality.
     *
     * @since  10.0.0
     * @access private
     *
     * @return void
     */
    private function locale_init() {

        return new DCL_i18n();
    }

}
