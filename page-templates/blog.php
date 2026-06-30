<?php

/**
 * Template Name: Blog
 * Template Post Type: page
 *
 * @package UAU
 * @since 1.0.0
 */

get_header();

?>
<section class="wrapper blog__header">
	<h1><?php echo get_the_title(); ?></h1>
	<form action="/" method="get">
		<input type="text" name="s" id="search" value="<?php echo get_search_query(); ?>" placeholder="Digite a notícia que procura" />
		<input type="image" alt="Search" src="<?php echo get_template_directory_uri(); ?>/assets/img/lupa.svg" />
	</form>
</section>
<section data-aos="fade-up" class="blog__highlight">
	<?php
	$query_args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => '3',
		'order' => 'DESC',
		'orderby' => 'date',
	);

	// The Query
	$the_query = new WP_Query($query_args);

	// The Loop
	if ($the_query->have_posts()) {
		$x = 0;

		while ($the_query->have_posts()) {
			$the_query->the_post();
          	$story = '';
			if(get_field('story')) {$story = '#story';}
			if ($x == 0) :
				echo
				'<a href="' . get_the_permalink() . $story . '" title="' . get_the_title() . '" class="blog__item">
					<article class="wrapper-left" style="background-image: url(' . get_the_post_thumbnail_url() . ')">
						<h2>' . get_the_title() . '</h2>
					</article>
				</a>';
			else :
				echo
				'<a href="' . get_the_permalink() . '" title="' . get_the_title() . '" class="blog__item">
						<article class="wrapper-right" style="background-image: url(' . get_the_post_thumbnail_url() . ')">
							<h2>' . get_the_title() . '</h2>
						</article>
					</a>';
			endif;
			$x++;
		}
	}
	?>
</section>
<section data-aos="fade-up" class="wrapper blog__list">
	<?php
	$query_args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => '-1',
		'order' => 'DESC',
		'orderby' => 'date',
	);

	$the_query = new WP_Query($query_args);

	if ($the_query->have_posts()) {
		$i = 0;
      	$story = '';
		if(get_field('story')) {$story = '#story';}

		while ($the_query->have_posts()) {
			$the_query->the_post();
			if ($i > 2) :
				echo
				'<a href="' . get_the_permalink() . $story . '" title="' . get_the_title() . '" class="blog__item" data-id="' . $i . '">
					<article>
						<figure>' . get_the_post_thumbnail(get_the_ID(), 'medium') . '</figure>
						<h2>' . get_the_title() . '</h2>
						<p>' . get_the_excerpt() . '</p>
					</article>
				</a>';
			endif;
			$i++;
		}
		wp_reset_postdata();
	}
	?>
</section>
<?php
get_footer();
