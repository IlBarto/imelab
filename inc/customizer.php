<?php

function imelab_customize_register( $wp_customize ) {
	
	$wp_customize->add_setting( 'page_layout', array(
		'default'           => 'one-column',
		'sanitize_callback' => 'imelab_sanitize_page_layout',
		'transport'         => 'postMessage',
	) );
}

function imelab_sanitize_page_layout( $input ) {
	$valid = array(
		'one-column' => __( 'One Column', 'imelab' ),
		'two-column' => __( 'Two Column', 'imelab' ),
	);
	
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}
	
	return '';
}
add_action( 'customize_register', 'imelab_customize_register' );
