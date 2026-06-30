<?php
    /**
     * Template Name: Tela de manutenção
     * Template Post Type: page
     *
     * @package UAU
     * @since 1.0.0
     */

    get_header();
    wp_reset_postdata();
?>
	<main class="manutencao">
		<figure><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo-w.svg" alt="Logo Disnorte"></figure>
		<h2>Em manutenção</h2>
	</main>
<?php
    get_footer();