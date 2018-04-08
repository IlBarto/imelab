<?php
function imelab_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on tema prova, use a find and replace
     * to change 'tema-prova' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'imelab', get_template_directory() . '/languages' );


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


    // Set the default content width.
    $GLOBALS['content_width'] = 500;


    register_nav_menus( array(
        'top-menu' => esc_html__( 'Top Bar', 'imelab' ),
        'social' => esc_html__('Social Footer', 'imelab'),
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
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside',
        'image',
        'video',
        'quote',
        'link',
        'gallery',
        'audio',
    ) );


    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'imelab_setup' );

//Add Font Awesome icons to the theme
//https://premium.wpmudev.org/blog/add-icons-wordpress-menus
function imelab_enqueue_icon_stylesheet() {
	wp_register_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'fontawesome');
}
add_action( 'wp_enqueue_scripts', 'imelab_enqueue_icon_stylesheet' );


function imelab_scripts(){
	
    if ( is_singular() && get_option('thread_comments') && comments_open()) {
        wp_enqueue_script('comment-reply');
    }

    if(has_nav_menu('top-menu')) {
        wp_enqueue_script('imelab-navigation', get_theme_file_uri('/js/navigation.js'), array(), '1.0', true);
    }
}
add_action('wp_enqueue_scripts','imelab_scripts');

function imelab_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action('wp_head', 'imelab_javascript_detection', 0);

function active_menu_item_class($classes, $item) {
    if(in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'active_menu_item_class', 10, 2);

function nav_menu_custom_wrapper() {
    $wrap  = '<ul id="%1$s" class="%2$s">';
    $wrap .= '%3$s';

    $wrap .= '<li class="menu search-form">';
    $wrap .= get_search_form(false);
    $wrap .= '</li></ul>';
    return $wrap;
}

if(!is_admin()) {
    function page_search_filter($query) {
        if($query->is_search) {
            $query->set('post_type', 'post');
        }
        return $query;
    }
    add_filter('pre_get_posts', 'page_search_filter');
}


//aggiungere il support per gli header personalizzati
$defaults= array(
	'default-image'=>'',
	'rendom-default'=>false,
	'width'=> 0,
	'height'=> 0,
	'flex-height'=>false,
	'flex-width'=>false,
	'default-text-color'=>'#000000',
	'header-test'=> true,
	'uploads'=>true,
	'wp-head-callback'=>'',
	'admin-head-callback'=>'',
	'admin-preview-callback'=>'',

	);
add_theme_support ('custom-header',$defaults);
add_theme_support ('custom-background');
