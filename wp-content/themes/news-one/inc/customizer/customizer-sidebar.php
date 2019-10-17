<?php
/*
* Customizer Options for Sidebar
*/
        /* Sidebar Otpions */
        $wp_customize->add_panel( 'news_one_sidebar_panel', array(
            'priority' => 12,
            'capability' => 'edit_theme_options',
            'title' => __( 'Sidebar Options', 'news-one' ),
        ) );

        /*Front Page Sidebar Options*/
        $wp_customize->add_section( 'news_one_front_page_sidebar_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Front Page Sidebar Options', 'news-one' ),
            'panel'          => 'news_one_sidebar_panel',
        ) );

        /*Settings sidebar on front page*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_front_page_sidebar]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_front_page_sidebar'],
            'sanitize_callback' => 'news_one_sanitize_select'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_front_page_sidebar]', array(
            'choices' => array(
                    'fp-right' => __('Right Sidebar','news-one'),
                    'fp-left'  => __('Left Sidebar','news-one'),
                    'fp-none'  => __('No Sidebar','news-one'),
                ),
            'label'         => __( 'Select Preferred Sidebar', 'news-one' ),
            'section'       => 'news_one_front_page_sidebar_options',
            'settings'      => 'news_one_theme_options[news_one_front_page_sidebar]',
            'type'          => 'select'
        ) );

        /*Blog Page Sidebar Options*/
        $wp_customize->add_section( 'news_one_blog_page_sidebar_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Blog Page Sidebar Options', 'news-one' ),
            'panel'          => 'news_one_sidebar_panel',
        ) );

        /*Settings sidebar on front page*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_blog_page_sidebar]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_blog_page_sidebar'],
            'sanitize_callback' => 'news_one_sanitize_select'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_blog_page_sidebar]', array(
            'choices' => array(
                    'bp-right' => __('Right Sidebar','news-one'),
                    'bp-left'  => __('Left Sidebar','news-one'),
                    'bp-none'  => __('No Sidebar','news-one'),
                ),
            'label'         => __( 'Select Preferred Sidebar', 'news-one' ),
            'section'       => 'news_one_blog_page_sidebar_options',
            'settings'      => 'news_one_theme_options[news_one_blog_page_sidebar]',
            'type'          => 'select'
        ) );

        /*Archive Page Sidebar Options*/
        $wp_customize->add_section( 'news_one_archive_page_sidebar_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Archive Page Sidebar Options', 'news-one' ),
            'panel'          => 'news_one_sidebar_panel',
        ) );

        /*Settings sidebar on front page*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_archive_page_sidebar]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_archive_page_sidebar'],
            'sanitize_callback' => 'news_one_sanitize_select'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_archive_page_sidebar]', array(
            'choices' => array(
                    'ap-right' => __('Right Sidebar','news-one'),
                    'ap-left'  => __('Left Sidebar','news-one'),
                    'ap-none'  => __('No Sidebar','news-one'),
                ),
            'label'         => __( 'Select Preferred Sidebar', 'news-one' ),
            'section'       => 'news_one_archive_page_sidebar_options',
            'settings'      => 'news_one_theme_options[news_one_archive_page_sidebar]',
            'type'          => 'select'
        ) );

         /*Single Page Sidebar Options*/
        $wp_customize->add_section( 'news_one_single_page_sidebar_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Single Page Sidebar Options', 'news-one' ),
            'panel'          => 'news_one_sidebar_panel',
        ) );

        /*Settings sidebar on front page*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_single_page_sidebar]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_single_page_sidebar'],
            'sanitize_callback' => 'news_one_sanitize_select'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_single_page_sidebar]', array(
            'choices' => array(
                    'sp-right' => __('Right Sidebar','news-one'),
                    'sp-left'  => __('Left Sidebar','news-one'),
                    'sp-none'  => __('No Sidebar','news-one'),
                ),
            'label'         => __( 'Select Preferred Sidebar', 'news-one' ),
            'section'       => 'news_one_single_page_sidebar_options',
            'settings'      => 'news_one_theme_options[news_one_single_page_sidebar]',
            'type'          => 'select'
        ) );
