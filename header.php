<?php
/**
 * Header file
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package simplicated
 */
 
 	$options = get_option("simplicated_royal_options");

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	// Google authorship
	if('' != $options["google_url"]): $url = $options["google_url"];?>
<link rel="author" href="<?php echo $url;?>"/>
<?php endif; ?>

<link href='http://fonts.googleapis.com/css?family=Enriqueta:400,700' rel='stylesheet' type='text/css'/>

<?php wp_head(); ?>

<style type="text/css">
<?php lawsonry_output_color_options(); ?>
</style>

<!-- load simplicated.css after base styles are loaded -->
<link href='<?php echo get_bloginfo("template_directory"); ?>/css/simplicated.css' rel='stylesheet' type='text/css'/>

<?php
	// Get tracking code and display it
	$trackingcode = $options['google_analytics'];
	if( $trackingcode != "") {
		echo $trackingcode;
	}
?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

	<?php do_action( 'before' ); ?>

	<header id="masthead" class="site-header" role="banner">

		<div class="site-branding">

			<?php 
				// Check for header image
				$header_image = get_header_image();
				
				if ( ! empty( $header_image ) ) { ?>
		
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php /* <img src="<?php header_image(); ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" /> */ ?>
						<div class="header-container">
							<div class="circular-300" style="background: url(<?php echo $header_image; ?>) no-repeat; display:inline-block;">
								<div class="header-logo-text">
									<h1 class="white"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								</div>
							</div>
						</div>
					</a>
				<?php } else { // if ( ! empty( $header_image ) ) ?>
			
					<center><h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1></center>
					
						<center><h2 class="site-description"><?php bloginfo( 'description' ); ?></h2></center>
				
			
			<?php } // end header title + description if no header image ?>

		</div>

		<nav id="navigation" class="nav center" role="navigation">

			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'simplicated_by_lawsonry' ); ?>"><?php _e( 'Skip to content', 'simplicated_by_lawsonry' ); ?></a></div>

			<?php wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>

		</nav><!-- #site-navigation -->
		
		<?php if($options['show_social_media_header'] == "yes"): lawsonry_display_social_media_icons(); endif; ?>

	</header><!-- #masthead -->
	
	
	<div id="main" class="site-main">
