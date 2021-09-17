<?php

$section_header = get_field('title');
$section_content = get_field('content');
$locations_header = get_field('locations_heading');
$locations_locations = get_field('locations');
$locations_cta = get_field('locations_cta');
$form_background = wp_get_attachment_image_src( get_field('form_background_image'), 'medium');
$form_header = get_field('form_header');
$form_content = get_field('form_content');
?>

<section class="block-location-finder alignwide">
	<div class="block-location-finder__content">
		<h2 class="has-white-color"><?= $section_header ?></h2>
		<p class="has-white-color"><?= $section_content ?></p>
		<h3 class="has-white-color"><?= $locations_header ?></h3>
		<ul class="block-location-finder__list">
			<?php
				foreach( $locations_locations as $location ) {
          $location_title = get_the_title($location);
          if (get_field('display_title', $location))
            $location_title = get_field('display_title', $location);
					echo '<li>';
						echo '<a class="has-white-color" href="'.get_the_permalink( $location ).'">'. $location_title .'</a>';
					echo '</li>';
				}
			?>
		</ul>
    <?php if ($locations_cta && sizeof($locations_cta) > 0) { ?>
		<a class="wp-block-button__link has-red-background-color has-background" href="<?= $locations_cta['url'] ?>"><?= $locations_cta['title'] ?></a>
    <?php } ?>
	</div>
	<div class="block-location-finder__form" style="background-image:<?= $form_background ?>">
		<div class="block-location-finder__form-container">
			<h3 class="has-black-color"><?= $form_header ?></h3>
			<p class="has-black-color"><?= $form_content ?></p>
			<form method="get" action="<?= get_bloginfo('url'); ?>/locations/" class="block-location-finder__postal-form">
				<label for="location_finder__input">Postal Code</label>
				<div class="field-group">
					<input data-interface="location-finder-input" id="location_finder__input" type="text" name="postal_code" maxlength="7" />
					<input class="has-red-background-color has-background" data-interface="location-finder-submit" type="submit" value="Submit" />
				</div>
			</form>
		</div>
 	</div>
</section>
