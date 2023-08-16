<?php

function register_acf_block_types()
{
  if (function_exists('acf_register_block_type')) {

    // directory path for block templates
    $template_dir = get_template_directory() . '/blocks/';

    // check if directory exists
    if (is_dir($template_dir)) {

      // get all directories in the block templates directory
      $block_dirs = array_filter(glob($template_dir . '*'), 'is_dir');

      // loop through block directories
      foreach ($block_dirs as $block_dir) {

        // block name
        $block_name = basename($block_dir);

        // block title
        $block_title = ucwords(str_replace('_', ' ', $block_name));

        // register block type
        acf_register_block_type(array(
          'name' => $block_name,
          'title' => __($block_title),
          'description' => __($block_title . ' description'),
          'template_directory_uri' => get_template_directory_uri(),
          'stylesheet_directory_uri' => get_stylesheet_directory_uri(),
          'render_template' => 'blocks/' . $block_name . '/index.php',
          'category' => 'freelance-ai-blocks',
          'icon' => 'admin-appearance',
          'supports' => array('anchor' => true),
          'mode' => 'edit',
          'example' => array(
            'attributes' => array(
              'mode' => 'preview',
              'data' => array('is_screenshot' => true),
            )
          )
        ));

      }
    }
  }
}

// Hook into the 'acf/init' action
add_action('acf/init', 'register_acf_block_types');

/*General Settings For Blocks*/

function background_attributes( $group_field ) {
  return array(
    "cover"    => \Theme\Helpers::get_key_from_array( 'background_style', $group_field ) &&
                  ( $group_field['background_style'] === 'contain' || $group_field['background_style'] === 'cover' ) ? $group_field['background_style'] : 'initial',
    "repeat"   => \Theme\Helpers::get_key_from_array( 'background_style', $group_field ) &&
                  ( $group_field['background_style'] !== 'contain' && $group_field['background_style'] !== 'cover' && $group_field['background_style'] !== 'default' ) ? $group_field['background_style'] : 'no-repeat',
    'position' => \Theme\Helpers::get_key_from_array( 'background_position', $group_field ) ?? '',
  );
}

function style_settings( $property, $group, $append_to ) {
  if ( ! is_array( $group ) ) {
    $group = array();
  }
  $is_property_border    = $property === 'border';
  $property_append_after = $is_property_border ? '-width' : '';
  $property_division     = $is_property_border ? 1 : 10;
  $property_unit         = $is_property_border ? 'px' : 'rem';

  ( \Theme\Helpers::get_key_from_array( '' . $property . '_top', $group ) ?
    $append_to .= "$property-top$property_append_after:" . $group[ '' . $property . '_top' ] / $property_division . "$property_unit!important;"
    : '' );

  ( \Theme\Helpers::get_key_from_array( '' . $property . '_bottom', $group ) ?
    $append_to .= "$property-bottom$property_append_after:" . $group[ '' . $property . '_bottom' ] / $property_division . "$property_unit!important;"
    : '' );

  ( \Theme\Helpers::get_key_from_array( '' . $property . '_left', $group ) ?
    $append_to .= "$property-left$property_append_after:" . $group[ '' . $property . '_left' ] / $property_division . "$property_unit!important;"
    : '' );

  ( \Theme\Helpers::get_key_from_array( '' . $property . '_right', $group ) ?
    $append_to .= "$property-right$property_append_after:" . $group[ '' . $property . '_right' ] / $property_division . "$property_unit!important;"
    : '' );

  if ( $is_property_border && array_key_exists( 'border_width', $group ) && $group['border_width'] !== '0 0 0 0' ) {
    ( \Theme\Helpers::get_key_from_array( 'border_style', $group ) ?
      $append_to .= "border-style:" . $group['border_style'] . ";"
      : '' );

    ( \Theme\Helpers::get_key_from_array( 'border_color', $group ) ?
      $append_to .= "border-color:" . $group['border_color'] . ";"
      : '' );
  } elseif ( $property === 'background_image' && \Theme\Helpers::get_key_from_array( 'background_image', $group ) && \Theme\Helpers::get_key_from_array( 'url', $group['background_image'] ) ) {
    $background_image_desktop_attributes = background_attributes( $group );
    $append_to                           .= 'background-image:url(' . $group['background_image']['url'] . ');background-size:' . $background_image_desktop_attributes['cover'] . ';background-repeat: ' . $background_image_desktop_attributes['repeat'] . ';background-position:' . $background_image_desktop_attributes['position'] . ';';
  } elseif ( $property === 'background_color' && \Theme\Helpers::get_key_from_array( 'background_color', $group ) ) {
    $append_to .= 'background-color: ' . $group['background_color'] . ';';
  }

  return $append_to;
}

function compute_styles($settings) {
  $style = '';
  $style_overlay = '';
  $styles_map = ['margin', 'border', 'padding', 'background_image', 'background_color'];

  foreach ($styles_map as $style_type) {
    $style = style_settings( $style_type, $settings, $style );
  }

  if (\Theme\Helpers::get_key_from_array('overlay_color', $settings)) {
    $style_overlay .= 'content:"";position:absolute;z-index:-1;top:0;left:0;width:100%;height:100%;background-color:' . $settings['overlay_color'] . ';';
  }

  return ['style' => $style, 'overlay' => $style_overlay];
}

function general_settings_for_blocks($id, $className, $dataClass) {
  $options = get_fields();

  // Extract options
  $block_additional_classes = '';
  $remove_container         = $options['remove_container'] ? $block_additional_classes .= ' section-noContainer' : '';
  $remove_paddings          = $options['remove_paddings'] ? $block_additional_classes .= ' section-noPaddings' : '';

  // Extract media settings
  $desktop_settings = $options['desktop_settings'];
  $tablet_settings  = $options['tablet_settings'];
  $mobile_settings  = $options['mobile_settings'];

  // Compute styles for each device
  $style_desktop = compute_styles($desktop_settings);
  $style_tablet = compute_styles($tablet_settings);
  $style_mobile = compute_styles($mobile_settings);

  echo '<section ' . ' id="' . esc_attr( $id ) . '" class="digihive-theme-block ' . ' ' .
    esc_attr( $className . $block_additional_classes ) . '" ' . ' data-section-class="' .
    esc_attr( $dataClass ) . '">';

  if (($style_desktop['style'] || $style_desktop['overlay']) || ($style_tablet['style'] || $style_tablet['overlay']) || ($style_mobile['style'] || $style_mobile['overlay'])):
    ?>
    <style>
      <?=$style_desktop['style'] ?
        "@media screen and (min-width: 992px){ #$id" . '{' .$style_desktop['style'] . '}
        '.$style_desktop['overlay'].'} ' : ''?>
      <?=$style_tablet['style'] ? "@media screen and (min-width: 600px) and (max-width: 991.98px) { #$id" . '{' .$style_tablet['style'] . '}
      '.$style_tablet['overlay'].'}': ''?>
      <?=$style_mobile['style'] ? "@media screen and (max-width: 599.98px){ #$id" . '{' .$style_mobile['style'] . '}
      '.$style_mobile['overlay'].'
      }': ''?>
    </style>
  <?php
  endif;
}

