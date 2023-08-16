<?php
$post_id = @$args['post_id'] ?: get_the_ID();
$post_title = get_the_title($post_id);
$post_permalink = get_the_permalink($post_id);
$post_cat = get_the_category($post_id);
$post_image = get_the_post_thumbnail($post_id);
$dimensions = get_field('dimensions', $post_id);
?>
<div id="post-id-<?= $post_id ?>" class="post-card">

  <div class="card-content ">
    <h4 aria-label='post title link'
       class='post-title headline-4 '>
      <?= $post_title ?>
    </h4>
    <?php if ($dimensions) { ?>
      <div class="dimensions"><?= $dimensions ?></div>
    <?php } ?>
  </div>
  <?php if ($post_image) { ?>
    <a href="<?= $post_permalink ?>" aria-label="post featured image link"
       class="post-image aspect-ratio has-border has_tag ">

      <?= $post_image ?>

    </a>
  <?php } ?>
</div>
