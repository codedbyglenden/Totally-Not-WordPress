<?php
/**
 * General settings.
 * 
 * @package tnwp
 */

$form = new TNWP\Forms\General_Settings();
?>
<section class="grid">
    <article class="tnwp-metabox is-full">
        <div class="content">
            <h2>Example settings</h2>
            <?php $form->render(); ?>
        </div>
    </article>

    <article class="tnwp-metabox is-half">
        <div class="content">
            <h2>You can find my other work</h2>
            <ul>
                <li>
                    <a target="_blank" href="https://github.com/codedbyglenden">Github</a>
                </li>
                <li>
                    <a target="_blank" href="https://www.instagram.com/coded.by.glenden">Instagram</a>
                </li>
                <li>
                    <a target="_blank" href="https://www.linkedin.com/in/codedbyglenden">LinkedIn</a>
                </li>
                <li>
                    <a target="_blank" href="https://codedbyglenden.com">My Portfolio</a>
                </li>
            </ul>
        </div>
    </article>

    <article class="tnwp-metabox is-half">
        <div class="content">
            <h2>Tell me about this framework</h2>
            <p>
                Inspired by <a target="_blank" href="https://github.com/devinvinson/WordPress-Plugin-Boilerplate/">WordPress Plugin Boilerplate</a> by
                Devin Vinson, Totally not wordpress is a plugin boilerplate for the modern web. 
            </p>
        </div>
    </article>
</div>