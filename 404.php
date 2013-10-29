<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package simplicated
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<article id="post-0" class="post not-found">
				<header class="entry-header">
					<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

					<div class="entry clearfix">

							<h1 class="page-title"><?php _e("What are you looking for?", "simplicated"); ?></h1>

	 						<p><b>You 
<?php
#some variables for the script to use
#if you have some reason to change these, do.  but wordpress can handle it
$adminemail = get_option('admin_email'); #the administrator email address, according to wordpress
$website = get_bloginfo('url'); #gets your blog's url from wordpress
$websitename = get_bloginfo('name'); #sets the blog's name, according to wordpress

  if (!isset($_SERVER['HTTP_REFERER'])) {
    #politely blames the user for all the problems they caused
        echo "tried going to "; #starts assembling an output paragraph
	$casemessage = "All is not lost!";
  } elseif (isset($_SERVER['HTTP_REFERER'])) {
    #this will help the user find what they want, and email me of a bad link
	echo "clicked a link to"; #now the message says You clicked a link to...
        #setup a message to be sent to me
	$failuremess = "A user tried to go to $website"
        .$_SERVER['REQUEST_URI']." and received a 404 (page not found) error. ";
	$failuremess .= "It wasn't their fault, so try fixing it.  
        They came from ".$_SERVER['HTTP_REFERER'];
	mail($adminemail, "Bad Link To ".$_SERVER['REQUEST_URI'],
        $failuremess, "From: $websitename <noreply@$website>"); #email you about problem
	$casemessage = "An administrator has been emailed 
        about this problem, too.";#set a friendly message
  }
  echo " </b>".$website.$_SERVER['REQUEST_URI']; ?><b>
and it doesn't exist.</p><p><?php echo $casemessage; ?>  You can click back 
and try again or search for what you're looking for:</b>
  <?php include(TEMPLATEPATH . "/searchform.php"); ?>
</p>
						<div class="sitemap-wide">
						
						

							<h2><span><?php _e("Maybe you were looking for...", "simplicated"); ?></span></h2>
							<ul>
<?php
$numposts = 30; 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('showposts='.$numposts.'&paged=' . $paged); ?>
<?php while (have_posts()) : the_post(); ?>

								<li><a href="<?php the_permalink() ?>" rel="<?php _e("bookmark", "simplicated"); ?>" title="<?php _e("Permanent Link to", "simplicated"); ?> <?php the_title(); ?>"><?php the_title(); ?></a></li>

								<?php endwhile; ?>
							</ul>

							

							<h2><span><?php _e("Site Feeds", "simplicated"); ?></span></h2>
							<ul class="archives">
								<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e("Main RSS Feed", "simplicated"); ?></a></li>
								<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e("Comments RSS Feed", "simplicated"); ?></a></li>
							</ul>

							<h2><span><?php _e("Pages", "simplicated"); ?></span></h2>
							<ul class="archives">
								<li><a href="<?php bloginfo('home'); ?>"><?php _e("Home", "simplicated"); ?></a></li>
								<?php wp_list_pages('title_li='); ?>
							</ul>

							<h2><span><?php _e("Monthly Archives", "simplicated"); ?></span></h2>
							<ul class="archives">
								<?php wp_get_archives('show_post_count=1'); ?>
							</ul>
		
							<h2><span><?php _e("Categories", "simplicated"); ?></span></h2>
							<ul class="archives">
								<?php wp_list_categories('title_li=&show_count=1'); ?>
							</ul>

							<h2><span><?php _e("Top 20 Tags", "simplicated"); ?></span></h2>
							<?php wp_tag_cloud('number=20&smallest=9&largest=9&format=list&orderby=count&order=DESC'); ?> 

						</div> <!-- end sitemap-wide div -->


					
				</div><!-- .entry-content -->
			</article><!-- #post-0 .post .not-found -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>