<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>
		<?php wp_title( '|', true, 'right' ); ?>
	</title>

	<?php wp_head() ?>
  <link rel='stylesheet' id='blog-css'  href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' type='text/css' />
  <link rel='stylesheet' id='blog-css'  href='https://www.balterdev.space/wordpress/wp-content/themes/balter/css/blog.css' type='text/css' />
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

</head>

<body>

  <nav class="fixed-top">
    <div class="menu-container">
      <button class="page-item menu-toggle fa fa-bars"></button>
      <?php
  wp_nav_menu( array(
    'theme_location' => 'main-menu',
    'menu_id'        => 'main-menu',
    'menu-class'     => 'menu',
    'container' => 'ul',
  ));
      ?>
    </div>
  </nav>

  <header>
    <div id="banner">
      <h1 class="blog-title"><?php echo get_bloginfo( 'name' ); ?></h1>
      <p class="lead blog-description"><?php echo get_bloginfo( 'description' ); ?></p>
    </div>
  </header>

