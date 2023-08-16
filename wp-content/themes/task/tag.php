<?php
/**
 * A Simple Category Template
 */
$tags = get_queried_object();
get_header();
$paged = (get_query_var('page_val') ? get_query_var('page_val') : 1);
?>
<section class="wp_collection_block"
         data-section-class="wp_collection_block">
  <div class="container">
    <h2 class="wp-collection-title headline-2"><?= single_tag_title(); ?></h2>
    <?php if ( tag_description() ) { ?>
      <div class="wp-collection-description paragraph"><?= tag_description() ?></div>
    <?php } ?>
    <?php
    $paged = ( get_query_var( 'page_val' ) ? get_query_var( 'page_val' ) : 1 );
    $args  = array(
      'paged'          => $paged,
      'tag'            => $tags->slug,
      'posts_per_page' => 6,
      'order'          => 'DESC',
      'orderby'        => 'date',
      'post_status'    => 'publish'
    );

    $the_query  = new WP_Query( $args );
    $have_posts = $the_query->have_posts();
    ?>
    <?php if ( $have_posts ) {
      ?>
      <div class="wp-collection-cards grid-cards"  posts-container>
        <?php while ( $the_query->have_posts() ) {
          $the_query->the_post();
          get_template_part( "partials/post-card", '', array( 'post_id' => get_the_id() ) );
        }
        /* Restore original Post Data */
        wp_reset_postdata(); ?>
      </div>
      <div
        class="no-posts headline-2 <?= $the_query->have_posts() ? ' ' : 'active' ?>">
        <?= __('No posts Here :(', 'webofai_theme') ?></div>
      <div
        class="load-more-wrapper <?= $the_query->max_num_pages <= 1 ? 'hidden' : '' ?>"
        data-args='<?= json_encode($args) ?>'
        data-template="partials/post-card">
        <button aria-label="Load More Posts "
                class=" theme-cta-button load-more-btn">
        </button>
        <div class="loader">
          <div class="loader-ball"></div>
          <div class="loader-ball"></div>
          <div class="loader-ball"></div>
        </div>
      </div>
    <?php } else {

      ?>
      <h3 class="wp-collection-no-posts headline-2 text-center"><?= __('No Posts For This Tag','webofai_theme') ?></h3>

      <?php
    } ?>
  </div>
</section>
<?php get_footer(); ?>
