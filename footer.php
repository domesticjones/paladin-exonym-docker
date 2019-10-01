			<footer id="contact">
				<div class="module-inner">
					<h1><?php the_field('contact_form_heading', 'options'); ?></h1>
					<?php the_field('contact_form_embed_code', 'options'); ?>
				</div>
			</footer>
			<footer id="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<div class="footer-column">
					<img src="<?php ex_logo('primary', 'light'); ?>" alt="Logo for <?php ex_brand('legal'); ?>" class="footer-logo" />
					<p class="address"><?php ex_contact('address'); ?></p>
				</div>
				<div class="footer-column">
						<?php ex_social(); ?>
				</div>
				<div class="footer-column">
					<?php
						ex_contact('phone');
						ex_contact('email');
					?>
					<nav class="footer-nav" role="navigation">
						<?php
							wp_nav_menu(array(
								'container' => 'ul',
								'menu' => __('Footer', 'exonym'),
								'theme_location' => 'footer-menu',
								'depth' => 2,
							));
						?>
					</nav>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>
