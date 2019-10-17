<?php
/**
 * The template for displaying slider in home page
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Canyon Themes
 * @subpackage News One
 */

if ( !class_exists( 'News_One_Recent_Post_Widget' ) )
{
    class News_One_Recent_Post_Widget extends WP_Widget
    {
        private function defaults()
            /* Default Value */
        {
            $defaults = array(
                'title'          => esc_html__( 'Recent News', 'news-one' ),
                'post_number'    => 5,
            );
            return $defaults;
        }

        public function __construct()

        {
            parent::__construct(
                'news-one-recent-posts-widget',
                esc_html__( 'News One Recent Posts Widget', 'news-one' ),
                array( 'description' => esc_html__( 'News One Recent News Widget', 'news-one' ) )
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
                $post_number    = absint($instance['post_number']);
                $query_args     = array('post_type'=>'post','posts_per_page'=>$post_number,'order'=>'desc');
                    $recent_posts = new WP_Query($query_args);
                    if ( $recent_posts->have_posts() ):

                ?>                         
                    <div class="color-default recent-posts">
                        <h3 class="block-title"><span><?php echo $title; ?></span></h3>
                        <div class="list-post-block">
                            <ul class="list-post">
                                <?php
                                while ( $recent_posts->have_posts() ):
                                   $recent_posts->the_post();
                                ?>
                                    <li class="clearfix">
                                        <div class="post-block-style post-float clearfix">
                                            <?php

                                            if (has_post_thumbnail()) {
                                               $image_id = get_post_thumbnail_id();
                                                $image_url = wp_get_attachment_image_src($image_id, 'full', true); ?>
                                                    <div class="post-thumb">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img class="img-fluid" src="<?php echo $image_url[0]; ?>" alt="">
                                                        </a>
                                                       <?php
                                                        $categories = get_the_category();
                                                        if ( ! empty( $categories ) ) {
                                                            echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag" class="post-cat">'.esc_html( $categories[0]->name ).'</a>';
                                                        }
                                                        ?>
                                                    </div><!-- Post thumb end -->
                                                   <?php } ?> 
                                                    <div class="post-content">
                                                        <h2 class="post-title title-small">
                                                            <a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                                        </h2> 
                                                            <div class="post-meta">
                                                                <span class="post-date"><?php echo get_the_date('M d, Y');?></span>
                                                            </div>
                                                    </div><!-- Post content end -->
                                     
                                            </div><!-- Post block style end -->
                                    </li><!-- Li 1 end -->

                               <?php endwhile;wp_reset_postdata(); ?>

                            </ul><!-- List post end -->
                        </div><!-- List post block end -->
                    </div><!-- Popular news widget end -->
                <?php
                endif;
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
            $instance              = $old_instance;
            $instance['title']     = sanitize_text_field( $new_instance['title'] );
            $instance['post_number']                = absint( $new_instance['post_number'] );
            return $instance;
        }
        public function form( $instance )
        {
            $instance = wp_parse_args((array )$instance, $this->defaults());
            $post_number   = absint($instance['post_number']);
            $title       = esc_attr($instance['title']);
            ?>
            <p>

                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'news-one'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo $title; ?>"/>
            </p>
           
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post_number')); ?>"><strong><?php esc_html_e('Number of Posts:', 'news-one'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post_number')); ?>" name="<?php echo esc_attr($this->get_field_name('post_number')); ?>" type="number" value="<?php echo $post_number; ?>" min="1"/>
            </p>
             <hr>
    <?php
        }
    }
}
add_action( 'widgets_init', 'news_one_recent_post_widget' );

function news_one_recent_post_widget()
{
    register_widget( 'News_One_Recent_Post_Widget' );
}
