<?php

function imelab_customize_register($wp_customize) {

    $wp_customize->add_panel( 'options_panel', array(
        'title'       => __( 'Theme Options', 'imelab' ),
        'description' => __( 'Configure your theme settings', 'imelab' ),
    ) );

    $wp_customize->add_section( 'contact_form_mail', array(
        'title'           => __( 'Contact Form Mail', 'imelab' ),
        'panel'           => 'options_panel',
    ) );

    $wp_customize->add_setting( 'contact_form_mail', array(
        'default'           => 'barto.jacopo@gmail.com',
        'sanitize_callback' => 'imelab_sanitize_contact_form_mail',
        'transport'         => 'postMessage',
    ) );

    $wp_customize->add_control( 'contact_form_mail', array(
        'label'       => __( 'Contact Form Mail', 'imelab' ),
        'section'     => 'contact_form_mail',
        'type'        => 'email',
        'description' => __( 'Contact Form Description', 'imelab' ),
    ) );
}
add_action( 'customize_register', 'imelab_customize_register' );

function imelab_sanitize_contact_form_mail($input) {

    if(filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return $input;
    }

    return 'barto.jacopo@gmail.com';
}