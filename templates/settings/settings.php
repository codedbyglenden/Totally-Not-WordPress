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

/**
 * Require the settings page here.
 */
$plugin->get_template_part( 'settings/partials/footer.php' );

// We should probably write a plugin form generator for settings pages.

// The method invokes a class which contains render methods & save functionality.

// The invoked method should be a child class of a form class.

// This way we can share helpers to process data & output form fields.