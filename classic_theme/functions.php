<?php
/**
 * Classic_theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Classic_theme
 */

if ( ! function_exists( 'classic_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function classic_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Classic_theme, use a find and replace
	 * to change 'classic_theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'classic_theme', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'classic_theme' ),
		'footer' => esc_html__('Footer','classic_theme')
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'classic_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'classic_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function classic_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'classic_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'classic_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function classic_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'classic_theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'classic_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function classic_theme_scripts() {
	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css' );

	wp_enqueue_script( 'classic_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'classic_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.0.0', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'jquery-1.12.0.min', '/js/jquery-1.12.0.min.js', array ( 'jquery' ), 1.1, true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'classic_theme_scripts' );

function example_customizer( $wp_customize ) {

	$wp_customize->add_section(
		'social_icon_section',
		array(
			'title' => 'Социальные сети',
			'description' => 'Это секция настроек.',
			'priority' => 35,
		)
	);
	$wp_customize->add_setting(
		'social_icon_twitter',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_twitter',
		array(
			'label' => 'Ссылка на твиттер',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);
	$wp_customize->add_setting(
		'social_icon_facebook',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_facebook',
		array(
			'label' => 'Ссылка на facebook',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);
	$wp_customize->add_setting(
		'social_icon_pinterest',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_pinterest',
		array(
			'label' => 'Ссылка на pinterest',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);
	$wp_customize->add_setting(
		'social_icon_google',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_control(
		'social_icon_google',
		array(
			'label' => 'Ссылка на google_plus',
			'section' => 'social_icon_section',
			'type' => 'url',
		)
	);
}
add_action( 'customize_register', 'example_customizer' );


add_action('init', 'team_register');
function team_register() {
	$args = array(
		'label' => __('People'),
		'singular_label' => __('Team member'),
		'add_new'=> 'add people',
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'supports' => array('title', 'custom-fields', 'editor', 'thumbnail'),
		'menu_position'=> null,
		'menu_icon'=> null,
		'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'categories', 'custom-fields' ),
	);
	register_post_type( 'team' , $args );
}
function wp_corenavi() {
	global $wp_query;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
	$a['total'] = $max;
	$a['current'] = $current;

	$total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
	$a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
	$a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
	$a['prev_text'] = ' '; //текст ссылки "Предыдущая страница"
	$a['next_text'] = ' '; //текст ссылки "Следующая страница"

	if ($max > 1) echo '<div class="navigation">';

	echo $pages . paginate_links($a);
	if ($max > 1) echo '</div>';
}
add_filter('comment_form_default_fields', 'mytheme_remove_url');
function mytheme_remove_url($arg) {
	$arg['url'] = '';
	return $arg;
};
add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
function kama_reorder_comment_fields( $fields ){
// die(print_r( $fields )); // посмотрим какие поля есть
	$new_fields = array(); // сюда соберем поля в новом порядке
	$myorder = array('author','email','url','comment'); // нужный порядок
	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}
// если остались еще какие-то поля добавим их в конец
	if( $fields )
		foreach( $fields as $key => $val )
			$new_fields[ $key ] = $val;
	return $new_fields;
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
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
