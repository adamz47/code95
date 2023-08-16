<?php
get_header();
$post_id = get_the_ID();
$thumbnail_id = get_the_post_thumbnail($post_id);
$post_title = get_the_title($post_id);
$post_description = get_the_excerpt($post_id);

$categories = get_the_category($post_id);
$first_category = '';
$category_url = '';
if (!empty($categories)) {
  $first_category = $categories[0];
  $category_url = get_category_link($first_category->term_id);
  $first_category = $first_category->name;
}

if (have_posts()): the_post(); ?>

  <div class="single-post-wrapper">
    <div class="container">
      <div class="single-wrapper">
        <div class="cat-name"><?= $first_category ?></div>
        <picture class="aspect-ratio"><?= $thumbnail_id ?></picture>
        <h3 class="post-title"><?= $post_title ?></h3>
        <p class="post text-danger"><?= $post_description ?></p>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php
get_footer();
