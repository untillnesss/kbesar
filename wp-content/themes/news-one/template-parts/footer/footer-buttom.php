<?php


global $news_one_theme_options;
$go_top = absint( $news_one_theme_options['news_one_disable_to_top'] );
$copyright = wp_kses_post( $news_one_theme_options['news_one_footer_copyright'] );
$footer_menu = absint( $news_one_theme_options['news_one_footer_menu_hide'] );

?>
<div class="copyright">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12">
				<div class="copyright-info">
					<span><?php echo $copyright; ?><?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s', 'news-one' ), 'News One', '<a href="https://www.canyonthemes.com">Canyon Themes</a>' );
				?></span>
				</div>
			</div>

			<div class="col-lg-6 col-md-12">
				<?php if( $footer_menu == 1 ): ?>
					<div class="footer-menu">
						<ul class="nav unstyled">
							<?php 
								if ( has_nav_menu( 'footer-menu' ) ) {
								wp_nav_menu('footer-menu'); 
							}
							?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div><!-- Row end -->

		<?php if( $go_top == 1 ): ?>
			<div id="back-to-top" class="back-to-top">
				<button class="btn btn-primary" title="Back to Top">
					<i class="fa fa-angle-up"></i>
				</button>
			</div>
		<?php endif; ?>
	</div><!-- Container end -->
</div><!-- Copyright end -->