<?php
// @author HAMED47
// Create id attribute allowing for custom "anchor" value.
$id = '';
$className = $dataClass = 'local_world_block';
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
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/local_world_block/screenshot.png" >';

    return;
  endif;
}
/****************************
 *     Custom ACF Meta      *
 ****************************/
$news = get_field('news');
?>
<!-- region webofai_theme's Block -->
<?php general_settings_for_blocks($id, $className, $dataClass); ?>
<div class="container">
  <div class="posts-wrapper">
    <?php $index = 1; ?>
    <?php $in_second_layout = false; ?>
    <!-- Flag to track if in second layout -->
    <?php foreach ($news as $new) {
      $post_id = $new->ID;
      $post_image = get_the_post_thumbnail($post_id);
      $post_title = get_the_title($post_id);
      $post_tag = get_the_tags($post_id);

      if ($index === 1) { ?>
        <div class="wide-card">
          <picture class=""><?= $post_image ?></picture>
          <div class="text-wrapper">
            <?php if ($post_tag && isset($post_tag[0]->name)) { ?>
              <span
                class="fs-4 text-light <?= $post_tag[0]->name === 'world' ? 'world-tag' : '' ?>"><?= $post_tag[0]->name ?></span>
            <?php } ?>
            <h3 class="fs-1 text-light"><?= $post_title ?></h3>
          </div>
        </div>
      <?php } elseif ($index === 2 || $index === 3) {
        if (!$in_second_layout) {
          $in_second_layout = true; // Set flag to true
          // The following line opens the second layout container
          ?>
          <div class="second-layout">
          <?php
        }
        ?>
        <div class="small-card">
          <div class="inner-post">
            <picture class=""><?= $post_image ?></picture>
            <div class="text-wrapper">
              <?php if ($post_tag && isset($post_tag[0]->name)) { ?>
                <span
                  class="fs-4 text-light <?= $post_tag[0]->name === 'world' ? 'world-tag' : '' ?>"><?= $post_tag[0]->name ?></span>
              <?php } ?>
              <h3 class="fs-3 text-light"><?= $post_title ?></h3>
            </div>
          </div>
        </div>

        <?php
      } elseif ($index > 3) { ?>
        </div>

        <?php
      }
      $index++;
    } ?>
  </div>

</div>
</section>


<!-- endregion webofai_theme's Block -->
