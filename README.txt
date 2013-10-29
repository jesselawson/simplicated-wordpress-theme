Lawsonry's Simplicated WordPress Theme

Labor tracker:

June-15th: ~10 hours
June-16th: 9AM-2pm \ 230pm-4pm 

Options

	How to access:
	
		$my_var = $options['%NAME%'];

	NAME										POSSIBLE VALUES
	google_analytics							google_analytics
	enable_author_byline						before, after, none
	featured_image_format						big_before_title, big_before_meta, big_before_content, small_float_left, small_float_right
	show_site_description						yes, no
	frontpage_featured_image_format				big_before_title, big_before_meta, big_before_content, small_float_left, small_float_right


TODO:

	[6/15] Place google_analytics into header
	[6/16] Create profile picture/author image feature on profile page
	[6/16] Create author_byline function, then insert conditional insertions in single.php
	[6/16] Author archive page prettified
	[6/16] Subtle bg added
	[6/17] Fixed "checked=checked" on options page, and fixed values not showing up in options
	[6/17] Social media fields added to profile
	[6/17] Create featured image function (the like a boss function from before), and create formatting for it via args that correspond to featured_image_format value
	[6/17] Do the featured image for the main posts page, too
	[6/17] Author page includes fancy byline + social media (ala lawsonry)
	[6/17] Add widget positions
	[6/17] Footer menu
	[6/17] More branding? 
	[6/17] Clean category archive page / tag archive page
	[6/17] Clean 404 page
	[6/17] Include Google Authorship ability (unless Yoast SEO already has it)
	[6/17] Create default content that sets up Privacy/sitemap/etc pages for optimum seo bloggability
	[6/17] Add site social media options for next task
	[6/17] Add social media icons under main header
	[6/17] Add social media icons to footer menu (at top)
	[6/17] get new social media icon set (keep this one for footer, use new one for header maybe? a more subtle one?)
	[6/18] Add color scheme options
	[6/18] Correct responsive design problems with header
		
	[_] Theme documentation (Website + PDF included in the download)
	
	[_] Themeforest Sales graphics
	
		__ 80x80 thumbnail
		__ 590x300 theme sales header
		__ screenshots (optional)
	
	
	
	
Selling points:
	
	- CLEAN and responsive design.
	
	- FIBONACCI inspired typography design. 
	
	- NO shortcodes. Instead of template-based shortcodes, we encourage plugin-based shortcodes that are translatable across themes. This frees your content from dependency on a single theme. 
	
	- FIVE ways to automatically display featured images -- no formatting, shortcodes, or headaches.
	
	- EXTRA WIDE footer widget. Branding, branding, branding. These are the keys to marketing success. For a professional like you, page branding is absolutely key to ensuring maximum exposure. With a full-width footer widget at the bottom of each and every page -- complimented with a Footer Menu for SEO-friendly navigation links -- you can have your professional badge, about box, or a custom plugin of your choosing branded on each and every page. 
	
	
	
	
	
Notes:

- You can't add do_settings_section to profile page bc wordpress' profile page doesn't use the settings section function. You have to add the items manually. 
	
	