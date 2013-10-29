<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package simplicated
 */
 
 $options = get_option("simplicated_royal_options");
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'simplicated_by_lawsonry_credits' ); ?>
			
			<?php if($options['show_social_media_footer'] == "yes"): lawsonry_display_social_media_icons(); endif; ?>
			
			<center><?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'fallback_cb' => false, 'before' => '-', 'after' => '-', 'container' => 'footernav', 'items_wrap' => '%3$s' ) ); ?>
			</center>

			<center><em>Powered by WordPress and the <a href="http://lawsonry.com/themes/simplicated">Simplicated Theme</a> by <a href="http://lawsonry.com/">Jesse Lawson (<a href="http://profiles.wordpress.org/lawsonry">W</a>, <a href="https://plus.google.com/112167173782936953439/">G+</a>)</a>.</em></center>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>