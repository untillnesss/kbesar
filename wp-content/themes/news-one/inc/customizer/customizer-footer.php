<?php
/*
* Customizer Options for Footer
*/
        /* Footer Options Panel and Sections */
        $wp_customize->add_panel( 'news_one_footer_panel', array(
            'priority' => 16,
            'capability' => 'edit_theme_options',
            'title' => __( 'Footer Options', 'news-one' ),
        ) );

        /*Footer section Setting*/
        $wp_customize->add_section( 'news_one_footer_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Footer Section Settings', 'news-one' ),
            'panel'          => 'news_one_footer_panel',
        ) );

        /*Go to top setting and control*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_disable_to_top]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_disable_to_top'],
            'sanitize_callback' => 'news_one_sanitize_checkbox'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_disable_to_top]', array(
            'label'         => __( 'Disable Go To Top', 'news-one' ),
            'section'       => 'news_one_footer_options',
            'settings'      => 'news_one_theme_options[news_one_disable_to_top]',
            'type'          => 'checkbox'
        ) );

        /*footer menu show and hide*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_footer_menu_hide]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_footer_menu_hide'],
            'sanitize_callback' => 'news_one_sanitize_checkbox'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_footer_menu_hide]', array(
            'label'         => __( 'Show Footer Menu', 'news-one' ),
            'section'       => 'news_one_footer_options',
            'settings'      => 'news_one_theme_options[news_one_footer_menu_hide]',
            'type'          => 'checkbox'
        ) );
        /*copyright text options and settings*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_footer_copyright]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_footer_copyright'],
            'sanitize_callback' => 'wp_kses_post'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_footer_copyright]', array(
            'label'         => __( 'Copyright Text', 'news-one' ),
            'description'   => __( 'Enter copyright text in footer', 'news-one' ),
            'section'       => 'news_one_footer_options',
            'settings'      => 'news_one_theme_options[news_one_footer_copyright]',
            'type'          => 'text'
        ) );
