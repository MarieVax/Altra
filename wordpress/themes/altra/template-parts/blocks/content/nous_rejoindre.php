<?php
if ($anchor = get_sub_field('anchor')) :
  $id = sanitize_title($anchor);
endif;

echo '<div class="altra--section6 altra-section" id="' . $id . '">'; ?>
<div class="footer-block">
  <?php
  //Image
  if ($image = get_sub_field('background_image')) :
    printf('<img src="%s" alt="" class="footer-block-image">', $image['url']);
  endif;
  ?>
  <div class="footer-block-content fadeIn">
    <?php
    //Heading
    if ($heading = get_sub_field('heading')) :
      printf('<div class="footer-block-content-heading">%s</div>', $heading);
    endif;
    ?>
    <?php
    //Text
    if ($text = get_sub_field('content')) :
      printf('<div class="footer-block-content-text fadeIn">%s</div>', $text);
    endif;
    ?>
    <div class="relative z-30 footer-block-content-links ">
      <?php //Link left
      $left = get_sub_field('link');
      if (isset($left) && !empty($left)) :

        $target_left = (isset($left['target']) && !empty($left['target'])) ? 'target="' . $left['target'] . '"' : '';
        $url_left = (isset($left['url']) && !empty($left['url'])) ? 'href="' . $left['url'] . '"' : '';
        $title_left = (isset($left['title']) && !empty($left['title'])) ? $left['title'] : '';

        printf('<a %s %s class="c-btn c-btn-footer-block-left">%s</a>', $url_left, $target_left, $title_left);
      endif;
      ?>
    </div>
  </div>
</div>

<?php
echo '</div>';
