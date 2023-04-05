<?php
/**
 * Save general settings.
 *
 * @package totally-not-wordpress
 * @version 1.0.0
 */

namespace TNWP\Forms;

use TNWP\Forms;

/**
 * Plugin Settings class.
 */
class General_Settings extends Forms {

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

		var_dump( $_POST );

		die( 'Saved data' );
	}

	/**
	 * Print form data to the DOM.
	 */
	public function render() : void {

		// Add some form of json reader?

		// The save post action is currently only run when there are forms.

		// We need to add these actions on every admin load...

		printf(
			'<form method="post" action="%s">
                <input type="hidden" name="action" value="save_tnwp_general_settings">
                <input type="text" name="text" />
                <button type="submit">Save data</button>
            </form>',
			admin_url( 'admin-post.php' )
		);

		echo 'Form data outputs here...';
	}
}

new General_Settings();