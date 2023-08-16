<?php
// @author HAMED47
// Create id attribute allowing for custom "anchor" value.
$id = '';
$className = $dataClass = 'egypt_news_block';
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
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/egypt_news_block/screenshot.png" >';

    return;
  endif;
}
/****************************
 *     Custom ACF Meta      *
 ****************************/
$egypt_news = get_field('egypt_news');
$cat = get_the_category($egypt_news[0]->ID);
$cat_name = $cat[0]->name;
?>
<!-- region webofai_theme's Block -->
<?php general_settings_for_blocks($id, $className, $dataClass); ?>
<div class="container">
  <?php if ($cat_name) { ?>
    <h2 class="fs-1 mb-4"><?= $cat_name ?></h2>
  <?php } ?>
  <div class=" mySwiper">
    <div class="swiper-wrapper">

      <?php foreach ($egypt_news as $card) {
        $post_id = $card->ID;
        $post_image = get_the_post_thumbnail($post_id);
        $post_title = get_the_title($post_id);
        ?>
        <div class="swiper-slide">
          <picture>
            <?= $post_image ?>
          </picture>
          <h4 class="post-title fs-1 text-light"><?= $post_title ?></h4>
        </div>
        <?php
      } ?>

    </div>

  </div>
  <div class="swiper-button-prev fs-1 text-light">
    <svg width="47" height="47" viewBox="0 0 47 47" fill="none"
         xmlns="http://www.w3.org/2000/svg">
      <path
        d="M19.8232 23.8232C19.7256 23.9209 19.7256 24.0791 19.8232 24.1768L21.4142 25.7678C21.5118 25.8654 21.6701 25.8654 21.7678 25.7678C21.8654 25.6701 21.8654 25.5118 21.7678 25.4142L20.3536 24L21.7678 22.5858C21.8654 22.4882 21.8654 22.3299 21.7678 22.2322C21.6701 22.1346 21.5118 22.1346 21.4142 22.2322L19.8232 23.8232ZM28 23.75L20 23.75L20 24.25L28 24.25L28 23.75Z"
        fill="#000835"/>
      <circle cx="23.5" cy="23.5" r="22.5" transform="rotate(-180 23.5 23.5)"
              stroke="#ffffff" stroke-width="0.25"/>
    </svg>
  </div>
  <div class="swiper-button-next fs-1 text-light">
    <svg width="47" height="47" viewBox="0 0 47 47" fill="none"
         xmlns="http://www.w3.org/2000/svg">
      <path
        d="M19.8232 23.8232C19.7256 23.9209 19.7256 24.0791 19.8232 24.1768L21.4142 25.7678C21.5118 25.8654 21.6701 25.8654 21.7678 25.7678C21.8654 25.6701 21.8654 25.5118 21.7678 25.4142L20.3536 24L21.7678 22.5858C21.8654 22.4882 21.8654 22.3299 21.7678 22.2322C21.6701 22.1346 21.5118 22.1346 21.4142 22.2322L19.8232 23.8232ZM28 23.75L20 23.75L20 24.25L28 24.25L28 23.75Z"
        fill="#000835"/>
      <circle cx="23.5" cy="23.5" r="22.5" transform="rotate(-180 23.5 23.5)"
              stroke="#ffffff" stroke-width="0.25"/>
    </svg>
  </div>
</div>
</section>


<!-- endregion webofai_theme's Block -->
