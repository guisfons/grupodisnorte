<?php
    $form = '[contact-form-7 id="11" title="Formulário de contato 1"]';
    $email = get_field('e-mail', 'option');
    $sinop = get_field('telefone_sinop', 'option');
    $cuiaba = get_field('telefone_cuiaba', 'option');
    $facebook = get_field('facebook', 'option');
    $instagram = get_field('instagram', 'option');
    $linkedin = get_field('linkedin', 'option');
    $whatsapp = get_field('whatsapp', 'option');

    if (do_shortcode($form) !== '') {
        echo
        '<section id="faleconosco" class="wrapper-left faleconosco">
            ' . do_shortcode($form) . '
            <div class="faleconosco__contato">
                <span><img src="'.esc_url(get_template_directory_uri()).'/assets/img/envelope.png" title="Email Disnorte" loading="lazy"><a href="mailto:'.$email.'">'.$email.'</a></span>
                <span><img src="'.esc_url(get_template_directory_uri()).'/assets/img/smartphone.png" title="Telefone Sinop" loading="lazy"><a href="tel:'.$sinop.'">Sinop '.$sinop.'</a></span>
                <span><img src="'.esc_url(get_template_directory_uri()).'/assets/img/smartphone.png" title="Telefone Cuiabá" loading="lazy"><a href="tel:'.$cuiaba.'">Cuiabá '.$cuiaba.'</a></span>
                <div class="faleconosco__redes">
                    <p>Ou através das Redes Sociais:</p>
                    <a href="'.esc_url($facebook).'" title="Facebook"><img src="'.esc_url(get_template_directory_uri()).'/assets/img/facebook.svg" alt-"Facebook" loading="lazy"></a>
                    <a href="'.esc_url($instagram).'" title="Instagram"><img src="'.esc_url(get_template_directory_uri()).'/assets/img/instagram.svg" alt-"Instagram" loading="lazy"></a>
                    <a href="'.esc_url($linkedin).'" title="Linkedin"><img src="'.esc_url(get_template_directory_uri().'/assets/img/linkedin.png') . '" alt="Linkedin" loading="lazy"></a>';
                    echo
                    '<button class="faleconosco__whatsapp">
                        <img src="' . esc_url(get_template_directory_uri() . '/assets/img/whatsapp.png') . '" alt="Whatsapp" loading="lazy">
                        <div class="faleconosco__options">';
                        if (get_field('whatsapp_regiao_norte', 'option')):
                            echo '<a target="_blank" title="Região Norte" href="'. esc_url(get_field('whatsapp_regiao_norte', 'option')) .'">Região Norte</a>';
                        endif;
                        if (get_field('whatsapp_regiao_sul', 'option')):
                            echo '<a target="_blank" title="Região Sul" href="'. esc_url(get_field('whatsapp_regiao_sul', 'option')) .'">Região Sul</a>';
                        endif;
                    echo '</div>
                    </button>
                </div>
            </div>
        </section>';
    }
?>