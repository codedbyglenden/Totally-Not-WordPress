<?php
/**
 * Plugin Name:       Totally Not WordPress
 * Plugin URI:        https://github.com/codedbyglenden/Totally-Not-WordPress
 * Description:       Silence the WordPress haters with this admin interface overhaul.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            codedbyglenden
 * Author URI:        https://github.com/codedbyglenden
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       totally-not-wordpress
 * Domain Path:       /languages
 *
 * @package           TNWP
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	exit();
}

/**
 * Define URL & Path Variables.
 */
define( 'TOTALLY_NOT_WP_URL', plugin_dir_url( __FILE__ ) );
define( 'TOTALLY_NOT_WP_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Require the main helper class.
 */
require_once TOTALLY_NOT_WP_PATH . 'controllers/class-totally-not-wordpress.php';

/**
 * Load plugin files in for selected directories.
 *
 * @param object $files An array of files.
 *
 * @return void
 */
function autoload( object $files ) : void {
	/**
	 * Include all controllers.
	 */
	foreach ( $files as $file ) {

		if ( $file->isDir() ) {
			continue;
		}

		$pathname = $file->getPathname();

		if ( 'php' !== pathinfo( $pathname, PATHINFO_EXTENSION ) ) {
			continue;
		}

		require_once $pathname;
	}
}

/**
 * Include all subdirs and files in controllers.
 */
$controllers = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( __DIR__ . '/controllers' ) );

/**
 * Include all subdirs and files in controllers.
 */
$services = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( __DIR__ . '/services' ) );

autoload( $controllers );
autoload( $services );
