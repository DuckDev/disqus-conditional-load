<?php

// If this file is called directly, abort.
if (! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @category   Core
 * @package    DCL
 * @subpackage Admin
 * @author     Joel James <me@joelsays.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://dclwp.com
 */
class DCL_Admin {

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
    public function __construct() {

    }

}
