<?php
//template part of Masthead Campaign
?>

<div class="block-offer-card__wrapper__masthead" data-allow-multiple>
    <?php if ($campaign_subheading) { ?>
      <p class="block-offer-card__subheading"><?php echo $campaign_subheading; ?></p>
    <?php } ?>
    <h3><?= $campaign_heading; ?></h3>
	  <?php if ($campaign_expiration && $campaign_expiration != "") { ?><p class="block-offer-card__offer-expiration">Offer expires <?= date('F d, Y', strtotime($campaign_expiration)); ?>.<?php } ?><button class="block-offer-card__terms-toggle" aria-controls="terms_<?= $campaign->ID ?>" data-micromodal-trigger="modal-<?=$campaign->ID ?>" aria-label="Open modal and view details and fine print for <?= $campaign_heading ?>">View Terms and Conditions</button></p>
	  <a class="wp-block-button__link has-red-background-color has-background block-offer-card__link" href="<?= $campaign_destination ?>" aria-label="Get deal for <?= $campaign_heading; ?>"><img class="block-offer-card__link__icon" alt="" width="20" height="20" role="presentation" src="<?= $cta_icon ?>"/><span><?= $cta_text ?></span></a>
	  <?= $campaign_terms; ?>
  </div>
