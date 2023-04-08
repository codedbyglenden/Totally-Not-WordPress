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
	 * Form validation array.
	 *
	 * @var array $form_validation An array of success, warnings or errors.
	 */
	public array $form_validation = array();

	/**
	 * Initialise class.
	 */
	public function __construct() {
		$this->actions();
	}

	/**
	 * Queue WordPress actions.
	 *
	 * @return void
	 */
	public function actions() {
		add_action( 'tnwp_pre_form_markup', array( $this, 'pre_form_markup' ) );
		add_action( 'tnwp_post_form_markup', array( $this, 'post_form_markup' ) );
		add_action( 'tnwp_form_notices', array( $this, 'output_notices' ) );
	}

	/**
	 * Add items to the validation array.
	 *
	 * @param string $text Text to be output on the notice.
	 * @param int    $level Is it a warning, error, or success message.
	 * @param bool   $fatal Will the form finish proccessing after this is set.
	 *
	 * @return void
	 */
	public function append_to_validation( string $text, int $level = 100, bool $fatal = false ) : void {

		$this->form_validation[] = array(
			'text'  => $text,
			'level' => $level,
		);

		if ( $fatal ) {
			set_transient( 'tnwp_validation_errors_' . get_current_user_ID(), $this->form_validation );
		}
	}

	/**
	 * Adds error to the validation object.
	 *
	 * @param string $text Text to output in error.
	 * @param bool   $fatal Will this error be the end of output / form processing.
	 *
	 * @return void
	 */
	public function error( string $text, bool $fatal = true ) : void {
		$this->append_to_validation( $text, 500, $fatal );
	}

	/**
	 * Add success message.
	 *
	 * @param string $text The success message to show.
	 *
	 * @return void
	 */
	public function success( string $text ) : void {
		$this->append_to_validation( $text, 200, true );
	}

	/**
	 * Add warning to validation object.
	 *
	 * @var string $text The warning text to display.
	 *
	 * @return void
	 */
	public function warning( string $text ) : void {
		$this->append_to_validation( $text, 100 );
	}

	/**
	 * Prints all form warnings, notices & errors.
	 *
	 * @return void All content is echoed.
	 */
	public function output_notices() : void {

		$user_info = wp_get_current_user();
		$user_id   = $user_info->exists() && ! empty( $user_info->ID ) ? $user_info->ID : 0;
		$notices   = get_transient( 'tnwp_validation_errors_' . $user_id );

		/**
		 * - 200 success.
		 * - 500 error.
		 * - 100 warning.
		 */
		if ( $notices ) {

			echo '<ul class="form-notices">';

			foreach ( $notices as $key => $notice ) {
				printf(
					'<li class="level-%2$s">%1$s</li>',
					esc_html( $notice['text'] ),
					esc_attr( $notice['level'] )
				);
			}

			echo '</ul>';

			delete_transient( 'tnwp_validation_errors_' . $user_id );
		}
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
}

new Forms();
