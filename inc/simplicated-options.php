<?php

// Simplicated Options page


/*
	* 	PART I
	*
	* 	Create and add our admin menu, creating the case for our callback function
*/

// Create custom admin menu link
function simplicated_create_admin_menu() {
    add_menu_page('Simplicated Theme Settings', 'Simplicated', 'administrator', 
        'simplicated_royal_options', 'simplicated_royal_options_callback');
}

// Display our admin menu link
add_action("admin_menu", "simplicated_create_admin_menu");

/*
	* 	PART II
	*
	* 	Initialize and register all the options which will be used in our callback function
*/

function simplicated_initialize_royal_options() {

    /*		Option: enable_author_byline 
    	*
    	* Settings & field initialization, + registration
    */
	    add_settings_section(
			'simplicated_author_byline',			// ID used to identify this section and with which to register options
			'Author Byline',					// Title to be displayed on the administration page
			'simplicated_author_byline_section_callback',	// Callback used to render the description of the section
			'simplicated_royal_options'							// Page on which to add this section of options
		);
	    
	    add_settings_field(	
		'enable_author_byline',						
		'How would you like to handle the Author Byline?',							
		'simplicated_author_byline_options_callback',	
		'simplicated_royal_options',							
		'simplicated_author_byline',			
		array(								
			"before" => "Enable the Author Byline, and place it <b>before</b> the post content.",
			"after" => "Enable the Author Byline, and place it <b>after</b> the post content.",
			"none" => "Disable the Author Byline."
		)
		);

    
    /*		Option: featured_image_format 
    	*
    	* Settings & field initialization, + registration
    */
	    add_settings_section(
			'simplicated_featured_image_format',			
			'Featured Images',					
			'simplicated_featured_image_format_section_callback',	
			'simplicated_royal_options'							
		);
	    
	    
	    add_settings_field(	
		'featured_image_format',						
		'How would you like to display featured images?',							
		'simplicated_featured_image_format_options_callback',	
		'simplicated_royal_options',							
		'simplicated_featured_image_format',			
		array(								
			"big_before_title" => "Before the title, meta, and content.",
			"big_before_meta" => "After the title, but before the meta and content.",
			"big_before_content" => "After the title and meta, but before the content.",
			"small_float_left" => "After the title and meta, floating left with content.",
			"small_float_right" => "After the title and meta, floating right with content."
		)
		);
	
	/*		Option: google_analytics 
    	*
    	* Settings & field initialization, + registration
    */
	    add_settings_section(
			'simplicated_google_analytics',			
			'Tracking Code',					
			'simplicated_google_analytics_section_callback',	
			'simplicated_royal_options'							
		);
	    
	    
	    add_settings_field(	
			'google_analytics',						
			'Here you can copy and paste your tracking code. You can leave this blank if you use JetPack\'s Site Stats or something similar.',							
			'simplicated_google_analytics_options_callback',	
			'simplicated_royal_options',							
			'simplicated_google_analytics',			
			array( "nothing" => "nothing")
		);

	
	/*		Option: frontpage_featured_image_format 
    	*
    	* Settings & field initialization, + registration
    */
	    add_settings_section(
			'simplicated_frontpage_featured_image_format',			
			'Format for Featured Images on the Front Page',					
			'simplicated_frontpage_featured_image_format_section_callback',	
			'simplicated_royal_options'							
		);
	    
	    
	    add_settings_field(	
		'frontpage_featured_image_format',						
		'How would you like to display featured images on the frontpage?',							
		'simplicated_frontpage_featured_image_format_options_callback',	
		'simplicated_royal_options',							
		'simplicated_frontpage_featured_image_format',			
		array(								
			"big_before_title" => "Before the title, meta, and content.",
			"big_before_meta" => "After the title, but before the meta and content.",
			"big_before_content" => "After the title and meta, but before the content.",
			"small_float_left" => "After the title and meta, floating left with content.",
			"small_float_right" => "After the title and meta, floating right with content."
		)
		);
	
	
	/*		Option: show_social_header 
    	*
    	* Settings & field initialization, + registration
    */
	    add_settings_section(
			'simplicated_social_media',			
			'Social Media',					
			'simplicated_social_media_section_callback',	
			'simplicated_royal_options'							
		);
	   
	    add_settings_field(	
		'show_social_media_header',						
		'Would you like to show the social media links in the <b>header</b>?',							
		'simplicated_show_social_media_options_callback',	
		'simplicated_royal_options',							
		'simplicated_social_media',			
		array(		'setting' => 'header',						
			"yes" => "Yes! Display social media icons below the header menu.",
			"no" => "Do not display social media icons in the header.",
		)
		);
		
		add_settings_field(	
		'show_social_media_footer',						
		'Would you like to show the social media links in the <b>footer</b>?',							
		'simplicated_show_social_media_options_callback',	
		'simplicated_royal_options',							
		'simplicated_social_media',			
		array(	'setting' => 'footer',							
			"yes" => "Yes! Display social media icons in the footer just above the footer menu.",
			"no" => "Do not display social media icons in the footer.",
		)
		);
		
		add_settings_field(	'google_url', 'Google Plus URL','simplicated_show_social_media_options_callback','simplicated_royal_options',							
		'simplicated_social_media',	array('setting' => 'google_url') );
		
		add_settings_field(	'facebook_url', 'Facebook URL','simplicated_show_social_media_options_callback','simplicated_royal_options',							
		'simplicated_social_media',	array('setting' => 'facebook_url') );
		
		add_settings_field(	'twitter_url', 'Twitter URL','simplicated_show_social_media_options_callback','simplicated_royal_options',							
		'simplicated_social_media',	array('setting' => 'twitter_url') );
		
		add_settings_field(	'tumblr_url', 'Tumblr URL','simplicated_show_social_media_options_callback','simplicated_royal_options',							
		'simplicated_social_media',	array('setting' => 'tumblr_url') );
		
		add_settings_field(	'flickr_url', 'Flickr URL','simplicated_show_social_media_options_callback','simplicated_royal_options',							
		'simplicated_social_media',	array('setting' => 'flickr_url') );
		
		add_settings_field(	'linkedin_url', 'LinkedIn','simplicated_show_social_media_options_callback','simplicated_royal_options',							
		'simplicated_social_media',	array('setting' => 'linkedin_url') );
		
		add_settings_field(	'youtube_url', 'YouTube','simplicated_show_social_media_options_callback','simplicated_royal_options',							
		'simplicated_social_media',	array('setting' => 'youtube_url') );

		add_settings_field(	'rss_url', 'RSS URL (you can leave this blank to use the standard WordPress RSS url)','simplicated_show_social_media_options_callback','simplicated_royal_options',							
		'simplicated_social_media',	array('setting' => 'rss_url') );
		
		/*		Option: show_social_header 
    	*
    	* Settings & field initialization, + registration
    */
	    add_settings_section(
			'simplicated_color_scheme',			
			'Color Scheme',					
			'simplicated_color_scheme_section_callback',	
			'simplicated_royal_options'							
		);
	   
	    add_settings_field(	
		'color_scheme',						
		'Please select a primary color that best suits your site\'s personality.',							
		'simplicated_color_scheme_options_callback',	
		'simplicated_royal_options',							
		'simplicated_color_scheme',			
		array(						
			"red" => "<b><font color=\"#bc3e34\">Dark red color scheme.</a></b>",
			"dark_blue" => "<b><font color=\"#3f6480\">Dark blue color scheme.</a></b>",
			"light_blue" => "<b><font color=\"#22779f\">Light blue color scheme.</a></b>",
			"orange" => "<b><font color=\"#ea7037\">Orange color scheme.</a></b>",
			"default" => "<b><font color=\"#000\">Black header with <font color=\"#bc3e34\">dark red</a> links.</a></b>"
		)
		);
		
		/*		Option: (none) (this is just a general information section for the options page)
    	*
    	* Settings & field initialization, + registration
    */
	    add_settings_section(
			'simplicated_options_help',			
			'Some Helpful Helpings',					
			'simplicated_options_help_section_callback',	
			'simplicated_options_help'							
		);
		

	// This is necessary to be able to stuff all the simplicated_royal_options into one variable ($options = get_option(simplicated yada yada yada)
	register_setting('simplicated_royal_options', 'simplicated_royal_options');
	register_setting('simplicated_royal_options', 'enable_author_byline');
	register_setting('simplicated_royal_options', 'featured_image_format');
	register_setting('simplicated_royal_options', 'frontpage_featured_image_format');
	register_setting('simplicated_royal_options', 'show_social_media_header');
	register_setting('simplicated_royal_options', 'show_social_media_footer');
	register_setting('simplicated_royal_options', 'google_url');
	register_setting('simplicated_royal_options', 'facebook_url');
	register_setting('simplicated_royal_options', 'twitter_url');
	register_setting('simplicated_royal_options', 'tumblr_url');
	register_setting('simplicated_royal_options', 'flickr_url');
	register_setting('simplicated_royal_options', 'linkedin_url');
	register_setting('simplicated_royal_options', 'youtube_url');
	register_setting('simplicated_royal_options', 'rss_url');
	register_setting('simplicated_royal_options', 'color_scheme');
		
	// This next chunk of code is used to change the name of our "insert into post" button for our avatar uploader
	global $pagenow;
	if ( 'media-upload.php' == $pagenow || 'async-upload.php' == $pagenow ) {
		add_filter( 'gettext', 'lawsonry_replace_thickbox_button_text', 1, 3 ); // here we call our func to replace the button text for the avatar uploader
	}

}	// end simplicated_royal_options function

// Initialize the options
add_action('admin_init', 'simplicated_initialize_royal_options'); 

// Simplicated Author Byline section and options callback functions 
	function simplicated_author_byline_section_callback() {
	echo "The Author Byline is a short bio or description of the author of an individual post. This will pull the author's description (from his/her profile field) and display it where you specify.";
}
	function simplicated_author_byline_options_callback($args) {
		
	$options = get_option("simplicated_royal_options");
	
	$beforecheck = ($options["enable_author_byline"] == "before" ? "checked" : "");
	$aftercheck = ($options["enable_author_byline"] == "after" ? "checked" : "");
	$nonecheck = ($options["enable_author_byline"] == "none" ? "checked" : "");
	
	$html = '<p><input id="enable_author_byline" name="simplicated_royal_options[enable_author_byline]" type="radio" value="before" '.$beforecheck.'/><label class="admin-text" for="simplicated_royal_options[enable_author_byline]"> '.$args["before"].'</label></p>';
	$html .= '<p><input id="enable_author_byline" name="simplicated_royal_options[enable_author_byline]" type="radio" value="after" '.$aftercheck.'/><label class="admin-text" for="simplicated_royal_options[enable_author_byline]"> '.$args["after"].'</label></p>';
	$html .= '<p><input id="enable_author_byline" name="simplicated_royal_options[enable_author_byline]" type="radio" value="none" '.$nonecheck.'/><label class="admin-text" for="simplicated_royal_options[enable_author_byline]"> '.$args["none"].'</label></p>';
		
	echo $html;

}
// end of callbacks for author_byline

// Simplicated Featured Image Format section and options callback functions
	function simplicated_featured_image_format_section_callback() {
	echo "There are five different ways to display featured images. Choose the one that's best for your content.";
}
	function simplicated_featured_image_format_options_callback($args) { 
	
	$options = get_option("simplicated_royal_options");
	
	$bigbeforetitle = ($options["featured_image_format"] == "big_before_title" ? "checked" : "");
	$bigbeforemeta = ($options["featured_image_format"] == "big_before_meta" ? "checked" : "");
	$bigbeforecontent = ($options["featured_image_format"] == "big_before_content" ? "checked" : "");
	$smallfloatleft = ($options["featured_image_format"] == "small_float_left" ? "checked" : "");
	$smallfloatright = ($options["featured_image_format"] == "small_float_right" ? "checked" : "");
	
	$html = '<p><input id="featured_image_format" name="simplicated_royal_options[featured_image_format]" type="radio" value="big_before_title" '.$bigbeforetitle.'/><label class="admin-text" for="featured_image_format"> '.$args["big_before_title"].'</label></p>';
	$html .= '<p><input id="featured_image_format" name="simplicated_royal_options[featured_image_format]" type="radio" value="big_before_meta" '.$bigbeforemeta.'/><label class="admin-text" for="featured_image_format"> '.$args["big_before_meta"].'</label></p>';
	$html .= '<p><input id="featured_image_format" name="simplicated_royal_options[featured_image_format]" type="radio" value="big_before_content" '.$bigbeforecontent.'/><label class="admin-text" for="featured_image_format"> '.$args["big_before_content"].'</label></p>';
	$html .= '<p><input id="featured_image_format" name="simplicated_royal_options[featured_image_format]" type="radio" value="small_float_left" '.$smallfloatleft.'/><label class="admin-text" for="featured_image_format"> '.$args["small_float_left"].'</label></p>';
	$html .= '<p><input id="featured_image_format" name="simplicated_royal_options[featured_image_format]" type="radio" value="small_float_right" '.$smallfloatright.'/><label class="admin-text" for="featured_image_format"> '.$args["small_float_right"].'</label></p>';
		
	echo $html;

}
// end of callbacks for featured_image_format

// Simplicated Google Analytics section and options callback functions
	function simplicated_google_analytics_section_callback() {
	echo "If you're not using tracking software, then how will <del>private companies surreptitiously track everything you do?</del> you keep track of your growth and content?";
}
	function simplicated_google_analytics_options_callback($args) {
	
	$options = get_option("simplicated_royal_options");
	
	$trackingcode = $options["google_analytics"];
		
	$html = '<p><textarea id="google_analytics" name="simplicated_royal_options[google_analytics]" style="min-width: 550px; min-height: 150px; resize: none;">';
	$html .= $trackingcode;
	$html .= '</textarea></p>';
	
	echo $html;

}
// end of callbacks for featured_image_format

// Simplicated Frontpage Featured Image Format section and options callback functions
	function simplicated_frontpage_featured_image_format_section_callback() {
	echo "Here you can format how you would like to display the featured images on the front page. Keep it the same as your single post featured image format for uniformity, or switch it up and make your style a little more simplicated.";
}
	function simplicated_frontpage_featured_image_format_options_callback($args) { 
	
	$options = get_option("simplicated_royal_options");
	
	$bigbeforetitle = ($options["frontpage_featured_image_format"] == "big_before_title" ? "checked" : "");
	$bigbeforemeta = ($options["frontpage_featured_image_format"] == "big_before_meta" ? "checked" : "");
	$bigbeforecontent = ($options["frontpage_featured_image_format"] == "big_before_content" ? "checked" : "");
	$smallfloatleft = ($options["frontpage_featured_image_format"] == "small_float_left" ? "checked" : "");
	$smallfloatright = ($options["frontpage_featured_image_format"] == "small_float_right" ? "checked" : "");
	
	$html = '<p><input id="frontpage_featured_image_format" name="simplicated_royal_options[frontpage_featured_image_format]" type="radio" value="big_before_title" '.$bigbeforetitle.'/><label class="admin-text" for="frontpage_featured_image_format"> '.$args["big_before_title"].'</label></p>';
	$html .= '<p><input id="frontpage_featured_image_format" name="simplicated_royal_options[frontpage_featured_image_format]" type="radio" value="big_before_meta" '.$bigbeforemeta.'/><label class="admin-text" for="frontpage_featured_image_format"> '.$args["big_before_meta"].'</label></p>';
	$html .= '<p><input id="frontpage_featured_image_format" name="simplicated_royal_options[frontpage_featured_image_format]" type="radio" value="big_before_content" '.$bigbeforecontent.'/><label class="admin-text" for="frontpage_featured_image_format"> '.$args["big_before_content"].'</label></p>';
	$html .= '<p><input id="frontpage_featured_image_format" name="simplicated_royal_options[frontpage_featured_image_format]" type="radio" value="small_float_left" '.$smallfloatleft.'/><label class="admin-text" for="frontpage_featured_image_format"> '.$args["small_float_left"].'</label></p>';
	$html .= '<p><input id="frontpage_featured_image_format" name="simplicated_royal_options[frontpage_featured_image_format]" type="radio" value="small_float_right" '.$smallfloatright.'/><label class="admin-text" for="frontpage_featured_image_format"> '.$args["small_float_right"].'</label></p>';
		
	echo $html;

}
// end of callbacks for frontpage_featured_image_format

// Simplicated Show Social Media section and options callback functions
	function simplicated_show_social_media_section_callback() {
	echo "You can display social media icons in the header, footer, or both header & footer. If you fill in the url to a social media service, Simplicated automagially links an icon to the service URL. ";
}
	function simplicated_show_social_media_options_callback($args) { 
	
	$options = get_option("simplicated_royal_options");
	
	$headeryes = ($options["show_social_media_header"] == "yes" ? "checked" : "");
	$headerno = ($options["show_social_media_header"] == "no" ? "checked" : "");
	$footeryes = ($options["show_social_media_footer"] == "yes" ? "checked" : "");
	$footerno = ($options["show_social_media_footer"] == "no" ? "checked" : "");
	
	$html = "";
	
	// Instead of a new callback function for each setting, I'm using a 'setting' argument passed in the add_settings_field array (the last var) to pass on what we want to display. This way we have one function with many different output possibilities
	if($args['setting'] == "header"){
		$html = '<p><input id="show_social_media_header" name="simplicated_royal_options[show_social_media_header]" type="radio" value="yes" '.$headeryes.'/><label class="admin-text" for="show_social_media_header"> '.$args["yes"].'</label></p>';
		$html .= '<p><input id="show_social_media_header" name="simplicated_royal_options[show_social_media_header]" type="radio" value="no" '.$headerno.'/><label class="admin-text" for="show_social_media_header"> '.$args["no"].'</label></p>';
	} else if ($args['setting'] == "footer"){
		$html = '<p><input id="show_social_media_footer" name="simplicated_royal_options[show_social_media_footer]" type="radio" value="yes" '.$footeryes.'/><label class="admin-text" for="show_social_media_footer"> '.$args["yes"].'</label></p>';
		$html .= '<p><input id="show_social_media_footer" name="simplicated_royal_options[show_social_media_footer]" type="radio" value="no" '.$footerno.'/><label class="admin-text" for="show_social_media_footer"> '.$args["no"].'</label></p>';
	} else {
		// Since $args['setting'] is the name of the option we're using, we just use it as a placeholder for where we would put the option name. This allows us to display the same format for a list of options with the same type of input.
		$html = '<p><input id="'.$args['setting'].'" name="simplicated_royal_options['.$args['setting'].']" type="text" class="field" value="'.$options[$args['setting']].'"/><label class="admin-text" for="'.$args['setting'].'"></label></p>';
		}
		
	echo $html;

}
// end of callbacks for frontpage_featured_image_format

// Simplicated Color Scheme section and options callback functions
	function simplicated_color_scheme_section_callback() {
	echo "Choose a color scheme that best fits your style.";
}
	function simplicated_color_scheme_options_callback($args) { 
	
	$options = get_option("simplicated_royal_options");
	
	$default = ($options["color_scheme"] == "default" ? "checked" : "");
	$red = ($options["color_scheme"] == "red" ? "checked" : "");
	$darkblue = ($options["color_scheme"] == "dark_blue" ? "checked" : "");
	$lightblue = ($options["color_scheme"] == "light_blue" ? "checked" : "");
	$orange = ($options["color_scheme"] == "orange" ? "checked" : "");
	
	
	$html = '<p><input id="color_scheme" name="simplicated_royal_options[color_scheme]" type="radio" value="default" '.$default.'/><label class="admin-text" for="color_scheme"> '.$args["default"].'</label></p>';
	$html .= '<p><input id="color_scheme" name="simplicated_royal_options[color_scheme]" type="radio" value="red" '.$red.'/><label class="admin-text" for="color_scheme"> '.$args["red"].'</label></p>';
	$html .= '<p><input id="color_scheme" name="simplicated_royal_options[color_scheme]" type="radio" value="dark_blue" '.$darkblue.'/><label class="admin-text" for="color_scheme"> '.$args["dark_blue"].'</label></p>';
	$html .= '<p><input id="color_scheme" name="simplicated_royal_options[color_scheme]" type="radio" value="light_blue" '.$lightblue.'/><label class="admin-text" for="color_scheme"> '.$args["light_blue"].'</label></p>';
	$html .= '<p><input id="color_scheme" name="simplicated_royal_options[color_scheme]" type="radio" value="orange" '.$orange.'/><label class="admin-text" for="color_scheme"> '.$args["orange"].'</label></p>';
	
	echo $html;

}
// end of callbacks for color_scheme


// Simplicated options help information at the bottom of the options page
function simplicated_options_help_section_callback() {
	
	$html = '<p>Simplicated is a fast, pro-blogger-friendly theme designed to quickly address the needs of professional content writers. With its handful of extremely user-friendly options, Simplicated gives you the tools you need to make your content look good without bombarding you with distractions. That\'s why all the options fit onto one page -- you should be focusing on writing, not on customizing your theme! Simplicated comes out-of-the-box with SEO enhancements, but we recommend you use the Yoast SEO plugin as well.</p>';
	
	$html .= '<p>I am 100% dedicated to theme and WordPress support, and will do everything in my power to help you resolve any theme-related issues you may be having. Additionally, I welcome any recommendations and comments, as I\'m always looking for new and exciting features and opportunities to add to future updates. If you have a question, comment, complaint, or concern, please get a hold of me through one of the following ways: <a href="mailto:jesse@lawsonry.com">Email</a>, <a href="http://lawsonry.com/themes/support">web contact form</a>, or <a href="https://plus.google.com/112167173782936953439">Google+</a>.</p>';
	
	$html .= '<p>On behalf of minimalists and connoisseurs of content functionality, thank you so much for your purchase.</p>';
	
	echo $html;
	
}


/*
	* 	PART III
	*
	* 	Create the illustrious callback function that will display our options page, using the options from Part II to correctly render the page we created in Part I
*/

function simplicated_royal_options_callback() { 
?>

	<div class="wrap">
		<div id="icon-themes" class="icon32"></div>
		<h2>Simplicated's Royal Options</h2>
		<p class="description">I am ALWAYS available for theme support. If you have a question, comment, complaint, or concern, please get a hold of me through one of the following ways: <a href="mailto:jesse@lawsonry.com">Email</a>, <a href="http://lawsonry.com/contact">web contact form</a>, or <a href="https://plus.google.com/112167173782936953439">Google+</a>.</p>
		
		<?php settings_errors(); ?>
		
		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php settings_fields('simplicated_royal_options'); ?>
			
			<?php do_settings_sections('simplicated_royal_options'); ?>
			
			<?php submit_button(); ?>
			
			<?php do_settings_sections('simplicated_options_help'); ?>
			
		</form>
	</div> <!-- / .wrap -->
<?php	
}

/*
	* 	APPENDIX A
	*
	* 	Add an avatar option to the user profile field. This will make our Author Byline look much better.
*/

// First, we'll add a special filter to change the text of the image uploader text when we're uploading an avatar
	
function lawsonry_replace_thickbox_button_text($translated_text, $text, $domain) {
		if ('Insert into Post' == $text) {
			$referer = strpos( wp_get_referer(), 'profile' );
			if ( $referer != '' ) {
				return __('Make this my author profile picture!', 'simplicated' );
			}
		}
		return $translated_text;
	}
	
// Second, we'll have to manually push the new new profile field onto the profile page (as of 16-June-2013, user-edit.php (Core WP page) manually places the profile fields, and doesn't use do_settings_section(
function simplicated_add_custom_profile_fields( $user ) {
	
	// Display image uploader button
	$avatar = get_the_author_meta( 'author_profile_picture', $user->ID );
	?>
		<h3>Profile Picture</h3>
		
		<input type="hidden" id="author_profile_picture_url" name="author_profile_picture_url" value="<?php echo esc_url( $avatar ); ?>" />

		<table class="form-table">
			<tr>
				<th><label for="author_profile_picture_button"><span class="description"><?php _e('Upload a picture to use as your author profile image.', 'simplicated' ); ?></span></label></th>
				<?php $buttontext = ""; if('' != $avatar) { $buttontext = "Change author profile picture";  } else { $buttontext = "Upload new author profile picture"; }?>
				<td><input id="author_profile_picture_button" type="button" class="button" value="<?php echo $buttontext; ?>" /></td>
			</tr>
			
			<tr>
				<th><label for="author_profile_picture_preview"><span class="description"><?php _e('Preview:', 'simplicated' ); ?></span></label></th>
				<td>
					<div id="author_profile_picture_preview" style="min-height: 100px;">
					<img style="max-width:100%;" src="<?php echo esc_url( $avatar ); ?>" />
					</div>
					<span id="upload_success" class="color: #FF0000; font-weight: bold;"> </span>
					
					<?php if ( '' != $avatar ){ ?>
			<span class="description">Lookin' good! If you're tired of this picture, you can always use the button above to change it. </span>
		<?php } else { ?>
			<span class="description">You do not have an author profile picture yet! Click the button above to upload one (or select one from your media gallery).</span>
		<?php } ?>
				</td>
			</tr>
		</table>
	<?php
	
}

// Third, we'll create this callback function to be called when the profile field is saved. 
function simplicated_save_custom_profile_fields( $user_id ) {
    
    if ( !current_user_can( 'edit_user', $user_id ) )
        return FALSE;
            
    update_usermeta( $user_id, 'author_profile_picture', $_POST['author_profile_picture_url'] );
}

// Add our functions to profile display and update hooks
add_action( 'show_user_profile', 'simplicated_add_custom_profile_fields' );
add_action( 'edit_user_profile', 'simplicated_add_custom_profile_fields' );
add_action( 'personal_options_update', 'simplicated_save_custom_profile_fields' );
add_action( 'edit_user_profile_update', 'simplicated_save_custom_profile_fields' );

// Fourth, let's add some social media contacts for our author about pages
// Add social media options to profile page
add_filter('user_contactmethods','add_social_media_contactmethods',10,1);
function add_social_media_contactmethods( $contactmethods ) {
	$contactmethods['twitter_url'] = 'Twitter URL';
	$contactmethods['facebook_url'] = 'Facebook URL';
	$contactmethods['pinterest_url'] = 'Pinterest URL';
	$contactmethods['google_url'] = 'Google Plus URL';
	$contactmethods['tumblr_url'] = 'Tumblr URL';
	return $contactmethods;
}


?>
