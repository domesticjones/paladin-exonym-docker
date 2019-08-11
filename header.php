<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<div id="container">
      <header id="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
        <a href="<?php echo get_home_url(); ?>">
					<img src="<?php ex_logo(); ?>" alt="Logo for <?php ex_brand(); ?>" class="header-logo" />
				</a>
        <nav class="header-nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
          <?php
						wp_nav_menu(array(
              'container' => false,
              'menu' => __('Header', 'exonym'),
              'theme_location' => 'header-menu',
              'depth' => 0,
            ));
					?>
        </nav>
        <?php ex_social(); ?>
				<a href="#" id="header-nav-toggle">
          <span class="line"></span>
          <span class="line"></span>
          <span class="line"></span>
				</a>
      </header>
