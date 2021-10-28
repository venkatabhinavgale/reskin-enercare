<?php
$classes = 'block-offer-card';

if( !empty($block['className']) ) {
	$classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
	$classes .= sprintf( ' align%s', $block['align'] );
}

if( !empty($block['backgroundColor'] ) ) {
	$classes .= sprintf(' has-%s-background-color', $block['backgroundColor']);
}

$variation = get_field('variation');
$block_style = get_field('block_style');
$campaign_categories = get_field('campaign_categories');

$and_or = get_field('and_or');
$tax_relation = "AND";
if (!$and_or)
  $tax_relation = "OR";

$unique = get_field('unique');
$override = get_field('override');
$campaign = get_field('campaign');
$cta_image = get_field('cta_image');
$cta_text = get_field('cta_text') ? get_field('cta_text') : __( 'Shop Plans', 'portent-enercare');

$tax_query = array();
$tax_query['relation'] = $tax_relation;
if ($campaign_categories && sizeof($campaign_categories) > 0) {
  foreach($campaign_categories as $cc) {
    $tax_query[] = array(
      'taxonomy'  => 'campaign-category',
      'field'     => 'id',
      'terms'     => $cc
    );
  }
}

if (!$override) {
  $today = date("Ymd");
  $args = array(
    'post_type'     => 'campaign',
    'post_status'   => 'publish',
    'numberposts'   => 1,
    'meta_query'    => array(
      array(
        'relation' => 'AND',
        'start_date' => array(
          'key'       => 'start_date',
          'value'     => $today,
          'compare'   => '<='
        ),
        'end_date' => array(
          'key'       => 'end_date',
          'value'     => $today,
          'compare'   => '>='
        ),
      ),
      array(
        'priority' => array(
          'key'       => 'priority',
          'compare'   => 'EXISTS',
        ),
      )
    ),
    'tax_query'     => $tax_query,
    'orderby' => array(
      'priority'       => 'DESC',
      'start_date'     => 'ASC',
    )
  );
  /*
  $query = new WP_Query($args);
  echo $query->request; exit;
  */

  $campaigns = get_posts($args);
  if (isset($campaigns) && !empty($campaigns)) {
    $campaign = $campaigns[0];
  }
} elseif (isset($campaign) && !empty($campaign)) {
  $campaign = $campaign[0];
}

//only display block if valid campaign found
if (isset($campaign) && !empty($campaign)) {
  $campaign_heading = get_field('heading', $campaign->ID);
  $campaign_subheading = get_field('subheading', $campaign->ID);
  $campaign_image = wp_get_attachment_image( get_field('icon', $campaign->ID), '3-2', false, array( 'class' =>'block-offer-card__image', 'alt'=>'') );
  $campaign_expiration = get_field('end_date', $campaign->ID);
  $campaign_destination = get_field('destination', $campaign->ID);
  // if defined, we're overriding the offer destination URL
  if (get_field('cta_url_override')) {
    $campaign_destination = get_field('cta_url_override');
  }
	require get_template_directory() . '/partials/campaign-terms-conditions.php';
?>

  <?php if ($variation == "Masthead Offer Card") { ?>
  <div class="block-offer-card__wrapper__masthead" data-allow-multiple>
    <?php if ($campaign_subheading) { ?>
      <p class="block-offer-card__subheading"><?php echo $campaign_subheading; ?></p>
    <?php } ?>
    <h3><?= $campaign_heading; ?></h3>
    <p class="block-offer-card__offer-expiration"><?php if ($campaign_expiration && $campaign_expiration != "") { ?>Offer expires <?= date('F d, Y', strtotime($campaign_expiration)); ?><?php } ?>
      <span class="block-offer-card__terms">
        <button class="block-offer-card__terms-toggle" aria-controls="terms_<?= $campaign->ID; ?>">View Details</button>
        <div class="block-offer-card__terms-details" data-modal="trigger" data-modal-id="" aria-expanded="false" data-state="closed" aria-labelledby="terms_<?= $campaign->ID; ?>">
          <div class="modal__container" aria-hidden="true" data-modal="view" data-modal-id="">
            <div class="modal__header">
              <h2 class="modal__heading"><?= $campaign_heading ?> terms and conditions</h2>
              <button class="block-offer-card__terms-details__close" data-action="close">Close</button>
            </div>
              <div class="modal__body block-offer-card__terms-details__content">
              <?= $terms_and_conditions; ?>
              </div>
          </div>
        </div>
      </span>
    </p>

    <a href="<?= $campaign_destination; ?>">
    <button>
      <span class="wp-block-button__link has-red-background-color has-background"><?= $cta_text ?></span>
    </button>
    </a>
  </div>
  <?php } elseif ($variation == "Full Width with Image") { ?>
    <div class="block-offer-card__wrapper__full-width" data-allow-multiple>
      <div class="block-offer-card__container <?= $background_color_setting ?>">
        <a href="<?= $campaign_destination; ?>">
        <button>
          <?php if ($campaign_subheading) { ?>
            <p class="block-offer-card__subheading"><?php echo $campaign_subheading; ?></p>
          <?php } ?>
          <h3><?= $campaign_heading; ?></h3>
          <?php if ($campaign_expiration && $campaign_expiration != "") { ?><p class="block-offer-card__offer-expiration">Offer expires <?= date('F d, Y', strtotime($campaign_expiration)); ?></p><?php } ?>
          <span class="wp-block-button__link has-red-background-color has-background block-offer-card__link"><img class="block-offer-card__link__icon" alt="" role="presentation" src="<?= get_template_directory_uri() .'/assets/icons/action/shopping_cart_black_24dp_rounded.svg'?>"/><?= $cta_text ?></span>
        </button>
        </a>
        <?= $campaign_terms; ?>
    </div>
    <?= $campaign_image; ?>
  </div>

  <?php } else { // "Offer Card" is default @todo refactor to this to be cleaner ?>
  	<?php require get_template_directory() . '/partials/campaign-default.php'; ?>
  <?php } ?>

<?php } elseif (is_admin()) { ?>
  <p>*** <strong>No campaigns found for the defined criteria</strong>. This message will only show in the admin editor. ***</p>
<?php } //end campaign exists if ?>
