        <footer class="footer">

        <div class="container content-min d-flex">
            <div class="col_footer">
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

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, eius nesciunt quidem consectetur dolorum cupiditate quo.</p>
            </div>
            
            <div class="col_footer">
                <h4>Serviços</h4>

                <ul>
                    <li><a href="">item</a></li>
                    <li><a href="">item</a></li>
                    <li><a href="">item</a></li>
                    <li><a href="">item</a></li>
                </ul>
            </div>

            <div class="col_footer">
                <h4>Menu</h4>

                <ul>
                    <li><a href="">item</a></li>
                    <li><a href="">item</a></li>
                    <li><a href="">item</a></li>
                    <li><a href="">item</a></li>
                </ul>
            </div>

            <div class="col_footer">
                <h4>Social</h4>

                <ul>
                    <li><a href="">item</a></li>
                    <li><a href="">item</a></li>
                    <li><a href="">item</a></li>
                    <li><a href="">item</a></li>
                </ul>
            </div>
        </div>

        <div class="container bottom_footer p-10">
            <p>Copyright © 2024. Todos os direitos reservados</p>

        </div>

        </footer>

        <?php wp_footer(); ?>
    </body>
</html>