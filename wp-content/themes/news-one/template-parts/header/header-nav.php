<?php
/**
 * Header Nav Section
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package News_One
 */
global $news_one_theme_options;
$header_search = absint( $news_one_theme_options['news_one_search_disable_header'] );
$placeholder = esc_html( $news_one_theme_options['news_one_search_placeholder']); 

?>
	   	<div class="main-nav clearfix dark-nav">
	   		<div class="container">
	   			<div class="row">
	   				<nav class="navbar navbar-expand-lg col">
	   					<div class="site-nav-inner float-left">
	                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
	                     <span class="navbar-toggler-icon"></span>
	                  </button>
	                  <!-- End of Navbar toggler -->
						<?php if( has_nav_menu('menu-1') ){ ?>
	   						<div id="navbarSupportedContent" class="collapse navbar-collapse navbar-responsive-collapse clearfix">
	   							<?php
                   					wp_nav_menu( array( 
            						 	'theme_location' => 'menu-1',
            						 	'container'       => 'ul', 
            						 	'menu_id' => 'primary-menu',
										'depth'           => 0,
            						 	'menu_class' => 'nav navbar-nav',
            						 	'walker' => new WP_Bootstrap_Navwalker(),
            					 	));
                  				?>
	   						</div><!--/ Collapse end -->
	   					<?php } else{ ?>
   						<div id="navbarSupportedContent primary-menu" class="collapse navbar-collapse navbar-responsive-collapse clearfix">
						<ul class="nav navbar-nav">
								<a href="<?php echo esc_url(admin_url( 'nav-menus.php' )); ?> "> <?php esc_html_e('Add a menu','news-one'); ?></a>
						</ul>
    					</div>
	   					<?php } ?>	   						

	   					</div><!-- Site Navbar inner end -->
	   				</nav><!--/ Navigation end -->

	   				<?php if( $header_search == 1 ): ?>
		   				<div class="nav-search">
		   					<span id="search"><i class="fa fa-search"></i></span>
		   				</div><!-- Search end -->	   				
		   				<div class="search-block" style="display: none;">
		   					<span class="search-close">&times;</span>
		   					<?php echo get_search_form(); ?>
		   				</div><!-- Site search end -->
		   			<?php endif; ?>

	   			</div><!--/ Row end -->
	   		</div><!--/ Container end -->

	   	</div><!-- Menu wrapper end -->