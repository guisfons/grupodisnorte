<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    wp_head();

    global $current_user;
    wp_get_current_user();
    ?>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <meta name="msapplication-TileColor" content="#336980">
    <meta name="theme-color" content="#ffffff">
    <!-- Gerador de Favicon -->
    <!-- https://realfavicongenerator.net/ -->

    <title><?php echo get_bloginfo('name') . ' | ' . get_the_title() ?></title>
</head>

<body <?php body_class($post->post_name ?? ''); ?>>
    <div class="wrapper hidden"></div>
    <header class="header">
        <div class="header__top">
            <<?php echo (is_front_page()) ? 'h1' : 'span'; ?> class="header__logo" style="max-width: 25rem;"><a href="<?php echo get_home_url(); ?>"><?php echo get_the_title(); ?> <img src="<?php echo esc_url(get_field('logo', 'option')); ?>" alt="<?php echo get_the_title(); ?>" loading="lazy"></a></<?php echo (is_front_page()) ? 'h1' : 'span'; ?>>
            <figure class="header__slogan">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/slogan.webp'); ?>" alt="Slogan" loading="lazy" class="header__slogan-slogan">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/ziggy-logo.webp'); ?>" alt="Ziggy" loading="lazy" class="header__slogan-ziggy">
            </figure>
        </div>
        <div class="wrapper-full header__bottom">
            <nav class="header__menu">
                <?php
                $header_menu = wp_get_nav_menu_items("Menu Header");
                foreach ($header_menu as $key => $menu_item) {
                    echo '<a title="' . str_replace('*', '', $menu_item->title) . '" href="' . $menu_item->url . '" class="header__item ' . (get_the_ID() == $menu_item->object_id ? 'is-current active' : '') . '" target="' . $menu_item->target . '">';
                    $menu_title = $menu_item->title;

                    if (strpos($menu_item->title, '*') !== false) {
                        $menu_title = str_replace('*', '', $menu_item->title);
                    }

                    echo $menu_title;
                    echo '</a>';
                }
                ?>
            </nav>
            <div class="header__social">
                <?php
                $facebook = get_field('facebook', 'option');
				$youtube = get_field('youtube', 'option');				
                $instagram = get_field('instagram', 'option');
                $linkedin = get_field('linkedin', 'option');
                $whatsapp = get_field('whatsapp', 'option');
                if ($facebook) {
                    echo '<a href="' . esc_url($facebook) . '"target="_blank" title="Facebook"><img src="' . esc_url(get_template_directory_uri() . '/assets/img/facebook.svg') . '" alt="Facebook" loading="lazy"></a>';
                }
				if ($youtube) {
                    echo '<a href="' . esc_url($youtube) . '" target="_blank" title="Youtube"><img src="https://disnorteagil.com.br/wp-content/uploads/2023/05/youtube.png" alt="Youtube" loading="lazy"></a>';
                }
                if ($instagram) {
                    echo '<a href="' . esc_url($instagram) . '"target="_blank" title="Instagram"><img src="' . esc_url(get_template_directory_uri() . '/assets/img/instagram.svg') . '" alt="Instagram" loading="lazy"></a>';
                }

                if ($linkedin) {
                    echo '<a href="' . esc_url($linkedin) . '"target="_blank" title="Linkedin"><img src="' . esc_url(get_template_directory_uri() . '/assets/img/linkedin.png') . '" alt="Linkedin" loading="lazy"></a>';
                }
				
				if ($whatsapp) {
                    echo
                    '<button class="header__whatsapp">
                        <img src="' . esc_url(get_template_directory_uri() . '/assets/img/whatsapp.png') . '" alt="Whatsapp" loading="lazy">
                        <div class="header__options">';
                        if (get_field('whatsapp_regiao_norte', 'option')):
                            echo '<a target="_blank" title="Região Norte" href="'. esc_url(get_field('whatsapp_regiao_norte', 'option')) .'">Região Norte</a>';
                        endif;
                        if (get_field('whatsapp_regiao_sul', 'option')):
                            echo '<a target="_blank" title="Região Sul" href="'. esc_url(get_field('whatsapp_regiao_sul', 'option')) .'">Região Sul</a>';
                        endif;
                    echo '</div>
                    </button>';
                }
                ?>
            </div>

            <div class="header__mobile">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>

    <main>