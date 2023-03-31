<?php
/**
 * Settings
 *
 * @package totally-not-wordpress
 * @version 1.0.0
 */

namespace TNWP\Settings;

use TNWP\Totally_Not_WordPress;

/**
 * Remove WordPress Branding.
 */
class Settings extends Totally_Not_WordPress {

    /**
	 * Initialise class.
	 */
	public function __construct() {
		$this->actions();
	}

    /**
	 * Queue actions for settings.
	 * 
	 * @return void
	 */
	public function actions() : void {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'admin_menu', array( $this, 'register_settings_page' ), 10, 1 );
	}

    /**
     * Enqueues stylesheets for the settings page.
     * 
     * @param string $hook_suffix The current admin page.
     * 
     * @return void
     */
    public function enqueue_styles( string $hook_suffix ) : void {

        if ( 'settings_page_' . $this->get( 'slug' ) === $hook_suffix ) {

			wp_register_style(
                $this->get( 'slug' ) . '_settings_css',
                $this->get_asset_url( 'css/settings.min.css' ),
                false,
                $this->get_version()
            );
			wp_enqueue_style( $this->get( 'slug' ) . '_settings_css' );
        }
    }

    /**
     * Register the settings page.
     * 
     * @param string $context Empty context.
     * 
     * @return void
     */
    public function register_settings_page( string $context ) : void {

        add_submenu_page(
            'options-general.php',
            __( $this->get( 'name' ), $this->get( 'namespace' ) ),
            __(  $this->get( 'name' ), $this->get( 'namespace' ) ),
            'manage_options',
            $this->get( 'slug' ),
            array( $this, 'settings_contents' )
        );
    }

    /**
     * Requires the settings template.
     *
     * @return void
     */
    public function settings_contents() : void {
        $this->get_template_part( 'settings/settings.php' );
    }
}

new Settings();
