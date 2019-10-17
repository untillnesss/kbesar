<?php
/*
* Customizer Options for Design Options
*/
        /* Design Options */
        $wp_customize->add_panel( 'news_one_design_panel', array(
            'priority' => 13,
            'capability' => 'edit_theme_options',
            'title' => __( 'Design Options', 'news-one' ),
        ) );

        /*Site Layout Options*/
        $wp_customize->add_section( 'news_one_design_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Site Layout', 'news-one' ),
            'panel'          => 'news_one_design_panel',
        ) );

        /*Settings sidebar on front page*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_site_layout_options]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_site_layout_options'],
            'sanitize_callback' => 'news_one_sanitize_select'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_site_layout_options]', array(
            'choices' => array(
                    'full-width' => __('Full Layout','news-one'),
                    'boxed'  => __('Boxed Layout','news-one'),
                ),
            'label'         => __( 'Select Preferred Layout', 'news-one' ),
            'section'       => 'news_one_design_options',
            'settings'      => 'news_one_theme_options[news_one_site_layout_options]',
            'type'          => 'select'
        ) );

        /*Sticky Sidebar Options*/
        $wp_customize->add_section( 'news_one_sticky_sidebar_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Sticky Sidebar', 'news-one' ),
            'panel'          => 'news_one_design_panel',
        ) );

        /*Settings sidebar on front page*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_sticky_sidebar_options]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_sticky_sidebar_options'],
            'sanitize_callback' => 'news_one_sanitize_checkbox'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_sticky_sidebar_options]', array(
            'label'         => __( 'Enable Sticky Sidebar', 'news-one' ),
            'section'       => 'news_one_sticky_sidebar_options',
            'settings'      => 'news_one_theme_options[news_one_sticky_sidebar_options]',
            'type'          => 'checkbox'
        ) );
