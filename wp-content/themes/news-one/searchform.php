<?php
/**
* Custom Search Form
*
* @package Canyon Themes
* @subpackage News One
*/
global $news_one_theme_options;
?>
<div class="sidebar-search-block">
    <form action="<?php echo esc_url( home_url() )?>" class="searchform search-form" id="searchform" method="get" role="search">
        <div>
            <label for="menu-search" class="screen-reader-text"></label>
            <?php
            $news_one_placeholder_text = '';  
            $news_one_placeholder_option = $news_one_theme_options['news_one_site_search_placeholder_options'] ;
            if ( !empty( $news_one_placeholder_option) ):
                $news_one_placeholder_text = 'placeholder="'.esc_attr ( $news_one_placeholder_option ). '"';
            endif; ?>
            <input type="text" <?php echo $news_one_placeholder_text ;?> class="blog-search-field" id="menu-search" name="s" value="<?php echo get_search_query();?>">
            <button class="searchsubmit fa fa-search" type="submit" id="searchsubmit"></button>
        </div>
    </form>
</div>