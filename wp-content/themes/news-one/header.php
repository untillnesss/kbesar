<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package News_One
 */
$GLOBALS['news_one_theme_options'] = news_one_get_theme_options();
global $news_one_theme_options;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="preloader">
		<div id="no-preloader" class="no-preloader">
			<div class="animation-preloader">
				<div class="spinner"></div>
			</div>	
		</div>
	</div>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'news-one' ); ?></a>
		<div class="body-inner">
			<?php get_template_part( 'template-parts/header/header', 'top' ); ?>
			<!-- Header start -->
			<?php get_template_part( 'template-parts/header/header', 'main' ); ?>

			<?php get_template_part( 'template-parts/header/header', 'nav' ); ?>

			<div id="content" class="site-content">