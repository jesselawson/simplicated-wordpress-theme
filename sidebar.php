<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package simplicated
 */
?>

	<div id="secondary" class="widget-area" role="complementary">
		<?php do_action( 'before_sidebar' ); ?>
	
	<div class="sidebar-left">
		<?php if ( ! dynamic_sidebar( 'sidebar-left' ) ) : endif; ?>
	</div>
	<div class="sidebar-right">
			<?php if ( ! dynamic_sidebar( 'sidebar-right' ) ) : endif; ?>	
	</div>
	<div style="clear:both"></div>
	<?php if ( ! dynamic_sidebar( 'sidebar-big-bottom' ) ) : endif; ?>
	</div><!-- #secondary -->
