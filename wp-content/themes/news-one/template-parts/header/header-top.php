<?php
/**
 * Top Header Section
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package News_One
 */
global $news_one_theme_options;
$trending_enable = absint( $news_one_theme_options['news_one_enable_trending_news'] );
$trending_title = esc_html( $news_one_theme_options['news_one_trending_news_title'] );
$header_date = absint( $news_one_theme_options['news_one_date_enable_disable'] );
$header_social = absint( $news_one_theme_options['news_one_social_icons_enable_disable'] );
$header_cart = absint( $news_one_theme_options['news_one_cart_icon_enable_disable'] );
$header_register = absint( $news_one_theme_options['news_one_login_register_enable_disable'] );
$treding_cat = absint( $news_one_theme_options['trending_news_cat_id'] );
?>
<div id="top-bar" class="top-bar">
	<div class="container">
		<div class="row">
			<?php if( $header_date == 1 ): ?>
				<div class="col-lg-4 col-md-6">
					<span class="ts-date-top">
						<?php news_one_date_display(); ?>
					</span>
				</div><!--/ Top bar left end -->
			<?php endif; ?>
			<div class="col-lg-4 col-md-6 ml-auto topbar-info">
				<div class="topbar-user-panel">
					<?php if( $header_cart == 1 ): ?>
					<span class="ts-login">
						<a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><i class="fa fa-lock"></i></a>
					</span>
				<?php endif; ?>
				<?php if( $header_register == 1 ): ?>
					<span class="ts-register active">
						<a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>"><i class="fa fa-key"></i></a>
					</span>
				<?php endif; ?>
				</div>
				<?php if($header_social == 1): ?>
					<div class="topbar-social social-links">
						<?php
							if ( has_nav_menu( 'social-menu' ) ) {
							     wp_nav_menu( array( 
							     	'theme_location' => 'social-menu', 
							     	'container' => 'ul', 
							     	'menu_class' => 'unstyled'
							     ));
							} 
						?>
					</div>
				<?php endif; ?>
			</div><!--/ Top social col end -->
		</div><!--/ Content row end -->
	</div><!--/ Container end -->
</div><!--/ Topbar end -->
<?php if( 1 == $trending_enable ): ?>
<div class="trending-bar d-md-block d-lg-block d-none">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="trending-title"><?php echo esc_html($trending_title); ?></h3>
			   <div id="trending-slide" class="owl-carousel owl-theme trending-slide">
					<?php 
					 $treding_section = array( 'cat' => $treding_cat,'posts_per_page' => -1 );
                     $treding_section_query = new WP_Query( $treding_section);

					if(  $treding_section_query->have_posts () ): while( $treding_section_query->have_posts () ) :  $treding_section_query->the_post(); ?>
					
						<div class="item">
							<div class="post-content">
								<h2 class="post-title title-small">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
							</div>
						</div>
					<?php endwhile; endif; ?>
				</div><!-- Carousel end -->
			</div><!-- Col end -->
		</div><!--/ Row end -->
	</div><!--/ Container end -->
</div><!--/ Trending end -->
<?php endif; ?>


