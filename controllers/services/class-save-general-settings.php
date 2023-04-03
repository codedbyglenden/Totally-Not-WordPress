<?php
/**
 * Save general settings.
 *
 * @package totally-not-wordpress
 * @version 1.0.0
 */

namespace TNWP\Save_General_Settings;

use TNWP\Forms\Forms;

/**
 * Plugin Settings class.
 */
class Save_General_Settings extends Forms {

	/**
	 * Initialise class.
	 */
	public function __construct() {
		$this->actions();
	}

    public function actions() {
        add_action( 'admin_post_save_tnwp_general_settings', array( $this, 'save' ) );
    }

    /**
     * Save submitted form data.
     */
    public function save() {

        die( 'Saved data' );
    }

    /**
     * Print form data to the DOM.
     */
    public function render() : void {

    }
}
