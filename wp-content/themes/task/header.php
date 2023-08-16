<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">

  <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta content="ie=edge" http-equiv="X-UA-Compatible">
  <!-- fix container-->
  <style>
    html {
      --design-width: 1440;
      --tablet-width: 992;
      --mobile-width: 600;
      --sMobile-width: 375;
      font-size: calc((100vw / var(--sMobile-width)) * 10) !important;
      width: 100vw;
      overflow-x: hidden;
      scrollbar-color: rgb(90, 90, 90) rgba(0, 0, 0, 0.2);
      scrollbar-width: thin;
    }

    html.modal-opened {
      overflow: hidden;
    }

    @media screen and (min-width: 375px) {
      html {
        font-size: 10px !important;
      }
    }

    @media screen and (min-width: 600px) {
      html {
        font-size: calc((100vw / var(--tablet-width)) * 10) !important;
      }
    }

    @media screen and (min-width: 992px) {
      html {
        font-size: calc((100vw / var(--design-width)) * 10) !important;
      }
    }

    @media screen and (min-width: 1440px) {
      html {
        font-size: 10px !important;
      }
    }


    @supports (-moz-appearance:none) {
      @media screen and (min-width: 992px) {
        html {
          width: calc(100vw - 8px);
        }
      }
    }

    /* latin */
    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

    /* latin */
    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 500;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

    /* latin */
    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 600;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }

    /* latin */
    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: url(https://fonts.gstatic.com/s/inter/v12/UcC73FwrK3iLTeHuS_fvQtMwCp50KnMa1ZL7.woff2) format('woff2');
      unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
    }
  </style>
  <!-- Third party code ACF-->
  <?php

  $code_in_head_tag = get_field('code_in_head_tag', 'options');
  $code_before_body_tag_after_head_tag = get_field('code_before_body_tag_after_head_tag', 'options');
  $code_after_body_tag = get_field('code_after_body_tag', 'options');
  ?>
  <?php wp_head(); ?>
  <?= $code_in_head_tag ?>
</head>
<?php flush(); ?>
<?= $code_before_body_tag_after_head_tag ?>
<!--preloader style-->
<style>


  /*body main.theme-wp-site-blocks {*/
  /*  opacity: 0;*/
  /*  transition: opacity 0.5s;*/
  /*}*/

  /*body:not(.loaded) * {*/
  /*  transition: none !important;*/
  /*}*/

  body.loaded main.theme-wp-site-blocks {
    opacity: 1;

  }

  [modal-content] {
    display: none !important;
  }
</style>
<!--end preloader style-->
<!-- ACF Fields -->
<?php
// get page name

?>
<!-- END ACF -->
<body <?php body_class(); ?>>
<!-- remove header if page template if full with no header and footer-->
<?php if (!is_page_template('templates/full-width-no-header-footer.php')): ?>
  <header class="techne-header">
    <div class="container">
      <div class="header-wrapper">
        <?php
        if (have_rows('menu_link', 'options')) { ?>
          <ul class="list-wrapper lg-view">
            <?php while (have_rows('menu_link', 'options')) {
              the_row();
              $menu_item = get_sub_field('menu_item');
              $menu_item_url = \Theme\Helpers::get_key_from_array('url', $menu_item);
              $menu_item_title = \Theme\Helpers::get_key_from_array('title', $menu_item);
              ?>
              <li class="list-item">
                <a href="<?= $menu_item_url ?>"
                   target="_self"><?= $menu_item_title ?></a>

              </li>
            <?php } ?>
          </ul>
          <div class="medium-view">
            <ul class="list-wrapper">
              <?php while (have_rows('menu_link', 'options')) {
                the_row();
                $menu_item = get_sub_field('menu_item');
                $menu_item_url = \Theme\Helpers::get_key_from_array('url', $menu_item);
                $menu_item_title = \Theme\Helpers::get_key_from_array('title', $menu_item);
                ?>
                <li class="list-item">
                  <a href="<?= $menu_item_url ?>"
                     target="_self"><?= $menu_item_title ?></a>
                </li>
              <?php } ?>
            </ul>
          </div>
        <?php } ?>
        <button aria-label="Open Menu Links"
                class="burger-menu hide-only-lg burger-intro">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <div class="search-large">
          <?php get_search_form(array('header_search_icon' => true, 'placeholder' => "Search")); ?>
        </div>
        <div class="search-small">
          <?php get_search_form(array('header_search_icon' => true, 'placeholder' => "Search")); ?>
        </div>
      </div>

  </header>
<?php endif; ?>
<main id="main-content" class="theme-wp-site-blocks">
