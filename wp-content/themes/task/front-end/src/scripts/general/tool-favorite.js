import $ from "jquery";
import swal from "sweetalert";

export function toolFavorite(container = document) {
  $(container.querySelectorAll('.favorite-button')).on('click', function (e) {
    let $self = $(this);
    // e.preventDefault();
    $.ajax({
      url: theme_ajax_object.ajax_url,
      type: 'POST',
      data: {
        action: 'update_post_favorite',
        post_id: $(this).attr('data-post-id'),
        user_id: $(this).attr('data-user-id'),
        _ajax_nonce: theme_ajax_object._ajax_nonce,
      },
      success: function (response) {
        let data = JSON.parse(response);
        let user_favorite_status = data.user_favorite_status;
        user_favorite_status ? $self.addClass('favorite') : $self.removeClass('favorite');
        swal({
          title: 'Success',
          text: `Success! This post has been ${user_favorite_status ? 'added to' : 'removed from'} your favorites.`,
          icon: 'success',
          timer: 2000,
          buttons: false,
        });
      },
      error: function () {
        console.log('error');
      }
    });
  });
}

export function toolFavoriteSingle(button) {
  $(button).on('click', function (e) {
    let $self = $(this);
    // e.preventDefault();
    $.ajax({
      url: theme_ajax_object.ajax_url,
      type: 'POST',
      data: {
        action: 'update_post_favorite',
        post_id: $(this).attr('data-post-id'),
        user_id: $(this).attr('data-user-id'),
        _ajax_nonce: theme_ajax_object._ajax_nonce,
      },
      success: function (response) {
        let data = JSON.parse(response);
        let user_favorite_status = data.user_favorite_status;
        user_favorite_status ? $self.addClass('favorite') : $self.removeClass('favorite');
        swal({
          title: 'Success',
          text: `Success! This post has been ${user_favorite_status ? 'added to' : 'removed from'} your favorites.`,
          icon: 'success',
          timer: 2000,
          buttons: false,
        });
      },
      error: function () {
        console.log('error');
      }
    });
  });
}
