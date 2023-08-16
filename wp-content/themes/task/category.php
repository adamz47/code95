<?php
///**
// * A Simple Category Template
// */
//$category = get_queried_object();
//
//get_header(); ?>
<!--<section class="wp_collection_block" data-section-class="wp_collection_block">-->
<!--  <div class="section-wrapper">-->
<!--    <div class="cat-wrapper">-->
<!--      <h3 class="cat-title">categories</h3>-->
<!---->
<!--      --><?php
//
//      $args = array('orderby' => 'name', 'parent' => 0);
//      $categories = get_categories( $args );
//
//      foreach ($categories as $cat) {
//
//        ?>
<!--        <a class="cat-name" href="--><?php //= site_url() . '/category' .'/'. $cat->slug?><!--">--><?php //=$cat->cat_name?><!--</a>-->
<!---->
<!--        --><?php //$args2 = array('orderby' => 'name', 'parent' => $cat->cat_ID);
//        $subcategories = get_categories( $args2 );?>
<!---->
<!--        <div class="sub-cats">-->
<!---->
<!--        --><?php //foreach ($subcategories as $subcategory) {?>
<!--          <a class="inner-sub-cat" href="--><?php //= site_url() . '/category' .'/'. $subcategory->slug?><!--">--><?php //= '- ' . $subcategory->cat_name?><!--</a>-->
<!--        --><?php //}?>
<!--        </div>-->
<!---->
<!--      --><?php //} ?>
<!--    </div>-->
<!--    <div class="post-wrapper">-->
<!--      <h2 class="wp-collection-title headline-2">--><?php //= single_cat_title(); ?><!--</h2>-->
<!---->
<!--      --><?php
//      $paged = (get_query_var('page_val') ? get_query_var('page_val') : 1);
//      $args = array(
//        'paged' => $paged,
//        'category_name' => $category->slug,
//        'posts_per_page' => 2,
//        'order' => 'DESC',
//        'orderby' => 'date',
//        'post_status' => 'publish'
//      );
//      $the_query = new WP_Query($args);
//      $have_posts = $the_query->have_posts();
//      ?>
<!--      --><?php //if ($have_posts) {
//        ?>
<!--        <div class="wp-collection-cards grid-cards" posts-container>-->
<!--          --><?php //while ($the_query->have_posts()) {
//            $the_query->the_post();
//            get_template_part("partials/collection-card", '', array('post_id' => get_the_id()));
//          }
//          wp_reset_postdata(); ?>
<!--        </div>-->
<!--        <div-->
<!--          class="no-posts headline-2 --><?php //= $the_query->have_posts() ? ' ' : 'active' ?><!--">-->
<!--          --><?php //= __('No posts Here :(', 'webofai_theme') ?><!--</div>-->
<!--<!--        <div-->-->
<!--<!--          class="load-more-wrapper -->--><?php ////= $the_query->max_num_pages <= 1 ? 'hidden' : '' ?><!--<!--"-->-->
<!--<!--          data-args='-->--><?php ////= json_encode($args) ?><!--<!--'-->-->
<!--<!--          data-template="partials/post-card">-->-->
<!--<!--          <button aria-label="Load More Posts "-->-->
<!--<!--                  class="cta-button  load-more-btn">-->--><?php ////= __('Load More', 'webofai_theme') ?>
<!--<!--          </button>-->-->
<!--<!--          <div class="loader">-->-->
<!--<!--            <div class="loader-ball"></div>-->-->
<!--<!--            <div class="loader-ball"></div>-->-->
<!--<!--            <div class="loader-ball"></div>-->-->
<!--<!--          </div>-->-->
<!--<!--        </div>-->-->
<!--      --><?php //} else {
//        ?>
<!--        <h3-->
<!--          class="wp-collection-no-posts headline-2 text-center">--><?php //= __('No Posts For This Category', 'webofai_theme') ?><!--</h3>-->
<!--        --><?php
//      } ?>
<!--    </div>-->
<!--    <div class="form-wrapper">-->
<!--      <h3>price request</h3>-->
<!--      <a class="phone-number" href="tel:123-456-7890p123">-->
<!--        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px"-->
<!--             height="50px">-->
<!--          <path-->
<!--            d="M 14 3.9902344 C 8.4886661 3.9902344 4 8.4789008 4 13.990234 L 4 35.990234 C 4 41.501568 8.4886661 45.990234 14 45.990234 L 36 45.990234 C 41.511334 45.990234 46 41.501568 46 35.990234 L 46 13.990234 C 46 8.4789008 41.511334 3.9902344 36 3.9902344 L 14 3.9902344 z M 18.005859 12.033203 C 18.633859 12.060203 19.210594 12.414031 19.558594 12.957031 C 19.954594 13.575031 20.569141 14.534156 21.369141 15.785156 C 22.099141 16.926156 22.150047 18.399844 21.498047 19.589844 L 20.033203 21.673828 C 19.637203 22.237828 19.558219 22.959703 19.824219 23.595703 C 20.238219 24.585703 21.040797 26.107203 22.466797 27.533203 C 23.892797 28.959203 25.414297 29.761781 26.404297 30.175781 C 27.040297 30.441781 27.762172 30.362797 28.326172 29.966797 L 30.410156 28.501953 C 31.600156 27.849953 33.073844 27.901859 34.214844 28.630859 C 35.465844 29.430859 36.424969 30.045406 37.042969 30.441406 C 37.585969 30.789406 37.939797 31.366141 37.966797 31.994141 C 38.120797 35.558141 35.359641 37.001953 34.556641 37.001953 C 34.000641 37.001953 27.316344 37.761656 19.777344 30.222656 C 12.238344 22.683656 12.998047 15.999359 12.998047 15.443359 C 12.998047 14.640359 14.441859 11.879203 18.005859 12.033203 z"/>-->
<!--        </svg>-->
<!--        123-456-7890p123</a>-->
<!--      --><?php //= do_shortcode('[gravityform id="1"]') ?>
<!--    </div>-->
<!--  </div>-->
<!--</section>-->
<!---->
<!---->
<?php //get_footer(); ?>
