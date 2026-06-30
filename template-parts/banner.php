<?php
$tag = get_field('tag');
$cor = get_field('cor_da_tag');
$icone = get_field('imagem_tag');
$mostrar_titulo = get_field('mostrar_titulo');

if ($tag) {
    echo '<style>.page-color{background-color: ' . $cor . ';}</style>';
    
    if ($mostrar_titulo) {
        $banner_tag = '<div class="banner__tag page-color"><img src=" ' . esc_url($icone) . '" alt="' . get_the_title() . '" loading="lazy"><h1>' . get_the_title() . '</h1></div>';
    } else {
        $banner_tag = '<div class="banner__tag page-color"><h1><img src=" ' . esc_url($icone) . '" alt="' . get_the_title() . '" loading="lazy"></h1></div>';
    }
}
echo '<div class="banner-z">';
if (have_rows('slider')) :
    if ($tag):
        echo '<div class="wrapper-full banner__tag-wrapper">';
        echo $banner_tag;
        echo '</div>';
    endif;
    echo '<section class="banner">';
    while (have_rows('slider')) : the_row();
        $imagem = get_sub_field('imagem');
        $texto = get_sub_field('texto');

        echo '<figure class="wrapper-full" style="background-image: url(' . esc_url($imagem) . ');">';
        echo '<article>' . $texto . '</article>';
        echo '</figure>';
    endwhile;
    echo '</section>';
endif;
echo '</div>';
?>