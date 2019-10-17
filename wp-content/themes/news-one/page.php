<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
			<div id="primary"  class="col-lg-8 col-12">
				
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

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
