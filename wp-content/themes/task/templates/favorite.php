<?php
/*
 * Template Name: Favorite Template
 * */
get_header();
$favorite_title = get_field('favorite_title', 'options');
$favorite_description = get_field('favorite_description', 'options');

$not_long_in_title = get_field('not_long_in_title', 'options');
$not_long_in_description = get_field('not_long_in_description', 'options');

?>
<div class="favorites_page">
  <?php if (is_user_logged_in()) {
    $user_id = get_current_user_id();
    $favorites = get_user_meta($user_id, '', true);
    $args = array(
      'post_type' => 'tool',
      'posts_per_page' => -1,
      'meta_query' => array(
        array(
          'key' => 'favorites_users',
          'value' => $user_id,
          'compare' => 'LIKE'
        )
      )
    );
    $query = new WP_Query($args);
    $has_favorite = false;
    ?>
    <section class="tool_listing_block" data-section-class="tool_listing_block">
      <div class="container">
        <?php if ($query->have_posts()) { ?>
          <?php if ($favorite_title) { ?>
            <h1
              class="headline-2 block-title iv-st-from-bottom"><?= $favorite_title ?></h1>
          <?php }

          if ($favorite_description) { ?>
            <div class="headline-5 regular block-description iv-st-from-bottom">
              <?= $favorite_description ?>
            </div>
          <?php } ?>
          <div class="cards-wrapper  grid-cards">
            <?php while ($query->have_posts()) {
              $query->the_post();
              get_template_part("partials/tool-card", '', array('post_id' => get_the_ID()));
            } ?>
            <?php wp_reset_postdata();
            ?>
          </div>
        <?php } else { ?>
          <h3
            class="no-title"><?= __('No Favorite Tools Here', 'futurepdia_theme'); ?></h3>
        <?php } ?>
      </div>
    </section>

  <?php } else { ?>
    <div class="container">
      <div class="not-login-wrapper text-center">
        <?php if ($not_long_in_title) { ?>
          <h3 class="not-login"><?= $not_long_in_title ?></h3>
        <?php } ?>
        <?php if ($not_long_in_description) { ?>
          <div class="paragraph regular not-long-description ">
            <?= $not_long_in_description ?>
          </div>
        <?php } ?>
        <a class="cta-button cta-button-login active" href=""
<!--           onclick="document.getElementById('custom-modal')?.classList.add('modal-active')"-->
        >
          <?= __('Login', 'webofai_theme') ?>
        </a>

      </div>
    </div>
  <?php } ?>
</div>
<?php
get_footer();
?>


