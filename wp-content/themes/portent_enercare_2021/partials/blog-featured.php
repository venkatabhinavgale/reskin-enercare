<?php
// grab the ID of the page we're using to get posts
$posts_page_ID = get_option( 'page_for_posts' );
$featured_post = get_field('featured_post', $posts_page_ID);
if (!$featured_post)
  $featured_post = get_post(get_the_ID());

$post_image_url = get_the_post_thumbnail_url($featured_post->ID);
echo '<div class="single-post__header" style="background-image:url(' . $post_image_url . ');">';
  //the_post_thumbnail('12-5-header-image', array( 'role' => 'presentation') );
	echo '<div class="single-post__header__container">';
  echo '<div class="single-post__featured">Featured Article</div>';
	echo '<h1 class="entry-title single-post__title">' . get_the_title($featured_post->ID) . '</h1>';
  the_excerpt();
  echo '<div class="single-post__read-more"><a href="' . get_the_permalink($featured_post->ID) . '">Read more ></a></div>';
	echo '</div>';
echo '</div>';
