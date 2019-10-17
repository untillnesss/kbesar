<?php 
/**
 * Sanitize checkbox field
 *
 *  @since News One 1.0.0
 */
if (!function_exists('news_one_sanitize_checkbox')) :
    function news_one_sanitize_checkbox($checked)
    {
        // Boolean check.
        return ((isset($checked) && true == $checked) ? true : false);
    }
endif;

/**
 * Sanitizing the image callback example
 *
 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
 *
 * @since News One 1.0.0
 *
 * @param string $image Image filename.
 * @param $setting Setting instance.
 * @return string the image filename if the extension is allowed; otherwise, the setting default.
 *
 */
if ( !function_exists('news_one_sanitize_image') ) :
    function news_one_sanitize_image( $image, $setting ) {
        /*
         * Array of valid image file types.
         *
         * The array includes image mime types that are included in wp_get_mime_types()
         */
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        // Return an array with file extension and mime_type.
        $file = wp_check_filetype( $image, $mimes );
        // If $image has a valid mime_type, return it; otherwise, return the default.
        return ( $file['ext'] ? $image : $setting->default );
    }
endif;


/**
 * Sanitize selection
 *
 *  @since News One 1.0.0
 */
if (!function_exists('news_one_sanitize_select')) :
    function news_one_sanitize_select($input, $setting)
    {
        // Ensure input is a slug.
        $input = sanitize_key($input);
        // Get list of choices from the control associated with the setting.
        $choices = $setting->manager->get_control($setting->id)->choices;
        // If the input is a valid key, return it; otherwise, return the default.
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
endif;

/**
 * Sanitize Multiple Category
 * =====================================
 */
if ( !function_exists('news_one_sanitize_multiple_category') ) :
    function news_one_sanitize_multiple_category( $values ) {
        $multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;
        return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
    }
endif;