<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package simplicated
 */
?>

<div class="sidebar-left">

<h2 id="tags">Tags</h2>

	<?php
wp_tag_cloud();	?>


</div><div class="sidebar-right">

	<h2 id="pages">Pages</h2>
	<ul>
	<?php
	// Exclude pages here
	wp_list_pages(
	  array(
	    'exclude' => '',
	    'title_li' => '',
	  )
	);
	?>
	</ul>
</div>

<div style="clear:both"></div>

<h2 id="posts">All Posts</h2>
<ul>
<?php

$cats = get_categories('exclude='); // Exclude categories here
foreach ($cats as $cat) {
  echo "<li><h3>".$cat->cat_name."</h3>";
  echo "<ul>";
  query_posts('posts_per_page=-1&cat='.$cat->cat_ID);
  while(have_posts()) {
    the_post();
    $category = get_the_category();
    // Only display a post link once, even if it's in multiple categories
    if ($category[0]->cat_ID == $cat->cat_ID) {
      echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
    }
  }
  echo "</ul>";
  echo "</li>";
}
?>
</ul>
