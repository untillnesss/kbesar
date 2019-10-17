<?php
/**
 * News One Icons menu widget
 *
 * @since 1.0.0
 */

if (!class_exists('News_One_Social_Widget')) :

    /**
     * Social widget class.
     */
    class News_One_Social_Widget extends WP_Widget
    {
        /**
         * Constructor.
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'news-one-social-menu',
                'description' => esc_html__('News One Social Menu Widget', 'news-one'),
            );
            parent::__construct('news-one-social-icons', esc_html__('News One Social Menu Widget', 'news-one'), $opts);
        }

        /**
         * Echo the widget content.
         */
        function widget($args, $instance)
        {

            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

            echo $args['before_widget'];

              if (has_nav_menu('social-menu'))
                       {
            ?>

                        <div class="follow-us">
                            <h3 class="block-title"><span><?php echo $title; ?></span></h3>
                            <div class="social-links">    
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'social-menu',
                                    'menu_class'     => 'social-icon unstyled'
                                    
                                    )
                                );
                                
                                ?>
                            </div>        
                        </div><!-- Widget Social end -->

            <?php } echo $args['after_widget'];

        }
        /**
         * Update widget instance.
         */
        function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $instance['title'] = sanitize_text_field($new_instance['title']);

            return $instance;
        }

        /**
         * Output the settings update form.
         */
        function form($instance)
        {

            $instance = wp_parse_args((array)$instance, array(
                'title' => '',
            ));
            ?>
            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'news-one'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo esc_attr($instance['title']); ?>"/>
            </p>

            <?php if (!has_nav_menu('social')) : ?>
            <p>
                <?php esc_html_e('Please create menu and assign it.', 'news-one'); ?>
            </p>
        <?php endif; ?>
        <?php
        }
    }

endif;

add_action( 'widgets_init', 'news_one_social_widget' );

function news_one_social_widget()
{
    register_widget( 'News_One_Social_Widget' );
}