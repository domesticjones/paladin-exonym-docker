<?php
	/* TEMPLATE NAME: Team */
	get_header();
		if(have_posts()): while(have_posts()): the_post();
			$content = get_field('content');
      get_template_part('modules/hero');
			echo ex_wrap('start', 'team-content');
				echo '<div class="team-content-column">' . $content['left'] . '</div>';
				echo '<div class="team-content-column">' . $content['right'] . '</div>';
			echo ex_wrap('end');
			if(have_rows('team')) {
					while(have_rows('team')) {
						the_row();
						$image = get_sub_field('photo');
						$data = get_sub_field('info');
						$link = $data['contact'];
						$linkPrint = '';
						if(!empty($link)) {
							$linkPrint = '<div><a href="' . $link['url'] . '" target="' . $link['target'] . '" class="cta-button">' . $link['title'] . '</a></div>';
						}
						echo ex_wrap('start', 'team-member');
							echo '<div class="team-photo">' . wp_get_attachment_image($image['ID'], 'medium') . '</div>';
							echo '<div class="team-info"><h2>' . $data['name'] . '</h2><h3>' . $data['title'] . '</h3><p>' . $data['bio'] . '</p>' . $linkPrint . '</div>';
						echo ex_wrap('end');
					}
			}
		endwhile; endif;
	get_footer();
?>
