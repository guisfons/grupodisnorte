<?php

/**
 * Template Name: Trabalhe conosco
 * Template Post Type: page
 *
 * @package UAU
 * @since 1.0.0
 */

get_header();
echo get_template_part('template-parts/banner');
?>
<style>
.banner figure { background-position: center 20%; }
@media(max-width: 900px) {
  .banner article { bottom: 3rem; }
}
.trabalhe-conosco--section {
    padding-top: 10rem !important;
    padding-bottom: 10rem !important;
    gap: 5rem;
}
.trabalhe-conosco--section > article {
  	max-width: 100%;
    color: #fff;
}
.trabalhe-conosco--section > article p {
    color: #fff;
}
.trabalhe-conosco--section > article a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: fit-content;
    border-radius: 2.2rem;
    background-color: rgba(255, 255, 255, 0.5);
    padding: 1rem 3rem;
    margin-top: 2.5rem;
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 700;
}
</style>
<section class="wrapper-full trabalhe-conosco--section">
	<article><?php the_content(); ?></article>
    <!-- <?php
    $query_args = array(
        'post_type' => 'vagas',
        'post_status' => 'publish',
        'posts_per_page' => '-1',
        'order' => 'DESC',
        'orderby' => 'date',
    );

    $the_query = new WP_Query($query_args);

    if ($the_query->have_posts()) {
    ?>
        <div class="trabalhe-conosco__vagas">
            <h2>Veja nossas vagas</h2>

            <div class="trabalhe-conosco__box">
                <?php
                $i = 1;
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    echo
                    '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '" class="blog__item" data-id="' . $i . '">
                    <article>
                        <h3>'. get_the_title() . '</h3>
                        <p>' . get_the_excerpt() . '</p>
                    </article>
                </a>';
                    $i++;
                }
                ?>
            </div>
        </div>
    <?php
        wp_reset_postdata();
    }
    ?> -->
</section>
<?php
get_footer();
