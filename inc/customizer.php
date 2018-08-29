<?php

function imelab_customize_register($wp_customize) {

    $wp_customize->add_panel( 'options_panel', array(
        'title'       => __( 'Contact Forms Options', 'imelab' ),
        'description' => __( 'Options for Contact Form and Reserve Form', 'imelab' ),
    ) );
	
		$wp_customize->add_section( 'imelab_message_from_address', array(
			'title'           => __( 'Message From Address', 'imelab' ),
			'panel'           => 'options_panel',
		) );
		
			$wp_customize->add_setting( 'imelab_message_from_address', array(
				'default'           => 'barto.jacopo@gmail.com',
				'sanitize_callback' => 'imelab_sanitize_contact_form_mail',
				'transport'         => 'postMessage',
			) );
			
				$wp_customize->add_control( 'imelab_message_from_address', array(
					'label'       => __( 'Message From Address', 'imelab' ),
					'section'     => 'imelab_message_from_address',
					'type'        => 'email',
					'description' => __( 'Insert the address that will send the form mails', 'imelab' ),
				) );
	
		$wp_customize->add_section( 'imelab_contact_form_mail', array(
            'title'           => __( 'Contact Form Mail', 'imelab' ),
            'panel'           => 'options_panel',
        ) );

            $wp_customize->add_setting( 'imelab_contact_form_mail', array(
                'default'           => 'barto.jacopo@gmail.com',
                'sanitize_callback' => 'imelab_sanitize_contact_form_mail',
                'transport'         => 'postMessage',
            ) );

                $wp_customize->add_control( 'imelab_contact_form_mail', array(
                    'label'       => __( 'Contact Form Mail', 'imelab' ),
                    'section'     => 'imelab_contact_form_mail',
                    'type'        => 'email',
                    'description' => __( 'Insert the mail that will receive the Contact Form mails', 'imelab' ),
                ) );

        $wp_customize->add_section( 'imelab_reserve_form_mail', array(
            'title'           => __( 'Reserve Form Mail', 'imelab' ),
            'panel'           => 'options_panel',
        ) );

            $wp_customize->add_setting( 'imelab_reserve_form_mail', array(
                'default'           => 'barto.jacopo@gmail.com',
                'sanitize_callback' => 'imelab_sanitize_contact_form_mail',
                'transport'         => 'postMessage',
            ) );

                $wp_customize->add_control( 'imelab_reserve_form_mail', array(
                    'label'       => __( 'Reserve Form Mail', 'imelab' ),
                    'section'     => 'imelab_reserve_form_mail',
                    'type'        => 'email',
                    'description' => __( 'Insert the mail that will receive the Reserve Form mails', 'imelab' ),
                ) );
	
	
	$wp_customize->add_panel( 'analytics_panel', array(
		'title'       => __( 'Google Analytics Options', 'imelab' ),
		'description' => __( 'Options for Google Analytics', 'imelab' ),
	) );
	
		$wp_customize->add_section( 'imelab_analytics_code', array(
			'title'           => __( 'Analytics Monitoring Code', 'imelab' ),
			'panel'           => 'analytics_panel',
		) );
	
			$wp_customize->add_setting( 'imelab_analytics_code', array(
				'default'           => '',
				'transport'         => 'postMessage',
			) );
			
				$wp_customize->add_control( 'imelab_analytics_code', array(
					'label'       => __( 'Analytics Code', 'imelab' ),
					'section'     => 'imelab_analytics_code',
					'description' => __( 'Insert the Analytics monitoring code', 'imelab' ),
					'type'        => 'textarea',
				) );
}
add_action( 'customize_register', 'imelab_customize_register' );

function imelab_sanitize_contact_form_mail($input) {

    if(filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return $input;
    }

    return 'barto.jacopo@gmail.com';
}