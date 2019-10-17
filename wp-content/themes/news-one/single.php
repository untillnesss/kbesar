<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package News_One
 */ 
get_header();
 global $news_one_theme_options;
 $breadcrumb_option = absint( $news_one_theme_options['news_one_site_breadcrumb_options'] );

 if( $breadcrumb_option == 1)
 {
?>
<div class="page-title">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php news_one_breadcrumb_trail()?>
			</div><!-- Col end -->
		</div><!-- Row end -->
	</div><!-- Container end -->
</div><!-- Page title end -->
<?php } ?>
	<section class="block-wrapper">
		<div class="container">
			<div class="row">
				<div  id="primary" class="col-lg-8 col-12">
					
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			/**
			 * Post Navigation function
			 * @since News One 1.0.0
			 *
			 */
			?>
			<nav class="post-navigation clearfix">
                  <div class="post-previous">                  
                          <span><i class="fa fa-angle-left"></i><?php previous_post_link('%link'," Previous Post ", TRUE); ?></span>
                       
                          <?php previous_post_link('%link'," <h3>%title</h3>", TRUE); ?>
                  </div>
                  <div class="post-next">                      
                  	<span><?php next_post_link ('%link'," Next Post ", TRUE); ?> <i class="fa fa-angle-right"></i></span>
                  
                      <?php next_post_link('%link'," <h3>%title</h3>", TRUE); ?>                      
                  </div>       
               </nav><!-- Post navigation end -->

			<?php

			/**
			 * news_one_author_infos hook
			 * @since News One 1.0.0
			 *
			 * @hooked news_one_author_info -  10
			 */	
				do_action( 'news_one_author_infos' );

			/**
			 * news_one_related_posts hook
			 * @since News One 1.0.0
			 *
			 * @hooked news_one_related_posts -  10
			 */
			do_action( 'news_one_related_posts' ,get_the_ID() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</div><!-- Content Col end -->
			<?php get_sidebar(); ?>

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->

<?php
get_footer();
