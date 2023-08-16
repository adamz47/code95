<?php
// @author HAMED47
// Create id attribute allowing for custom "anchor" value.
$id = '';
$className = $dataClass = 'features_block';
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
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/features_block/screenshot.png" >';

    return;
  endif;
}
/****************************
 *     Custom ACF Meta      *
 ****************************/
$egypt_news = get_field('features_posts');
$cat = get_the_category($egypt_news[0]->ID);
$cat_name_news = $cat[0]->name;

$top_stories = get_field('top_stories');
$cat = get_the_category($top_stories[0]->ID);
$cat_name_top = $cat[0]->name;

?>
<!-- region webofai_theme's Block -->
<?php general_settings_for_blocks($id, $className, $dataClass); ?>
<div class="container">
  <div class="features-top-wrapper row justify-content-between">
    <div class="feature-wrapper">
      <?php if ($cat_name_news) { ?>
        <h2 class="fs-1 mb-4"><?= $cat_name_news ?></h2>
      <?php } ?>
      <div class="d-flex justify-content-between feature-posts">
        <?php foreach ($egypt_news as $card) {
          $post_id = $card->ID;
          $post_image = get_the_post_thumbnail($post_id);
          $post_title = get_the_title($post_id);
          ?>
          <div class="posts-wrapper">
            <picture>
              <?= $post_image ?>
            </picture>
            <h4 class="post-title fs-1 text-light"><?= $post_title ?></h4>
          </div>
          <?php
        } ?>
      </div>
    </div>
    <div class="top-stories">
      <?php if ($cat_name_top) { ?>
        <h2 class="fs-1 mb-4"><?= $cat_name_top ?></h2>
      <?php } ?>
      <ul class="stories-posts">
        <?php $index = 1; ?>
        <?php foreach ($top_stories as $card) {
          $post_id = $card->ID;
          $post_title = get_the_title($post_id);
          ?>
        <div class="index-post">
          <span class="fs-3 index text-light"><?= $index?></span>
          <li class="post-title fs-2 text-dark"><?= $post_title ?></li>
        </div>
          <?php
          $index++;
        } ?>
      </ul>
    </div>
  </div>
</div>
</section>


<!-- endregion webofai_theme's Block -->
