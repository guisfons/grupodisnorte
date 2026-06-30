<section class="wrapper-full regioes-atendidas">
    <h2>Atendimento</h2>
    <figure></figure>
    <div class="regioes-atendidas__container">
        <input type="hidden" name="arquivo-json" class="regioes-atendidas__arquivo" data-url="<?php echo get_field('arquivo', 'option'); ?>">
		<article><div class="regioes-atendidas__accordion"><input type="search" name="" id="" placeholder="Pesquise o nome da cidade"></div></article>
        <figure class="regioes-atendidas__mapa">
            <?php echo get_template_part('template-parts/mapa'); ?>
        </figure>
    </div>
</section>