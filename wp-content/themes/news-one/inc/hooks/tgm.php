<?php
/**
 * Recommended plugins
 *
 * @package news-one
 */
if ( ! function_exists( 'news_one_recommended_plugins' ) ) :
	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function news_one_recommended_plugins() {
		
		$plugins = array(

			array(
				'name'     => esc_html__( 'One Click Demo Import', 'news-one' ),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			),
			
			array(
				'name'     => esc_html__( 'Contact Us', 'news-one' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			),

			array(
				'name'     => esc_html__( 'Elementor', 'news-one' ),
				'slug'     => 'elementor',
				'required' => false,
			),
			array(
				'name'     => esc_html__( 'WooCommerce', 'news-one' ),
				'slug'     => 'woocommerce',
				'required' => false,
			),

		   
		);
		tgmpa( $plugins );
	}
endif;
add_action( 'tgmpa_register', 'news_one_recommended_plugins' );
