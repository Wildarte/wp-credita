<?php

function mytheme_customize_register($wp_customize) {
    // Adiciona uma seção ao Customizer
    $wp_customize->add_section('mytheme_contact_section', array(
        'title'      => __('Informações de Contato', 'mytheme'),
        'priority'   => 30,
    ));

    // Adiciona um campo de configuração
    $wp_customize->add_setting('mytheme_phone_number', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Adiciona o controle de input para o telefone
    $wp_customize->add_control('mytheme_phone_number', array(
        'label'    => __('Número de Whatsapp (número para as páginas dos imóveis)', 'mytheme'),
        'section'  => 'mytheme_contact_section',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'mytheme_customize_register');
