<?php
/**
 * Settings Page.
 *
 * @package TNWP
 */

/**
 * Require the settings page here.
 */
$plugin->get_template_part( 'settings/partials/header.php' );

/**
 * Conditionally render the correct settings page template.
 */
$plugin->render_settings_page_template();
