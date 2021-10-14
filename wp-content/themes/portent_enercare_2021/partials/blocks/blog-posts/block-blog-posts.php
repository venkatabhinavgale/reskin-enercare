<?php

/**
 * Blog Post Block
 * This block display a list of blog posts based on chose categories
 */
$classes = 'block-emc-card';

$block_alignment = get_field('block-alignment') ? 'block-blog-posts__post--vertical' : 'block-blog-posts__post--horizontal';
$blog_cats = get_field( 'categories'  );
$blog_num_posts = get_field('number_of_posts') ? get_field('number_of_posts') : 4;
$post_display = get_field( 'post_display' );
$post_display_class = 'block-blog-posts__post--' . $post_display;

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

<div class="block-blog-posts">
	<?php
		if( $blog_posts->have_posts()) {
			while( $blog_posts->have_posts() ){
				$blog_posts->the_post();
				echo '<div class="block-blog-posts__post '.$block_alignment.' '.$post_display_class.'">';

					if( has_post_thumbnail() && $post_display !== 'compact' ) {
						the_post_thumbnail( '1-1', array( 'class' => 'block-blog-posts__post__image', 'alt' => '' ) );
					} elseif( !has_post_thumbnail() && $post_display !== 'compact' ) {
						$default_image = get_field( 'enercare_default_image', 'options');
						echo wp_get_attachment_image( $default_image, '1-1', false, array( 'class' => 'block-blog-posts__post__image', 'alt' => '' ) );
					}

						echo '<div class="block-blog-posts__post__summary">';
							echo '<h2 class="block-blog-posts__post__title"><a class="block-blog-posts__post__link" href="'. get_the_permalink() . '">' . get_the_title() . '</a></h2>';

						if( $post_display === 'full' ) {
							echo '<p class="block-blog-posts__post__except">' . the_excerpt() . '</p>';
						}
						echo '</div>';
				echo '</div>';
			}
		}
	?>
</div>
