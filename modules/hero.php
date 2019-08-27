<?php
  $header = get_field('header');
  $image = $header['image']['photo'];
  $height = $header['image']['height'];
  $heading = $header['text']['heading'];
  $button = $header['text']['button'];
  if($image) {
    echo ex_wrap('start', 'hero', array($height), false);
      if($height == 'short') {
        echo wp_get_attachment_image($image['ID'], 'jumbo');
      } else {
        echo '<div class="module-bg" style="background-image: url(' . wp_get_attachment_image_url($image['ID'], 'jumbo') . ')">' . wp_get_attachment_image($image['ID'], 'jumbo') . '</div>';
        echo '<div class="module-inner">';
          if($heading) { echo '<h1>' . $heading . '</h1>'; }
          if($button) { echo '<a href="' . $button['url'] . '" target="' . $button['target'] . '" class="cta-button">' . $button['title'] . '</a>'; }
        echo '</div>';
      }
    echo ex_wrap('end', null, null, false);
  }
