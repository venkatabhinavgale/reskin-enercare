<?php
$post_image_url = get_the_post_thumbnail_url(get_the_ID());

echo '<div class="single-post__header" style="background-image:url(' . $post_image_url . ');">';
//the_post_thumbnail('12-5-header-image', array( 'role' => 'presentation') );
	echo '<div class="single-post__header__container">';
	echo '<h1 class="entry-title single-post__title">' . get_the_title() . '</h1>';
		echo '<div class="single-post__author-date">';
			echo get_author_headshot(false, 'author-date__image');
			echo '<div>';
				echo '<p class="publish-date single-post__name">By <a href="'.get_author_posts_url(get_the_author_meta('ID')).'">' . get_the_author_meta('display_name').'</a></p>';
				echo '<p class="publish-date single-post__date">' . get_the_date( 'F j, Y' ) . '</p>';
			echo '</div>';
		echo '</div>'; //End Author / Date
	echo '</div>';
echo '</div>';
