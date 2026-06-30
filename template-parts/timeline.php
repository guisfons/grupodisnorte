<?php
loadModulesCssForTemplate('timeline.css');
loadModulesScriptsForTemplate('timeline.js');
?>
<div class="container">
    <section class="full">
        <div class="timeline" id="timeline">
            <?php
            $x = 0;
            $timeline = get_field('timeline', get_the_ID());

            foreach ($timeline as $line) {
                echo '<div class="line">';
                echo '<h2>' . $line['ano'] . '</h2>';
                echo ' ' . $line['texto'];
                
                if (!empty($line['imagens'])) {
                    echo '<div class="line-images">';
                    foreach ((array) $line['imagens'] as $img) {
                        $img_id = is_array($img) ? ($img['ID'] ?? '') : $img;
                        if (is_numeric($img_id) && $img_id) {
                            echo '<figure>' . wp_get_attachment_image($img_id, 'full') . '</figure>';
                        } elseif (is_string($img_id) && filter_var($img_id, FILTER_VALIDATE_URL)) {
                            echo '<figure><img src="' . esc_url($img_id) . '" loading="lazy" alt="Imagem"></figure>';
                        }
                    }
                    echo '</div>';
                } elseif (!empty($line['imagem'])) {
                    $img_id = is_array($line['imagem']) ? ($line['imagem']['ID'] ?? '') : $line['imagem'];
                    if (is_numeric($img_id) && $img_id) {
                        echo '<figure>' . wp_get_attachment_image($img_id, 'full') . '</figure>';
                    } elseif (is_string($img_id) && filter_var($img_id, FILTER_VALIDATE_URL)) {
                        echo '<figure><img src="' . esc_url($img_id) . '" loading="lazy" alt="Imagem"></figure>';
                    }
                }
                
                echo '</div>';
                $x++;
            }
            ?>
        </div>
    </section>
    <div class="buttons">
        <button type="button" id="prev" class="controls"><</button>
        <button type="button" id="next" class="controls">></button>
    </div>
</div>