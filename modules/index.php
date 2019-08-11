<?php
  // Global Wrapper
  function ex_wrap($pos, $key = null, $class = []) {
    $output = '';
    $classPrint = '';
    if($pos == 'start') {
      if(!empty($class)) {
        foreach($class as &$c) {
          $c = $key . '-' . $c;
        }
        unset($c);
        $classPrint = ' ' . join(' ', $class);
      }
      $output = '<section class="module module-' . $key . $classPrint . ' animate-parallax animate-z-normal">';
    } elseif($pos == 'end') {
      $output = '</section>';
    } else {
      return;
    }
    return $output;
  }
