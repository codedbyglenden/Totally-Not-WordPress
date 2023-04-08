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

	/**
	 * Queue WordPress actions for this class.
	 *
	 * @return void
	 */
	public function actions() : void {
		add_action( 'admin_post_save_tnwp_general_settings', array( $this, 'save' ) );
	}

	/**
	 * Save submitted form data.
	 */
	public function save() {

		$this->warning( 'Empty Last name' );
		$this->error( 'Empty first name', true );
		$this->success( 'Form submitted successfully!' );

		// This needs to be an auto redirect.
		wp_safe_redirect( admin_url() . 'options-general.php?page=totally-not-wordpress' );
		exit;
	}

	/**
	 * Print form data to the DOM.
	 */
	public function render() : void {

		do_action( 'tnwp_pre_form_markup' );

		printf(
			'<form method="post" action="%s">
                <input type="hidden" name="action" value="save_tnwp_general_settings" />

				<label class="input">
					<input class="input__field" type="text" placeholder=" " />
					<span class="input__label">First Name</span>
				</label>

				<label class="input">
					<input class="input__field" type="text" placeholder=" " />
					<span class="input__label">Last Name</span>
				</label>

                <button type="submit" class="input__button">
					<span>Save</span>
					<svg width="13px" height="10px" viewBox="0 0 13 10">
						<path d="M1,5 L11,5"></path>
						<polyline points="8 1 12 5 8 9"></polyline>
					</svg>
				</button>
            </form>',
			admin_url( 'admin-post.php' )
		);

		do_action( 'tnwp_post_form_markup' );
	}
}

new General_Settings();
