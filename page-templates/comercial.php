<?php

/**
 * Template Name: Comercial
 * Template Post Type: page
 *
 * @package UAU
 * @since 1.0.0
 */

get_header();

echo get_template_part('template-parts/banner-custom');

if(get_field('equipe_texto')):
    echo
    '<section class="wrapper-full equipe">
        <article>' . get_field('equipe_texto') . '</article>
        <figure><img src="' . esc_url(get_field('equipe_imagem')) . '" alt="Equipe" loading="lazy"></figure>
    </section>';
endif;

if(get_field('clientes_texto')):
    echo
    '<section class="wrapper-full clientes">
        <article>' . get_field('clientes_texto') . '</article>';
        if( have_rows('clientes') ):
            while( have_rows('clientes') ) : the_row();
                $icone = get_sub_field('icone');
                $titulo = get_sub_field('titulo');

                echo
                '<div class="clientes__item">
                    <figure><img src="' . esc_url($icone) . '" alt="' . $titulo . '" loading="lazy"></figure>
                    <span>' . $titulo . '</span>
                </div>';
            endwhile;
        endif;
    echo '</section>';
endif;

if( have_rows('areas') ):
    echo '<section class="areas">';
    $i = 0;
    while( have_rows('areas') ) : the_row();
        $texto = get_sub_field('texto');
        $imagem = get_sub_field('imagem');

        if($i % 2 == 0):
            $class = 'fade-left';
        else:
            $class = 'fade-right';
        endif;

        echo
        '<section class="wrapper-full areas__section">
            <article>' . $texto . '</article>
            <figure><img src="' . esc_url($imagem) . '" loading="lazy"></figure>
        </section>';
        $i++;
    endwhile;
    echo '</section>';
endif;

get_footer();
