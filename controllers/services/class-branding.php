<?php
/**
 * Branding
 *
 * @package totally-not-wordpress
 * @version 1.0.0
 */

namespace TNWP\TNWP_Branding;

use TNWP\Totally_Not_WordPress;

/**
 * Remove WordPress Branding.
 */
class TNWP_Branding extends Totally_Not_WordPress {

    // Construct.
    public function __construct() {
        $this->filters();
        $this->actions();
	}

    public function actions() : void {
        add_action( 'wp_before_admin_bar_render', array( $this, 'remove_admin_bar_logo' ), 10 );
        add_action( 'customize_register', array( $this, 'remove_css_section' ), 15 );

        // .
    }

    public function filters() : void {
        add_filter( 'admin_footer_text', array( $this, 'remove_admin_footer_text' ), 600 );
        add_filter( 'update_footer', array( $this, 'remove_admin_version' ), 600 );
    }

    /**
     * Remove the additional CSS section, introduced in 4.7, from the Customizer.
     *
     * @return void
     */
    public function remove_css_section( \WP_Customize_Manager $wp_customize ) : void {
        $wp_customize->remove_section( 'custom_css' );
    }

    /**
     * Removes admin bar logo.
     * 
     * @return void
     */
    public function remove_admin_bar_logo() : void {
        global $wp_admin_bar;

        $wp_admin_bar->remove_menu( 'wp-logo' );
    }

    /**
     * Removes admin footer text.
     * 
     * @param string $text
     * 
     * @param string Return an empty string.
     */
    public function remove_admin_footer_text( string $text ) : string {
        return '';
    }

    /**
     * Remove admin version number from footer.
     * 
     * @param string $version
     * 
     * @return string Empty version string.
     */
    public function remove_admin_version( string $version ) : string {
        return '';
    }
}

new TNWP_Branding();
