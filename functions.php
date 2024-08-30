<?php
// Adiciona suporte ao título dinâmico
function meu_tema_setup() {
    add_theme_support('title-tag');

    // Adiciona suporte a imagens destacadas
    add_theme_support('post-thumbnails');

    // Registra um menu de navegação
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'meu-tema'),
    ));

    // Adiciona suporte para o logotipo personalizado
    add_theme_support('custom-logo');

    // Adiciona suporte a formatos de post (opcional)
    add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));
}
add_action('after_setup_theme', 'meu_tema_setup');

// Enfileira scripts e estilos
function meu_tema_scripts() {
    wp_enqueue_style('owl-carousel', get_template_directory_uri()."/assets/css/owl.carousel.min.css", [], '1.0', false);
    wp_enqueue_style('owl-default', get_template_directory_uri()."/assets/css/owl.theme.default.min.css", [], '1.0', false);
    wp_enqueue_style('reset-css', get_template_directory_uri()."/assets/css/reset.css", [], '1.0', false);
    wp_enqueue_style('style', get_template_directory_uri()."/assets/css/style.css", [], '1.0', false);

    // Exemplo de como adicionar scripts JavaScript
    wp_enqueue_script('m-jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', [], '1.0', true);
    wp_enqueue_script('owl-carousel-script', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', [], '1.0', true);
    wp_enqueue_script('my-script', get_template_directory_uri() . '/assets/js/script.js', [], '1.0', true);
}
add_action('wp_enqueue_scripts', 'meu_tema_scripts');

// Função para registrar widgets (barra lateral, rodapé, etc.)
function meu_tema_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'meu-tema'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'meu-tema'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'meu_tema_widgets_init');

// Função para customizar o rodapé do painel de administração
function meu_tema_custom_admin_footer() {
    echo 'Desenvolvido por <a href="http://seudominio.com" target="_blank">Seu Nome</a>.';
}
add_filter('admin_footer_text', 'meu_tema_custom_admin_footer');

require "admin/custom.php";