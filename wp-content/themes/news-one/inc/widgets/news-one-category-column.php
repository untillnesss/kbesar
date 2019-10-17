<?php
if (!class_exists( 'News_One_Category_Column_Widget' ) ) {

    class News_One_Category_Column_Widget extends WP_Widget
    {
        private function defaults()
        {
            $defaults = array(
                'category_id_1'     => '',
                'category_id_2'     => '',
                'post_number'     => 5,
            );
            return $defaults;

        }
        public function __construct()
        {
            parent::__construct(
                'news_one_category_column_widget',
                esc_html__( 'News One Two Category Column Widget', 'news-one' ),
                array('description' => esc_html__( 'News-One Two Category Column Widget', 'news-one' ) )
            );
        }

        public function widget( $args, $instance )
        {
            $instance = wp_parse_args( (array) $instance, $this->defaults() );

            $category_id_1 = absint( $instance['category_id_1'] );
            $category_id_2 =  absint( $instance['category_id_2'] );
            $post_number   = absint($instance['post_number']);
            
            echo $args['before_widget'];
            ?>
            <div class="block">
                <div class="row">
                    <div class="col-lg-6 col-md-6 color-violet">
                    
                    <h3 class="block-title"><span><?php echo esc_html( get_cat_name( $category_id_1 ) ); ?></span></h3>
                        <div class="post-overaly-style clearfix">
                       <?php  
                        $i=1;
                       $two_category_section = array(
                                    'ignore_sticky_posts' => true,
                                    'post_type'           => 'post',
                                    'cat'                 => $category_id_1,
                                    'posts_per_page'      => $post_number,
                                    'order'               => 'DESC'
                                );
                            $two_category_section_query = new WP_Query($two_category_section);

                         if( $i == 1)
                         {   

                              $ID =array();
                                while ($two_category_section_query->have_posts()):
                                $two_category_section_query->the_post();
                                
                                $ID[] = get_the_ID();

                                 if (has_post_thumbnail()) {
                                    
                                    $image_id = get_post_thumbnail_id();
                                    $image_url = wp_get_attachment_image_src($image_id, 'full', true); 
                            ?> 
                    
                                    <div class="post-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="img-fluid" src="<?php echo  $image_url [0] ?>" alt="" />
                                        </a>
                                    </div>

                            <?php } ?>  
                                    <div class="post-content">
                                        <h2 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="post-date"><?php echo get_the_date();?></span>
                                        </div>
                                    </div><!-- Post content end -->

                       <?php $i++; break; endwhile; }
                        
                       ?>
                        </div><!-- Post Overaly Article end -->

                     <?php
                      if( $i >=2)
                      {
                     ?>
                        <div class="list-post-block">
                            <ul class="list-post">
                            <?php
                             while ( $two_category_section_query->have_posts()):
                            $two_category_section_query->the_post();
                              ?>    
                                <li class="clearfix">
                                    <div class="post-block-style post-float clearfix">
                                        
                                        <?php

                                         if (has_post_thumbnail()) {
                                            
                                            $image_id = get_post_thumbnail_id();
                                            $image_url = wp_get_attachment_image_src($image_id, 'full', true); ?>
                                                <div class="post-thumb">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <img class="img-fluid" src="<?php echo  $image_url[0]; ?>" alt="" />
                                                    </a>
                                                </div><!-- Post thumb end -->
                                       <?php } ?>

                                        <div class="post-content">
                                            <h2 class="post-title title-small">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h2>
                                            <div class="post-meta">
                                                <span class="post-date"><?php echo get_the_date();?></span>
                                            </div>
                                        </div><!-- Post content end -->
                                    </div><!-- Post block style end -->
                                </li><!-- Li 1 end -->

                            <?php $i++;endwhile; } ?>  

                            </ul><!-- List post end -->
                        </div><!-- List post block end -->
                       
                    </div><!-- Col 1 end -->

                    <div class="col-lg-6 col-md-6 color-aqua">
                         <h3 class="block-title"><span><?php echo esc_html( get_cat_name( $category_id_2 ) ); ?></span></h3>
                        <div class="post-overaly-style clearfix">
                       <?php  
                        $i=1;
                       $two_category_section = array(
                                    'ignore_sticky_posts' => true,
                                    'post_type'           => 'post',
                                    'cat'                 => $category_id_2,
                                    'posts_per_page'      => $post_number,
                                    'order'               => 'DESC'
                                );
                            $two_category_section_query = new WP_Query($two_category_section);

                         if( $i == 1)
                         {   

                              $ID =array();
                                while ($two_category_section_query->have_posts()):
                                $two_category_section_query->the_post();
                                
                                $ID[] = get_the_ID();

                                 if (has_post_thumbnail()) {
                                    
                                    $image_id = get_post_thumbnail_id();
                                    $image_url = wp_get_attachment_image_src($image_id, 'full', true); 
                            ?> 
                    
                                    <div class="post-thumb">
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="img-fluid" src="<?php echo  $image_url [0] ?>" alt="" />
                                        </a>
                                    </div>

                            <?php } ?>  
                                    <div class="post-content">
                                        <h2 class="post-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <div class="post-meta">
                                            <span class="post-date"><?php echo get_the_date();?></span>
                                        </div>
                                    </div><!-- Post content end -->

                       <?php $i++;break;endwhile;  }  ?>
                        </div><!-- Post Overaly Article end -->

                     <?php
                      if( $i >=2)
                      {
                     ?>
                        <div class="list-post-block">
                            <ul class="list-post">
                            <?php
                             while ( $two_category_section_query->have_posts()):
                            $two_category_section_query->the_post();
                              ?>    
                                <li class="clearfix">
                                    <div class="post-block-style post-float clearfix">
                                        
                                        <?php

                                         if (has_post_thumbnail()) {
                                            
                                            $image_id = get_post_thumbnail_id();
                                            $image_url = wp_get_attachment_image_src($image_id, 'full', true); ?>
                                                <div class="post-thumb">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <img class="img-fluid" src="<?php echo  $image_url[0]; ?>" alt="" />
                                                    </a>
                                                </div><!-- Post thumb end -->
                                       <?php } ?>

                                        <div class="post-content">
                                            <h2 class="post-title title-small">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h2>
                                            <div class="post-meta">
                                                <span class="post-date"><?php echo get_the_date();?></span>
                                            </div>
                                        </div><!-- Post content end -->
                                    </div><!-- Post block style end -->
                                </li><!-- Li 1 end -->

                            <?php $i++;endwhile;  ?>  

                            </ul><!-- List post end -->
                        </div><!-- List post block end -->
                      <?php } ?>  
                    </div><!-- Col 2 end -->
                </div><!-- Row end -->
            </div><!-- Block Lifestyle end -->
            <div class="gap-40"></div>
            
            <?php
            echo $args['after_widget'];
        }
        public function update( $new_instance, $old_instance )
        {
            $instance  = $old_instance;
            $instance['category_id_1']    = (isset( $new_instance['category_id_1'] ) ) ? absint($new_instance['category_id_1']) : '';
            $instance['category_id_2']    = (isset( $new_instance['category_id_2'] ) ) ? absint($new_instance['category_id_2']) : '';
            $instance['post_number']    = absint( $new_instance['post_number'] );
            return $instance;
        }

        public function form( $instance )

        {
            $instance      = wp_parse_args( (array )$instance, $this->defaults() );
            $category_id_1 = absint($instance['category_id_1']);
            $category_id_2 = absint($instance['category_id_2']);
            $post_number   = absint($instance['post_number']);
            ?>          
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('category_id_1') ); ?>">
                <strong><?php esc_html_e('Select First Category For Slider Section', 'news-one'); ?></strong>
                </label><br/>
                <?php
                $news_one_category_col_1_dropown_cat = array(
                    'show_option_none' => esc_html__('Uncategorized', 'news-one'),
                    'orderby'          => 'name',
                    'order'            => 'asc',
                    'show_count'       => 1,
                    'hide_empty'       => 1,
                    'echo'             => 1,
                    'selected'         => $category_id_1,
                    'hierarchical'     => 1,
                    'name'             => esc_attr( $this->get_field_name('category_id_1') ),
                    'id'               => esc_attr( $this->get_field_name('category_id_1') ),
                    'class'            => 'widefat',
                    'taxonomy'         => 'category',
                    'hide_if_empty'    => false,
                );
                wp_dropdown_categories( $news_one_category_col_1_dropown_cat );
                ?>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('category_id_2') ); ?>">
                <strong><?php esc_html_e('Select Second Category For Slider Section', 'news-one'); ?></strong>
                </label><br/>
                <?php
                $news_one_category_col_2_dropown_cat = array(
                    'show_option_none' => esc_html__('Uncategorized', 'news-one'),
                    'orderby'          => 'name',
                    'order'            => 'asc',
                    'show_count'       => 1,
                    'hide_empty'       => 1,
                    'echo'             => 1,
                    'selected'         => $category_id_2,
                    'hierarchical'     => 1,
                    'name'             => esc_attr( $this->get_field_name('category_id_2') ),
                    'id'               => esc_attr( $this->get_field_name('category_id_2') ),
                    'class'            => 'widefat',
                    'taxonomy'         => 'category',
                    'hide_if_empty'    => false,
                );
                wp_dropdown_categories( $news_one_category_col_2_dropown_cat );
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
add_action( 'widgets_init', 'news_one_category_column_widget' );
function news_one_category_column_widget()
{
    register_widget( 'News_One_Category_Column_Widget' );

}