<?php
/**
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package UAU
 * @since 1.0.0
 */

get_header();

if(get_field('story')) {
    echo '<section id="story" class="story">';
    $images = get_field('images');
    if( $images ):
        foreach( $images as $image ):
            echo '<figure><img src="'.$image.'" /></figure>';
        endforeach;
    endif;
    echo
    '</section>
    <section class="wrapper blog-single">
        <article>'; the_content(); echo '</article>
    </section>';
} else {
    echo '<section class="wrapper blog-single"><h1>' . get_the_title() . '</h1><article>'; the_content(); echo '</article></section>';
}

get_footer();