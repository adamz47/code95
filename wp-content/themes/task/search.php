<?php
/*
 * Template Name: Search Page
 * */
get_header();
?>
  <section data-section-class="wp_search_block" class="wp_search_block">
    <div class="container">
      <div class="search-wrapper">
        <div class="left-section">
          <?php if (have_posts() && @$_GET['s'] != '') { ?>
            <h1 class="headline-1">
              <?php _e('your search for :', 'toc_theme'); ?>
              <p class="paragraph"><?php echo get_search_query(); ?></p>
            </h1>
          <?php } ?>
          <?php if (have_posts() && @$_GET['s'] != '') { ?>
            <div class="row row-cols-1 row-cols-md-3">
              <?php
              while (have_posts()) :
                the_post();
                get_template_part("partials/collection-card");
              endwhile;
              ?>
            </div>
          <?php } else {
            echo '<h2 class="headline-1 no-results">No result found try somthing else</h2>';
          } ?>
        </div>
      </div>
    </div>
  </section>
<?php
get_footer();
