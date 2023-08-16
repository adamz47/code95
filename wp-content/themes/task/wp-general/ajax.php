<?php

add_action('wp_ajax_more_posts', 'more_posts');
add_action('wp_ajax_nopriv_more_posts', 'more_posts');
function more_posts()
{

  if (!isset($_POST['_ajax_nonce']) || !wp_verify_nonce(sanitize_key($_POST['_ajax_nonce']), 'nonce_ajax_more_posts')) {
    return wp_send_json_error(esc_html__('Number not only once is invalid', 'webofai_theme'), 404);
  }


  $args = json_decode(stripcslashes(trim($_POST['args'], '"')), true);
  $template = $_POST['template'];

  $posts_query = new WP_Query($args);
  header('X-WP-arg-pages: ' . ($args['paged'] ?: 1));
  header('X-WP-Has-More-Pages: ' . ($posts_query->max_num_pages - ($args['paged'] ?: 1) > 0));
  header('X-WP-Total-Pages: ' . ($posts_query->max_num_pages));
//var_dump($args);
//return
  ob_start();
  while ($posts_query->have_posts()):$posts_query->the_post();
    get_template_part($template);
  endwhile;
  $posts_out = ob_get_clean();
  wp_reset_postdata();

  wp_send_json_success(array($posts_out,), 200);


}

add_action('wp_ajax_webofai_collection_ajax', 'webofai_collection_ajax');
add_action('wp_ajax_nopriv_webofai_collection_ajax', 'webofai_collection_ajax');
function webofai_collection_ajax()
{
  if (!isset($_POST['_ajax_nonce']) || !wp_verify_nonce(sanitize_key($_POST['_ajax_nonce']), 'nonce_ajax_more_posts')) {
    return wp_send_json_error(esc_html__('Number not only once is invalid', 'webofai_theme'), 404);
  }


  $args = json_decode(stripcslashes(trim($_POST['args'], '"')), true);
  $paged = $args['paged'];
  $template = $_POST['template'];

  $posts_query = new WP_Query($args);
  //    region pagination
  $left_pagination = '<svg   style="red" width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow-pagination">
    <path  d="M18.75 9C19.0664 9 19.3477 9.10547 19.5586 9.31641C20.0156 9.73828 20.0156 10.4766 19.5586 10.8984L14.7422 15.75L19.5586 20.5664C20.0156 20.9883 20.0156 21.7266 19.5586 22.1484C19.1367 22.6055 18.3984 22.6055 17.9766 22.1484L12.3516 16.5234C11.8945 16.1016 11.8945 15.3633 12.3516 14.9414L17.9766 9.31641C18.1875 9.10547 18.4688 9 18.75 9Z" fill="currentColor"/>
    <circle cx="16.5" cy="16.5" r="15.5" stroke="currentColor" stroke-width="2"/>
  </svg>';
  $right_pagination = '<svg  style="red" width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg" class="arrow-pagination">
    <path d="M14.25 23C13.9336 23 13.6523 22.8945 13.4414 22.6836C12.9844 22.2617 12.9844 21.5234 13.4414 21.1016L18.2578 16.25L13.4414 11.4336C12.9844 11.0117 12.9844 10.2734 13.4414 9.85156C13.8633 9.39453 14.6016 9.39453 15.0234 9.85156L20.6484 15.4766C21.1055 15.8984 21.1055 16.6367 20.6484 17.0586L15.0234 22.6836C14.8125 22.8945 14.5312 23 14.25 23Z" fill="currentColor"/>
    <circle cx="16.5" cy="16.5" r="15.5" stroke="currentColor" stroke-width="2"/>
</svg>';
  $big = 999999999;
  $pagination = paginate_links(array(
    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
    'format' => '/page/%#%',
    'current' => max(1, $paged),
    'prev_text' => $left_pagination,
    'next_text' => $right_pagination,
    'show_all' => false,
    'total' => $posts_query->max_num_pages
  ));

  //    endregion pagination

  header('X-WP-arg-pages: ' . ($args['paged'] ?: 1));
  header('X-WP-Has-More-Pages: ' . ($posts_query->max_num_pages - ($args['paged'] ?: 1) > 0));
  header('X-WP-Total-Pages: ' . ($posts_query->max_num_pages));

  $post_types = array('tool', 'post', 'news', 'prompts');
  $count = array_fill_keys($post_types, 0); // Initialize the counts
  foreach ($post_types as $post_type) {
    $final_args = json_decode(stripcslashes(trim($_POST['args'], '"')), true);
    $final_args['post_type'] = $post_type;
    $final_args['posts_per_page'] = -1;
    $posts = get_posts($final_args);
    $count[$post_type] = isset($final_args['s']) ? count($posts) : 0;
  }

  ob_start();
  while ($posts_query->have_posts()):$posts_query->the_post();
    get_template_part($template);
  endwhile;
  $posts_out = ob_get_clean();
  wp_reset_postdata();

  wp_send_json_success(array($posts_out, $count, $pagination), 200);


}

add_action('wp_ajax_update_post_favorite', 'update_post_favorite');
add_action('wp_ajax_nopriv_update_post_favorite', 'update_post_favorite');
function update_post_favorite()
{
  if (isset($_POST) && isset($_POST['action']) && isset($_POST['action']) == 'update_post_favorite' && isset($_POST['_ajax_nonce'])) {
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];

    if (!get_post_meta($post_id, 'favorites_users')) {
      add_post_meta($post_id, 'favorites_users', json_encode(array($user_id => $user_id)), true);
      echo json_encode(array(
        "favorites" => 1,
        "user_favorite_status" => true
      ));
    } else {
      $favorites_users = get_post_meta($post_id, 'favorites_users', true);
      $favorites_users = json_decode($favorites_users, true);
      $user_favorite_status = true;
      if (!isset($favorites_users[$user_id])) {
        $favorites_users[$user_id] = $user_id;
      } else {
        unset($favorites_users[$user_id]);
        $user_favorite_status = false;
      }

      update_post_meta($post_id, 'favorites_users', json_encode($favorites_users));

      echo json_encode(array(
        "favorites" => count($favorites_users),
        "user_favorite_status" => $user_favorite_status,
      ));
    }

  }
  exit;
}

function ajax_check_user_logged_in()
{
  if (isset($_POST) && isset($_POST['action']) && isset($_POST['action']) == 'is_user_logged_in' && isset($_POST['_ajax_nonce'])) {
    echo is_user_logged_in() ? 'yes' : 'no';
  }
  die();
}

add_action('wp_ajax_is_user_logged_in', 'ajax_check_user_logged_in');
add_action('wp_ajax_nopriv_is_user_logged_in', 'ajax_check_user_logged_in');
