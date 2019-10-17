<?php
/**
 * News One functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package News_One
 */

if ( ! function_exists( 'news_one_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function news_one_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on News One, use a find and replace
		 * to change 'news-one' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'news-one', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Custom images size for slider
		 */
		add_image_size( 'news-one-slider', 650, 465, true ); 
		add_image_size( 'news-one-sr-top', 460, 280, true); 
		add_image_size( 'news-one-sr-btm', 230, 180, true ); 

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary Menu', 'news-one' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'news-one' ),
			'social-menu' => esc_html__( 'Social Menu', 'news-one' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'news_one_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'news_one_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function news_one_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'news_one_content_width', 640 );
}
add_action( 'after_setup_theme', 'news_one_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function news_one_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'news-one' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'news-one' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="block-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Slider Section', 'news-one' ),
		'id'            => 'home-page-slider-section',
		'description'   => esc_html__( 'Add News One Slider Widget here.', 'news-one' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="block-title">',
		'after_title'   => '</h3>',
	) );

	
	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Area', 'news-one' ),
		'id'            => 'home-page-area',
		'description'   => esc_html__( 'Add widgets here.', 'news-one' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="block-title">',
		'after_title'   => '</h3>',
	) );	

	/*Footer Bottom Section*/
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom 1', 'news-one' ),
		'id'            => 'footer-bottom-1',
		'description'   => esc_html__( 'Add widgets here.', 'news-one' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="block-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom 2', 'news-one' ),
		'id'            => 'footer-bottom-2',
		'description'   => esc_html__( 'Add widgets here.', 'news-one' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="block-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom 3', 'news-one' ),
		'id'            => 'footer-bottom-3',
		'description'   => esc_html__( 'Add widgets here.', 'news-one' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="block-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom 4', 'news-one' ),
		'id'            => 'footer-bottom-4',
		'description'   => esc_html__( 'Add widgets here.', 'news-one' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="block-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'news_one_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function news_one_scripts() {
	/*google font  */
	wp_enqueue_style( 'news-one-googleapis', '//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i', array(), null );

	/*Bootstrap CSS*/
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.5.0' );

	/*Font-Awesome-master*/
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.5.0' );

	/*Animited CSS*/
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '4.5.0' );

	/*owlcarousel CSS*/
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '4.5.0' );

	/*owltheme default CSS*/
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), '4.5.0' );

	
	/*Colorbox CSS*/
	wp_enqueue_style( 'colorbox', get_template_directory_uri() . '/assets/css/colorbox.css', array(), '4.5.0' );

	/*owltheme default CSS*/
	wp_enqueue_style( 'news-one-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '4.5.0' );

	wp_enqueue_style( 'news-one-style', get_stylesheet_uri() );

	/*Bootstrap JS*/
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '4.6.0' );

	

	wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.js', array('jquery'), '4.5.0' );

	wp_enqueue_script( 'colorbox', get_template_directory_uri() . '/assets/js/jquery.colorbox.js', array('jquery'), '4.5.0' );

	wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '4.5.0' );

	wp_enqueue_script( 'news-one-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'news-one-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '4.5.0' );

	global $news_one_theme_options;
	$sidebar_options = esc_attr( $news_one_theme_options['news_one_sticky_sidebar_options'] );

	if( $sidebar_options ==  1 )
	{
		wp_enqueue_script( 'news-one-theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array('jquery'), '4.5.0' );
		wp_enqueue_script( 'news-one-custom-sticky-sidebar', get_template_directory_uri() . '/assets/js/custom-sticky-sidebar.js', array('jquery'), '4.5.0' );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'news_one_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * custom widget slider added
 */
require get_template_directory() . '/inc/widgets/news-one-slider-widget.php';

/**
 * custom widget category Column
 */
require get_template_directory() . '/inc/widgets/news-one-category-column.php';

/**
 * custom widget social widget
*/
require get_template_directory() . '/inc/widgets/news-one-social-widget.php';

/**
 * custom recent news
*/
require get_template_directory() . '/inc/widgets/news-one-recent-post.php';


/**
 * custom author  news
*/
require get_template_directory() . '/inc/widgets/news-one-author-widget.php';

/**
 * custom advertisment news
*/
require get_template_directory() . '/inc/widgets/news-one-advertisment-widget.php';

/**
 * custom Tabbed Widget news
*/
require get_template_directory() . '/inc/widgets/news-one-category-tabbed-widget.php';

/**
 * Trending News Widget news
*/
require get_template_directory() . '/inc/widgets/news-one-trending-news-widget.php';

/**
 * Load custom fuctions/sanitze function
*/
require get_template_directory() . '/inc/custom-functions/news-one-sanitize-functions.php';

/**
 * Load custom fuctions/sanitze function
*/
require get_template_directory() . '/inc/custom-functions/news-one-custom-functions.php';
/**
 * Load Breadcrumb File
*/
require get_template_directory() . '/inc/breadcrumbs/breadcrumbs.php';

/**
 * Load Bootstrap Nav Walker File
*/
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Load TGM File
*/
require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

/**
 * Plugin recommendation using TGM
*/
require get_template_directory() . '/inc/hooks/tgm.php';

/**
 * Load Upgrade to pro
 */
require get_template_directory() . '/inc/customizer-pro/class-customize.php';

/**
 * Dummy File Load 
*/
require get_template_directory() . '/inc/dummy-data/dummy-file.php';