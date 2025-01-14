<?php
/**
 * Helpers
 *
 * Base class for the plugin.
 *
 * @package totally-not-wordpress
 * @version 1.0.0
 */

namespace TNWP;

/**
 * If already exists - return can act as file handler.
 */
if ( class_exists( 'Totally_Not_WordPress' ) ) {
	return;
}

/**
 * Base class.
 *
 * Contains helper methods used throughout the plugin.
 *
 * @since 1.0.0
 */
class Totally_Not_WordPress {

	/**
	 * Basic plugin information used throughout the project,
	 * that can not be overridden.
	 *
	 * @var array $plugin
	 */
	private static $plugin = array(
		'name'        => 'Totally Not WordPress',
		'slug'        => 'totally-not-wordpress',
		'description' => 'Bugs are temporary, WordPress is forever...',
	);

	/**
	 * Class setup.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

	}

	/**
	 * Get static class variables.
	 *
	 * @var string $key The array key for the item you wish to return.
	 *
	 * @return many Returns the value of the selected array key, null if it doesn't exist.
	 */
	public function get( string $key ) {
		return isset( self::$plugin[ $key ] ) ? self::$plugin[ $key ] : null;
	}

	/**
	 * Returns the plugin version.
	 *
	 * @return string $version Plugin version.
	 */
	public function get_version() : string {
		return get_plugin_data( $this->get_plugin_path() . $this->get( 'slug' ) . '.php' )['Version'];
	}

	/**
	 * Get the currently active admin url.
	 *
	 * @return string The admin url.
	 */
	public function get_current_url(): string {
		$page_url = 'http://';

		if ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ) {
			$page_url = 'https://';
		}

		$page_url .= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

		return esc_url( $page_url );
	}

	/**
	 * Returns the path to the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_plugin_path() : string {
		return TOTALLY_NOT_WP_PATH;
	}

	/**
	 * Returns the url to the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_plugin_url() : string {
		return TOTALLY_NOT_WP_URL;
	}

	/**
	 * Return the entire css path for an asset.
	 *
	 * @param string $filename The name of the file to retrieve.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_asset_path( string $filename ) : string {
		return $this->get_plugin_path() . 'assets/dist/' . $filename;
	}

	/**
	 * Return the entire css url for a path
	 *
	 * @param string $filename The name of the file to retrieve.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_asset_url( string $filename ) : string {
		return $this->get_plugin_url() . 'assets/dist/' . $filename;
	}

	/**
	 * Require the admin template from given filename.
	 *
	 * @param string $filename The name of the file to retrieve.
	 * @param array  $args An array of dynamic values to be used in the retrieved template.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function get_template_part( string $filename, array $args = array() ) : void {

		// Provides class access within page templates.
		$plugin = $this;

		require_once $this->get_plugin_path() . 'templates/' . $filename;
	}

	/**
	 * Require the admin template from given filename.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_options_url() : string {
		return network_admin_url() . 'admin.php?page=' . $this->get( 'name' ) . '-options.php';
	}
}
