<?php
/**
 * Simplicated WordPress Theme
 * functions and definitions
 *
 * @package simplicated
 */
 
 
//	* Simplicated's admin options system
require_once ( get_template_directory() . '/inc/simplicated-options.php' );

// Set content width based on theme and stylesheet
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'simplicated_by_lawsonry_setup' ) ) :

	function simplicated_by_lawsonry_setup() {
	
		// Translation-ready
		load_theme_textdomain( 'simplicated', get_template_directory() . '/languages' );
	
		// Add feeds to header
		add_theme_support( 'automatic-feed-links' );
	
		// Add featured image support
		add_theme_support( 'post-thumbnails' );
		
		// Add featured image sizes
		add_image_size('full_width', 760, 469); 
		add_image_size('half_width', 372, 229); 
	
		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
			'top-menu' => __( 'Top Menu', 'simplicated_by_lawsonry' ),
			'footer-menu' => __( 'Footer Menu', 'simplicated_by_lawsonry' )
		) );
	
		// No post format support in this theme
		//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
	}
endif; // simplicated_by_lawsonry_setup
add_action( 'after_setup_theme', 'simplicated_by_lawsonry_setup' );


// Register the widgets
function simplicated_by_lawsonry_widgets_init() {
	register_sidebar( 
		array(
		'name'          => __( 'Footer Left', 'simplicated_by_lawsonry' ),
		'id'            => 'sidebar-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) 
	
	);
	register_sidebar( 
		array(
		'name'          => __( 'Footer Right', 'simplicated_by_lawsonry' ),
		'id'            => 'sidebar-right',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) 
	
	);
	register_sidebar( 
		array(
		'name'          => __( 'Footer Bottom', 'simplicated_by_lawsonry' ),
		'id'            => 'sidebar-big-bottom',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) 
	
	);
}
add_action( 'widgets_init', 'simplicated_by_lawsonry_widgets_init' );

// Enqueue scripts for front-end use
function simplicated_enqueue_frontend_scripts() {
	wp_enqueue_style( 'simplicated_by_lawsonry-style', get_stylesheet_uri() );

	wp_enqueue_script( 'simplicated_by_lawsonry-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'simplicated_by_lawsonry-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'simplicated_by_lawsonry-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'simplicated_enqueue_frontend_scripts' );

// Enqueue scripts for back-end use
function simplicated_enqueue_backend_scripts() {
	
	// Register our .js that triggers a custom media upload box to show up when we are uploading our author profile image
	wp_register_script( 'lawsonry-upload', get_template_directory_uri() .'/inc/lawsonry-upload.js', array('jquery','media-upload','thickbox') );

	// If we are currently viewing the profile field, enqueue our custom js file
	if ( 'profile' == get_current_screen() -> id ) {
		wp_enqueue_script('jquery');

		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');

		wp_enqueue_script('media-upload');
		wp_enqueue_script('lawsonry-upload');

	}

}
add_action('admin_enqueue_scripts', 'simplicated_enqueue_backend_scripts');

// Enable custom header
require get_template_directory() . '/inc/custom-header.php';

// Enable custom template tags
require get_template_directory() . '/inc/template-tags.php';

// Some extra goodies
require get_template_directory() . '/inc/extras.php';

// Enable the customizer
require get_template_directory() . '/inc/customizer.php';

// Enable jetpack compatability
require get_template_directory() . '/inc/jetpack.php';



// Spit out a circular image in one of two royal formats: 300x300 or 150x150
function lawsonry_circle_image($url, $size="150") {
	
	$html = '<div class="circular-'.$size.'" style="background: url('.$url.');"></div>';
	
	echo $html;
	
}

// Spit out the author byline (something nice and small)
function lawsonry_display_author_byline($position = "after") {
  
/*  
	I had this here so that the author byline displayed differently if you selected "after". In this case, it was 1/2 width
	and float:right. I didn't like this, though, and switched it to full-width regardless of top or bottom. 
	I kept the code here commented out in case someone wanted to do something with it. 
	
if($position == "after") {
	  // First, grab all of the author's relevant information
	  $name = get_the_author_meta('display_name');  // Get the "display name" that we choose in the profile field
	  $bio = get_the_author_meta('user_description'); // Get the bio from the profile field
	  $avatar = get_the_author_meta('author_profile_picture'); 
	  $size = 100;
	  $postsurl = get_author_posts_url(get_the_author_meta('ID'));
	 
	  $output = '<div class="aboutbox-container">';           // Begin the container 
	  $output .= '<div class="aboutbox-left">';               // Begin the left inner container
	  $output .= '<div class="circular-'.$size.'" style="background: url('.$avatar.'); float:right;"></div>';
	  $output .= '</div><div class="aboutbox-right">';        // End the left inner container and begin the right
	  $output .= '<h3 class="aboutbox-title"><a href="'.$postsurl.'">';                // Start the title tag with our CSS
	  $output .= $name;                                      
	  $output .= '</a></h3><p class="aboutbox-bio">';
	  $output .= $bio;
	  $output .= '</p></div></div><div style="clear:both"></div>';                          // Close out the rest of the tags
	 
	  echo $output; // Display the box!
  
  
  } else if ($position == "before") {
	  
	  // If we display the author byline before the content, let's spread it across the div
	  
	  // First, grab all of the author's relevant information
	  $name = get_the_author_meta('display_name');  // Get the "display name" that we choose in the profile field
	  $bio = get_the_author_meta('user_description'); // Get the bio from the profile field
	  $avatar = get_the_author_meta('author_profile_picture'); 
	  $size = 100;
	  $postsurl = get_author_posts_url(get_the_author_meta('ID'));
	 
	  $output = '<div class="aboutbox-container" style="margin-bottom: 20px;">';           // Begin the container 
	  $output .= '<div class="aboutbox-left" style="width: 105px">';               // Begin the left inner container
	  $output .= '<div class="circular-'.$size.'" style="background: url('.$avatar.'); float:left;"></div>';
	  $output .= '</div><div class="aboutbox-right">';        // End the left inner container and begin the right
	  $output .= '<h3 class="aboutbox-title"><a href="'.$postsurl.'">';                // Start the title tag with our CSS
	  $output .= $name;                                      
	  $output .= '</a></h3><p class="aboutbox-bio">';
	  $output .= $bio;
	  $output .= '</p></div></div><div style="clear:both"></div>';                          // Close out the rest of the tags
	 
	  echo $output; // Display the box!	  
  } else {}
  */
  
  $name = get_the_author_meta('display_name');  // Get the "display name" that we choose in the profile field
	  $bio = get_the_author_meta('user_description'); // Get the bio from the profile field
	  $avatar = get_the_author_meta('author_profile_picture'); 
	  $size = 100;
	  $postsurl = get_author_posts_url(get_the_author_meta('ID'));
	 
	  $output = '<div class="aboutbox-container" style="margin-bottom: 20px;">';           // Begin the container 
	  $output .= '<div class="aboutbox-left" style="width: 105px">';               // Begin the left inner container
	  $output .= '<div class="circular-'.$size.'" style="background: url('.$avatar.'); float:left;"></div>';
	  $output .= '</div><div class="aboutbox-right">';        // End the left inner container and begin the right
	  $output .= '<h3 class="aboutbox-title"><a href="'.$postsurl.'">';                // Start the title tag with our CSS
	  $output .= $name;                                      
	  $output .= '</a></h3><p class="aboutbox-bio">';
	  $output .= $bio;
	  $output .= '</p></div></div><div style="clear:both"></div>';                          // Close out the rest of the tags
	 
	  echo $output; // Display the box!	  

 
}

// Spit out the byline at the top of author archive pages
function lawsonry_display_big_author_byline() {

	  // First, grab all of the author's relevant information
  $name = get_the_author_meta('display_name');  // Get the "display name" that we choose in the profile field
  $bio = get_the_author_meta('user_description'); // Get the bio from the profile field
  $avatar = get_the_author_meta('author_profile_picture'); 
  $size = 150;
  $postsurl = get_author_posts_url(get_the_author_meta('ID'));
 
  $output = '<div class="aboutbox-container">';           // Begin the container 
  $output .= '<div class="big-aboutbox-left">';               // Begin the left inner container
  $output .= '<div class="circular-'.$size.'" style="background: url('.$avatar.'); float:left;"></div>';
  $output .= '</div><div class="big-aboutbox-right"><p>The archive of</p>';        // End the left inner container and begin the right
  $output .= '<h3 class="big-aboutbox-title"><a href="'.$postsurl.'">';                // Start the title tag with our CSS
  $output .= $name;                                      
  $output .= '</a></h3><p class="big-aboutbox-bio">';
  $output .= $bio;
  $output .= '</p></div></div><div style="clear:both"></div>';                          // Close out the rest of the tags
 
  echo $output; // Display the box!	
}

// Spits out the social media icons with values set in our theme options menu
function lawsonry_display_social_media_icons() {
	
	$options = get_option("simplicated_royal_options");
	
	 echo '<div class="social-media-bar"><center>';
	 echo '<a rel="external" title="RSS Feed for'.get_bloginfo("name").'" href="'.get_bloginfo("url").'/feed/"><img src="'.get_bloginfo("template_url").'/images/rss.png" alt="rss feed" /></a>';
		
		if($options['google_url']): 
			echo '<a href="'.addslashes(strip_tags($options['google_url'])).'?rel=author"><img src="'.get_bloginfo("template_url").'/images/gplus.png"/></a>';
		endif;
	
		if($options['twitter_url']): 
			echo '<a href="'.addslashes(strip_tags($options['twitter_url'])).'"><img src="'.get_bloginfo("template_url").'/images/twitter.png"/></a>';
		endif;
		
		if($options['tumblr_url']): 
			echo '<a href="'.addslashes(strip_tags($options['tumblr_url'])).'"><img src="'.get_bloginfo("template_url").'/images/tumblr.png"/></a>';
		endif;
		
		if($options['facebook_url']): 
			echo '<a href="'.addslashes(strip_tags($options['facebook_url'])).'"><img src="'.get_bloginfo("template_url").'/images/facebook.png"/></a>';
		endif;
		
		if($options['flickr_url']): 
			echo '<a href="'.addslashes(strip_tags($options['flickr_url'])).'"><img src="'.get_bloginfo("template_url").'/images/flickr.png"/></a>';
		endif;
		
		if($options['linkedin_url']): 
			echo '<a href="'.addslashes(strip_tags($options['linkedin_url'])).'"><img src="'.get_bloginfo("template_url").'/images/linkedin.png"/></a>';
		endif;
		
		if($options['youtube_url']): 
			echo '<a href="'.addslashes(strip_tags($options['youtube_url'])).'"><img src="'.get_bloginfo("template_url").'/images/youtube.png"/></a>';
		endif;
		
	echo '</center></div>';

	
}

// A function to display the featured image in single posts according to our custom options
function lawsonry_display_featured_image($post_id, $where) {

	// First, check to see if we have a thumbnail to work with
	if ( has_post_thumbnail() ) { 
	
		// Next, we'll see if we're displaying a full-width image
		if($where == "big_before_title" || $where == "big_before_meta" || $where == "big_before_content") {

			echo get_the_post_thumbnail($post_id, 'full_width', array('class' => 'featured-image-full-width'));
			
		} else if ( $where == "small_float_left" ) {
		
			echo get_the_post_thumbnail($post_id, 'half_width', array('class' => 'featured-image-half-width-left'));
			
		} else if ( $where == "small_float_right" ) {
			
			echo get_the_post_thumbnail($post_id, 'half_width', array('class' => 'featured-image-half-width-right'));
			
		} else {}
		
	} // end if (has post thumbnail)
}

// Processing function for our color schemes
function html2rgb($color)
{
    if ($color[0] == '#')
        $color = substr($color, 1);

    if (strlen($color) == 6)
        list($r, $g, $b) = array($color[0].$color[1],
                                 $color[2].$color[3],
                                 $color[4].$color[5]);
    elseif (strlen($color) == 3)
        list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
    else
        return false;

    $r = hexdec($r); $g = hexdec($g); $b = hexdec($b);

    return "$r, $g, $b";
}

// Custom color scheme color validation function
function validate_html_color($color, $named) {
  /* Validates hex color, adding #-sign if not found. Checks for a Color Name first to prevent error if a name was entered (optional).
  *   $color: the color hex value stirng to Validates
  *   $named: (optional), set to 1 or TRUE to first test if a Named color was passed instead of a Hex value
  */
  javascript:expand();
  if ($named) {
    
    $named = array('aliceblue', 'antiquewhite', 'aqua', 'aquamarine', 'azure', 'beige', 'bisque', 'black', 'blanchedalmond', 'blue', 'blueviolet', 'brown', 'burlywood', 'cadetblue', 'chartreuse', 'chocolate', 'coral', 'cornflowerblue', 'cornsilk', 'crimson', 'cyan', 'darkblue', 'darkcyan', 'darkgoldenrod', 'darkgray', 'darkgreen', 'darkkhaki', 'darkmagenta', 'darkolivegreen', 'darkorange', 'darkorchid', 'darkred', 'darksalmon', 'darkseagreen', 'darkslateblue', 'darkslategray', 'darkturquoise', 'darkviolet', 'deeppink', 'deepskyblue', 'dimgray', 'dodgerblue', 'firebrick', 'floralwhite', 'forestgreen', 'fuchsia', 'gainsboro', 'ghostwhite', 'gold', 'goldenrod', 'gray', 'green', 'greenyellow', 'honeydew', 'hotpink', 'indianred', 'indigo', 'ivory', 'khaki', 'lavender', 'lavenderblush', 'lawngreen', 'lemonchiffon', 'lightblue', 'lightcoral', 'lightcyan', 'lightgoldenrodyellow', 'lightgreen', 'lightgrey', 'lightpink', 'lightsalmon', 'lightseagreen', 'lightskyblue', 'lightslategray', 'lightsteelblue', 'lightyellow', 'lime', 'limegreen', 'linen', 'magenta', 'maroon', 'mediumaquamarine', 'mediumblue', 'mediumorchid', 'mediumpurple', 'mediumseagreen', 'mediumslateblue', 'mediumspringgreen', 'mediumturquoise', 'mediumvioletred', 'midnightblue', 'mintcream', 'mistyrose', 'moccasin', 'navajowhite', 'navy', 'oldlace', 'olive', 'olivedrab', 'orange', 'orangered', 'orchid', 'palegoldenrod', 'palegreen', 'paleturquoise', 'palevioletred', 'papayawhip', 'peachpuff', 'peru', 'pink', 'plum', 'powderblue', 'purple', 'red', 'rosybrown', 'royalblue', 'saddlebrown', 'salmon', 'sandybrown', 'seagreen', 'seashell', 'sienna', 'silver', 'skyblue', 'slateblue', 'slategray', 'snow', 'springgreen', 'steelblue', 'tan', 'teal', 'thistle', 'tomato', 'turquoise', 'violet', 'wheat', 'white', 'whitesmoke', 'yellow', 'yellowgreen');
    
    if (in_array(strtolower($color), $named)) {
      /* A color name was entered instead of a Hex Value, so just exit function */
      return $color;
    }
  }

  if (preg_match('/^#[a-f0-9]{6}$/i', $color)) {
    // Verified OK
  }else if (preg_match('/^[a-f0-9]{6}$/i', $color)) {
    $color = '#' . $color;
  }
  return $color;
}

// Here we grab the color option from our options page and output the appropriate color css information.
// This MUST be called in the header (duh, because it's css)
function lawsonry_output_color_options() {
	
	$options = get_option("simplicated_royal_options");

	$output = "";
	
	if($options['color_scheme'] == "red") {
		$output = ".header-logo-text {
		background: rgba(188,62,52,0.8);
		} 
		a, a:visited {
		color: #bc3e34; 
		text-decoration: none;
		} a:hover {color:#bc3e34;}.nav .current-menu-item a {
	background: #bc3e34; color: #FFF !important; }";
	} else if($options['color_scheme'] == "dark_blue") {
		$output = ".header-logo-text {
		background: rgba(".html2rgb('#3f6480').",0.8);
		} 
		a, a:visited {
		color: #3f6480; 
		text-decoration: none;
		} a:hover {color: #3f6480;}.nav .current-menu-item a {
	background: #3f6480; color: #FFF !important; } ";
		
	} else if($options['color_scheme'] == "light_blue") {
		$output = ".header-logo-text {
		background: rgba(".html2rgb('#22779f').",0.8);
		} 
		a, a:visited {
		color: #22779f;
		text-decoration: none;
		} a:hover{color:#22779f;}.nav .current-menu-item a {
	background: #22779f; color: #FFF !important; }";
		
	} else if($options['color_scheme'] == "orange") {
		$output = ".header-logo-text {
		background: rgba(".html2rgb('#ea7037').",0.8);
		} 
		a, a:visited {
		color: #ea7037; 
		text-decoration: none;
		} a:hover { color: #ea7037; } .nav .current-menu-item a {
	background: #ea7037; }
";
	
	// For future: 
	
	// } else  if color_scheme == custom {
	
	// background = rgba (html2rgb($options['custom_color'])
	
	// }
		
	} else { // with no options set, output defaults
		$output = ".header-logo-text {
		background: rgba(0,0,0,0.8);
		} 
		a, a:visited {
		color: #bb3f34;
		text-decoration: none;
		} .nav a:hover {color: #bb3f34;}";
	
	}
	
	echo $output; 
	
	
}

