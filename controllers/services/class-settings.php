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
 * Plugin Settings class.
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
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ), 10, 1 );
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

		// Add a sub-menu-item & page under settings.
		add_submenu_page(
			'options-general.php',
			__( $this->get( 'name' ) ),
			__( $this->get( 'name' ) ),
			'manage_options',
			$this->get( 'slug' ),
			array( $this, 'settings_contents' )
		);
	}

	/**
	 * Returns the settings page for a specfic key.
	 * 
	 * @param string $key The settings page key.
	 * 
	 * @return string Returns the constructed URL.
	 */
	private function get_page_slug( string $key ) : string {

		// The settings page link if settings are not moved from default position.
		$link = apply_filters( 'tnwp_settings_page_link', admin_url( 'options-general.php?page=' . $this->get( 'slug' ) ) );

		if ( isset( $key ) && ! empty( $key ) ) {
			$link = add_query_arg( 'tab', $key, $link );
		}

		return esc_url( $link );
	}

	/**
	 * Returns a tabbed navigation for a settings menu.
	 * 
	 * @param array $menu_items Key value array where the key is the slug & the value is the menu item name.
	 * 
	 * @return void Settings navigation is echoed to the DOM.
	 */
	protected function settings_navigation( array $menu_items ) : void {

		$navigation_items = '';
		$current_url      = $this->get_current_url();

		if ( $menu_items ) {
			foreach ( $menu_items as $slug => $name ) {

				if ( ! $name ) {
					continue;
				}

				// Get the settings page url.
				$link = $this->get_page_slug( $slug );
				
				// Add the list item.
				$navigation_items .= sprintf(
					'<li>
						<a href="%1$s" class="nav-link%3$s">%2$s</a>
					</li>',
					$link,
					esc_html( $name ),
					$current_url === $link ? ' is-current' : ''
				);
			}
		}

		printf(
			'<nav class="settings-nav">
				<ul>
					%s
				</ul>
			</nav>',
			$navigation_items
		);
	}

	protected function render_settings_page_template() {

		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : 'general';

		$exists = file_exists( $this->get_plugin_path() . 'templates/settings/pages/' . $tab . '.php' );

		if ( $exists ) {
			$this->get_template_part( 'settings/pages/' . $tab . '.php' );
		} else {
			$this->get_template_part( 'settings/pages/general.php' );
		}
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
