<?php

if ( function_exists( 'register_block_style' ) ) {

	function theme_register_block_styles() {

		// Image with light border
		register_block_style(
			'core/image',
			array(
				'name'  => 'border-light',
				'label' => esc_html__( 'Border Light', 'aino' ),
			)
		);

		// Image with dark border
		register_block_style(
			'core/image',
			array(
				'name'  => 'border-dark',
				'label' => esc_html__( 'Border Dark', 'aino' ),
			)
		);

	}
	add_action( 'init', 'theme_register_block_styles' );
}
