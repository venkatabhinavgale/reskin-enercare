<?php
// Template for default campaign card.
?>
<div class="block-offer-card__wrapper" data-allow-multiple>
  <div class="block-offer-card__container <?= $classes ?>">
    <?php if ($campaign_subheading) { ?>
      <p class="block-offer-card__subheading"><?php echo $campaign_subheading; ?></p>
    <?php } ?>
    <h3 class="block-offer-card__heading"><?= $campaign_heading; ?></h3>
    <?php if ($campaign_expiration && $campaign_expiration != "") { ?><p class="block-offer-card__offer-expiration">Offer expires <?= date('F d, Y', strtotime($campaign_expiration)); ?>.<?php } ?><button class="block-offer-card__terms-toggle" aria-controls="terms_<?= $campaign->ID ?>" data-micromodal-trigger="modal-<?=$campaign->ID ?>">View Details</button></p>
    <a class="wp-block-button__link has-red-background-color has-background block-offer-card__link" href="<?= $campaign_destination ?>"><img class="block-offer-card__link__icon" alt="" width="20" height="20" role="presentation" src="<?= get_template_directory_uri() .'/assets/icons/action/shopping_cart_black_24dp_rounded.svg'?>"/><span><?= $cta_text ?></span></a>
    <?= $campaign_terms; ?>
  </div>
</div>
