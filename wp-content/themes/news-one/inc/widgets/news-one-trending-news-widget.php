<?php
/**
 * The template for displaying slider in home page
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Canyon Themes
 * @subpackage News One
 *
 * @package Canyon Themes
 * @subpackage Nexas
 * @since 1.0.0
 */
if ( !class_exists( 'News_One_Trending_News_Widget' ) )
{
    class News_One_Trending_News_Widget extends WP_Widget
    {
        private function defaults()
            /* Default Value */
        {
            $defaults = array(
                'title'       => esc_html__( 'Trending News', 'news-one' ),
                'category_id' => '',
                'post_number' => 6
            );
            return $defaults;
        }

        public function __construct()

        {
            parent::__construct(
                'news-one-trending-news-widget',
                esc_html__( 'News One Trending News Widget', 'news-one' ),
                array( 'description' => esc_html__( 'News-One Trending News Widget For Home Page', 'news-one' ) )
            );
        }
        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         *
         * @return void
         *
         */

        public function widget($args, $instance)
        {
            if (!empty($instance))
            {
                $instance = wp_parse_args( (array ) $instance, $this->defaults() );

                echo $args['before_widget'];
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
                $category_id = absint( $instance['category_id'] );
                $post_number = absint($instance['post_number']);
                ?>
                <div class="color-default">
                     <h3 class="block-title"><span><?php echo $title; ?></span></h3>
   
                    <div id="post-slide" class="owl-carousel owl-theme post-slide">
                        <?php
                         $i=0;
                         $treading_section = array(
                            'ignore_sticky_posts' => true,
                            'post_type'           => 'post',
                            'cat'                 => $category_id,
                            'posts_per_page'      => $post_number,
                            'order'               => 'DESC'
                            );
                        $treading_section_query = new WP_Query($treading_section);
                        ?>
                        <div class="item">
                             <?php      
                             if ( $treading_section_query->have_posts() ) :
                                while ($treading_section_query->have_posts()) :
                                    $treading_section_query->the_post();
                              
   
                                 if( $i%1== 0 && $i!=0)
                                 { ?>

                        </div>

                        <div class="item">

                            <?php }   

                               ?>
                                   <div class="post-overaly-style text-center clearfix">
                                          <?php

                                         if (has_post_thumbnail()) {
                                            
                                            $image_id = get_post_thumbnail_id();
                                            $image_url = wp_get_attachment_image_src($image_id, 'full', true); ?>

                                                  <div class="post-thumb">
                                                     <a href="<?php the_permalink(); ?>">
                                                        <img class="img-fluid" src="<?php echo $image_url[0]; ?>" alt="" />
                                                     </a>
                                                  </div><!-- Post thumb end -->
                                       <?php } ?>
                                      <div class="post-content">
                                        <?php
                                        $categories = get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag" class="post-cat">'.esc_html( $categories[0]->name ).'</a>';
                                        }
                                        ?>
                                         <h2 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                         </h2>
                                         <div class="post-meta">
                                            <span class="post-date"><?php echo get_the_date();?></span>
                                         </div>
                                      </div><!-- Post content end -->
                                   </div><!-- Post Overaly Article 1 end -->

                               <?php   $i++; endwhile; wp_reset_postdata(); endif; ?>      


                        </div><!-- Item 1 end -->

                      
                      



                     </div><!-- Post slide carousel end -->
   
                  </div><!-- Trending news end -->
                <?php
                echo $args['after_widget'];
            }
        }
        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         *
         * @return array
         *
         */

        public function update( $new_instance, $old_instance )
        {
            $instance                = $old_instance;
            $instance['title']       = sanitize_text_field( $new_instance['title'] );
            $instance['category_id'] = (isset( $new_instance['category_id'] ) ) ? absint($new_instance['category_id']) : '';
            $instance['post_number'] = absint( $new_instance['post_number'] );
            return $instance;
        }
        public function form( $instance )
        {
            $instance    = wp_parse_args((array )$instance, $this->defaults());
            $category_id = absint($instance['category_id']);
            $post_number = absint($instance['post_number']);
            $title       = esc_attr($instance['title']);
            ?>
            <p>

                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'news-one'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo $title; ?>"/>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('category_id') ); ?>">
                    <?php esc_html_e('Select Category For Slider Section', 'news-one'); ?>
                </label><br/>
                <?php
                $news_one_slider_dropown_cat = array(
                    'show_option_none' => esc_html__('Uncategorized', 'news-one'),
                    'orderby'          => 'name',
                    'order'            => 'asc',
                    'show_count'       => 1,
                    'hide_empty'       => 1,
                    'echo'             => 1,
                    'selected'         => $category_id,
                    'hierarchical'     => 1,
                    'name'             => esc_attr( $this->get_field_name('category_id') ),
                    'id'               => esc_attr( $this->get_field_name('category_id') ),
                    'class'            => 'widefat',
                    'taxonomy'         => 'category',
                    'hide_if_empty'    => false,
                );

                wp_dropdown_categories( $news_one_slider_dropown_cat );

                ?>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post_number')); ?>"><strong><?php esc_html_e('Number of Posts:', 'news-one'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post_number')); ?>" name="<?php echo esc_attr($this->get_field_name('post_number')); ?>" type="number" value="<?php echo $post_number; ?>" min="1"/>
            </p>
    <?php
        }
    }
}
add_action( 'widgets_init', 'news_one_trending_news_widget' );

function news_one_trending_news_widget()
{
    register_widget( 'News_One_Trending_News_Widget' );
}
