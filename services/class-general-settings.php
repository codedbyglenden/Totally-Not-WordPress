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

		// do_action( 'tnwp_pre_form_markup' );

		printf(
			'<form method="post" action="%s">
                <input type="hidden" name="action" value="save_tnwp_general_settings" />

				<label class="input">
					<input class="input__field" type="text" placeholder=" " />
					<span class="input__label">Some Fancy Label</span>
				</label>

				<label class="input">
					<input class="input__field" type="text" placeholder=" " />
					<span class="input__label">Some Fancy Label</span>
				</label>

				<label class="input">
					<input class="input__field" type="text" placeholder=" " />
					<span class="input__label">Some Fancy Label</span>
				</label>

                <button type="submit" class="input__button">
					<span>Sumit</span>
					<svg width="13px" height="10px" viewBox="0 0 13 10">
						<path d="M1,5 L11,5"></path>
						<polyline points="8 1 12 5 8 9"></polyline>
					</svg>
				</button>
            </form>',
			admin_url( 'admin-post.php' )
		);

		// do_action( 'tnwp_post_form_markup' );

		// echo 'Form data outputs here...';
	}
}

new General_Settings();