<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package News_One
 */

get_header();
?>
    <section class="block-wrapper fourzerofour_error">
		<div class="container">
			<div class="row">
				<div class="error-page text-center col">
					<div class="error-code">
						<h2><strong><?php esc_html_e('404','news-one'); ?></strong></h2>
					</div>
					<div class="error-message">
						<h3><?php esc_html_e('Oops... Page Not Found!','news-one'); ?></h3>
					</div>
					<div class="error-body">
						<?php esc_html_e('Try using the button below to go to main page of the site','news-one'); ?> <br>
						<a href="<?php echo site_url(); ?>" class="btn btn-primary"><?php esc_html_e('Back to Home Page','news-one'); ?></a>
					</div>
				</div>

			</div><!-- Row end -->


		</div><!-- Container end -->
	</section><!-- First block end -->
	


<?php
get_footer();
