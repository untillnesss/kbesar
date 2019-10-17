<?php 
/**
 * News One Theme Customizer
 *
 * @package News_One
 */
if ( !function_exists('news_one_default_theme_options') ) :
    function news_one_default_theme_options() {

        $default_theme_options = array(
            'news_one_blog_layout_options'                => 'one-column',
            'news_one_enable_trending_news'               => 1,
            'news_one_trending_news_title'                => esc_html__('Trending','news-one'),
            'trending_news_cat_id'               => 0,
            'news_one_date_enable_disable'                => 0,
            'news_one_cart_icon_enable_disable'           => 0,
            'news_one_login_register_enable_disable'      => 0,
            'news_one_social_icons_enable_disable'        => 0,
            'news_one_site_identity'                      => 'title-text',
            'news_one_header_ads_show_hide'               => 0,
            'news_one_header_ads_image'                   => '',
            'news_one_header_ads_link'                    => '',
            'news_one_header_types'                       => 'header-1',
            'news_one_search_disable_header'              => 1,
            'news_one_search_placeholder'                 => esc_html__('Type keyword and hit enter','news-one'),
            'news_one_disable_to_top'                     => 1,
            'news_one_footer_menu_hide'                   => 0,
            'news_one_footer_copyright'                   => esc_html__('© Copyright All Right Reserved.','news-one'),
            'news_one_footer_types'                       => 'footer-1',
            'news_one_front_page_sidebar'                 => 'fp-right',
            'news_one_blog_page_sidebar'                  => 'bp-right',
            'news_one_archive_page_sidebar'               => 'ap-right',
            'news_one_single_page_sidebar'                => 'sp-right',
            'news_one_site_layout_options'                => 'full-width',
            'news_one_sticky_sidebar_options'             => 0,
            'news_one_blog_image_options'                 => 'left-image',
            'news_one_blog_pagination_options'            => 'numeric',
            'news_one_single_related_post_enable_options' => 1,
            'news_one_single_related_post_title_options'  => esc_html__('Related Posts','news-one'),
            'news_one_site_breadcrumb_options'            => 1,
            'news_one_site_search_placeholder_options'    => esc_html__('Search...','news-one'),
        );
        return apply_filters( 'news_one_default_theme_options', $default_theme_options );
    }
endif;


/**
 *  Get theme options
 *
 * @since News One 1.0.0
 *
 * @param null
 * @return array news_one_get_theme_options
 *
 */
if ( !function_exists('news_one_get_theme_options') ) :
    function news_one_get_theme_options() {

        $news_one_default_theme_options = news_one_default_theme_options();
        
    
        $news_one_get_theme_options = get_theme_mod( 'news_one_theme_options');
        if( is_array( $news_one_get_theme_options )){
            return array_merge( $news_one_default_theme_options, $news_one_get_theme_options );
        }
        else{
            return $news_one_default_theme_options;
        }

    }
endif;