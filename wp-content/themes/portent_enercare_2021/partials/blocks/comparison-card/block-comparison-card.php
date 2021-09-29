<?php
// Create class attribute allowing for custom "className" and "align" values.
$classes = '';
if( !empty($block['className']) ) {
	$classes .= sprintf( ' %s', $block['className'] );
}
if( !empty($block['align']) ) {
	$classes .= sprintf( ' align%s', $block['align'] );
}

if( !empty($block['backgroundColor'] ) ) {
	$classes .= sprintf(' has-%s-background-color', $block['backgroundColor']);
}
?>
<?php if (have_rows('comparison_cards')) { ?>
<div class="block-comparison-card__wrapper <?php echo esc_attr($classes); ?>">
<?php while ( have_rows('comparison_cards') ) { 
  the_row();
  $hash = hash('adler32', random_bytes(18));
  $toggle_open_text = get_sub_field('toggle_open_text'); 
  $toggle_close_text = get_sub_field('toggle_close_text'); ?>
  <div class="block-comparison-card">
    <div class="block-comparison-card__title"><?= get_sub_field('title'); ?></div>
    <div class="block-comparison-card__contents">
      <div class="block-comparison-card__contents-heading"><?= get_sub_field('heading'); ?></div>
      <div class="block-comparison-card__contents-subheading"><?= get_sub_field('subheading'); ?></div>
      <div class="block-comparison-card__contents-description"><?= get_sub_field('description'); ?></div>
      
      <?php if (have_rows('comparison_table')) { ?>
      <span style="color:red" class="block-comparison-card__contents-toggle" data-id="<?= $hash; ?>" aria-controls="comparison_card_<?= $hash; ?>" data-toggle-open="<?= $toggle_open_text; ?>" data-toggle-close="<?= $toggle_close_text; ?>">
        <img style="max-width:1em;display:inline" src="<?= get_template_directory_uri(); ?>/assets/icons/utility/navigate-down.svg" />
        <?= $toggle_open_text; ?>
      </span>
      <div class="block-comparison-card__contents-table comparison_card_<?= $hash; ?>" aria-expanded="false" data-state="closed" aria-labelledby="comparison_card_<?= $hash; ?>">
        <table>
        <?php while ( have_rows('comparison_table') ) { the_row(); ?>
          <tr>
            <td>
              <?= get_sub_field('comparison_name'); ?>
              <?php if (get_sub_field('comparison_subtext')) { ?>
              <span class="block-comparison-card__contents-table__subtext"><?= get_sub_field('comparison_subtext'); ?></span>
              <?php } ?>
            </td>
            <td>
            <?php
              $comparison_value = get_sub_field('comparison_value');
              if ($comparison_value == 'Checkmark')
                $comparison_value = '<img src="' . get_template_directory_uri() . '/assets/icons/action/done_black_24dp_rounded.svg" />';
              echo $comparison_value;
            ?>
            </td>
          </tr>
        <?php } ?>
        </table>
        <?php if (get_sub_field('cta_text')) { ?>
        <div class="block-comparison-card__contents-table__cta"><?= get_sub_field('cta_text'); ?></div>
        <?php } ?>
        <?php if (get_sub_field('cta_button')) { $cta_button = get_sub_field('cta_button'); ?>
        <div class="block-comparison-card__contents-table__cta-button">
          <a class="wp-block-button__link has-red-background-color has-background" href="<?= $cta_button['url'] ?>"><?= $cta_button['title'] ?></a>
        </div>
        <?php } ?>
      </div>
      <?php } ?>
      
    </div>
  </div>
<?php } ?>
</div>
<?php } ?>