<?php
	get_header();
		echo ex_wrap('start', 'default');
			echo '<article class="default-content"><h1>404 Error</h1><p>The page <strong>' . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI] . '</strong> could not be found.</p></article>';
			echo '<aside class="default-sidebar sidebar-404-error"><nav>';
      wp_nav_menu(array(
				'container' => false,
				'menu' => __('Responsive', 'exonym'),
				'theme_location' => 'responsive-menu',
				'depth' => 0,
			));
      echo '</nav></aside>';
		echo ex_wrap('end');
	get_footer();
?>
