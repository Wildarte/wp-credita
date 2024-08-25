<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <div class="over_page"></>
    
    <header class="header bg-main">
        <div class="container content_header">
            <div class="over_btn_menu">
                <div class="btn_menu">
                    <i class="bi bi-list"></i>
                </div>
            </div>
            
            <nav class="menu col_header">
                <div class="header_mobile">
                <?php
                    // Exibe o logo se estiver definido no Customizer
                    if (function_exists('the_custom_logo') && has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                        <p class="site-description"><?php bloginfo('description'); ?></p>
                        <?php
                    }
                ?>

                    <span class="btn_close_menu">
                        <i class="bi bi-x"></i>
                    </span>
                </div>

                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                    ));
                ?>

            </nav>

            <div class="logo col_header d-flex justify-center">
                <?php
                    // Exibe o logo se estiver definido no Customizer
                    if (function_exists('the_custom_logo') && has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
                        <p class="site-description"><?php bloginfo('description'); ?></p>
                        <?php
                    }
                ?>
            </div>

            <div class="right_menu col_header d-flex justify-end">
                <div class="btn_search">
                    <i class="bi bi-search"></i>
                </div>
                
            </div>
        </div>
    </header>