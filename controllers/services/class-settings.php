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
		add_action( 'admin_menu', array( $this, 'register_settings_page' ), 10, 1 );
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
            $this->get( 'slug' ) . '-settings',
            array( $this, 'settings_contents' )
        );
    }

    /**
     * Eduapi Deploy
     *
     * @since 1.0.0
     */
    public function settings_contents() {
        $this->get_template_part( 'settings/settings.php' );
    }
}

new Settings();
