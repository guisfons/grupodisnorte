<?php get_header(); ?>
<section class="wrapper">

    <?php
    $s = get_search_query();
    $args = array(
        's' => $s
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        _e("<h2 style='font-weight:bold;color:#000'>Resultados para: " . get_query_var('s') . "</h2>");
        while ($the_query->have_posts()) {
            $the_query->the_post();
    ?>
            <a href="<?php echo get_the_permalink(); ?>" class="search__item">
                <figure><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" loading="lazy"></figure>
                <?php echo get_the_title(); ?>
            </a>
        <?php
        }
    } else {
        ?>
        <h2 style='font-weight:bold;color:#000'>Nada encontrado</h2>
        <div class="alert alert-info">
            <p>Desculpe, mas nada corresponde aos seus critérios de busca. Por favor, tente novamente com algumas palavras-chave diferentes.</p>
        </div>
    <?php } ?>
</section>
<?php get_footer(); ?>