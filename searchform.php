<?php
/**
 * The template for displaying search forms in simplicated
 *
 * @package simplicated
 */
?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="screen-reader-text"><?php _ex( 'Search', 'assistive text', 'simplicated_by_lawsonry' ); ?></label>
		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Type in your search and hit enter &hellip;', 'placeholder', 'simplicated_by_lawsonry' ); ?>" />
	</form>
