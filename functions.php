<?php

// Add scripts and stylesheets
function balter_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6' );
//   wp_enqueue_script( 'bootstrap', get_template_directory_uri() . 'https://code.jquery.com/jquery-3.2.1.min.js' );
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );  
// 	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
//    wp_enqueue_script( 'nav', '/js/nav.js' );
}

add_action( 'wp_enqueue_scripts', 'balter_scripts' );

// Add Google Fonts
function balter_google_fonts() {
				wp_register_style('OpenSans', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700,800');
				wp_enqueue_style( 'OpenSans');
		}

add_action('wp_print_styles', 'balter_google_fonts');

// WordPress Titles
function balter_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() ) {
		return $title;
	} 
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	return $title;
} 
add_filter( 'wp_title', 'balter_wp_title', 10, 2 );

// Custom settings
function custom_settings_add_menu() {
  add_menu_page( 'Custom Settings', 'Custom Settings', 'manage_options', 'custom-settings', 'custom_settings_page', null, 99);
}
add_action( 'admin_menu', 'custom_settings_add_menu' );

// Create Custom Global Settings
function custom_settings_page() { ?>
	<div class="wrap">
		<h1>Custom Settings</h1>
		<form method="post" action="options.php">
			<?php
           settings_fields('section');
           do_settings_sections('theme-options');      
           submit_button(); 
       ?>
		</form>
	</div>
	<?php }

// Twitter
function setting_twitter() { ?>
		<input type="text" name="twitter" id="twitter" value="<?php echo get_option('twitter'); ?>" />
		<?php }

function setting_github() { ?>
			<input type="text" name="github" id="github" value="<?php echo get_option('github'); ?>" />
			<?php }

function setting_facebook() { ?>
			<input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>" />
			<?php }

function custom_settings_page_setup() {
  add_settings_section('section', 'All Settings', null, 'theme-options');
  add_settings_field('twitter', 'Twitter URL', 'setting_twitter', 'theme-options', 'section');
  add_settings_field('github', 'GitHub URL', 'setting_github', 'theme-options', 'section');
  add_settings_field('facebook', 'Facebook URL', 'setting_facebook', 'theme-options', 'section');
  
	register_setting('section', 'twitter');
  register_setting('section', 'github');
  register_setting('section', 'facebook');
}
add_action( 'admin_init', 'custom_settings_page_setup' );

// Support Featured menu-items
add_theme_support( 'post-menu-items' );

// Custom Post Type
function create_my_custom_post() {
	register_post_type('my-custom-post',
			array(
			'labels' => array(
					'name' => __('My Custom Post'),
					'singular_name' => __('My Custom Post'),
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array(
					'title',
					'editor',
					'menu-item',
				  'custom-fields'
			)
	));
}
add_action('init', 'create_my_custom_post'); 

function create_page_home_post() {
	register_post_type('page_home_post',
			array(
			'labels' => array(
					'name' => __('Page Home'),
					'singular_name' => __('Page Home'),
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array(
					'title',
          'date',
          'author',
          'excerpt',
					'editor',
					'menu-item',
				  'custom-fields'
			)
	));
}
add_action('init', 'create_page_home_post'); 

function balter_widgets_init() {

	register_sidebar( array(
		'name'          => 'Sidebar right',
		'id'            => 'sidebar-right',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>\n<hr />\n",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

  	register_sidebar( array(
		'name'          => 'Sidebar left',
		'id'            => 'sidebar-left',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => "</div>\n<hr />\n",
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}

add_action( 'widgets_init', 'balter_widgets_init' );

if ( function_exists('register_sidebar') )
    register_sidebar(array(
       'name' => 'Your Widget Name',
       'description' => 'Description of your widget',
       'before_widget' => '<div class="container-top">',
       'after_widget' => '</div>',
       'before_title' => '<h3 class="widget-title">',
       'after_title' => '</h3>',
    ));


/* function balter_before_sidebar() {
  echo "<h1>Before Sidebar</h1>";
}

add_action('widgets_init', balter_before_sidebar); */

register_nav_menus( array (
    "main-menu" => "Main Menu",
    "footer-menu" => "Footer Menu"
    )
);

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
 * Enable support for Post menu-items on posts and pages.
 *
 * @link https://developer.wordpress.org/themes/functionality/featured-menu-items-post-menu-items/
 */
add_theme_support( 'post-menu-items' );
/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( '...keep reading', 'textdomain' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


function latest_post() {  
  $args = array(
    'posts_per_page' => 1, // we need only the latest post, so get that post only
  );

  $str = "";
  $posts = get_posts($args);

  foreach($posts as $post){
    $str .= "<div class=\"blog-post\">";
    $str .= "<h2 class=\"blog-post-title\">".$post->post_title."</h2>";
    $str .= "<p class=\"blog-post-meta\">".$post->post_date."</p>";
    if ( has_post_menu-item() ) {
      $str .= the_post_menu-item();
    }
    $str .= $post->post_content;

    $str .= "</div><!-- /.blog-post -->";
  }
  return $str;

}

add_shortcode('latest_post', 'latest_post');

/* register new menu-item menu-item
 * 200px wide and unlimited height
 */
add_image_size( 'sidebar-excerpts', 360, 9999, false );
add_image_size( 'post-featured', 800, 9999, false );