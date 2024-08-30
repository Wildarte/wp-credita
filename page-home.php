<?php get_header();
//Template Name: Home
?>

<main>

        <section class="hero bg-main">

            <div class="container d-flex content-min">
                <div class="f-50 left_hero">
                    <h2 class="title-main color-white">YOUR TRUSTED REAL ESTATE PARTNER</h2>
                    <p class="text-default color-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore corrupti delectus possimus natus. Culpa autem, numquam repudiandae, in excepturi iste nemo praesentium accusantium enim quasi ex ut fugit non odit.</p>
                    
                    <div class="d-flex">
                        <a class="btn-default btn-hover-grow" href="">Entrar em Contato</a>
                    </div>

                </div>
                <div class="f-50 right_hero">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/header-Hero-2.png" alt="">
                </div>
            </div>

            <div class="container content_form_search">
                <form action="<?= home_url() ?>" class="form_search" method="get">
                    <input type="hidden" name="s" value="null">
                    <div class="col_form_search">
                        <label for="">Categoria</label>
                        <select name="categoria" id="">
                        <option value="null">Selecione uma categoria</option>
                        <?php
                        // Recupera todas as categorias
                        $categories = get_categories();

                        // Loop através de cada categoria e cria uma opção no select
                        foreach ($categories as $category) {
                            echo '<option value="' . $category->term_id . '">' . $category->name . '</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <style>
                        .select2-container .select2-selection--single{
                            height: auto;
                            padding: 8px;
                        }
                        .select2-container--default .select2-selection--single .select2-selection__arrow{
                            top: 10px
                        }
                    </style>
                    <div class="col_form_search">
                        <label for="">Cidade</label>
                            <?php

                                global $wpdb;

                                $meta_key = 'cidade';
                                $results = $wpdb->get_col($wpdb->prepare("
                                    SELECT DISTINCT meta_value 
                                    FROM $wpdb->postmeta 
                                    WHERE meta_key = %s 
                                    ORDER BY meta_value ASC
                                ", $meta_key));

                                if ($results) {
                                        echo '<select name="cidade" id="cidade">';
                                        echo '<option value="">Selecione uma cidade</option>';
                                        foreach ($results as $value) {
                                            echo '<option value="' . esc_attr($value) . '">' . esc_html($value) . '</option>';
                                        }
                                        echo '</select>';
                                }

                            ?>
                    </div>
                    <div class="col_form_search">
                        <label for="">Tipo</label>
                        <select name="tipo" id="">
                            <option value="null">Seleciona uma opção</option>
                            <option value="venda">Comprar</option>
                            <option value="aluguel">Alugar</option>
                        </select>
                    </div>
                    <div class="col_form_search d-flex">
                        <label for=""></label>
                        <button class="btn-default w-100 btn_search_form btn-hover-main" type="submit">Procurar</button>
                    </div>
                </form>
            </div>
            
        </section>

        <section class="section_imo">

            <div class="container content_imo d-flex">
                <div class="f-33">
                    <div class="card">
                        <div class="icon_card">
                            <img src="<?= get_template_directory_uri() ?>/assets/img/home.png" alt="">
                        </div>
                        <h3>Divulgar Imóvel</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repudiandae at animi repellendus?</p>
                        <a href="">Saiba Mais</a>
                    </div>
                </div>
                <div class="f-33">
                    <div class="card">
                        <div class="icon_card">
                            <img src="<?= get_template_directory_uri() ?>/assets/img/home.png" alt="">
                        </div>
                        <h3>Vender Imóvel</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repudiandae at animi repellendus?</p>
                        <a href="">Saiba Mais</a>
                    </div>
                </div>
                <div class="f-33">
                    <div class="card">
                        <div class="icon_card">
                            <img src="<?= get_template_directory_uri() ?>/assets/img/home.png" alt="">
                        </div>
                        <h3>Alugar Imóvel</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto repudiandae at animi repellendus?</p>
                        <a href="">Saiba Mais</a>
                    </div>
                </div>
            </div>

            <div class="container content-min bg-white melhor_escolha p-10">
                <div class="over_melhor_escolha">
                    <header class="head-default">
                        <h2>Melhores escolhas</h2>
                    </header>
    
                    <section class="d-flex">
                    <?php 

                        $args_b = [
                            'p' => 'post',
                            'posts_per_page' => 3
                        ];

                        $response_b = new WP_Query($args_b);

                        if($response_b->have_posts()):
                            while($response_b->have_posts()):
                                $response_b->the_post();

                    ?>
                        <div class="f-33">
                            <div class="card_imovel">
                                <a href="<?= get_the_permalink() ?>">
                                    <img src="<?= get_the_post_thumbnail_url(null, 'medium') ?>" alt="">

                                    <div class="content_card_imovel">
                                        <h3><?= get_the_title() ?></h3>
                                        <?php
                                            $local_m = get_post_meta(get_the_ID(), 'local', true);
                                            $preco_m = get_post_meta(get_the_ID(), 'preco', true);
                                            $quartos_m = get_post_meta(get_the_ID(), 'quartos', true);
                                            $banheiros_m = get_post_meta(get_the_ID(), 'banheiros', true);
                                            $tamanho_m = get_post_meta(get_the_ID(), 'tamanho_m', true);
                                        ?>
                                        <p><?= $local_m ?></p>
                                        <p class="price">R$ <?= $preco_m ?></p>

                                        <div class="info_card_imovel">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" zoomAndPan="magnify" viewBox="0 0 75 74.999997" height="100" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="dca052ed77"><path d="M 1.261719 13.355469 L 74 13.355469 L 74 61.355469 L 1.261719 61.355469 Z M 1.261719 13.355469 " clip-rule="nonzero"/></clipPath></defs><rect x="-7.5" width="90" fill="#ffffff" y="-7.5" height="89.999996" fill-opacity="1"/><rect x="-7.5" width="90" fill="#ffffff" y="-7.5" height="89.999996" fill-opacity="1"/><g clip-path="url(#dca052ed77)"><path fill="#000000" d="M 69.140625 35.074219 L 69.140625 19.355469 C 69.140625 18.960938 69.101562 18.570312 69.023438 18.1875 C 68.945312 17.800781 68.832031 17.425781 68.679688 17.0625 C 68.527344 16.695312 68.339844 16.351562 68.117188 16.023438 C 67.898438 15.695312 67.644531 15.394531 67.363281 15.117188 C 67.082031 14.835938 66.777344 14.589844 66.445312 14.371094 C 66.117188 14.152344 65.765625 13.964844 65.398438 13.816406 C 65.03125 13.664062 64.652344 13.550781 64.265625 13.472656 C 63.875 13.394531 63.480469 13.355469 63.082031 13.355469 L 12.191406 13.355469 C 11.792969 13.355469 11.398438 13.394531 11.007812 13.472656 C 10.617188 13.550781 10.238281 13.664062 9.871094 13.816406 C 9.503906 13.964844 9.15625 14.152344 8.824219 14.371094 C 8.496094 14.589844 8.191406 14.835938 7.910156 15.117188 C 7.628906 15.394531 7.375 15.695312 7.15625 16.023438 C 6.933594 16.351562 6.746094 16.695312 6.59375 17.0625 C 6.441406 17.425781 6.328125 17.800781 6.25 18.1875 C 6.171875 18.570312 6.132812 18.960938 6.132812 19.355469 L 6.132812 35.074219 C 5.449219 35.214844 4.808594 35.464844 4.210938 35.820312 C 3.613281 36.179688 3.09375 36.625 2.652344 37.164062 C 2.210938 37.699219 1.871094 38.292969 1.636719 38.941406 C 1.402344 39.59375 1.285156 40.265625 1.285156 40.957031 L 1.285156 60.15625 C 1.285156 60.316406 1.316406 60.46875 1.378906 60.613281 C 1.4375 60.761719 1.527344 60.890625 1.640625 61.003906 C 1.753906 61.117188 1.882812 61.203125 2.03125 61.265625 C 2.179688 61.324219 2.335938 61.355469 2.496094 61.355469 C 2.65625 61.355469 2.8125 61.324219 2.960938 61.265625 C 3.109375 61.203125 3.238281 61.117188 3.351562 61.003906 C 3.46875 60.890625 3.554688 60.761719 3.617188 60.613281 C 3.675781 60.46875 3.707031 60.316406 3.707031 60.15625 L 3.707031 56.554688 L 71.5625 56.554688 L 71.5625 60.15625 C 71.5625 60.316406 71.59375 60.46875 71.65625 60.613281 C 71.71875 60.761719 71.804688 60.890625 71.917969 61.003906 C 72.03125 61.117188 72.164062 61.203125 72.3125 61.265625 C 72.460938 61.324219 72.617188 61.355469 72.777344 61.355469 C 72.9375 61.355469 73.089844 61.324219 73.238281 61.265625 C 73.386719 61.203125 73.519531 61.117188 73.632812 61.003906 C 73.746094 60.890625 73.835938 60.761719 73.894531 60.613281 C 73.957031 60.46875 73.988281 60.316406 73.988281 60.15625 L 73.988281 40.957031 C 73.988281 40.265625 73.867188 39.59375 73.632812 38.941406 C 73.398438 38.292969 73.0625 37.699219 72.621094 37.164062 C 72.179688 36.625 71.660156 36.179688 71.0625 35.820312 C 70.464844 35.464844 69.824219 35.214844 69.140625 35.074219 Z M 8.554688 19.355469 C 8.554688 18.878906 8.648438 18.417969 8.832031 17.976562 C 9.015625 17.539062 9.277344 17.148438 9.621094 16.808594 C 9.960938 16.472656 10.355469 16.210938 10.800781 16.03125 C 11.246094 15.847656 11.707031 15.757812 12.191406 15.757812 L 63.082031 15.757812 C 63.5625 15.757812 64.027344 15.847656 64.472656 16.03125 C 64.917969 16.210938 65.3125 16.472656 65.652344 16.808594 C 65.992188 17.148438 66.257812 17.539062 66.441406 17.976562 C 66.625 18.417969 66.71875 18.878906 66.71875 19.355469 L 66.71875 34.957031 L 63.082031 34.957031 L 63.082031 27.757812 C 63.082031 27.441406 63.050781 27.128906 62.988281 26.820312 C 62.925781 26.511719 62.835938 26.210938 62.714844 25.917969 C 62.589844 25.628906 62.441406 25.351562 62.265625 25.089844 C 62.089844 24.828125 61.886719 24.585938 61.664062 24.363281 C 61.4375 24.140625 61.191406 23.941406 60.929688 23.765625 C 60.664062 23.589844 60.382812 23.441406 60.089844 23.320312 C 59.796875 23.199219 59.492188 23.109375 59.179688 23.046875 C 58.867188 22.988281 58.554688 22.957031 58.234375 22.957031 L 43.695312 22.957031 C 43.375 22.957031 43.0625 22.988281 42.75 23.046875 C 42.4375 23.109375 42.132812 23.199219 41.839844 23.320312 C 41.546875 23.441406 41.265625 23.589844 41.003906 23.765625 C 40.738281 23.941406 40.492188 24.140625 40.269531 24.363281 C 40.042969 24.585938 39.839844 24.828125 39.664062 25.089844 C 39.488281 25.351562 39.339844 25.628906 39.21875 25.917969 C 39.09375 26.210938 39.003906 26.511719 38.941406 26.820312 C 38.878906 27.128906 38.847656 27.441406 38.847656 27.757812 L 38.847656 34.957031 L 36.425781 34.957031 L 36.425781 27.757812 C 36.425781 27.441406 36.394531 27.128906 36.332031 26.820312 C 36.269531 26.511719 36.175781 26.210938 36.054688 25.917969 C 35.933594 25.628906 35.785156 25.351562 35.609375 25.089844 C 35.429688 24.828125 35.230469 24.585938 35.003906 24.363281 C 34.78125 24.140625 34.535156 23.941406 34.269531 23.765625 C 34.007812 23.589844 33.726562 23.441406 33.433594 23.320312 C 33.136719 23.199219 32.835938 23.109375 32.523438 23.046875 C 32.210938 22.988281 31.894531 22.957031 31.578125 22.957031 L 17.039062 22.957031 C 16.71875 22.957031 16.402344 22.988281 16.089844 23.046875 C 15.78125 23.109375 15.476562 23.199219 15.183594 23.320312 C 14.886719 23.441406 14.609375 23.589844 14.34375 23.765625 C 14.078125 23.941406 13.835938 24.140625 13.609375 24.363281 C 13.386719 24.585938 13.183594 24.828125 13.007812 25.089844 C 12.832031 25.351562 12.679688 25.628906 12.558594 25.917969 C 12.4375 26.210938 12.34375 26.511719 12.285156 26.820312 C 12.222656 27.128906 12.191406 27.441406 12.191406 27.757812 L 12.191406 34.957031 L 8.554688 34.957031 Z M 60.660156 34.957031 L 41.269531 34.957031 L 41.269531 27.757812 C 41.269531 27.4375 41.332031 27.132812 41.457031 26.835938 C 41.578125 26.542969 41.753906 26.285156 41.980469 26.058594 C 42.207031 25.832031 42.46875 25.660156 42.765625 25.539062 C 43.0625 25.417969 43.375 25.355469 43.695312 25.355469 L 58.234375 25.355469 C 58.558594 25.355469 58.867188 25.417969 59.164062 25.539062 C 59.460938 25.660156 59.722656 25.832031 59.949219 26.058594 C 60.175781 26.285156 60.351562 26.542969 60.472656 26.835938 C 60.597656 27.132812 60.660156 27.4375 60.660156 27.757812 Z M 34 34.957031 L 14.613281 34.957031 L 14.613281 27.757812 C 14.613281 27.4375 14.675781 27.132812 14.796875 26.835938 C 14.921875 26.542969 15.097656 26.285156 15.324219 26.058594 C 15.550781 25.832031 15.8125 25.660156 16.109375 25.539062 C 16.40625 25.417969 16.714844 25.355469 17.039062 25.355469 L 31.578125 25.355469 C 31.898438 25.355469 32.207031 25.417969 32.503906 25.539062 C 32.800781 25.660156 33.0625 25.832031 33.292969 26.058594 C 33.519531 26.285156 33.695312 26.542969 33.816406 26.835938 C 33.941406 27.132812 34 27.4375 34 27.757812 Z M 7.34375 37.355469 L 67.929688 37.355469 C 68.410156 37.355469 68.875 37.449219 69.320312 37.628906 C 69.765625 37.8125 70.160156 38.074219 70.5 38.410156 C 70.839844 38.746094 71.101562 39.136719 71.289062 39.578125 C 71.472656 40.019531 71.5625 40.480469 71.5625 40.957031 L 71.5625 49.355469 L 3.707031 49.355469 L 3.707031 40.957031 C 3.707031 40.480469 3.800781 40.019531 3.984375 39.578125 C 4.167969 39.136719 4.433594 38.746094 4.773438 38.410156 C 5.113281 38.074219 5.507812 37.8125 5.953125 37.628906 C 6.398438 37.449219 6.863281 37.355469 7.34375 37.355469 Z M 3.707031 51.757812 L 71.5625 51.757812 L 71.5625 54.15625 L 3.707031 54.15625 Z M 3.707031 51.757812 " fill-opacity="1" fill-rule="nonzero"/></g></svg>
                                                <span><?= $quartos_m ?></span>
                                            </div>
            
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" zoomAndPan="magnify" viewBox="0 0 75 74.999997" height="100" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="27b7107111"><path d="M 1.925781 37 L 73.175781 37 L 73.175781 47 L 1.925781 47 Z M 1.925781 37 " clip-rule="nonzero"/></clipPath><clipPath id="22cbcac784"><path d="M 16 63 L 23 63 L 23 72.601562 L 16 72.601562 Z M 16 63 " clip-rule="nonzero"/></clipPath><clipPath id="dda1cea4fc"><path d="M 52 63 L 59 63 L 59 72.601562 L 52 72.601562 Z M 52 63 " clip-rule="nonzero"/></clipPath><clipPath id="30fef6731f"><path d="M 52 2.101562 L 68 2.101562 L 68 41 L 52 41 Z M 52 2.101562 " clip-rule="nonzero"/></clipPath></defs><rect x="-7.5" width="90" fill="#ffffff" y="-7.5" height="89.999996" fill-opacity="1"/><rect x="-7.5" width="90" fill="#ffffff" y="-7.5" height="89.999996" fill-opacity="1"/><g clip-path="url(#27b7107111)"><path fill="#000000" d="M 68.679688 37.210938 L 6.417969 37.210938 C 3.964844 37.210938 1.96875 39.195312 1.96875 41.636719 C 1.96875 44.074219 3.964844 46.058594 6.417969 46.058594 L 68.679688 46.058594 C 71.132812 46.058594 73.128906 44.074219 73.128906 41.636719 C 73.128906 39.195312 71.132812 37.210938 68.679688 37.210938 Z M 68.679688 43.109375 L 6.417969 43.109375 C 5.601562 43.109375 4.933594 42.449219 4.933594 41.636719 C 4.933594 40.820312 5.601562 40.160156 6.417969 40.160156 L 68.679688 40.160156 C 69.496094 40.160156 70.164062 40.820312 70.164062 41.636719 C 70.164062 42.449219 69.496094 43.109375 68.679688 43.109375 Z M 68.679688 43.109375 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#000000" d="M 69.089844 43.164062 C 68.289062 42.945312 67.480469 43.394531 67.257812 44.179688 L 63.171875 58.402344 C 62.269531 61.546875 59.335938 63.746094 56.042969 63.746094 L 19.058594 63.746094 C 15.765625 63.746094 12.835938 61.546875 11.929688 58.402344 L 7.84375 44.179688 C 7.621094 43.394531 6.8125 42.945312 6.011719 43.164062 C 5.222656 43.386719 4.769531 44.203125 4.996094 44.988281 L 9.082031 59.210938 C 10.347656 63.617188 14.445312 66.695312 19.058594 66.695312 L 56.042969 66.695312 C 60.652344 66.695312 64.753906 63.617188 66.023438 59.210938 L 70.105469 44.988281 C 70.332031 44.207031 69.878906 43.390625 69.089844 43.164062 Z M 69.089844 43.164062 " fill-opacity="1" fill-rule="nonzero"/><path fill="#000000" d="M 19.058594 57.851562 C 18.398438 57.851562 17.816406 57.410156 17.628906 56.78125 L 15.707031 50.078125 C 15.484375 49.296875 14.667969 48.839844 13.875 49.066406 C 13.089844 49.289062 12.632812 50.101562 12.859375 50.886719 L 14.78125 57.589844 C 15.320312 59.480469 17.082031 60.796875 19.058594 60.796875 C 19.875 60.796875 20.539062 60.140625 20.539062 59.328125 C 20.539062 58.515625 19.875 57.851562 19.058594 57.851562 Z M 19.058594 57.851562 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#22cbcac784)"><path fill="#000000" d="M 21.902344 63.898438 C 21.171875 63.542969 20.285156 63.828125 19.914062 64.5625 L 16.949219 70.457031 C 16.585938 71.183594 16.882812 72.070312 17.613281 72.4375 C 17.828125 72.542969 18.054688 72.589844 18.277344 72.589844 C 18.820312 72.589844 19.34375 72.292969 19.601562 71.773438 L 22.566406 65.878906 C 22.933594 65.152344 22.636719 64.265625 21.902344 63.898438 Z M 21.902344 63.898438 " fill-opacity="1" fill-rule="nonzero"/></g><g clip-path="url(#dda1cea4fc)"><path fill="#000000" d="M 58.148438 70.460938 L 55.183594 64.5625 C 54.816406 63.832031 53.929688 63.539062 53.195312 63.902344 C 52.464844 64.269531 52.167969 65.152344 52.53125 65.882812 L 55.496094 71.777344 C 55.757812 72.292969 56.277344 72.589844 56.820312 72.589844 C 57.042969 72.589844 57.269531 72.542969 57.484375 72.4375 C 58.21875 72.074219 58.515625 71.1875 58.148438 70.460938 Z M 58.148438 70.460938 " fill-opacity="1" fill-rule="nonzero"/></g><g clip-path="url(#30fef6731f)"><path fill="#000000" d="M 61.519531 2.09375 C 60.007812 2.09375 58.585938 2.683594 57.515625 3.746094 L 52.808594 8.425781 C 52.230469 9 52.230469 9.933594 52.808594 10.511719 C 53.386719 11.085938 54.328125 11.085938 54.90625 10.511719 L 59.613281 5.832031 C 60.117188 5.328125 60.796875 5.046875 61.535156 5.046875 C 63.023438 5.046875 64.234375 6.25 64.234375 7.730469 L 64.234375 38.6875 C 64.234375 39.5 64.898438 40.160156 65.714844 40.160156 C 66.535156 40.160156 67.199219 39.5 67.203125 38.683594 L 67.203125 7.726562 C 67.203125 4.621094 64.664062 2.09375 61.519531 2.09375 Z M 61.519531 2.09375 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#000000" d="M 56.390625 9.902344 L 53.425781 6.953125 C 53.085938 6.613281 52.613281 6.460938 52.136719 6.542969 L 44.726562 7.75 C 44.179688 7.835938 43.730469 8.21875 43.558594 8.742188 C 43.382812 9.261719 43.515625 9.835938 43.902344 10.230469 L 52.796875 19.339844 C 53.074219 19.632812 53.460938 19.789062 53.855469 19.789062 C 53.996094 19.789062 54.136719 19.769531 54.28125 19.730469 C 54.808594 19.574219 55.207031 19.140625 55.316406 18.605469 L 56.796875 11.234375 C 56.894531 10.75 56.742188 10.25 56.390625 9.902344 Z M 52.953125 15.273438 L 48 10.199219 L 51.863281 9.570312 L 53.730469 11.425781 Z M 52.953125 15.273438 " fill-opacity="1" fill-rule="nonzero"/><path fill="#000000" d="M 37.113281 19.957031 C 36.535156 19.382812 35.597656 19.382812 35.019531 19.957031 L 32.054688 22.902344 C 31.476562 23.480469 31.476562 24.414062 32.054688 24.988281 C 32.34375 25.273438 32.722656 25.417969 33.101562 25.417969 C 33.480469 25.417969 33.863281 25.273438 34.148438 24.988281 L 37.113281 22.039062 C 37.691406 21.464844 37.691406 20.53125 37.113281 19.957031 Z M 37.113281 19.957031 " fill-opacity="1" fill-rule="nonzero"/><path fill="#000000" d="M 43.042969 25.851562 C 42.464844 25.277344 41.527344 25.277344 40.949219 25.851562 L 37.984375 28.800781 C 37.40625 29.375 37.40625 30.308594 37.984375 30.886719 C 38.273438 31.171875 38.652344 31.316406 39.03125 31.316406 C 39.410156 31.316406 39.792969 31.171875 40.078125 30.886719 L 43.042969 27.9375 C 43.621094 27.363281 43.621094 26.425781 43.042969 25.851562 Z M 43.042969 25.851562 " fill-opacity="1" fill-rule="nonzero"/><path fill="#000000" d="M 46.007812 17.007812 C 45.429688 16.433594 44.492188 16.433594 43.914062 17.007812 L 40.949219 19.957031 C 40.371094 20.53125 40.371094 21.464844 40.949219 22.039062 C 41.238281 22.328125 41.617188 22.472656 41.996094 22.472656 C 42.375 22.472656 42.757812 22.328125 43.042969 22.039062 L 46.007812 19.09375 C 46.585938 18.515625 46.585938 17.582031 46.007812 17.007812 Z M 46.007812 17.007812 " fill-opacity="1" fill-rule="nonzero"/></svg>
                                                <span><?= $banheiros_m ?></span>
                                            </div>
            
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" zoomAndPan="magnify" viewBox="0 0 75 74.999997" height="100" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="22c106239f"><path d="M 2.910156 2.878906 L 71.910156 2.878906 L 71.910156 71.878906 L 2.910156 71.878906 Z M 2.910156 2.878906 " clip-rule="nonzero"/></clipPath></defs><rect x="-7.5" width="90" fill="#ffffff" y="-7.5" height="89.999996" fill-opacity="1"/><rect x="-7.5" width="90" fill="#ffffff" y="-7.5" height="89.999996" fill-opacity="1"/><g clip-path="url(#22c106239f)"><path fill="#000000" d="M 4.554688 71.824219 L 70.296875 71.824219 C 71.207031 71.824219 71.9375 71.085938 71.9375 70.183594 L 71.9375 4.492188 C 71.9375 3.582031 71.199219 2.851562 70.296875 2.851562 L 4.554688 2.851562 C 3.644531 2.851562 2.914062 3.589844 2.914062 4.492188 L 2.914062 70.175781 C 2.914062 71.085938 3.652344 71.816406 4.554688 71.816406 Z M 6.199219 6.140625 L 68.652344 6.140625 L 68.652344 68.542969 L 6.199219 68.542969 Z M 6.199219 6.140625 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#000000" d="M 25.921875 11.0625 C 25.921875 10.152344 25.183594 9.421875 24.28125 9.421875 L 11.132812 9.421875 C 10.917969 9.421875 10.703125 9.464844 10.503906 9.546875 C 10.316406 9.621094 10.152344 9.738281 10.007812 9.875 C 9.992188 9.890625 9.980469 9.890625 9.972656 9.902344 C 9.949219 9.925781 9.945312 9.945312 9.929688 9.964844 C 9.804688 10.105469 9.695312 10.253906 9.621094 10.433594 C 9.539062 10.636719 9.488281 10.855469 9.496094 11.070312 L 9.496094 24.199219 C 9.496094 25.109375 10.234375 25.839844 11.136719 25.839844 C 12.042969 25.839844 12.78125 25.101562 12.78125 24.199219 L 12.78125 15.027344 L 23.121094 25.359375 C 23.445312 25.683594 23.859375 25.839844 24.28125 25.839844 C 24.699219 25.839844 25.121094 25.683594 25.4375 25.359375 C 26.082031 24.71875 26.082031 23.675781 25.4375 23.035156 L 15.097656 12.703125 L 24.28125 12.703125 C 25.191406 12.703125 25.921875 11.964844 25.921875 11.0625 Z M 25.921875 11.0625 " fill-opacity="1" fill-rule="nonzero"/><path fill="#000000" d="M 63.722656 48.835938 C 62.8125 48.835938 62.078125 49.574219 62.078125 50.476562 L 62.078125 59.652344 L 51.738281 49.320312 C 51.097656 48.679688 50.054688 48.679688 49.414062 49.320312 C 48.773438 49.960938 48.773438 51 49.414062 51.640625 L 59.753906 61.976562 L 50.570312 61.976562 C 49.660156 61.976562 48.929688 62.710938 48.929688 63.617188 C 48.929688 64.519531 49.667969 65.253906 50.570312 65.253906 L 63.722656 65.253906 C 63.933594 65.253906 64.148438 65.214844 64.347656 65.132812 C 64.535156 65.054688 64.703125 64.9375 64.847656 64.800781 C 64.859375 64.785156 64.875 64.785156 64.878906 64.773438 C 64.902344 64.753906 64.90625 64.730469 64.921875 64.710938 C 65.046875 64.574219 65.15625 64.421875 65.230469 64.242188 C 65.316406 64.042969 65.363281 63.820312 65.355469 63.609375 L 65.355469 50.476562 C 65.355469 49.566406 64.617188 48.835938 63.714844 48.835938 Z M 63.722656 48.835938 " fill-opacity="1" fill-rule="nonzero"/></svg>
                                                <span><?= $tamanho_m ?> <sup>2</sup></span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
    
                            </div>
                        </div>
                        <?php 

                            endwhile;
                        endif;
                            wp_reset_postdata();
                            
                        ?>
                    </section>
    
                    <div class="d-flex justify-center p-30-10">
                        <a href="<?= home_url() ?>/imoveis" class="btn-default-transparent btn-hover-main">Ver Mais</a>
                    </div>
                </div>
                
            </div>

        </section>

        <section class="sec_about bg-gray">
            <div class="container d-flex content-default">
                <div class="f-50 left_sec_about">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/header-Hero-2.png" alt="">
                </div>
                <div class="f-50 right_sec_about">
                    <h2>Sobre Nós</h2>

                    <h3>Nossa Visão e Valores</h3>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat alias omnis harum ipsa itaque magnam veniam impedit odio vitae eligendi saepe similique, corporis eos fugit consequuntur delectus, obcaecati deleniti necessitatibus!</p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, error sed provident esse voluptas quae atque tempore voluptatum dolorum aspernatur! Odio perspiciatis ad asperiores sit esse recusandae placeat, nihil tempora nam nostrum illum repellendus amet repellat est impedit omnis eveniet.</p>

                    <div class="d-flex">
                        <a href="" class="btn-default-transparent btn-hover-main">Saiba Mais</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="sec_novidades">
            <div class="container content-default">
                <header class="head-default">
                    <h2 class="title-second">Últimas Novidades</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, molestias? Inventore, consequuntur.</p>
                </header>

                <div class="d-flex">
                <?php 

                    $args_b2 = [
                        'p' => 'post',
                        'posts_per_page' => 4
                    ];

                    $response_b2 = new WP_Query($args_b2);

                    if($response_b2->have_posts()):
                        while($response_b2->have_posts()):
                            $response_b2->the_post();

                ?>
                    <div class="f-50">
                        <div class="card_full_imovel" style="background-image: url(<?= get_the_post_thumbnail_url(null, 'medium') ?>);">
                            <a href="">
                                <div class="info_card_full_imovel">
                                    <?php
                                        $tipo = get_post_meta(get_the_ID(), 'tipo', true);
                                        $local = get_post_meta(get_the_ID(), 'local', true);
                                    ?>
                                    <h3><?= $local ?></h3>
                                    <p><?= $tipo ?></p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <?php
                            endwhile;
                        endif;
                        wp_reset_postdata()
                    ?>
                    
                   
                </div>

                <div class="d-flex justify-center p-30-10">
                    <a href="<?= home_url() ?>/imoveis" class="btn-default-transparent btn-hover-main">Ver Mais</a>
                </div>
            </div>
        </section>

        <section class="sec_depoimentos bg-gray">
            <div class="container d-flex content-default">
                <div class="f-50 left_dep">
                    <h2>Comentários dos nossos clientes</h2>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos eius delectus fuga numquam deserunt voluptatibus a eos, ratione nesciunt ullam dolorem non.</p>
                </div>
                <div class="f-50 right_dep">
                    <img src="<?= get_template_directory_uri() ?>/assets/img/comma.png" alt="">
                    <div class="carousel_depoimentos owl-car">

                    </div>
                </div>
            </div>
        </section>

    </main>

<?php get_footer() ?>