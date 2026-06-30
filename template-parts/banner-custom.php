<?php
    $cor = get_field('cor_da_tag');
    $icone = get_field('imagem_tag');
    $images = get_field('slider_gallery');
    $imagem_texto = get_field('imagem_do_texto');
    $bordao = get_field('bordao');
    $video_destacado = get_field('video_destacado');
    $mostrar_titulo = get_field('mostrar_titulo');

    if($mostrar_titulo) {
        $banner_tag = '<div class="banner__tag page-color"><img src=" ' . esc_url($icone) . '" alt="' . get_the_title() . '" loading="lazy"><h1>' . get_the_title() . '</h1></div>';
    } else {
        $banner_tag = '<div class="banner__tag page-color"><h1><img src=" ' . esc_url($icone) . '" alt="' . get_the_title() . '" loading="lazy"></h1></div>';
    }

    echo
    '<style>.page-color{background-color: ' . $cor . ';}</style>
        <section class="banner">';
    
    if($video_destacado):
        echo
        '<figure class="wrapper-full">
            '.$banner_tag.'
            <video autoplay muted loop>
                <source src="' . esc_url($video_destacado) . '" type="video/mp4">
            </video>
        </figure>';
    else:
        '<figure class="wrapper-full" style="background-image: url(' . esc_url(get_the_post_thumbnail_url()) . ')">
            '.$banner_tag.'
        </figure>';
    endif;
    echo
        '</section>
        <section class="content">';
    if ($images) :
        echo '<div class="content__banner">';
        foreach ($images as $image) :
            echo '<figure><img src="' . esc_url($image) . '" alt="' . get_the_title() . '" loading="lazy"></figure>';
        endforeach;
        echo '</div>';
    endif;
    echo
    '<div class="content__content">';
    if ($imagem_texto):
        echo '<figure><img src="' . esc_url($imagem_texto) . '" alt="' . get_the_title() . '" loading="lazy"></figure>';
    endif;
    echo
        '<article>' . get_the_content() . '</article>
    </div>';
    if ($bordao) :
        echo '<span data-aos="fade-up" class="content__bordao page-color">' . $bordao  . '</span>';
    endif;
    echo '</section>';
    ?>