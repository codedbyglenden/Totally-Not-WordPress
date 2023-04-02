<?php
/**
 * Header partial.
 * 
 * @package TNWP
 */

?>

<header class="settings-header">
    <h1><?php esc_html_e( $plugin->get( 'name' ) ); ?></h1>
    <p><?php esc_html_e( $plugin->get( 'description' ) ); ?></p>

    <?php
        $plugin->settings_navigation(
            array(
                ''      => 'Overview',
                'about' => 'About',
            )
        );
    ?>
</header>