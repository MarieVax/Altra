<?php
$blockRootClasses = 'block-example alignfull ';

// If block should not contain any default typography styles (paragraph/headings margins etc.)
$blockRootClasses .= 'not-prose';

// Remove "alignfull" from line 2 and uncomment this code to enable
// align settings for block
// if( !empty($block['align']) ) {
//   $blockRootClasses .= ' align' . $block['align'] . ' ';
// }

require get_template_directory() . '/inc/block-start.php';
if (!$block_disabled && empty($block['data']['block_preview_img'])) :

  if (!empty($block['data']['block_preview_img'])) echo '<img src="' . get_template_directory_uri() . '/assets/img/block-preview/' . $block['data']['block_preview_img'] . '" alt="">';
  //Background Image
  $bg = (get_field('background_image')) ? get_field('background_image')['url'] : '';

?>

  <div class="flex items-center hero hero-hp">
    <img src="<?php echo $bg; ?>" alt="" class="hero-hp--background-img">
    <div class="absolute z-50 w-full h-full text-white hero-hp--container-inside">
      <?php
      //Heading
      if ($heading = get_field('heading')) :
        $headerTag = (get_field('heading_tag')) ? get_field('heading_tag') : 'h1';
        printf('<%s class="hero-hp--heading">%s</%s>', $headerTag, $heading, $headerTag);
      endif;

      //content
      if ($content = get_field('content')) :
        printf('<div class="max-w-2xl hero-hp--content">%s</div>', $content);
      endif;

      //Link
      $link = get_field('link');
      if (isset($link) && !empty($link)) :

        $target = (isset($link['target']) && !empty($link['target'])) ? 'target="' . $link['target'] . '"' : '';
        $url = (isset($link['url']) && !empty($link['url'])) ? 'href="' . $link['url'] . '"' : '';
        $title = (isset($link['title']) && !empty($link['title'])) ? $link['title'] : '';

        printf('<a %s %s class="c-btn c-btn-hero-hp">%s</a>', $url, $target, $title);

      endif; ?>
    </div>
  </div>

<?php
endif;
require get_template_directory() . '/inc/block-end.php';
?>