<?php

/**
 * Blog Post Block
 * This block display a list of blog posts based on chose categories
 */
$classes = 'block-blog-posts';

$group_orientation = get_field( 'group_orientation' ) ? 'block-blog-posts--column' : 'block-blog-posts--row';
$block_alignment = get_field('block_orientation') ? 'block-blog-posts__post--horizontal' : 'block-blog-posts__post--vertical';
$blog_cats = get_field( 'categories'  );
$blog_num_posts = get_field('number_of_posts') ? get_field('number_of_posts') : 4;
$post_display = get_field( 'post_display' );
$post_display_class = 'block-blog-posts__post--' . $post_display;
$post_image_size = get_field( 'image_size' ) ? get_field( 'image_size' ) : '2-3';

if( !empty($block['className']) ) {
	$classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
	$classes .= sprintf( ' align%s', $block['align'] );
}

/*
 * Query Posts
 */
$blog_post_args = array(
	'cats' => $blog_cats,
	'posts_per_page' =>  $blog_num_posts
);
$blog_posts = new WP_Query( $blog_post_args );

?>
	<?php
		if( $blog_posts->have_posts()) {
			echo '<div class="block-blog-posts ' . $group_orientation . ' ">';
			while ( $blog_posts->have_posts() ) {
				$blog_posts->the_post();
				$excerpt = get_the_excerpt() ? get_the_excerpt() : get_the_content();
				echo '<div class="block-blog-posts__post ' . $block_alignment . ' ' . $post_display_class . '">';

				if ( has_post_thumbnail() && $post_display !== 'compact' ) {
					the_post_thumbnail( $post_image_size, array(
							'class' => 'block-blog-posts__post__image block-blog-posts__post__image--' . $post_image_size . '',
							'alt'   => ''
					) );
				} elseif ( ! has_post_thumbnail() && $post_display !== 'compact' ) {
					$default_image = get_field( 'enercare_default_image', 'options' );
					echo wp_get_attachment_image( $default_image, $post_image_size, false, array(
							'class' => 'block-blog-posts__post__image block-blog-posts__post__image--' . $post_image_size . '',
							'alt'   => ''
					) );
				}

				echo '<div class="block-blog-posts__post__summary">';
				echo '<h2 class="block-blog-posts__post__title"><a class="block-blog-posts__post__link" href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';

				if ( $post_display === 'full' ) {
					echo '<p class="block-blog-posts__post__except">' . wp_trim_words( $excerpt, 25 ) . '</p>';
				}
				echo '</div>';
				echo '</div>';
			}
			echo '</div>';

			if ( $blog_cats ) {
				echo '<div class="block-blog-posts__archive-links">';
				echo '<a class="wp-block-button__link has-red-background-color has-background block-blog-posts__archive-link" href="' . get_category_link( $blog_cats[0] ) . '">View all ' . get_cat_name( $blog_cats[0] ) . ' posts</a>';
				echo '</div>';
			}
		}
?>
