<?php
// Template for default campaign card.
?>
<div class="block-offer-card__wrapper" data-allow-multiple>
    <div class="block-offer-card__container">
      <a href="<?= $campaign_destination ?>">
      <button>
        <?php if ($campaign_subheading) { ?>
          <p class="block-offer-card__subheading"><?php echo $campaign_subheading; ?></p>
        <?php } ?>
        <h3><?= $campaign_heading; ?></h3>
        <p class="block-offer-card__offer-expiration">Offer expires <?= date('F d, Y', strtotime($campaign_expiration)); ?></p>
        <span class="wp-block-button__link has-red-background-color has-background"><?= $cta_text ?></span>
      </button>
      </a>
      <?= $campaign_terms; ?>
    </div>
    <?= $campaign_image; ?>
  </div>
