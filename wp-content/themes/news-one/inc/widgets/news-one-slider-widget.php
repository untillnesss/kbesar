<?php
/**
* The template for displaying slider in home page
* @link https://codex.wordpress.org/Template_Hierarchy
* @package Canyon Themes
* @subpackage News One
*/
?>
<?php
/**
* Class for adding Our Testimonials Section Widget
*
* @package Canyon Themes
* @subpackage Nexas
* @since 1.0.0
*/
if ( !class_exists( 'News_One_Slider_Widget' ) )
{
class News_One_Slider_Widget extends WP_Widget
{
private function defaults()
/* Default Value */
{
$defaults = array(
'category_id'     => '',
'number_of_post'  => '',
'featured_cat_id' => 3
);
return $defaults;
}

public function __construct()

{
parent::__construct(
'news-one-slider-widget',
esc_html__( 'News One Slider Widget', 'news-one' ),
array( 'description' => esc_html__( 'News One Slider Widget For Home Page', 'news-one' ) )
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
$slider_category_id = absint( $instance['category_id'] );
$featured_cat_id    =  absint( $instance['featured_cat_id'] );
$number_of_post     =  absint( $instance['number_of_post'] );

$featured_cat_selected_cat = '';
if (!empty($instance['featured_cat_id']))
{
    $featured_cat_selected_cat = news_one_sanitize_multiple_category($instance['featured_cat_id']);
    if (is_array($featured_cat_selected_cat[0]))
    {
        $featured_cat_selected_cat = $featured_cat_selected_cat[0];
    }
}

?>
<section class="featured-post-area no-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 pad-r">
                <div id="featured-slider" class="owl-carousel owl-theme featured-slider content-bottom">
                    <?php
                    $i = 0;
                    $sticky = get_option( 'sticky_posts' );
                    if ($slider_category_id != -1) {
                        $home_recent_post_section = array(
                            'ignore_sticky_posts' => true,
                            'post__not_in'        => $sticky,
                            'cat'                 => $slider_category_id,
                            'posts_per_page'      => $number_of_post,
                            'order'               => 'DESC'
                        );
                    } else {
                        $home_recent_post_section = array(
                            'ignore_sticky_posts' => true,
                            'post__not_in'        => $sticky,
                            'post_type'           => 'post',
                            'posts_per_page'      => $number_of_post,
                            'order'               => 'DESC'
                        );
                    }
                    $home_recent_post_section_query = new WP_Query($home_recent_post_section);
                    if ( $home_recent_post_section_query->have_posts() ) :
                        while ($home_recent_post_section_query->have_posts()) :
                            $home_recent_post_section_query->the_post();
                            if (has_post_thumbnail()) { 
                               $image_id = get_post_thumbnail_id();
                               $image_url = wp_get_attachment_image_src($image_id, 'news-one-slider', true); 
                               ?>
                               <div class="item" style="background-image:url(<?php echo  $image_url[0];  ?>)">
                                <div class="featured-post">
                                    <div class="post-content">
                                        <?php
                                        $categories = get_the_category();
                                        if ( ! empty( $categories ) ) {
                                            echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag" class="post-cat">'.esc_html( $categories[0]->name ).'</a>';
                                        }
                                        ?>
                                        <h2 class="post-title title-extra-large">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        <span class="post-date"><?php echo get_the_date();?></span>
                                    </div>
                                </div><!--/ Featured post end -->

                            </div><!-- Item 1 end -->
                        <?php } $i++; endwhile; wp_reset_postdata(); endif; ?>
                    </div><!-- Featured owl carousel end-->
                </div><!-- Col 7 end -->

                <div class="col-lg-5 col-md-12 pad-l">
                    <div class="row">
                      <?php
                      $i=1; 
                      if(is_array($featured_cat_selected_cat)){                               
                      foreach ( $featured_cat_selected_cat as $cat_id ) { 


                        $feature_section = array(
                            'ignore_sticky_posts' => true,
                            'post__not_in'        => $sticky,
                            'post_type'           => 'post',
                            'cat'                 => $cat_id,
                            'posts_per_page'      => 1,
                            'order'               => 'DESC'
                        );
                        $feature_section_query = new WP_Query($feature_section);

                        if ($feature_section_query->have_posts()):
                            if( $i== 1)
                                { ?>
                                    <div class="col-md-12">

                                    <?php } else
                                    { ?>
                                        <div class="col-md-6 <?php if( $i== 2) { echo "pad-r-small"; } else { echo "pad-l-small"; } ?> ">
                                        <?php }
                                        ?> 

                                        <?php
                                        while ($feature_section_query->have_posts()):
                                            $feature_section_query->the_post();
                                            ?>    
                                            <div class="post-overaly-style contentBottom hot-post-top clearfix">
                                                <?php
                                                if (has_post_thumbnail()) { 
                                                   $image_id = get_post_thumbnail_id();

                                                   if( $i== 1)
                                                   {    
                                                      $image_url = wp_get_attachment_image_src($image_id, 'news-one-sr-top', true); 
                                                  }
                                                  else
                                                  {

                                                     $image_url = wp_get_attachment_image_src($image_id, 'news-one-sr-btm', true); 
                                                 }

                                                 ?> 

                                                 <div class="post-thumb">
                                                    <a href="<?php the_permalink(); ?>"><img class="img-fluid" src="<?php echo $image_url[0]; ?>" alt="" /></a>
                                                </div>
                                            <?php } ?>

                                            <div class="post-content">
                                             <?php
                                             $categories = get_the_category();
                                             if ( ! empty( $categories ) ) {
                                                echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"rel="category tag" class="post-cat">'.esc_html( $categories[0]->name ).'</a>';
                                            }
                                            ?>
                                            <h2 class="post-title title-large">
                                                <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(),5); ?></a>
                                            </h2>
                                            <span class="post-date"><?php echo get_the_date();?></span>
                                        </div><!-- Post content end -->
                                    </div><!-- Post Overaly end -->
                                <?php  endwhile; ?>

                            </div><!-- Col end -->
                        <?php  endif; wp_reset_postdata(); $i++; } } ?>

                    </div>
                </div><!-- Col 5 end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- Trending post end -->
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
$instance              = $old_instance;
$instance['category_id']    = (isset( $new_instance['category_id'] ) ) ? absint($new_instance['category_id']) : '';

$instance['number_of_post'] = absint($new_instance['number_of_post']);


$instance['featured_cat_id'] = $new_instance['featured_cat_id'];


return $instance;
}
public function form( $instance )
{
$instance = wp_parse_args((array )$instance, $this->defaults());
$category_id      = absint($instance['category_id']);
$number_of_post   = absint($instance['number_of_post']);
$featured_cat_id  = absint($instance['featured_cat_id']);

?>
<p>
<label for="<?php echo esc_attr( $this->get_field_id('category_id') ); ?>">
    <?php esc_html_e('Select Category For Slider Section', 'news-one'); ?>
</label><br/>
<?php
$news_one_slider_dropown_cat = array(
    'show_option_none' => esc_html__('From Recent Posts', 'news-one'),
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
<hr>
<p>
<label for="<?php echo esc_attr($this->get_field_id('number_of_post')); ?>">
    <strong><?php esc_html_e('Number of Posts on Right:', 'news-one'); ?></strong>
</label>
<input class="widefat" id="<?php echo esc_attr($this->get_field_id('number_of_post')); ?>" name="<?php echo esc_attr($this->get_field_name('number_of_post')); ?>" type="number" value="<?php echo $number_of_post; ?>" min="2"/>
</p>
<hr>
<p>
<label for="<?php echo esc_attr( $this->get_field_id('featured_cat_id') ); ?>">
 <strong> <?php esc_html_e('Select Categories For Featured Section', 'news-one'); ?>
</strong>
</label><br/>
<ul>
<li>
<?php
$news_one_featured_dropown_cat = array(
    'orderby'          => 'name',
    'order'            => 'asc',
    'show_count'       => 1,
    'hide_empty'       => 1,
    'echo'             => 1,
    'selected'         => $featured_cat_id,
    'hierarchical'     => 1,
    'name'             => esc_attr( $this->get_field_name('featured_cat_id') ),
    'id'               => esc_attr( $this->get_field_name('featured_cat_id') ),
    'class'            => 'widefat',
    'taxonomy'         => 'category',
    'hide_if_empty'    => false,
);

   // Instantiate the walker passing name and id as arguments to constructor
$walker = new News_One_Category_Checklist_Widget(
    $this->get_field_name( 'featured_cat_id' ), 
    $this->get_field_id( 'featured_cat_id' )
);
echo '<ul class="categorychecklist">';
wp_category_checklist( 0, 0, $instance['featured_cat_id'], FALSE, $walker, FALSE );
echo '</ul>';
?>
</li>
</ul>
</p>
<?php
}
}
}
add_action( 'widgets_init', 'news_one_slider_widget' );

function news_one_slider_widget()
{
register_widget( 'News_One_Slider_Widget' );
}