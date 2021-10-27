<?php
// Template for default campaign card.
?>
<div class="block-offer-card__wrapper" data-allow-multiple>
    <div class="block-offer-card__container <?= $classes ?>">
        <?php if ($campaign_subheading) { ?>
          <p class="block-offer-card__subheading"><?php echo $campaign_subheading; ?></p>
        <?php } ?>
        <h3><?= $campaign_heading; ?></h3>
        <p class="block-offer-card__offer-expiration">Offer expires <?= date('F d, Y', strtotime($campaign_expiration)); ?>.<button class="block-offer-card__terms-toggle" aria-controls="terms_<?= $campaign->ID ?>" data-micromodal-trigger="modal-<?=$campaign->ID ?>">View Details</button></p>
        <a href="<?= $campaign_destination ?>"><span class="wp-block-button__link has-red-background-color has-background"><?= $cta_text ?></span></a>
        <?= $campaign_terms; ?>
    </div>
    <?= $campaign_image; ?>
  </div>
