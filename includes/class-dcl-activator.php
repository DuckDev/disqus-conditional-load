<?php

// If this file is called directly, abort.
if (! defined( 'ABSPATH' ) ) exit;

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 * We will register our default settings here if not exists already.
 *
 * @category   Core
 * @package    DCL
 * @subpackage Activator
 * @author     Joel James <me@joelsays.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://dclwp.com
 */
class DCL_Activator {

    /**
     * Function to run during activation
     * 
     * We register default options to the WordPress
     * if not exists already.
     * We will keep the old values if already exist.
     *
     * @since  10.0.0
     * @access public
     * 
     * @return void
     */
    public function activate() {

        // Default settings for dcl.
        $options = array(
            'dcl_type' => 'scroll',
            'dcl_div_width' => '',
            'dcl_div_width_type' => 'px',
            'dcl_count_disable' => 1,
            'dcl_btn_txt' => 'Load Comments',
            'dcl_btn_class' => '',
            'dcl_message' => 'Loading...',
            'dcl_caching' => 0,
            'dcl_cfasync' => 0,
            'dcl_cpt_exclude' => '',
        );

        // Get existing options if exists.
        $existing = get_option( 'dcl_gnrl_options' );
        // Check if valid dcl settings exist.
        if ( $existing && is_array( $existing ) ) {
            foreach ( $options as $key => $value ) {
                if ( array_key_exists( $key, $existing ) ) {
                    $options[ $key ] = $existing[ $key ];
                }
            }
        }

        // Update/create dcl settings.
        update_option( 'dcl_gnrl_options', $options );
        // Plugin activated date (Inaccurate for old activations).
        add_option( 'dcl_activated_time', current_time('mysql') );
    }
}