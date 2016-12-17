<?php
/**
 * Creative Creature Studio functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Photo_Perfect
 */

if ( ! function_exists( 'creative_creature_studio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function creative_creature_studio_setup() {
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'creative_creature_studio' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );

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

		/*
		* Add editor style.
		*/
		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		add_editor_style( array( 'css/editor-style' . $min . '.css' ) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'creative_creature_studio_custom_background_args', array(
			'default-color' => '000000',
			'default-image' => '',
		) ) );

		/*
		 * Enable support for custom logo.
		 */
		add_theme_support( 'custom-logo' );

		/**
		 * Load Supports.
		 */
		require get_template_directory() . '/inc/support.php';

		global $creative_creature_studio_default_options;
		$creative_creature_studio_default_options = creative_creature_studio_get_default_theme_options();

		global $creative_creature_studio_post_count;
		$creative_creature_studio_post_count = 1;

	}
endif;

add_action( 'after_setup_theme', 'creative_creature_studio_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function creative_creature_studio_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'creative_creature_studio_content_width', 640 );
}
add_action( 'after_setup_theme', 'creative_creature_studio_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function creative_creature_studio_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_register_style( 'creative_creature_studio-google-fonts', '//fonts.googleapis.com/css?family=Arizonia|Open+Sans:600,400,300,100,700' );

	wp_register_style( 'creative_creature_studio-photobox-css', get_template_directory_uri() . '/third-party/photobox/photobox' . $min . '.css', array(), '1.6.3' );

	wp_enqueue_script( 'creative_creature_studio-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix' . $min . '.js', array(), '20130115', true );

	wp_enqueue_script( 'creative_creature_studio-imageloaded', get_template_directory_uri() . '/third-party/imageloaded/imagesloaded.pkgd' . $min . '.js', array( 'jquery' ), '1.0.0', true );

	wp_enqueue_script( 'creative_creature_studio-photobox', get_template_directory_uri() . '/third-party/photobox/jquery.photobox' . $min . '.js', array( 'jquery' ), '1.6.3', true );

	wp_enqueue_script( 'creative_creature_studio-custom', get_template_directory_uri() . '/js/custom' . $min . '.js', array( 'jquery', 'masonry', 'creative_creature_studio-imageloaded', 'creative_creature_studio-photobox' ), '1.0.0', true );
	wp_localize_script( 'creative_creature_studio-custom', 'CreativeCreatureStudioScreenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'creative_creature_studio' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'creative_creature_studio' ) . '</span>',
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'creative_creature_studio_scripts' );

/**
 * Load init.
 */
require get_template_directory() . '/inc/init.php';

