<?php
/**
 * Demo Data support.
 *
 * @package news_one
 */

/*Disable PT branding.*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/**
 * Demo Data files.
 *
 * @since 1.0.0
 *
 * @return array Files.
 */
function news_one_import_files() {
    return array(
        array(
            'import_file_name'             =>  esc_html__( 'Theme Demo Content', 'news-one' ),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/dummy-data/dummy-data-files/default/news-one.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/dummy-data/dummy-data-files/default/news-one.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'inc/dummy-data/dummy-data-files/default/news-one.dat',
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'news_one_import_files' );

/**
 * Demo Data after import.
 *
 * @since 1.0.0
 */

function news_one_after_import_setup() {
    // Assign front page and posts panews_onege (blog page).
    $front_page_id = null;
    $blog_page_id  = null;

    $front_page = get_page_by_title( 'Home' );

    if ( $front_page ) {
        if ( is_array( $front_page ) ) {
            $first_page = array_shift( $front_page );
            $front_page_id = $first_page->ID;
        } else {
            $front_page_id = $front_page->ID;
        }
    }

    $blog_page = get_page_by_title( 'Blog' );

    if ( $blog_page ) {
        if ( is_array( $blog_page ) ) {
            $first_page = array_shift( $blog_page );
            $blog_page_id = $first_page->ID;
        } else {
            $blog_page_id = $blog_page->ID;
        }
    }
    

    if ( $front_page_id && $blog_page_id ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id );
        update_option( 'page_for_posts', $blog_page_id );
    }

         // Assign navigation menu locations.
        $main_menu   = get_term_by('name', 'Main menu items', 'nav_menu');
        $social_menu = get_term_by('name', 'Social menu items', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array( 
              'menu-1'      => $main_menu->term_id, 
              'social-menu' => $social_menu->term_id 
             ) 
        );
    }
add_action( 'pt-ocdi/after_import', 'news_one_after_import_setup' );