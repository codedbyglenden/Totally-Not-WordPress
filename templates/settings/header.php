<?php
/**
 * Header partial.
 * 
 * @package TNWP
 */

?>

<header>
    <h1>Settings</h1>

    <?php
        $plugin->settings_navigation(
            array(
                ''      => 'General',
                'about' => 'About',
            )
        );
    ?>
</header>