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
 * Content_Flow base class.
 *
 * Contains helper classes used throughout the plugin.
 *
 * @since 2.0.0
 */
class Totally_Not_WordPress {

	/**
	 * The plugin name
	 *
	 * @var string $plugin_name - The plugin name
	 */
	public $plugin_name = 'Totally Not WordPress';

	/**
	 * Class setup.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {

	}

	/**
	 * Returns the path to the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_plugin_path() : string {
		return HP_DISCONNECT_FLOW_PATH;
	}

	/**
	 * Returns the url to the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_plugin_url() : string {
		return HP_DISCONNECT_FLOW_URL;
	}

	/**
	 * Return the entire css path for an asset.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_asset_path( $filename ) : string {
		return $this->get_plugin_path() . 'assets/dist/' . $filename;
	}

	/**
	 * Return the entire css url for a path
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_asset_url( $filename ) : string {
		return $this->get_plugin_url() . 'assets/dist/' . $filename;
	}

	/**
	 * Require the admin template from given filename.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function get_partial( $filename ) : void {
		require_once $this->get_plugin_path() . 'templates/admin/partials/' . $filename;
	}

	/**
	 * Require the admin template from given filename.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_options_url() : string {
		return network_admin_url() . 'admin.php?page=happypress-disconnect.php';
	}
}
