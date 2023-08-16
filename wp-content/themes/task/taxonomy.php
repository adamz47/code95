<?php
/**
 * A Simple Taxonomy Template
 */
$tax = get_queried_object();
$taxonomy_name = $tax->taxonomy;
$tax_image = $tax->description;
get_header(); ?>
<section class="wp_collection_block" data-section-class="wp_collection_block">
  <div class="section-wrapper">
    <div class="cat-wrapper">
      <h3 class="cat-title">
        <?php if ($taxonomy_name === 'for-rent') { ?>
          Tööriistad
        <?php } else if ($taxonomy_name === 'for-sale') { ?>
          Ehitusmaterjalid
        <?php } else if ($taxonomy_name === 'general') { ?>
          Metallitöö
        <?php } ?>
      </h3>
      <?php
      $terms = get_terms($taxonomy_name, array('parent' => 0));

      if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $parent_term) {
          $parent_term_name = $parent_term->name;
          $parent_term_link = get_term_link($parent_term, $taxonomy_name);
          $has_child_terms = false;

          // Check if the parent term has subcategories.
          $child_terms = get_term_children($parent_term->term_id, $taxonomy_name);
          if (!empty($child_terms) && !is_wp_error($child_terms)) {
            $has_child_terms = true;
          }

          ?>
          <?php
          if ($has_child_terms) {
            ?>
            <div class="accordion-wrapper" itemscope itemprop="mainEntity"
                 itemtype="https://schema.org/Question">
              <div class="cat-svg-wrapper accordion-head">
                <svg class="accordion" width="20" height="20"
                     viewBox="0 0 14 10" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_8949_1323)">
                    <path
                      d="M13.8898 1.72795L13.667 1.50515C13.5195 1.35766 13.281 1.35766 13.1335 1.50515L7.00176 7.64002L0.866885 1.50515C0.719397 1.35766 0.480905 1.35766 0.333417 1.50515L0.110616 1.72795C-0.036872 1.87544 -0.036872 2.11393 0.110616 2.26142L6.73189 8.88583C6.87938 9.03332 7.11787 9.03332 7.26536 8.88583L13.8866 2.26142C14.0373 2.11393 14.0373 1.87544 13.8898 1.72795Z"
                      fill="black"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_8949_1323">
                      <rect width="14" height="8.16667" fill="white"
                            transform="matrix(-1 0 0 -1 14 9.0957)"/>
                    </clipPath>
                  </defs>
                </svg>
                <span
                  class="cat-name has-children">
                  <?= $parent_term_name ?>
                </span>
              </div>
              <div class="sub-wrapper accordion-body" itemscope
                   itemprop="acceptedAnswer"
                   itemtype="https://schema.org/Answer">
                <?php foreach ($child_terms as $child_term_id) {
                  $child_term = get_term_by('id', $child_term_id, $taxonomy_name);
                  $child_term_name = $child_term->name;
                  $child_term_link = get_term_link($child_term, $taxonomy_name);
                  ?>
                  <a href="<?= esc_url($child_term_link); ?>"
                     class="cat-name sub-category"><?= '- ' . $child_term_name ?></a>
                  <?php
                } ?>
              </div>
            </div>

          <?php } else {
            ?>
            <a href="<?= esc_url($parent_term_link); ?>" class="cat-name">
              <?= $parent_term_name ?>
            </a>
          <?php } ?>
          <?php

        }
      }
      ?>
    </div>
    <div class="post-wrapper">
      <div class="cat-title-img">
        <h2
          class="wp-collection-title headline-2"><?= single_term_title(); ?></h2>
          <?= $tax_image ?>
      </div>
      <?php
      $paged = (get_query_var('page_val') ? get_query_var('page_val') : 1);
      $args = array(
        'paged' => $paged,
        'posts_per_page' => -1,
        'order' => 'DESC',
        'orderby' => 'date',
        'post_status' => 'publish',
        'tax_query' => array(
          array(
            'taxonomy' => $tax->taxonomy,
            'field' => 'slug',
            'terms' => $tax->slug
          )
        )
      );
      $the_query = new WP_Query($args);
      $have_posts = $the_query->have_posts();
      ?>
      <?php if ($have_posts) {
        ?>
        <div class="wp-collection-cards grid-cards">
          <?php while ($the_query->have_posts()) {
            $the_query->the_post();
            get_template_part("partials/collection-card", '', array('post_id' => get_the_id()));
          }
          wp_reset_postdata(); ?>
        </div>
        <div
          class="no-posts headline-2 <?= $the_query->have_posts() ? ' ' : 'active' ?>">
          <?= __('No posts Here :(', 'webofai_theme') ?></div>
      <?php } else {
        ?>
        <h3
          class="wp-collection-no-posts headline-2 text-center"><?= __('No Posts For This Category', 'webofai_theme') ?></h3>
        <?php
      } ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
