<?php
/**
 * Advertisement Widget
 *
 * @package News One
 */

if (!class_exists('News_One_Advertisement_Widget')) :

    /**
     * Author widget class.
     *
     * @since News One 1.0.0
     */
    class News_One_Advertisement_Widget extends WP_Widget
    {

        /**
         * Constructor.
         *
         * @since News One 1.0.0
         */
        function __construct()
        {
            $opts = array(
                'classname' => 'news_one_widget_advertisement',
                'description' => esc_html__('News One Advertisement Widget.', 'news-one'),
            );
            parent::__construct('news-one-advertisement-widget', esc_html__('News One Advertisement Widget', 'news-one'), $opts);
        }

        /**
         * Echo the widget content.
         *
         * @since 1.0.0
         *
         * @param array $args Display arguments including before_title, after_title,
         *                        before_widget, and after_widget.
         * @param array $instance The settings for the particular instance of the widget.
         */
        function widget($args, $instance)
        {

            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

            $ads_link = !empty($instance['ads_link']) ? $instance['ads_link'] : '';

            $ads_image = !empty($instance['ads_image']) ? $instance['ads_image'] : '';

            echo $args['before_widget']; ?>

            <div class="ads-profile">

                <?php

                if ($title) {
                    echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
                } ?>

                <div class="profile-wrapper ads-section">
                    <?php
                    if (isset($ads_image) && !empty($ads_image)) {
                        ?>
                        <figure class="ads">
                            <a href="<?php echo esc_url($instance['ads_link']);?>" target="_blank"><img src="<?php echo esc_url($instance['ads_image']); ?>">
                            </a>
                        </figure>
                    <?php
                    }
                    ?>
                </div>
                <!-- .profile-wrapper -->

            </div><!-- .ads-profile -->

            <?php

            echo $args['after_widget'];

        }

        /**
         * Update widget instance.
         *
         * @since 1.0.0
         *
         * @param array $new_instance New settings for this instance as input by the user via
         *                            {@see WP_Widget::form()}.
         * @param array $old_instance Old settings for this instance.
         * @return array Settings to save or bool false to cancel saving.
         */
        function update($new_instance, $old_instance)
        {

            $instance = $old_instance;

            $instance['title'] = sanitize_text_field($new_instance['title']);

            $instance['ads_link'] = esc_url_raw($new_instance['ads_link']);

            $instance['ads_image'] = esc_url_raw($new_instance['ads_image']);


            return $instance;
        }

        /**
         * Output the settings update form.
         *
         * @since 1.0.0
         *
         * @param array $instance Current settings.
         * @return void
         */
        function form($instance)
        {

            // Defaults.
            $defaults = array(
                'title' => '',
                'ads_link' => '',
            );

            $instance = wp_parse_args((array)$instance, $defaults);
            ?>

            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title of Advertisement:', 'news-one'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo esc_attr($instance['title']); ?>"/>
            </p>

            <p>
                <label
                    for="<?php echo esc_attr($this->get_field_id('ads_link')); ?>"><strong><?php esc_html_e('Put Advertisement Link:', 'news-one'); ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('ads_link')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('ads_link')); ?>" type="text"
                       value="<?php echo esc_attr($instance['ads_link']); ?>"/>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('ads_image'); ?>">
                    <?php _e('Select Advertisement Image', 'news-one'); ?>
                </label>
                <br/>
                <?php
                if (isset($instance['ads_image']) && $instance['ads_image'] != '') :
                    echo '<img class="widefat custom_media_image" src="' . esc_url($instance['ads_image']) . '" />';
                endif;
                ?>

                <input type="text" class="widefat custom_media_url"
                       name="<?php echo $this->get_field_name('ads_image'); ?>"
                       id="<?php echo $this->get_field_id('ads_image'); ?>" value="<?php
                if (isset($instance['ads_image']) && $instance['ads_image'] != '') :
                    echo esc_url($instance['ads_image']);
                endif;
                ?>">
                <input type="button" class="button button-primary custom_media_button" id="custom_media_button"
                       name="<?php echo $this->get_field_name('ads_image'); ?>"
                       value="<?php esc_attr_e('Upload Ads Image', 'news-one') ?>"/>
            </p>
        <?php

        }
    }
endif;

add_action( 'widgets_init', 'news_one_advertisement_widget' );
function news_one_advertisement_widget()
{
    register_widget( 'News_One_Advertisement_Widget' );
}

add_action('admin_enqueue_scripts', 'news_one_ads_widgets_backend_enqueue');
function news_one_ads_widgets_backend_enqueue()
{
    wp_register_script('news-one-custom-widgets', get_template_directory_uri() . '/assets//js/widget.js', array('jquery'), true);
    wp_enqueue_media();
    wp_enqueue_script('news-one-custom-widgets');
}