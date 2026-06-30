<?php

/**
 * Template Name: Ficha cadastral
 * Template Post Type: page
 *
 * @package UAU
 * @since 1.0.0
 */

get_header();
?>

<style>
textarea {
	width: 100%;
}
</style>
<section class="wrapper-full trabalhe-conosco--section">
    <?php
    echo do_shortcode('[contact-form-7 id="956" title="Ficha cadastral"]');
    ?>
</section>

<?php
get_footer();
