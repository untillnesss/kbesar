<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package News_One
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
	<div id="secondary" class="col-sm-4 col-lg-4 col-md-12">
		<div class="sidebar sidebar-right">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- Sidebar right end -->
	</div><!-- Sidebar Col end -->
