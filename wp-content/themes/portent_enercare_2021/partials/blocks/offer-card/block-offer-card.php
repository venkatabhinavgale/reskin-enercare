<?php
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
  }
  
  //only display block if valid campaign found
  if (isset($campaign) && !empty($campaign)) {
    $campaign_heading = get_field('heading', $campaign->ID);
    $campaign_subheading = get_field('subheading', $campaign->ID);
    $campaign_icon = wp_get_attachment_image( get_field('icon', $campaign->ID), 'thumbnail', false, array( 'class' =>'block-offer-card__image', 'alt'=>'') );
    $campaign_expiration = get_field('end_date', $campaign->ID);
    $terms_and_conditions = get_field('terms_and_conditions', $campaign->ID);
    $campaign_terms = '';
    if ($terms_and_conditions && !empty($terms_and_conditions)) {
      $campaign_terms = '
        <div class="block-offer-card__terms">
          <button class="block-offer-card__terms-toggle" aria-controls="terms_' . $campaign->ID . '"><strong>Need more Details?</strong> Read the fine print</button>
          <div class="block-offer-card__terms-details" aria-expanded="false" data-state="closed" aria-labelledby="terms_' . $campaign->ID . '">' . $terms_and_conditions . '</div>
        </div>
      ';
    }
?>
  
  <?php if ($variation == "Masthead Offer Card") { ?>
  <div class="block-offer-card__wrapper__masthead" data-allow-multiple>
    <?php if ($campaign_subheading) { ?>
      <p><?php echo $campaign_subheading; ?></p>
    <?php } ?>
    <h3><?= $campaign_heading; ?></h3>
    <p>Offer expires <?= date('F d, Y', strtotime($campaign_expiration)); ?>
      <span class="block-offer-card__terms">
        <button class="block-offer-card__terms-toggle" aria-controls="terms_<?= $campaign->ID; ?>">View Details</button>
        <div class="block-offer-card__terms-details" aria-expanded="false" data-state="closed" aria-labelledby="terms_<?= $campaign->ID; ?>"><?= $terms_and_conditions; ?></div>
      </span>
    </p>
      
    <a href="<?= get_field('destination', $campaign->ID); ?>">
    <button>
      <span class="wp-block-button__link has-red-background-color has-background"><?= $cta_text ?></span>
    </button>
    </a>
  </div>
  <?php } elseif ($variation == "Full Width with Image") { ?>
  

  <?php } else { // "Offer Card" is default ?>
  <div class="block-offer-card__wrapper" data-allow-multiple>
    <a href="<?= get_field('destination', $campaign->ID); ?>">
    <button>
      <?= $campaign_icon; ?>
      <?php if ($campaign_subheading) { ?>
        <p><?php echo $campaign_subheading; ?></p>
      <?php } ?>
      <h3><?= $campaign_heading; ?></h3>
      <span class="wp-block-button__link has-red-background-color has-background"><?= $cta_text ?></span>
    </button>
    </a>
    <?= $campaign_terms; ?>
  </div>
  <?php } ?>

<?php } elseif (is_admin()) { ?>
  <p>*** <strong>No campaigns found for the defined criteria</strong>. This message will only show in the admin editor. ***</p>
<?php } //end campaign exists if ?>