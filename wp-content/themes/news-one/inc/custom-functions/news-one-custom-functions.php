<?php

if ( class_exists( 'WP_Customize_Control' ) ) {
/**
     * A class to create a dropdown for all categories in your WordPress site
     *
     * @since 1.0.0
     * @news-one public
     */
    class News_One_Customize_Category_Control extends WP_Customize_Control {
        
        /**
         * Render the control's content.
         *
         * @return HTML
         * @since 1.0.0
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                    array(
                        'name'              => '_customize-dropdown-categories-' . $this->id,
                        'echo'              => 0,
                        'show_option_none'  => esc_html__( '&mdash; Select Category &mdash;', 'news-one' ),
                        'option_none_value' => '0',
                        'selected'          => $this->value(),
                    )
            );

            // Hackily add in the data link parameter.
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
                $this->label,
                $this->description,
                $dropdown
            );
        }
    }



}
/**
 * Date display functions
 *
 * @since News One 1.0.0
 *
 * @param string $format
 * @return string
 *
 */
if ( ! function_exists( 'news_one_date_display' ) ) :

    function news_one_date_display( $format = 'l, F j, Y') {
        echo '<span><i class="fa fa-calendar-check-o"></i>'. date_i18n(get_option('date_format'));
    }
endif;

/**
 * Post Navigation Function
 *
 * @since news_one 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('news_one_posts_navigation') ) :
    function news_one_posts_navigation() {
        global $news_one_theme_options;
        $news_one_pagination_option = esc_attr( $news_one_theme_options['news_one_blog_pagination_options'] );
            if( 'default' == $news_one_pagination_option ){
                the_posts_navigation();
            }
            elseif('numeric' == $news_one_pagination_option){
                global $wp_query;
                $big = 999999999; // need an unlikely integer
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages,
                    'prev_text' => __('&laquo;', 'news-one'),
                    'next_text' => __('&raquo;', 'news-one'),
                ));
            }
            else{
                return 0;
            }
    }
endif;
add_action( 'news_one_action_navigation', 'news_one_posts_navigation', 10 );

/**
 * Display related posts from same category
 *
 * @since news_one 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('news_one_related_post') ) :
    function news_one_related_post( $post_id ) { 
        global $news_one_theme_options;
        $news_one_related_post = absint( $news_one_theme_options['news_one_single_related_post_enable_options'] );
        if( 0 == $news_one_related_post ) {
            return;
        }
        $related_post_title =  esc_html($news_one_theme_options['news_one_single_related_post_title_options']);

        $categories = get_the_category( $post_id );
        if ($categories) {
            $category_ids = array();
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            ?>
            <div class="related-posts block">
                <h3 class="block-title"><span><?php echo $related_post_title; ?></span></h3>
                    <div id="latest-news-slide" class="owl-carousel owl-theme latest-news-slide">
                        <?php
                        $news_one_cat_post_args = array(
                            'category__in'       => $category_ids,
                            'post__not_in'       => array($post_id),
                            'post_type'          => 'post',
                            'posts_per_page'     => 3,
                            'post_status'        => 'publish',
                            'ignore_sticky_posts'=> true
                        );
                        $news_one_featured_query = new WP_Query( $news_one_cat_post_args );

                        while ( $news_one_featured_query->have_posts() ) : $news_one_featured_query->the_post();
                        ?>
                            <div class="item">
                                <div class="post-block-style clearfix">
                                  <?php
                                        if ( has_post_thumbnail() ):
                                            ?>
                                    <div class="post-thumb">
                                      
                                            <figure class="img-fluid">
                                                <a href="<?php the_permalink()?>">
                                                    <?php the_post_thumbnail( 'full' ); ?>
                                                </a>
                                            </figure>
                                       
                                    </div>
                                    <?php
                                        $categories = get_the_category();
                                          if ( ! empty( $categories ) ) {
                                            echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'" class="post-cat" title="Lifestyle">'.esc_html( $categories[0]->name ).'</a>';
                                        } 
                                       endif; 
                                    ?>
                                    <div class="post-content">
                                        <h2 class="post-title title-medium">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="post-author"><?php news_one_posted_by(); ?></span>
                                            <span class="post-date"><?php news_one_posted_on(); ?></span>
                                        </div>
                                    </div><!-- Post content end -->
                                </div><!-- Post Block style end -->
                            </div><!-- Item 1 end -->
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        ?>
                        </div><!-- Carousel end -->
                    </div><!-- Related posts end -->
        <?php
        }
    }
endif;
add_action( 'news_one_related_posts', 'news_one_related_post', 10, 1 );

/**
 * News One Add Body Class for Site Layout
 * @since News One 1.0.0
 *
 * @param null
 * @return void
*/

add_filter('body_class', 'news_one_layout_custom_class');
function news_one_layout_custom_class($classes)
{
    global $news_one_theme_options;
    $layout_class = esc_attr( $news_one_theme_options['news_one_site_layout_options'] );
    if ($layout_class == 'full-width') {
        $classes[] = 'full-width';
    } else {
        $classes[] = 'boxed-layout';
    }
    return $classes;
}

/**
 * News One Add Body Class for  Image Option for Blog Page
 * @since News One 1.0.0
 *
 * @param null
 * @return void
*/

add_filter('body_class', 'news_one_blog_image_class');
function news_one_blog_image_class($classes)
{
    global $news_one_theme_options;
    $blog_image_class = esc_attr( $news_one_theme_options['news_one_blog_image_options'] );
    
    $classes[] =  $blog_image_class;

    return $classes;
}

/**
 * Home page sidebar Options
 * @since News One 1.0.0
 *
 * @param null
 * @return void
*/


add_filter('body_class', 'news_one_homepage_sidebar_custom_class');
function news_one_homepage_sidebar_custom_class($classes)
{
    if( is_front_page()) 
  {
    global $news_one_theme_options;
    $layout_class = esc_attr( $news_one_theme_options['news_one_front_page_sidebar'] );
    if ($layout_class == 'fp-right') {
        $classes[] = 'fp-right';
    } elseif($layout_class == 'fp-left') {
        $classes[] = 'fp-left';
    }elseif($layout_class == 'fp-both'){
        $classes[] = 'fp-both';
    }else{
        $classes[] = 'fp-none';
    }

  }
    return $classes;


}
/**
 * Blog page sidebar Options
 * @since News One 1.0.0
 *
 * @param null
 * @return void
*/


add_filter('body_class', 'news_one_blogpage_sidebar_custom_class');
function news_one_blogpage_sidebar_custom_class($classes)
{
    if( is_home()) 
  {
    global $news_one_theme_options;
    $layout_class = esc_attr( $news_one_theme_options['news_one_blog_page_sidebar'] );
    if ($layout_class == 'bp-right') {
        $classes[] = 'bp-right';
    } elseif($layout_class == 'bp-left') {
        $classes[] = 'bp-left';
    }elseif($layout_class == 'bp-both'){
        $classes[] = 'bp-both';
    }else{
        $classes[] = 'bp-none';
    }
  }  
    return $classes;
 
}
/**
 * Archive page sidebar Options
 * @since News One 1.0.0
 *
 * @param null
 * @return void
*/



add_filter('body_class', 'news_one_archive_page_sidebar_options');
function news_one_archive_page_sidebar_options($classes)
{
    if( is_archive() || is_category()) 
{
    global $news_one_theme_options;
    $layout_class = esc_attr( $news_one_theme_options['news_one_archive_page_sidebar'] );
    if ($layout_class == 'ap-right') {
        $classes[] = 'ap-right';
    } elseif($layout_class == 'ap-left') {
        $classes[] = 'ap-left';
    }elseif($layout_class == 'ap-both'){
        $classes[] = 'ap-both';
    }else{
        $classes[] = 'ap-none';
    }

  }  
    return $classes;


}

/**
 * Single page sidebar Options
 * @since News One 1.0.0
 *
 * @param null
 * @return void
*/

add_filter('body_class', 'news_one_single_page_sidebar');
function news_one_single_page_sidebar($classes)
{
    if( is_single()) 
 {
    global $news_one_theme_options;
    $layout_class = esc_attr( $news_one_theme_options['news_one_single_page_sidebar'] );
    if ($layout_class == 'sp-right') {
        $classes[] = 'sp-right';
    } elseif($layout_class == 'sp-left') {
        $classes[] = 'sp-left';
    }elseif($layout_class == 'sp-both'){
        $classes[] = 'sp-both';
    }else{
        $classes[] = 'sp-none';
    }
 }
    return $classes;
 
}