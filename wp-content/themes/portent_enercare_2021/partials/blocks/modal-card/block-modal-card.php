<?php
	$emc_image = get_field('image') ? get_field('image') : get_field( 'enercare_default_image', 'options');
	$emc_name = get_field('name') ? get_field('name') : __( 'EMC Name', 'portent-enercare');
	$emc_title = get_field('title') ? get_field('title') : __( 'EMC Title', 'portent-enercare');
	$emc_bio = get_field( 'bio' );
	$cta_text = get_field('cta_text') ? get_field('cta_text') : __( 'Read Bio', 'portent-enercare');
?>

<div class="block-emc-card__wrapper">
<button>
	<?= wp_get_attachment_image( $emc_image, '1-1-3x', false, array( 'class' =>'block-emc-card__image', 'alt'=>'') ); ?>
	<h3><?= $emc_name ?></h3>
	<em><?= $emc_title ?></em>
	<span class="wp-block-button__link has-red-background-color has-background"><?= $cta_text ?></span>
</button>
</div>
