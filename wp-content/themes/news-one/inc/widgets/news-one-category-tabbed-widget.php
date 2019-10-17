<?php
if (!class_exists( 'News_One_Category_Tabbed_Widget' ) ) {

    class News_One_Category_Tabbed_Widget extends WP_Widget
    {
        private function defaults()
        {
            $defaults = array(
                'widget_title'    => esc_html__( 'Popular News', 'news-one' ),
                'category_id'     => '',
                'post_number'     => 5,
            );
            return $defaults;

        }
        public function __construct()
        {
            parent::__construct(
                'news_one_category_tabbed_widget',
                esc_html__( 'News One Category Tabbed Widget', 'news-one' ),
                array('description' => esc_html__( 'News One Category Tabbed Widget', 'news-one' ) )
            );
        }

        public function widget( $args, $instance )
        {
            $instance = wp_parse_args( (array) $instance, $this->defaults() );

            $post_number               = absint($instance['post_number']);
            $widget_title              = apply_filters('widget_title', !empty($instance['widget_title']) ? esc_html($instance['widget_title']) : '', $instance, $this->id_base);
            $news_one_selected_cat        = '';
            if (!empty($instance['category_id'])) {
                $news_one_selected_cat    = news_one_sanitize_multiple_category($instance['category_id']);
                if (is_array($news_one_selected_cat[0])) {
                    $news_one_selected_cat  = $news_one_selected_cat[0];
                }
            }
            echo $args['before_widget'];
            ?>
            
            <div class="featured-tab color-orange">
                <h3 class="block-title"><span><?php echo $widget_title; ?></span></h3>
                <ul class="nav nav-tabs">
                  
                    <?php
                     $i=1;
                     if(is_array($news_one_selected_cat)){
                     foreach ($news_one_selected_cat  as $cat) {

                       
                        
                    ?> 
                        <li class="nav-item">
                            <a class="nav-link <?php if($i==1){ echo "active show"; } ?>" href="#tab_<?php echo $cat; ?>" data-toggle="tab">
                               <span class="tab-head">
                               <span class="tab-text-title"><?php echo get_cat_name($cat); ?></span>
                            </span>
                            </a>
                        </li>
                        
                       
                <?php $i++; } } ?>

                </ul>

                <div class="tab-content">
                    <?php
                     $j=1;
                     if(is_array($news_one_selected_cat)){
                     foreach ($news_one_selected_cat  as $cat) {
                    ?>
                        <div class="tab-pane animated fadeInRight <?php if($j==1){ echo "active show"; } ?>" id="tab_<?php echo $cat; ?>">
                            <div class="row">
                                <?php
                                 $k=1;
                                  if( $k==1)
                                   {
                                    $tab_section = array(
                                            'ignore_sticky_posts' => true,
                                            'post_type'           => 'post',
                                            'cat'                 => $cat,
                                            'posts_per_page'      => 1,
                                            'order'               => 'DESC'
                                        );
                                    $tab_section_query = new WP_Query($tab_section);
                                ?>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="post-block-style clearfix">
                                                
                                                <?php
                                                  $ID =array();
                                                    while ($tab_section_query->have_posts()):
                                                    $tab_section_query->the_post();
                                                    
                                                    $ID[] = get_the_ID();

                                                     if (has_post_thumbnail()) {
                                                        
                                                        $image_id = get_post_thumbnail_id();
                                                        $image_url = wp_get_attachment_image_src($image_id, 'full', true); 
                                                ?> 
                                                   
                                                    <div class="post-thumb">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <img class="img-fluid" src="<?php echo $image_url[0]; ?>" alt="">
                                                        </a>
                                                    </div>

                                               <?php 
                                                    $categories = get_the_category();
                                                    if ( ! empty( $categories ) ) {
                                                        echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag" class="post-cat">'.esc_html( $categories[0]->name ).'</a>';
                                                    }}
                                                    ?>
                                                    <div class="post-content">
                                                        <h2 class="post-title">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h2>
                                                        <div class="post-meta">
                                                            <span class="post-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php the_author(); ?></a></span>
                                                            <span class="post-date"><?php echo get_the_date();?></span>
                                                        </div>
                                                        <p><?php the_excerpt(); ?></p>
                                                    </div><!-- Post content end -->
                                                <?php  $k++;endwhile; ?>

                                            </div><!-- Post Block style end -->
                                        </div><!-- Col end -->
                                   <?php
                                   }
                                   if( $k >= 2)
                                   {
                                    $tab_section = array(
                                            'ignore_sticky_posts' => true,
                                            'post__not_in'        => $ID,
                                            'post_type'           => 'post',
                                            'cat'                 => $cat,
                                            'posts_per_page'      => $post_number-1,
                                            'order'               => 'DESC'
                                        );
                                    $tab_section_query = new WP_Query($tab_section);
                                   ?>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="list-post-block">
                                            <ul class="list-post">
                                              
                                                <?php
                                                
                                                 while ($tab_section_query->have_posts()):
                                                    $tab_section_query->the_post();
       
                                                ?> 

                                                    <li class="clearfix">
                                                        <div class="post-block-style post-float clearfix">
                                                       <?php
                                                          if (has_post_thumbnail()) {
                                                            $image_id = get_post_thumbnail_id();
                                                            $image_url = wp_get_attachment_image_src($image_id, 'full', true); 
                                                      ?> 
                                                            <div class="post-thumb">
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <img class="img-fluid" src="<?php echo $image_url[0]; ?>" alt="">
                                                                </a>
                                                            </div><!-- Post thumb end -->
                                                         <?php 
                                                            }
                                                            $categories = get_the_category();
                                                            if ( ! empty( $categories ) ) {
                                                                echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag" class="post-cat">'.esc_html( $categories[0]->name ).'</a>';
                                                            }
                                                            ?>

                                                            <div class="post-content left-image">
                                                                <h2 class="post-title title-small">
                                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                                </h2>
                                                                <div class="post-meta">
                                                                    <span class="post-date"><?php echo get_the_date();?></span>
                                                                </div>
                                                            </div><!-- Post content end -->
                                                        </div><!-- Post block style end -->
                                                    </li><!-- Li 1 end -->

                                           <?php endwhile; ?>
                                              

                                            </ul><!-- List post end -->
                                        </div><!-- List post block end -->
                                    </div><!-- List post Col end -->
                                 <?php } ?>


                            </div><!-- Tab pane Row 1 end -->
                        </div><!-- Tab pane 1 end -->
               <?php $j++; } } ?>
                </div><!-- tab content -->
            </div>
            
            <?php
            echo $args['after_widget'];

        }

        public function update( $new_instance, $old_instance )
        {
            $instance  = $old_instance;
            $instance['category_id']       = (isset($new_instance['category_id'])) ? news_one_sanitize_multiple_category( $new_instance['category_id'] ) : array('');
            $instance['widget_title']      = sanitize_text_field( $new_instance['widget_title'] );
            $instance['post_number']       = absint( $new_instance['post_number'] );
            return $instance;
        }

        public function form( $instance )

        {
            $instance                   = wp_parse_args( (array )$instance, $this->defaults() );
            $post_number                = absint($instance['post_number']);
            $widget_title               = esc_attr($instance['widget_title']);
            $news_one_selected_cat      = '';

            if (!empty($instance['category_id'])) {
                $news_one_selected_cat = news_one_sanitize_multiple_category($instance['category_id']);
                if (is_array($news_one_selected_cat[0])) {
                    $news_one_selected_cat = $news_one_selected_cat[0];
                }
            } ?>
            <p>

                <label for="<?php echo esc_attr($this->get_field_id('widget_title')); ?>"><strong><?php esc_html_e('Title:', 'news-one'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_title')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_title')); ?>" type="text" value="<?php echo $widget_title; ?>"/>
            </p>

            <hr>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('category_id')); ?>"><strong><?php esc_html_e('Select Category', 'news-one'); ?></strong></label>
                <select class="widefat" name="<?php echo $this->get_field_name('category_id'); ?>[]" id="<?php echo esc_attr($this->get_field_id('post_number')); ?>" multiple="multiple">
                    <?php
                    $option        = '';

                    $categories    = get_categories();

                    if ( $categories ) {

                        foreach ($categories as $category) {

                            $result = in_array($category->term_id, $news_one_selected_cat) ? 'selected=selected' : '';

                            $option .= '<option value="' . esc_attr($category->term_id) . '"' . esc_attr($result) . '>';

                            $option .= esc_html($category->cat_name);

                            $option .= esc_html(' (' . $category->category_count . ')');

                            $option .= '</option>';
                        }
                    }
                    echo $option;
                    ?>
                </select>
            </p>
            <hr>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post_number')); ?>"><strong><?php esc_html_e('Number of Posts:', 'news-one'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('post_number')); ?>" name="<?php echo esc_attr($this->get_field_name('post_number')); ?>" type="number" value="<?php echo $post_number; ?>" min="1"/>
            </p>


<?php         }
    }
}
add_action( 'widgets_init', 'news_one_category_tabbed_widget' );
function news_one_category_tabbed_widget()
{
    register_widget( 'News_One_Category_Tabbed_Widget' );

}