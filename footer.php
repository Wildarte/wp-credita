        <footer class="footer">

        <div class="container content-min d-flex">
            <div class="col_footer col_footer_logo">
                <?php
                    // Exibe o logo se estiver definido no Customizer
                    if (function_exists('the_custom_logo') && has_custom_logo()) {
                        the_custom_logo(['class' => 'logo_footer']);
                    } else {
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                        <p class="site-description"><?php bloginfo('description'); ?></p>
                        <?php
                    }
                ?>

                <p><?= bloginfo('description') ?></p>
            </div>
            
            <div class="col_footer">
                <h4>Serviços</h4>

                <?php
                    if (has_nav_menu('servicos')) {
                        wp_nav_menu(array(
                            'theme_location' => 'servicos',
                            'container' => 'ul',
                            'container_class' => ''
                        ));
                    }
                ?>

            </div>

            <div class="col_footer">
                <h4>Menu</h4>

                <?php
                    if (has_nav_menu('menu-footer')) {
                        wp_nav_menu(array(
                            'theme_location' => 'menu-footer',
                            'container' => 'ul',
                            'container_class' => ''
                        ));
                    }
                ?>
            </div>

            <div class="col_footer">
                <h4>Social</h4>

                <ul>
                    <li><a href=""><i class="bi bi-instagram"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="container bottom_footer p-10">
            <p>Copyright © 2024. Todos os direitos reservados</p>

        </div>

        </footer>

        <?php wp_footer(); ?>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('#cidade').select2();
            });
        </script>
    </body>
</html>