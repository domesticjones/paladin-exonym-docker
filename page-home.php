<?php
	/* TEMPLATE NAME: Home */
	get_header();
		if(have_posts()): while(have_posts()): the_post();
			$thisPage = get_the_id();
			$subhead = get_field('subhead');
			$advantage = get_field('advantage');
			$value = get_field('value_cta');
			$video = get_field('video');
			$imageCta = get_field('image_cta');
			$events = get_field('events');
			get_template_part('modules/hero');
			if($subhead) { echo ex_wrap('start', 'subhead') . $subhead . ex_wrap('end'); }

			$subPagesQueryArgs = array(
				'post_type'			=> 'page',
				'post_parent'		=> $thisPage,
			);
			$subPagesQuery = new WP_Query($subPagesQueryArgs);
			if($subPagesQuery->have_posts()){
				echo ex_wrap('start', 'advantage');
					echo $advantage;
				echo ex_wrap('end');
				echo '<div id="advantage-list">';
					while($subPagesQuery->have_posts()) {
						$subPagesQuery->the_post();
						echo '<div><a href="' . get_the_permalink() . '" class="adv-single">' . get_the_post_thumbnail($post->ID, 'medium') . '</a></div>';
					}
				echo '</div>';
			}
			wp_reset_postdata();
			if($value) { echo ex_wrap('start', 'value') . $value . ex_wrap('end'); }
			if($video) { echo ex_wrap('start', 'video') . $video . ex_wrap('end'); }
			if(have_rows('testimonials')) {
				echo ex_wrap('start', 'testimonials');
					echo '<div id="testimonials-wrap">';
						while(have_rows('testimonials')) {
							the_row();
							echo '<blockquote><q>' . get_sub_field('quote') . '</q><cite>' . get_sub_field('name') . '</cite></blockquote>';
						}
					echo '</div>';
				echo ex_wrap('end');
			}
			if($imageCta['image']) {
				$imageCtaLink = $imageCta['link'];
				echo ex_wrap('start', 'imagecta');
					if(!empty($imageCtaLink)) { echo '<a href="' . $imageCtaLink['url'] . '" target="' . $imageCtaLink['target'] . '">'; }
						echo wp_get_attachment_image($imageCta['image']['ID'], 'large');
					if(!empty($imageCtaLink)) { echo '</a>'; }
				echo ex_wrap('end');
			}
			if($events) {
				echo ex_wrap('start', 'events');
					echo $events;
				echo ex_wrap('end');
			}
		endwhile; endif;
	get_footer();
?>
