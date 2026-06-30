<?php

/**
 * Template Name: Zippy
 * Template Post Type: page
 *
 * @package UAU
 * @since 1.0.0
 */

get_header();

// Se o tema usar o banner padrão
echo get_template_part('template-parts/banner');
?>

<style>
    main {
        background-color: #dadada;
    }

    .zippy-page {
        margin-top: 5rem;
    }

    .zippy-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 4rem 2rem;
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
    }

    /* Coluna de Textos Esquerda */

    .zippy-title {
        font-size: 13.3rem;
        text-transform: uppercase;
        color: #1c5684;
        font-weight: 800;
    }

    .zippy-subtitle {
        font-size: 6.2rem;
        line-height: 5.8rem;
        text-transform: uppercase;
        color: #356880;
        font-weight: 800;
    }

    .zippy-text {
        font-size: 1.7rem;
        line-height: 2.3rem;
        color: #252525;
        font-weight: bold;
    }

    .zippy-text--1 {
        max-width: 28.1rem;
        width: 100%;
        margin-top: 4rem;
    }

    /* Sessão "Por que um tatu" */
    .zippy-why-tatu {
        margin-top: 4rem;
        max-width: 42rem;
    }

    .zippy-why-tatu h2 {
        font-size: 4.2rem;
        line-height: 5.4rem;
        text-transform: uppercase;
        color: #356880;
        font-weight: 800;
        margin-bottom: 2rem;
    }

    .zippy-list,
    .zippy-list li {
        list-style-type: disc;
        list-style-position: inside;
        font-size: 1.7rem;
        letter-spacing: 0px;
        line-height: 2.3rem;
        color: #252525;
        text-align: left;
    }

    .zippy-list li:not(:last-of-type) {
        margin-bottom: 1rem;
    }

    /* Destaque final */
    .zippy-highlight {
        margin-top: 5rem;
    }

    .zippy-highlight p {
        text-align: center;
        font-size: 3.8rem;
        letter-spacing: 1px;
        line-height: 4.2rem;
        color: #252525;
        font-weight: bold;
        text-align: center;
    }

    .zippy-highlight strong {
        color: #1c5581;
        font-weight: 800;
    }

    .zippy-section-1 {
        position: relative;
        margin-bottom: 30rem;
    }

    .zippy-section-2 {
        position: relative;
        padding-bottom: 27rem;
    }

    /* Container de Imagens Flutuantes (Direita e composição) */
    .zippy-images {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }

    /* Classes para posicionamento das imagens do Zippy */
    .zippy-img {
        max-width: 100%;
        height: auto;
        position: relative;
    }

    .zippy-img-cart {
        width: 35%;
        display: flex;
        position: absolute;
        right: 0;
    }

    .zippy-img-guitar {
        position: absolute;
        left: 48%;
        top: 77%;
        transform: translate(-50%, -50%);
        width: 50rem;
    }

    .zippy-img-drink {
        position: absolute;
        top: -30%;
        left: -8rem;
        width: 30%;
        z-index: 3;
    }

    .zippy-img-drink img {
        width: 100%;
    }

    .zippy-img-thumbs {
        position: absolute;
        right: -19rem;
        bottom: -10rem;
        width: 120rem;
    }

    .regioes-atendidas,
    .faleconosco {
        display: none;
    }

    /* =============================================
       ANIMAÇÕES DE ENTRADA
       ============================================= */

    @keyframes zippy-fade-up {
        from { opacity: 0; }
        to   { opacity: 1; }
    }

    @keyframes zippy-fade-down {
        from { opacity: 0; }
        to   { opacity: 1; }
    }

    @keyframes zippy-fade-left {
        from { opacity: 0; }
        to   { opacity: 1; }
    }

    @keyframes zippy-fade-right {
        from { opacity: 0; }
        to   { opacity: 1; }
    }

    @keyframes zippy-zoom-in {
        from { opacity: 0; }
        to   { opacity: 1; }
    }

    /* Estado inicial — invisível até a animação disparar */
    [data-animate] {
        opacity: 0;
    }

    [data-animate].is-visible {
        animation-fill-mode: both;
        animation-timing-function: cubic-bezier(0.22, 1, 0.36, 1);
        animation-duration: 0.85s;
    }

    [data-animate="fade-up"].is-visible    { animation-name: zippy-fade-up; }
    [data-animate="fade-down"].is-visible  { animation-name: zippy-fade-down; }
    [data-animate="fade-left"].is-visible  { animation-name: zippy-fade-left; }
    [data-animate="fade-right"].is-visible { animation-name: zippy-fade-right; }
    [data-animate="zoom-in"].is-visible    { animation-name: zippy-zoom-in; }

    /* Delay helpers */
    [data-delay="100"].is-visible { animation-delay: 0.1s; }
    [data-delay="200"].is-visible { animation-delay: 0.2s; }
    [data-delay="300"].is-visible { animation-delay: 0.3s; }
    [data-delay="400"].is-visible { animation-delay: 0.4s; }
    [data-delay="500"].is-visible { animation-delay: 0.5s; }
    [data-delay="600"].is-visible { animation-delay: 0.6s; }

    /* =============================================
       RESPONSIVO — TABLET (≤ 1024px)
       ============================================= */

    @media (max-width: 1024px) {
        .zippy-title    { font-size: 9rem; }
        .zippy-subtitle { font-size: 4.4rem; line-height: 4.2rem; }
        .zippy-text--1  { max-width: 22rem; }

        .zippy-img-cart   { width: 44%; }
        .zippy-img-guitar { width: 42%; left: 44%; top: 72%; }
        .zippy-img-drink  { width: 36%; left: -4rem; top: -20%; }
        .zippy-img-thumbs { width: 90%; right: -18rem; }

        .zippy-section-1  { margin-bottom: 22rem; }
        .zippy-section-2  { padding-bottom: 20rem; }

        .zippy-why-tatu   { max-width: 36rem; }
        .zippy-highlight p { font-size: 3rem; line-height: 3.6rem; }
    }

    /* =============================================
       RESPONSIVO — MOBILE (≤ 768px)
       ============================================= */

    @media (max-width: 768px) {
        .zippy-page { margin-top: 2rem; }

        /* Section 1 — empilhar verticalmente */
        .zippy-section-1 {
            margin-bottom: 0;
            padding-bottom: 3rem;
        }

        .zippy-images {
            position: static;
            width: 100%;
            height: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
            margin-top: 3rem;
        }

        .zippy-img-cart,
        .zippy-img-guitar {
            position: static;
            width: 70%;
            transform: none;
        }

        /* Section 2 — empilhar verticalmente */
        .zippy-section-2 { padding-bottom: 3rem; }

        .zippy-img-drink,
        .zippy-img-thumbs {
            position: static;
            width: 70%;
            margin: 2rem auto 0;
            display: block;
            transform: none;
        }

        .zippy-img-drink  { left: unset; top: unset; }
        .zippy-img-thumbs { right: unset; bottom: unset; }

        .zippy-why-tatu {
            max-width: 100%;
            margin-top: 2rem;
        }

        /* Tipografia mobile */
        .zippy-title    { font-size: 6rem; }
        .zippy-subtitle { font-size: 3rem; line-height: 3.2rem; }

        .zippy-text,
        .zippy-list,
        .zippy-list li  { font-size: 1.5rem; line-height: 2.1rem; }

        .zippy-text--1  { max-width: 100%; }

        .zippy-why-tatu h2 { font-size: 3rem; line-height: 3.8rem; }

        .zippy-highlight p  { font-size: 2.6rem; line-height: 3.2rem; }
    }
</style>

<div class="zippy-page">
    <section class="zippy-section-1">
        <div class="wrapper zippy-content">
            <h1 class="zippy-title" data-animate="fade-right">ZIPPY</h1>
            <h2 class="zippy-subtitle" data-animate="fade-right" data-delay="200">Energia que move,<br>caminhos que<br>conectam</h2>

            <div class="zippy-text zippy-text--1" data-animate="fade-up" data-delay="400">
                <p>O Grupo Disnorte apresenta o Zippy, o mascote que representa, de forma leve e marcante, a essência
                    das nossas operações.</p>
                <p>Inspirado no tatu, um animal conhecido por sua resistência, agilidade e inteligência natural, o Zippy
                    traduz em imagem aquilo que vivemos todos os dias nas estradas: movimento, eficiência e construção
                    de caminhos.</p>
                <p>O próprio nome Zippy vem do inglês e remete à rapidez, energia e dinamismo, características que fazem
                    parte do DNA do Grupo Disnorte.</p>
            </div>
        </div>
        <div class="zippy-images">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/zippy-4.webp" alt="Zippy com Carrinho"
                class="zippy-img zippy-img-cart" data-animate="fade-down" data-delay="200">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/zippy-3.webp" alt="Zippy tocando Violão"
                class="zippy-img zippy-img-guitar" data-animate="zoom-in" data-delay="400">
        </div>
    </section>

    <section class="zippy-section-2">
        <article class="wrapper zippy-why-tatu">
            <h2 data-animate="fade-right">Por que um tatu?</h2>
            <div class="zippy-text" data-animate="fade-up" data-delay="200">
                <p>Na natureza, o tatu é um verdadeiro especialista em abrir caminhos. Com persistência e estratégia,
                    ele constrói rotas que garantem sua viabilidade e segurança.</p>
                <p><br></p>
                <p>Essa conexão com o nosso trabalho é direta. <br> Assim como o tatu:</p>
                <br>
            </div>
            <ul class="zippy-list" data-animate="fade-up" data-delay="300">
                <li>Criamos caminhos onde antes não havia</li>
                <li>Superamos desafios com resistência</li>
                <li>Operamos com agilidade e precisão</li>
                <li>Seguimos sempre em movimento</li>
            </ul>
        </article>

        <!-- Imagem inferior esquerda do Zippy bebendo -->
        <figure class="zippy-img zippy-img-drink" data-animate="fade-left" data-delay="300">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/zippy-2.webp" alt="Zippy tomando Yopro">
        </figure>

        <!-- Seção de Destaque Inferior -->
        <article class="zippy-highlight" data-animate="fade-up" data-delay="400">
            <p>O Zippy nasce <br> justamente dessa <br> identificação, <strong>um símbolo<br>que representa não <br> só
                    o que fazemos,<br>mas como fazemos.</strong></p>
        </article>

        <!-- Imagem gigante do Zippy fazendo joinha no canto direito -->
        <figure class="zippy-img zippy-img-thumbs" data-animate="fade-left" data-delay="200">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/zippy-1.webp" alt="Zippy Joinha">
        </figure>
    </section>
</div>

<script>
(function () {
    'use strict';

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('[data-animate]').forEach(function (el) {
        observer.observe(el);
    });
}());
</script>

<?php
get_footer();
