<?php
	/* TEMPLATE NAME: Home */
	get_header();
		if(have_posts()): while(have_posts()): the_post();
      get_template_part('modules/hero');
		endwhile; endif;
	get_footer();
?>
