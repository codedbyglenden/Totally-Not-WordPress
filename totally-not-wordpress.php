<?php
/*
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
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	exit();
}

define( 'TOTALLY_NOT_WP_URL', plugin_dir_url( __FILE__ ) );
define( 'TOTALLY_NOT_WP_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Require the main helper class.
 */
require_once TOTALLY_NOT_WP_PATH . 'controllers/class-helpers.php';

/**
 * Include all subdirs and files in controllers.
 */
$controllers = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( __DIR__ . '/controllers' ) );

foreach ( $controllers as $file ) {

	if ( $file->isDir() ) {
		continue;
	}

	$pathname = $file->getPathname();

	if ( 'php' !== pathinfo( $pathname, PATHINFO_EXTENSION ) ) {
		continue;
	}

	require_once $pathname;
}




