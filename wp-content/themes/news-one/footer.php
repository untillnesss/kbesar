<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package News_One
 */
?>
<?php 
if (is_active_sidebar('footer-bottom-1') || is_active_sidebar('footer-bottom-2') || is_active_sidebar('footer-bottom-3') || is_active_sidebar('footer-bottom-4') ) {

?>
<footer id="footer" class="footer">
	<?php get_template_part( 'template-parts/footer/footer', 'main' ); ?>
</footer>
<?php } ?>
	<?php get_template_part( 'template-parts/footer/footer', 'buttom' ); ?>
</footer>
</div><!-- Body inner end -->
<?php wp_footer(); ?>
</body>
</html>
