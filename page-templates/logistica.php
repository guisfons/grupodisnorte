<?php

/**
 * Template Name: Logística
 * Template Post Type: page
 *
 * @package UAU
 * @since 1.0.0
 */

get_header();

echo get_template_part('template-parts/banner-custom');

if (have_rows('processos')) :
    $i = 0;
    while (have_rows('processos')) : the_row();
        $icone = get_sub_field('icone');
        $titulo = get_sub_field('titulo');
        $texto = get_sub_field('texto');
        $imagem = get_sub_field('imagem');
        $cor_do_processo = get_sub_field('cor_do_processo');

        if ($i % 2 == 0) :
            $class = 'fade-left';
        else :
            $class = 'fade-right';
        endif;

        echo
        '<section data-aos="' . $class . '" class="wrapper-full logistica__section" style="background-color: ' . $cor_do_processo . ';">
            <div class="logistica__header">
                <figure><img src="' . esc_url($icone) . '" alt="' . $titulo . '" loading="lazy"></figure>
                <h2>' . $titulo . '</h2><hr>
            </div>
            <div class="logistica__content">
                <figure><img src="' . esc_url($imagem) . '" alt="' . $titulo . '" loading="lazy"></figure>
                <article>' . $texto . '</article>
            </div>
        </section>';
        $i++;
    endwhile;
endif;

get_footer();
