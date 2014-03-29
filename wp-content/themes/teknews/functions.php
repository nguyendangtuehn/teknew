<?php
    function cwd_wp_bootstrap_scripts_styles() {
        // Loads Bootstrap minified JavaScript file.
//        wp_enqueue_script('bootstrapjs', '//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js', array('jquery'),'3.1.1', true );
        wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'),'3.1.1', true );
        // Loads Bootstrap minified CSS file.
//        wp_enqueue_style('bootstrapwp', '//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css', false ,'3.1.1');
        wp_enqueue_style('bootstrapwp', get_template_directory_uri().'/css/bootstrap.min.css', false ,'3.1.1');
        // Loads our main stylesheet.
        wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css', array('bootstrapwp') ,'1.0');
      }
      add_action('wp_enqueue_scripts', 'cwd_wp_bootstrap_scripts_styles');

	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
//	   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"), false);
	   wp_register_script('jquery', get_stylesheet_directory_uri()."/js/jquery-2.1.0.js", false);
	   wp_enqueue_script('jquery');
	}
	
	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
	// Declare sidebar widget zone
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => 'Sidebar Widgets',
    		'id'   => 'sidebar-widgets',
    		'description'   => 'These are widgets for the sidebar.',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
//Create menu support for theme
//if (function_exists('register_nav_menus')) {    
//    register_nav_menus(
//            array(
//                'main_nav' => 'Main Navigation Menu'
//            )
//    );
//}

if(function_exists('add_theme_support')){
    add_theme_support('post-thumbnails');
}

if ( ! function_exists( 'cwd_wp_bootstrapwp_theme_setup' ) ):
  function cwd_wp_bootstrapwp_theme_setup() {
    // Adds the main menu
    register_nav_menus( array(
      'main-menu' => __( 'Main Menu', 'cwd_wp_bootstrapwp' ),
    ) );
  }
endif;
add_action( 'after_setup_theme', 'cwd_wp_bootstrapwp_theme_setup' );


    //excerpt de hien thi link
    function new_excerpt_length($length){
        return 40;
    }
    
    add_filter('excerpt_length', 'new_excerpt_length');
    
    require_once 'inc/nav.php';
    
    
    function get_first_image() {
        global $post, $posts;
        $first_img = '';
        ob_start();
        ob_end_clean();
        $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        $first_img = $matches[1][0];

//        if(empty($first_img)) {
//          $first_img = bloginfo('template_url')."/images/m5.jpg";
//        } 
        return $first_img;
      }
    
     
?>