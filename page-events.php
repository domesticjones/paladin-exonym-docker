<?php
	/* TEMPLATE NAME: Events */
  function eventsDate($start, $end) {
    $startDate = new DateTime($start);
    $endDate = new DateTime($end);
    if($startDate == $endDate) {
      return $startDate->format('F j, Y');
    } else {
      if($startDate->format('F') === $endDate->format('F')) {
        return $startDate->format('F j') . ' - ' . $endDate->format('j, Y');
      } else {
        return $startDate->format('F j') . ' - ' . $endDate->format('F j, Y');
      }
    }
  }
	get_header();
		if(have_posts()): while(have_posts()): the_post();
      $content = get_field('content');
      $events = get_field('events');
      $today = new DateTime('today');
      get_template_part('modules/hero');
      echo ex_wrap('start', 'default');
				echo '<article class="default-content">';
          echo $content;
          echo '<h2 class="events-heading">Upcoming Events</h2>';
          echo '<ul class="events-list">';
            usort($events, function ($item1, $item2) {
              return $item1['start'] <=> $item2['start'];
            });
            foreach($events as $e) {
              $name = $e['event'];
              $link = $e['link'];
              $start = $e['start'];
              $end = $e['end'];
              if(empty($end)) {
                $end = $start;
              }
              if($today->format('Ymd') <= $end) {
                $datePrint = new DateTime($start);
                echo '<li>';
                  echo '<time datetime="' . $datePrint->format('Y-m-d') . '">' . eventsDate($start, $end) . '</time>';
                  echo '<span>';
                    if($link) { echo '<a href="' . $link . '" target="_blank">'; }
                    echo $name;
                    if($link) { echo '</a>'; }
                  echo '</span>';
                echo '</li>';
              }
            }
          echo '</ul>';
          echo '<h2 class="events-heading">Past Events</h2>';
          echo '<ul class="events-list">';
            usort($events, function ($item1, $item2) {
              return $item2['start'] <=> $item1['start'];
            });
            foreach($events as $e) {
              $name = $e['event'];
              $link = $e['link'];
              $start = $e['start'];
              $end = $e['end'];
              if(empty($end)) {
                $end = $start;
              }
              if($today->format('Ymd') > $end) {
                $datePrint = new DateTime($start);
                echo '<li>';
                  echo '<time datetime="' . $datePrint->format('Y-m-d') . '">' . eventsDate($start, $end) . '</time>';
                  echo '<span>';
                    if($link) { echo '<a href="' . $link . '" target="_blank">'; }
                    echo $name;
                    if($link) { echo '</a>'; }
                  echo '</span>';
                echo '</li>';
              }
            }
          echo '</ul>';
        echo '</article>';
				echo '<aside class="default-sidebar">' . get_the_post_thumbnail($post->ID, 'medium') . get_field('embed_code') . '</aside>';
			echo ex_wrap('end');
		endwhile; endif;
	get_footer();
?>
