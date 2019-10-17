<?php
/*
*  Blog Page Options
*/
        /* Blog Page Options */
        $wp_customize->add_panel( 'news_one_blog_panel', array(
            'priority' => 11,
            'capability' => 'edit_theme_options',
            'title' => __( 'Blog/Archive Page Options', 'news-one' ),
        ) );

        /*Pagination Options*/
        $wp_customize->add_section( 'news_one_blog_pagination_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Pagination Options', 'news-one' ),
            'panel'          => 'news_one_blog_panel',
        ) );

        /*Options to change pagination types author info*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_blog_pagination_options]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_blog_pagination_options'],
            'sanitize_callback' => 'news_one_sanitize_select'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_blog_pagination_options]', array(
            'choices' => array(
                    'default' => __('Default','news-one'),
                    'numeric' => __('Numeric','news-one'),
                ),
            'label'         => __( 'Enable Author', 'news-one' ),
            'section'       => 'news_one_blog_pagination_options',
            'settings'      => 'news_one_theme_options[news_one_blog_pagination_options]',
            'type'          => 'select'
        ) );