<?php
/**
 * @package simplicated
 */
 
 $options = get_option("simplicated_royal_options");
?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	
		<?php
		// Check for frontpage featured image placement option
		if($options["frontpage_featured_image_format"] == "big_before_title"){
			lawsonry_display_featured_image(get_the_ID(), 'big_before_title'); 
		}
		?>
	
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		
		<?php
		// Check for frontpage featured image placement option
		if($options["frontpage_featured_image_format"] == "big_before_meta"){
			lawsonry_display_featured_image(get_the_ID(), 'big_before_meta'); 
		}
		?>
		
		<div class="entry-meta">
			<?php simplicated_by_lawsonry_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		
		<?php
		// Check for frontpage featured image placement option
		if($options["frontpage_featured_image_format"] == "big_before_content"){
			lawsonry_display_featured_image(get_the_ID(), 'big_before_content'); 
		}
		?>
		
		<?php
		// Check for frontpage featured image placement option
		if($options["frontpage_featured_image_format"] == "small_float_left"){
			lawsonry_display_featured_image(get_the_ID(), 'small_float_left'); 
		}
		?>
		
		<?php
		// Check for frontpage featured image placement option
		if($options["frontpage_featured_image_format"] == "small_float_right"){
			lawsonry_display_featured_image(get_the_ID(), 'small_float_right'); 
		}
		?>
	
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'simplicated_by_lawsonry' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'simplicated_by_lawsonry' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'simplicated_by_lawsonry' ) );
				if ( $categories_list && simplicated_by_lawsonry_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'simplicated_by_lawsonry' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'simplicated_by_lawsonry' ) );
				if ( $tags_list ) :
			?>
			<span class="sep"> | </span>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'simplicated_by_lawsonry' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="sep"> | </span>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'simplicated_by_lawsonry' ), __( '1 Comment', 'simplicated_by_lawsonry' ), __( '% Comments', 'simplicated_by_lawsonry' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'simplicated_by_lawsonry' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
