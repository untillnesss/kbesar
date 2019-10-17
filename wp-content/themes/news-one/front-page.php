<?php
/**
 * The template for displaying all pages
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package Canyon Themes
 * @subpackage News One
 */
get_header(); ?>
<div class="home-page-slider">
    <?php dynamic_sidebar('home-page-slider-section'); ?>
</div>

<section class="block-wrapper">
    <?php if( !is_page_template('elementor_header_footer') ){ ?>
        <div class="container">
            <div class="row">
                <?php
            }?>
            <div id="primary" class="col-lg-8 col-12">
                <?php
                if ('posts' == get_option('show_on_front')) {

                 include(get_home_template());
             } else {

                dynamic_sidebar('home-page-area');
            } ?>
        </div><!-- Content Col end -->
        <?php get_sidebar(); ?>
      <?php if( !is_page_template('elementor_header_footer') ){ ?>
      </div>
  </div>
<?php }?>
</section><!-- First block end -->

<?php
get_footer();
