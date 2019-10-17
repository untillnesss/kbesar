<?php
/*
* Customizer Options for Design Options
*/
        /* Extra Options */
        $wp_customize->add_panel( 'news_one_extra_panel', array(
            'priority' => 15,
            'capability' => 'edit_theme_options',
            'title' => __( 'More Theme Options', 'news-one' ),
        ) );

        /*Breadcrumb*/
        $wp_customize->add_section( 'news_one_extra_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Breadcrumb Options', 'news-one' ),
            'panel'          => 'news_one_extra_panel',
        ) );

        /*breadcrumb settings*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_site_breadcrumb_options]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_site_breadcrumb_options'],
            'sanitize_callback' => 'news_one_sanitize_checkbox'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_site_breadcrumb_options]', array(
            'label'         => __( 'Enable Breadcrumb', 'news-one' ),
            'section'       => 'news_one_extra_options',
            'settings'      => 'news_one_theme_options[news_one_site_breadcrumb_options]',
            'type'          => 'checkbox'
        ) );
        /*search placeholder*/
        $wp_customize->add_section( 'news_one_search_placeholder_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Search Placeholder', 'news-one' ),
            'panel'          => 'news_one_extra_panel',
        ) );

        /*Settings sidebar on front page*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_site_search_placeholder_options]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_site_search_placeholder_options'],
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_site_search_placeholder_options]', array(
            'label'         => __( 'Enter Search Placeholder Text', 'news-one' ),
            'section'       => 'news_one_search_placeholder_options',
            'settings'      => 'news_one_theme_options[news_one_site_search_placeholder_options]',
            'type'          => 'text'
        ) );