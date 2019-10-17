<?php
/*
 * Customizer Options for header section
 * News One
*/
         $wp_customize->add_panel( 'news_one_panel', array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'title' => __( 'Header Options', 'news-one' ),
        ) );

        /*Header Options*/
        $wp_customize->add_section( 'news_one_header_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Top Header Options', 'news-one' ),
            'panel'          => 'news_one_panel',
        ) );

        /*active callback function for trending news title*/
        if ( !function_exists('news_one_trending_news_title_active_callback') ) :
            function news_one_trending_news_title_active_callback() {
                global $news_one_theme_options;
                if ( 1 == $news_one_theme_options['news_one_enable_trending_news'] ) {
                    return true;
                }
                return false;
            }
        endif;
        
          /**
         * Dropdown available category for homepage slider
         *
         * @since 1.0.0
         */
        $wp_customize->add_setting(
            'news_one_theme_options[trending_news_cat_id]',
                array(
                    'default' => 0,
                    'capability' => 'edit_theme_options',
                    'sanitize_callback' => 'absint'
                )
        );
       $wp_customize->add_control( new News_One_Customize_Category_Control(
            $wp_customize,
            'news_one_theme_options[trending_news_cat_id]', 
                array(
                    'label' => esc_html__( 'Trending News Category', 'news-one' ),
                    'description' => esc_html__( 'Select cateogry for Trending News  Section', 'news-one' ),
                    'section' => 'news_one_header_options',
                    'priority' => 10
                )
            )
        );

    	/*Trending News Enable Options*/
    	$wp_customize->add_setting( 'news_one_theme_options[news_one_enable_trending_news]', array(
    	    'capability'        => 'edit_theme_options',
    	    'default'           => $default['news_one_enable_trending_news'],
    	    'sanitize_callback' => 'news_one_sanitize_checkbox'
    	) );
    	$wp_customize->add_control( 'news_one_theme_options[news_one_enable_trending_news]', array(
    	    'label'         => __( 'Trending News', 'news-one' ),
    	    'description'   => __( 'Enable and Disable Trending News Section', 'news-one' ),
    	    'section'       => 'news_one_header_options',
    	    'settings'      => 'news_one_theme_options[news_one_enable_trending_news]',
    	    'type'          => 'checkbox'
    	) );

    	/*Trending News Title Options*/
    	$wp_customize->add_setting( 'news_one_theme_options[news_one_trending_news_title]', array(
    	    'capability'        => 'edit_theme_options',
    	    'default'           => $default['news_one_trending_news_title'],
    	    'sanitize_callback' => 'sanitize_text_field'
    	) );
    	$wp_customize->add_control( 'news_one_theme_options[news_one_trending_news_title]', array(
    	    'label'         => __( 'Trending News Title', 'news-one' ),
    	    'description'   => __( 'Enter Title of trending news', 'news-one' ),
    	    'section'       => 'news_one_header_options',
    	    'settings'      => 'news_one_theme_options[news_one_trending_news_title]',
    	    'type'          => 'text'
    	) );
        /*Date Show Hide*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_date_enable_disable]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_date_enable_disable'],
            'sanitize_callback' => 'news_one_sanitize_checkbox'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_date_enable_disable]', array(
            'label'         => __( 'Enable Date in Header', 'news-one' ),
            'description'   => __( 'Options to Enable Date in Header Section', 'news-one' ),
            'section'       => 'news_one_header_options',
            'settings'      => 'news_one_theme_options[news_one_date_enable_disable]',
            'type'          => 'checkbox'
        ) );

        if ( class_exists( 'WooCommerce' ) ){
            /*cart icon*/
            $wp_customize->add_setting( 'news_one_theme_options[news_one_cart_icon_enable_disable]', array(
                'capability'        => 'edit_theme_options',
                'default'           => $default['news_one_cart_icon_enable_disable'],
                'sanitize_callback' => 'news_one_sanitize_checkbox'
            ) );
            $wp_customize->add_control( 'news_one_theme_options[news_one_cart_icon_enable_disable]', array(
                'label'         => __( 'Enable Cart Icon', 'news-one' ),
                'description'   => __( 'If WooCommerce is installed and activated, you can hide this icons from header', 'news-one' ),
                'section'       => 'news_one_header_options',
                'settings'      => 'news_one_theme_options[news_one_cart_icon_enable_disable]',
                'type'          => 'checkbox'
            ) );
            /*Login Register Icons*/
            $wp_customize->add_setting( 'news_one_theme_options[news_one_login_register_enable_disable]', array(
                'capability'        => 'edit_theme_options',
                'default'           => $default['news_one_login_register_enable_disable'],
                'sanitize_callback' => 'news_one_sanitize_checkbox'
            ) );
            $wp_customize->add_control( 'news_one_theme_options[news_one_login_register_enable_disable]', array(
                'label'         => __( 'Enable Login Register Icon', 'news-one' ),
                'description'   => __( 'If WooCommerce is installed and activated, you can hide this icons from header', 'news-one' ),
                'section'       => 'news_one_header_options',
                'settings'      => 'news_one_theme_options[news_one_login_register_enable_disable]',
                'type'          => 'checkbox'
            ) );
        }
        /*Social Media Icons*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_social_icons_enable_disable]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_social_icons_enable_disable'],
            'sanitize_callback' => 'news_one_sanitize_checkbox'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_social_icons_enable_disable]', array(
            'label'         => __( 'Enable Social Media Icons', 'news-one' ),
            'description'   => __( 'You can add social media icons via custom menu from Appearance > Customize > Menus', 'news-one' ),
            'section'       => 'news_one_header_options',
            'settings'      => 'news_one_theme_options[news_one_social_icons_enable_disable]',
            'type'          => 'checkbox'
        ) );
        /*Header Advertisement Options*/
        $wp_customize->add_section( 'news_one_header_ads_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Header Advertisement Options', 'news-one' ),
            'panel'          => 'news_one_panel',
        ) );

        /*Header Ads Enable Options*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_header_ads_show_hide]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_header_ads_show_hide'],
            'sanitize_callback' => 'news_one_sanitize_checkbox'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_header_ads_show_hide]', array(
            'label'         => __( 'Show Advertisement', 'news-one' ),
            'description'   => __( 'Enable this to get more options', 'news-one' ),
            'section'       => 'news_one_header_ads_options',
            'settings'      => 'news_one_theme_options[news_one_header_ads_show_hide]',
            'type'          => 'checkbox'
        ) );

        /*Header Ads Image Selection */
        $wp_customize->add_setting( 'news_one_theme_options[news_one_header_ads_image]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_header_ads_image'],
            'sanitize_callback' => 'news_one_sanitize_image'
        ) );
        $wp_customize->add_control( 
            new WP_Customize_Image_Control( 
                $wp_customize,
                'news_one_theme_options[news_one_header_ads_image]', 
            array(
            'label'         => __( 'Select Advertisement Image', 'news-one' ),
            'description'   => __( 'Select the appropriate ads image size for header section. Recommended image size of 728*90 ', 'news-one' ),
            'section'       => 'news_one_header_ads_options',
            'settings'      => 'news_one_theme_options[news_one_header_ads_image]',
            'type'          => 'image'
        ) ) );
        /*Ads Image Link  */
        $wp_customize->add_setting( 'news_one_theme_options[news_one_header_ads_link]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_header_ads_link'],
            'sanitize_callback' => 'esc_url_raw'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_header_ads_link]', 
            array(
            'label'         => __( 'Link For Advertisement', 'news-one' ),
            'description'   => __( 'Put complete link for advertisement. It will open in new tab.', 'news-one' ),
            'section'       => 'news_one_header_ads_options',
            'settings'      => 'news_one_theme_options[news_one_header_ads_link]',
            'type'          => 'url'
        ) );
        /*Search Option*/
        $wp_customize->add_section( 'news_one_search_section_header', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Search Options', 'news-one' ),
            'panel'          => 'news_one_panel',
        ) );

        /*Show Hide Search Options*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_search_disable_header]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_search_disable_header'],
            'sanitize_callback' => 'news_one_sanitize_checkbox'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_search_disable_header]', array(
            'label'         => __( 'Hide Search Icons from Menu Bar', 'news-one' ),
            'description'   => __( 'You can hide the search from the menu bar', 'news-one' ),
            'section'       => 'news_one_search_section_header',
            'settings'      => 'news_one_theme_options[news_one_search_disable_header]',
            'type'          => 'checkbox'
        ) );
        /*Search Placeholder Text*/
        $wp_customize->add_setting( 'news_one_theme_options[news_one_search_placeholder]', array(
            'capability'        => 'edit_theme_options',
            'default'           => $default['news_one_search_placeholder'],
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        $wp_customize->add_control( 'news_one_theme_options[news_one_search_placeholder]', array(
            'label'         => __( 'Search Placeholder of Menu', 'news-one' ),
            'description'   => __( 'Enter your required text for search placeholder', 'news-one' ),
            'section'       => 'news_one_search_section_header',
            'settings'      => 'news_one_theme_options[news_one_search_placeholder]',
            'type'          => 'text'
        ) );