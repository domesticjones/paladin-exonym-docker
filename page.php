<?php
	/* Default Template */
	get_header();
		if(have_posts()): while(have_posts()): the_post();
      get_template_part('modules/hero');
			echo ex_wrap('start', 'default');
				echo '<article class="default-content">' . apply_filters('the_content', get_the_content()) . '</article>';
				echo '<aside class="default-sidebar">' . get_the_post_thumbnail($post->ID, 'medium') . get_field('embed_code') . '</aside>';
			echo ex_wrap('end');
		endwhile; endif;
	get_footer();
?>
