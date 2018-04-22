<?php

function imelab_customize_register($wp_customize) {

    $wp_customize->add_panel( 'options_panel', array(
        'title'       => __( 'Contact Forms Options', 'imelab' ),
        'description' => __( 'Options for Contact Form and Reserve Form', 'imelab' ),
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
                    'description' => __( 'Insert the mail that will receive the Contact Form mails', 'imelab' ),
                ) );

        $wp_customize->add_section( 'reserve_form_mail', array(
            'title'           => __( 'Reserve Form Mail', 'imelab' ),
            'panel'           => 'options_panel',
        ) );

            $wp_customize->add_setting( 'reserve_form_mail', array(
                'default'           => 'barto.jacopo@gmail.com',
                'sanitize_callback' => 'imelab_sanitize_contact_form_mail',
                'transport'         => 'postMessage',
            ) );

                $wp_customize->add_control( 'reserve_form_mail', array(
                    'label'       => __( 'Reserve Form Mail', 'imelab' ),
                    'section'     => 'reserve_form_mail',
                    'type'        => 'email',
                    'description' => __( 'Insert the mail that will receive the Reserve Form mails', 'imelab' ),
                ) );
}
add_action( 'customize_register', 'imelab_customize_register' );

function imelab_sanitize_contact_form_mail($input) {

    if(filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return $input;
    }

    return 'barto.jacopo@gmail.com';
}