<?php
/**
 * Top main Section
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package News_One
 */
global $news_one_theme_options;
$header_ads    = absint( $news_one_theme_options['news_one_header_ads_show_hide'] );
$ads_img_url   = esc_url($news_one_theme_options['news_one_header_ads_image'] );
$ads_link      = esc_url($news_one_theme_options['news_one_header_ads_link'] );
$site_identity = esc_html($news_one_theme_options['news_one_site_identity'] );
?>
	   <header id="header" class="header">
	   	<div class="container">
	   		<div class="row">
	   			<div class="col-lg-3 col-md-12">
	   				<div class="logo">
	   					 <?php
	   					  if(has_custom_logo() ){
	 					   the_custom_logo(); 
	 					 }else{
	 					 	if ( is_front_page() && is_home() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								endif;
								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
									<?php
								endif; } ?>
	   					</div>
	   			</div><!-- logo col end -->

	   			<?php if( $header_ads == 1 ): ?>
		   			<div class="col-lg-9 col-md-12 header-right">
		   				<div class="ad-banner float-right">
		   					<a href="<?php echo esc_url($ads_link); ?>" target="_blank"><img src="<?php echo esc_url($ads_img_url); ?>" class="img-fluid" alt=""></a>
		   				</div>
		   			</div><!-- header right end -->
		   		<?php endif; ?>
	   		</div><!-- Row end -->
	   	</div><!-- Logo and banner area end -->
	   </header><!--/ Header end -->