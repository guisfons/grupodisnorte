<?php
    get_template_part('template-parts/regioes-atendidas');
    get_template_part('template-parts/fale-conosco');
    
    if(is_front_page()):
        get_template_part('template-parts/trabalhe-conosco');
    endif;
?>

</main>
<footer class="footer">
    <figure class="footer__logo"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo-w.svg'); ?>" alt="Disnorte" loading="lazy"></figure>
</footer>
<?php
    wp_footer();
?>
</body>
</html>