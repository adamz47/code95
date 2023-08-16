<?php
// @author HAMED47
// Create id attribute allowing for custom "anchor" value.
$id        = '';
$className = $dataClass = 'top_stories_block';
if ( isset( $block ) ) {
  $id = $block['id'];
  if ( ! empty( $block['anchor'] ) ) {
    $id = $block['anchor'];
  }

// Create class attribute allowing for custom "className" and "align" values.
  if ( ! empty( $block['className'] ) ) {
    $className .= ' ' . $block['className'];
  }
  if ( ! empty( $block['align'] ) ) {
    $className .= ' align' . $block['align'];
  }
  if ( get_field( 'is_screenshot' ) ) :
    /* Render screenshot for example */
    echo '<img width="100%" height="100%" src="' . get_template_directory_uri() . '/blocks/top_stories_block/screenshot.png" >';

    return;
  endif;
}
/****************************
 *     Custom ACF Meta      *
 ****************************/
$title       = get_field( 'title' );
$description = get_field( 'description' );
?>
<!-- region webofai_theme's Block -->
<?php general_settings_for_blocks( $id, $className, $dataClass ); ?>
<div class="container">
  <h1>Top Stories Block </h1>
</div>
</section>


<!-- endregion webofai_theme's Block -->
