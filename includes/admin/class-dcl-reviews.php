<?php
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * A lightweight library to ask for user reviews after a specific days.
 *
 * This library is a clone of WP Review Me by Julien.
 * @link https://github.com/julien731/WP-Review-Me
 *
 * @category   Core
 * @package    FoxeReviews
 * @subpackage Review
 * @author     Joel James <me@joelsays.com>
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://thefoxe.com
 */
class DCL_Reviews {

    /**
     * Minimum version of WordPress required to use the library
     *
     * @since  1.0
     * @access public
     * @var    string
     */
    public $wp_version = '4.2';

    /**
     * Holds the unique identifying key for this particular instance
     *
     * @since  1.0
     * @access public
     * @var    string
     */
    protected $option = 'dcl_activated_time';

    /**
     * Foxe_Reviews constructor.
     *
     * @param array $args Object settings.
     *
     * @since  1.0
     * @access public
     *
     * @return void
     */
    public function __construct( $days = 10 ) {

        $this->days = $days;
        add_action( 'admin_notices', array( $this, 'admin_notice' ) );
    }


    /**
     * Check if the current WordPress version fits the requirements
     *
     * @since  1.0
     * @return boolean
     */
    private function is_compatible() {

        if ( version_compare( get_bloginfo( 'version' ), $this->wp_version, '<' ) ) {
            return false;
        }

        return true;
    }

    /**
     * Check if it is time to ask for a review
     *
     * @since 1.0
     * @return bool
     */
    private function is_time() {

        $installed = get_option( $this->option, false );

        if ( false === $installed ) {
            update_option( $this->option, time() );
            $installed = time();
        }

        if ( $installed + ( $this->days + 86400 ) > time() ) {
            return false;
        }

        return true;
    }


    /**
     * Trigger the notice if it is time to ask for a review
     *
     * @since 1.0
     * @return void
     */
    public function admin_notice() {

        if ( ! $this->is_time() && $this->is_compatible() ) {

        ?>
        <div class="notice notice-success is-dismissible">
            <p><?php echo $this->get_message(); ?></p>
        </div>
        <?php
        }
    }

    /**
     * Get the review prompt message
     *
     * @since 1.0
     * @return string
     */
    private function get_message() {

        $message = sprintf( esc_html__( 'Hey! It&#039;s been a little while that you&#039;ve been using Disqus Conditional Load. You might not realize it, but user reviews are such a great help to us. We would be so grateful if you could take a minute to leave a review on WordPress.org. Many thanks in advance :)', DCL_NAME ) );
        $link = '<a href="https://wordpress.org/support/view/plugin-reviews/disqus-conditional-load?rate=5#postform" target="_blank">Click here to leave a review</a>';
        $message = $message . ' ' . $link;

        return wp_kses_post( $message );
    }

}
