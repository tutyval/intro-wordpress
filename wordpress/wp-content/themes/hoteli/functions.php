<?php
/**
 * hoteli functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hoteli
 */

if ( ! function_exists( 'hoteli_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hoteli_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on hoteli, use a find and replace
	 * to change 'hoteli' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'hoteli', get_template_directory() . '/languages' );

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
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
    add_image_size( 'hoteli-feature-thumbnail', 400, 250, true );
    add_image_size( 'hoteli-single', 1440, 550, true );
    add_image_size( 'hoteli-large', 1000 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'hoteli' ),
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
	add_theme_support( 'custom-background', apply_filters( 'hoteli_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'hoteli_setup' );

function hoteli_logo() {
    $defaults = array(
        'height'      => 110,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title'),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'hoteli_logo' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hoteli_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hoteli_content_width', 640 );
}
add_action( 'after_setup_theme', 'hoteli_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hoteli_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'hoteli' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'hoteli' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'hoteli_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'hoteli_fonts_url' ) ) :
/**
 * Register Google fonts for hoteli.
 *
 * Create your own hoteli_fonts_url() function to override in a child theme.
 *
 *
 * @return string Google fonts URL for the theme.
 */
function hoteli_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';
	/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'hoteli' ) ) {
		$fonts[] = 'Playfair+Display:400,700,900,400italic,700italic,900italic';
	}
	/* translators: If there are characters in your language that are not supported by Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'hoteli' ) ) {
		$fonts[] = 'Poppins:400,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
endif;
/**
 * Enqueue scripts and styles.
 */
function hoteli_scripts() {
	wp_enqueue_style( 'hoteli-fonts', hoteli_fonts_url(), array(), null );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );

	wp_enqueue_style( 'hoteli-grid', get_template_directory_uri() . '/css/grid.css' );

	wp_enqueue_style( 'hoteli-style', get_stylesheet_uri() );

	wp_enqueue_script( 'hoteli-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '20151288', true );

	wp_enqueue_script( 'hoteli-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'hoteli-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hoteli_scripts' );


function featured_image() {
 global $post;
 echo '<div class="featured-image">';
	
	$page_id = get_queried_object_id();
		if ( has_post_thumbnail( $page_id ) ) :
    		$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $page_id ), 'full' );
    		$image = $image_array[0];
		else :
    		$image = get_template_directory_uri() . '/images/default-background.jpg';
		endif;
		//echo $image;
	?>
	<img src="<?php echo $image; ?>" >
	<div class="overlay">
		<div class="grid-mid">
			<h1 class="page-title"><?php echo get_the_title($post->ID); ?></h1>
		</div>
	</div>
</div>
<?php
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/include-kirki.php';

require get_template_directory() . '/inc/class-hoteli-kirki.php';

require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


