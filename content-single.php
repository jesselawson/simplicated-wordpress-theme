<?php
/**
 * @package simplicated
 */
 
 $options = get_option("simplicated_royal_options");
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	
		<?php
			// Check for featured image placement option
			if($options["featured_image_format"] == "big_before_title"){
				lawsonry_display_featured_image(get_the_ID(), 'big_before_title'); 
			}
		?>
		
		<h1 class="entry-title"><?php the_title(); ?></h1>
		
		<?php
		// Check for featured image placement option
		if($options["featured_image_format"] == "big_before_meta"){
			lawsonry_display_featured_image(get_the_ID(), 'big_before_meta'); 
		}
		?>

		<div class="entry-meta">
			<?php simplicated_by_lawsonry_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
	
	<?php
		// Check for featured image placement option
		if($options["featured_image_format"] == "big_before_content"){
			lawsonry_display_featured_image(get_the_ID(), 'big_before_content'); 
		}
		?>
		
	<?php 
		// Check for author byline placement
		if($options["enable_author_byline"] == "before"){
			lawsonry_display_author_byline("before"); 
		}
	?>
			
		<?php
		// Check for featured image placement option
		if($options["featured_image_format"] == "small_float_left"){
			lawsonry_display_featured_image(get_the_ID(), 'small_float_left'); 
		}
		
		if($options["featured_image_format"] == "small_float_right"){
			lawsonry_display_featured_image(get_the_ID(), 'small_float_right'); 
		}
		?>
			
			
			<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'simplicated_by_lawsonry' ),
				'after'  => '</div>',
			) );
		?>
		
	<?php 
		// Check for author byline placement
		if($options["enable_author_byline"] == "after"){
			lawsonry_display_author_byline(); 
		}
	?>
		
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'simplicated_by_lawsonry' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'simplicated_by_lawsonry' ) );

			if ( ! simplicated_by_lawsonry_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'simplicated_by_lawsonry' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'simplicated_by_lawsonry' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'simplicated_by_lawsonry' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'simplicated_by_lawsonry' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'simplicated_by_lawsonry' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
