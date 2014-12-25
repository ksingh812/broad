<?php
#REQUIRE EXTERNAL FUNCTIONS
//require_once('samples/header_main_navwalker.php'); // Main Header Menu
//require_once('samples/page_sidebar_navwalker.php'); // Sidebar Menu
//require_once('includes/post-types.php'); //Post Types
require_once('shortcodes.php');//Shortcodes


#FLUSH WP-REWRITES WHEN NEEDED
add_action('init', 'custom_taxonomy_flush_rewrite');
function custom_taxonomy_flush_rewrite() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}

#COMPILED-BOOTSTRAP
    function bootstrap() 
        {
            wp_enqueue_style( 'styles-css', get_stylesheet_uri() );
            wp_enqueue_style( 'icomoon-css', get_template_directory_uri() . '/icomoon.css' );
            wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/dist/css/bootstrap.css' );
            wp_enqueue_style( 'bootstrap-theme-min-css', get_template_directory_uri() . '/dist/css/bootstrap-theme.min.css' );
            wp_enqueue_style( 'opensans-font', 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300' );
            wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/dist/js/bootstrap.js', array('jquery') );
        }
        add_action( 'wp_enqueue_scripts', 'bootstrap' );
    

#THEME-SUPPORTS
    #THUMBNAILS
    add_theme_support( 'post-thumbnails', array( 'post', 'portfolio','team'));          // Posts & Portfolio & Team only

    #CUSTOM-HEADER
    $headerargs = array(
        'flex-width'    => true,
        'width'         => 200,
        'flex-height'    => true,
        'height'        => 55,
        'default-image' => get_template_directory_uri() . '/images/header.jpg',
        'uploads'       => true,
    );
    add_theme_support( 'custom-header', $headerargs );
    
    #CUSTOM-BACKGROUND
    $backgroundargs = array(
        'default-color' => 'f2f2f2',
        'default-image' => get_template_directory_uri() . '/images/background.jpg',
    );
    add_theme_support( 'custom-background', $backgroundargs );

#SHORTCODES
    #Locate and enable shortcodes
	if (!is_admin()) 
	{
		//locate_template(array('/shortcodes.php'), true, false);
	}

#HEADER
    #ADD-CLASS-TO-MENU-ITEM
    function special_nav_class($classes, $item){
         if( in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
         }
         return $classes;
    }
    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    #ADD-CLASS-TO-MENU-ITEM
    function menu_list_unstyled($ulclass) {
    return preg_replace('/class="menu"/', 'class="menu list-unstyled"', $ulclass);
      }
    add_filter('wp_nav_menu','menu_list_unstyled');


    #PRIMARY-NAV-MENU
    register_nav_menu( 'Primary', 'Primary Menu' );
    register_nav_menu( 'Header', 'Header Menu' );
	
	#DEFAULT SIDEBAR
	#REGISTER- ARCHIVE SIDEBAR
    if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name'=> 'Default Sidebar',
		'id' => 'default',
        'before_widget' => '',
		'after_widget' => '',
    ));
	
	#FOOTER WIDGETS
    register_sidebar( array(
        'name' => __( 'Footer 1', 'wpb' ),
        'id' => 'footer1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer 2', 'wpb' ),
        'id' => 'footer2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer 3', 'wpb' ),
        'id' => 'footer3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer 4', 'wpb' ),
        'id' => 'footer4',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ) );


#BREADCRUMBS
    function the_breadcrumb() {
        if (!is_home()) {
            echo '<a href="';
            echo get_option('home');
            echo '">';
            echo "Home</a> » ";
            if (is_category() || is_single()) {
                the_category('title_li=');
                if (is_single()) {
                    echo " » ";
                    the_title();
                }
            } elseif (is_page()) {
                echo the_title();
            }
        }
    }

#GET-ANCESTOR-OF-CURRENT-PAGE
if(!function_exists('get_post_top_ancestor_id')){
	/**
	 * Gets the id of the topmost ancestor of the current page. Returns the current
	 * page's id if there is no parent.
	 * @uses object $post
	 * @return int 
	 **/
	function get_post_top_ancestor_id(){
		global $post;	
		if($post->post_parent){
			$ancestors = array_reverse(get_post_ancestors($post->ID));
			return $ancestors[0];
		}	
		return $post->ID;
	}
}	
?>