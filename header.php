<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('name');wp_title( '|', true, 'left' ); ?></title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/normalize.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url')?>">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/css/responsive.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,700,300,500' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
</head>
<body>
	<header>
		<div id="logo">
			<h1><a href="/"><?php wp_title(); ?></a></h1>
			<span><?php wp_description(); ?></span>
		</div>
		<nav>
			<?php 
				wp_nav_menu(
					array(
					'container' => false,
					'items_wrap' => '<ul id="menu-top">%3$s</ul>',	
					'theme_location' => 'menu'
					));
			?>
		</nav>
	</header>