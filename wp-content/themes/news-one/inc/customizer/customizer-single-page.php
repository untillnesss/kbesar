<?php
/*
* Customizer Options for Design Options
*/
        /* Design Options */
        $wp_customize->add_panel( 'news_one_single_panel', array(
            'priority' => 14,
            'capability' => 'edit_theme_options',
            'title' => __( 'Single Page Options', 'news-one' ),
        ) );
        /*Related Posts*/
        $wp_customize->add_section( 'news_one_single_related_posts_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Related Posts Options', 'news-one' ),
            'panel'          => 'news_one_single_panel',
        ) );

        /*enable related posts*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_single_related_post_enable_options]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_single_related_post_enable_options'],
            'sanitize_callback' => 'news_one_sanitize_checkbox'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_single_related_post_enable_options]', array(
            'label'         => __( 'Enable Related Posts', 'news-one' ),
            'section'       => 'news_one_single_related_posts_options',
            'settings'      => 'news_one_theme_options[news_one_single_related_post_enable_options]',
            'type'          => 'checkbox'
        ) );
        /*related post title*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_single_related_post_title_options]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_single_related_post_title_options'],
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_single_related_post_title_options]', array(
            'label'         => __( 'Enter the title of Related Posts', 'news-one' ),
            'section'       => 'news_one_single_related_posts_options',
            'settings'      => 'news_one_theme_options[news_one_single_related_post_title_options]',
            'type'          => 'text'
        ) );