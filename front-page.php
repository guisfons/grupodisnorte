<?php
get_header();

echo get_template_part('template-parts/banner');

?>

<?php
if (have_rows('boxes')) :
    echo '<section class="cards">';
    while (have_rows('boxes')) : the_row();
        $titulo = get_sub_field('titulo');
        $icone = get_sub_field('icone');
        $link = get_sub_field('link');
        $cor = get_sub_field('cor');

        echo
        '<div class="cards__box" style="background-color: ' . $cor . ';">
            <figure><img src="' . esc_url($icone) . '" alt="' . $titulo . '" loading="lazy"></figure>
            <span>' . $titulo . '</span>
            <a href="' . esc_url($link) . '">Saiba mais</a>
        </div>';

    endwhile;
    echo '</section>';
endif;
// <!-- Section Quem Somos -->

$quem_somos = get_field('quem_somos_texto');
$id = get_field('quem_somos_video');

if (!empty($quem_somos)) :
    $capa_video = get_field('capa_do_video');

    if(!$capa_video) {
        $capa_video = 'https://img.youtube.com/vi/' . $id . '/hqdefault.jpg';
    }

    echo
    '<section data-aos="fade-up" id="quemsomos" class="wrapper-full quemsomos">
            <article class="quemsomos__text">' . $quem_somos . '</article>

            <style>
                .quemsomos__video::before {
                    background-image: url(' . esc_url($capa_video) . ');
                }
            </style>
            <figure class="quemsomos__video">
                <iframe src="https://www.youtube.com/embed/' . $id . '?controls=0" title="Quem Somos" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </figure>';
    if (have_rows('quem_somos_boxes')) :
        echo '<div class="quemsomos__bar">';
        while (have_rows('quem_somos_boxes')) : the_row();
            $texto = get_sub_field('texto');
            $icone = get_sub_field('icone');

            echo
            '<div class="quemsomos__box">
                <article>' . $texto . '</article>
                <figure><img src="' . esc_url($icone) . '" title="Ícone" loading="lazy"></figure>
            </div>';
        endwhile;
        echo '</div>';
    endif;
    echo '</section>';
endif;
?>

<?php
    if( have_rows('fornecedores', 'option') ):
        echo
        '<section data-aos="fade-up" id="fornecedores" class="wrapper fornecedores"><h2>Parceiros</h2><div class="fornecedores__container">';
        while( have_rows('fornecedores', 'option') ) : the_row();
            $logo = get_sub_field('logo');
            $titulo = get_sub_field('fornecedor');
            $link = get_sub_field('link');
            $data = get_sub_field('data');
            
            echo '<figure><img src="' . esc_url($logo) . '" alt="'. $titulo . '" loading="lazy">' . ( $data == '' ? '' : '<span>Cliente desde ' . $data . '</span>' ) . '</figure>';
        endwhile;
        echo '</div></section>';
    endif;
?>

<section class="blog-latest">
    <h2 class="wrapper-full">Blog</h2>
    <?php
	$query_args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => '3',
		'order' => 'DESC',
		'orderby' => 'date',
	);

	$the_query = new WP_Query($query_args);
	if ($the_query->have_posts()) {
        echo '<div class="blog-latest__container">';

        while ($the_query->have_posts()) {
			$the_query->the_post();
            echo
            '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '" class="blog-latest__item">
                <article>
                <figure>' . get_the_post_thumbnail(get_the_ID(), 'full') . '</figure>
                <h3>' . get_the_title() . '</h3>
                <p>' . get_the_excerpt() . '</p>
                </article>
            </a>';
		}

        echo '</div>';
	}
	?>
    <a href="blog">Veja mais</a>
</section>
<?php
get_footer();