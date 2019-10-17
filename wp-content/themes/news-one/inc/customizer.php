<?php
/**
* loading customizer default value
*/
    require get_template_directory() . '/inc/customizer/customizer-default-values.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function news_one_customize_register( $wp_customize ) {
    
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'news_one_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'news_one_customize_partial_blogdescription',
		) );
	}

	$default = news_one_default_theme_options();
	/*adding sections for footer options*/
	    
	/**
    * customizer options for header
    */
    require get_template_directory() . '/inc/customizer/customizer-header.php';

    /**
    * customizer options for footer
    */
    require get_template_directory() . '/inc/customizer/customizer-footer.php';

    /**
    * customizer options for sidebar
    */
    require get_template_directory() . '/inc/customizer/customizer-sidebar.php';
  
    /**
    * customizer options for Design Options
    */
    require get_template_directory() . '/inc/customizer/customizer-design-options.php';
  
    /**
    * customizer options for Design Options
    */
    require get_template_directory() . '/inc/customizer/customizer-blog-options.php';

    /**
    * customizer options for single page Options
    */
    require get_template_directory() . '/inc/customizer/customizer-single-page.php';

    /**
    * customizer options for extra Options
    */
    require get_template_directory() . '/inc/customizer/customizer-extra-options.php';

}
add_action( 'customize_register', 'news_one_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function news_one_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function news_one_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function news_one_customize_preview_js() {
	wp_enqueue_script( 'news-one-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'news_one_customize_preview_js' );
