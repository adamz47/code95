<?php
$show_text = \Theme\Helpers::get_key_from_array('show_text', $args ?? array());
$placeholder = \Theme\Helpers::get_key_from_array('placeholder', $args ?? array()) ?: 'Search';
$header_search_icon = \Theme\Helpers::get_key_from_array('header_search_icon', $args ?? array());
?>
<form role="search" method="get"
      class="search-form <?= $show_text ? 'has-button-text' : '' ?>"
      action="<?php echo esc_url(home_url('/')); ?>">
  <label>
    <span
      class="screen-reader-text"><?php echo _x('Search for:', 'label', 'techne'); ?></span>
    <?php if ($header_search_icon) { ?>
      <span class="search-icon">
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
           xmlns="http://www.w3.org/2000/svg">
<path
  d="M14 14L11.1 11.1M12.6667 7.33333C12.6667 10.2789 10.2789 12.6667 7.33333 12.6667C4.38781 12.6667 2 10.2789 2 7.33333C2 4.38781 4.38781 2 7.33333 2C10.2789 2 12.6667 4.38781 12.6667 7.33333Z"
  stroke="#8690A2" stroke-width="1.5" stroke-linecap="round"
  stroke-linejoin="round"/>
   </svg>
    </span>
    <?php } ?>
    <input type="search" class="search-field" placeholder="<?= $placeholder ?>"
           value="<?php echo get_search_query(); ?>" name="s"/>
  </label>
  <?php if ($show_text) { ?>
    <button type="submit"
            class="search-submit <?= $show_text ? 'cta-button' : '' ?>"
            aria-label="search button">
      <?= $show_text ? __('Search', '') : '' ?>
      <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path
          d="M15.2583 14.075L12.425 11.25C13.3392 10.0854 13.8352 8.64722 13.8333 7.16667C13.8333 5.84813 13.4423 4.5592 12.7098 3.46287C11.9773 2.36654 10.9361 1.51206 9.71789 1.00747C8.49972 0.502889 7.15927 0.370866 5.86607 0.628101C4.57286 0.885336 3.38497 1.52027 2.45262 2.45262C1.52027 3.38497 0.885336 4.57286 0.628101 5.86607C0.370866 7.15927 0.502889 8.49972 1.00747 9.71789C1.51206 10.9361 2.36654 11.9773 3.46287 12.7098C4.5592 13.4423 5.84813 13.8333 7.16667 13.8333C8.64722 13.8352 10.0854 13.3392 11.25 12.425L14.075 15.2583C14.1525 15.3364 14.2446 15.3984 14.3462 15.4407C14.4477 15.4831 14.5567 15.5048 14.6667 15.5048C14.7767 15.5048 14.8856 15.4831 14.9872 15.4407C15.0887 15.3984 15.1809 15.3364 15.2583 15.2583C15.3364 15.1809 15.3984 15.0887 15.4407 14.9872C15.4831 14.8856 15.5048 14.7767 15.5048 14.6667C15.5048 14.5567 15.4831 14.4477 15.4407 14.3462C15.3984 14.2446 15.3364 14.1525 15.2583 14.075ZM2.16667 7.16667C2.16667 6.17776 2.45991 5.21106 3.00932 4.38882C3.55873 3.56657 4.33962 2.92571 5.25325 2.54727C6.16688 2.16883 7.17222 2.06982 8.14212 2.26274C9.11203 2.45567 10.0029 2.93187 10.7022 3.63114C11.4015 4.3304 11.8777 5.22131 12.0706 6.19122C12.2635 7.16112 12.1645 8.16646 11.7861 9.08009C11.4076 9.99372 10.7668 10.7746 9.94452 11.324C9.12228 11.8734 8.15558 12.1667 7.16667 12.1667C5.84059 12.1667 4.56882 11.6399 3.63114 10.7022C2.69345 9.76452 2.16667 8.49275 2.16667 7.16667Z"
          fill="white"/>
      </svg>
    </button>
  <?php } ?>
</form>
