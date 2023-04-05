<?php
/**
 * Forms
 *
 * @package totally-not-wordpress
 * @version 1.0.0
 */

namespace TNWP;

/**
 * Plugin Settings class.
 */
class Forms {

	/**
	 * Initialise class.
	 */
	public function __construct() {
		$this->actions();
	}

	public function actions() {
		add_action( 'tnwp_pre_form_markup', array( $this, 'pre_form_markup' ) );
		add_action( 'tnwp_post_form_markup', array( $this, 'post_form_markup' ) );
		add_action( 'tnwp_form_notices', array( $this, 'output_notices' ) );
	}

	/**
	 * Prints all form warnings, notices & errors.
	 * 
	 * @return void All content is echoed.
	 */
	public function output_notices() : void {

		echo 'Warnings output here...';
	}

	/**
	 * Prints form markup to be output before the form.
	 *
	 * @return void
	 */
	public function pre_form_markup() : void {

		printf(
			'<section class="form">
                <div class="container">
            '
		);

		do_action( 'tnwp_form_notices' );
	}

	/**
	 * Prints form markup to be output after the form.
	 *
	 * @return void
	 */
	public function post_form_markup() : void {

		printf(
			'   </div>
            </section>'
		);
	}

	/**
	 * Prints all form errors, warnings & success messages.
	 *
	 * @return void
	 */
	public function output_errors() : void {

	}
}

new Forms();
