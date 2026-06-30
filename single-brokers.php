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

echo get_template_part('template-parts/banner-custom');

if (get_field('area_de_atuacao')) :
    echo
    '<section class="wrapper-full area-atuacao">
        <article>
            <figure><img src="' . esc_url(get_template_directory_uri()) . '/assets/img/mapa.png" alt="Área de atuação" loading="lazy"></figure>
            ' . get_field('area_de_atuacao') . '
        </article>
        <figure><img src="' . esc_url(get_field('area_de_atuacao_imagem')) . '" alt="Mapa área de atuação" loading="lazy"></figure>
    </section>';
endif;

if (have_rows('sliders_azul')) :
    while (have_rows('sliders_azul')) : the_row();
        $posicao = get_sub_field('imagem_a_esquerda');
        $imagem = get_sub_field('imagem');
        $texto = get_sub_field('sliders_texto');
        $cor = get_sub_field('cor_da_secao');

        echo
        '<section class="wrapper-full infraestrutura" style="background-color: ' . $cor . '">
            <article>' . $texto . '</article>
            <div class="infraestrutura__slider"><figure><img src="' . esc_url($imagem) . '" alt="'.$texto.'" loading"lazy"></figure></div>
        </section>';
    endwhile;
endif;
?>

<section class="wrapper evolucao">
    <h2>Nossa evolução</h2>
    <?php echo get_template_part('template-parts/timeline'); ?>
</section>

<?php
if (get_field('resultados_mao')) :
    echo '<section class="wrapper-full resultados-mao"><article>' . get_field('resultados_mao') . '</article><figure><img src="' . esc_url(get_field('resultados_mao_imagem')) . '" alt="Resultados" loading="lazy"></figure></section>';
endif;

if (get_field('merchandising')) :
    echo
    '<section class="wrapper-full merchandising"><article>' . get_field('merchandising') . '</article>';
    if (get_field('merchandising_imagens')) :
        echo '<div class="merchandising__images">';
        foreach (get_field('merchandising_imagens') as $merchandising_id) :
            echo '<figure>' . wp_get_attachment_image($merchandising_id, 'full') . '</figure>';
        endforeach;
        echo '</div>';
    endif;
    if(get_field('merchandising_link')) :
        echo '<a href="'.esc_url(get_field('merchandising_imagem')).'" title="Veja mais">Veja mais</a>';
    endif;
    echo '</section>';
endif;

if (get_field('resultados')) :
    echo
    '<section class="wrapper-full resultados">
        <article>' . get_field('resultados') . '</article>';
    if (get_field('resultados_imagens')) :
        foreach (get_field('resultados_imagens') as $resultados_id) :
            echo '<figure>' . wp_get_attachment_image($resultados_id, 'full') . '</figure>';
        endforeach;
    endif;
    if (get_field('power_bi')) :
        echo '<figure>' . get_field('power_bi') . '</figure>';
    endif;
    echo '</section>';
endif;

get_footer();
