<?php
// @author HAMED47
// Create id attribute allowing for custom "anchor" value.
$id = '';
$className = $dataClass = 'hero_block';
if (isset($block)) {
  $id = $block['id'];
  if (!empty($block['anchor'])) {
    $id = $block['anchor'];
  }

// Create class attribute allowing for custom "className" and "align" values.
  if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
  }
  if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
  }
  if (get_field('is_screenshot')) :
    /* Render screenshot for example */
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/hero_block/screenshot.png" >';

    return;
  endif;
}
/****************************
 *     Custom ACF Meta      *
 ****************************/
$title = get_field('title');
$description = get_field('description');
$right_image_id = get_field('right_image');
$right_image = \Theme\Helpers::get_image($right_image_id, 'medium-xlarge');
?>
<!-- region webofai_theme's Block -->
<?php general_settings_for_blocks($id, $className, $dataClass); ?>
<!--<div class="container">-->
<div class="hero-wrapper">
  <div class="bg-med"><?= $right_image?></div>
  <div class="left-section">
    <?php if ($title) { ?>
      <h3 class="hero-title"><?= $title ?></h3>
    <?php } ?>
    <?php if ($description) { ?>
      <div class="hero-description"><?= $description ?></div>
    <?php } ?>
    <?php
    if (have_rows('buttons')) { ?>
      <div class="buttons-wrapper">

        <?php while (have_rows('buttons')) {
          the_row();
          $cta_button = get_sub_field('cta_button');
          $cta_button_url = \Theme\Helpers::get_key_from_array('url', $cta_button);
          $cta_button_title = \Theme\Helpers::get_key_from_array('title', $cta_button);
          ?>
          <a class="cta-button"
             href="<?= $cta_button_url ?>"><?= $cta_button_title ?></a>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
  <div class="right-section">
    <?php if ($right_image_id) { ?>
      <picture>
        <?= $right_image ?>
      </picture>
    <?php } ?>
  </div>

  <div class="information-section">
    <?php
    if (have_rows('information_text')) { ?>

      <?php while (have_rows('information_text')) {
        the_row();
        $logo_id = get_sub_field('logo');
        $logo = \Theme\Helpers::get_image($logo_id, 'medium-xlarge');
        $number = get_sub_field('number');
        $text = get_sub_field('text');
        ?>
        <div class="information-wrapper">

          <?php if ($logo_id) { ?>
            <?= $logo ?>
          <?php } ?>
          <?php if ($number) { ?>
            <h4 class="info-number"><?= $number . '+' ?></h4>
          <?php } ?>
          <?php if ($text) { ?>
            <h4 class="info-text"><?= $text ?></h4>
          <?php } ?>
        </div>
      <?php } ?>

    <?php } ?>
  </div>
  <!--  </div>-->
</div>
</section>


<!-- endregion webofai_theme's Block -->
