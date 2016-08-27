<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" lang="en">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width" />
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/libs/modernizr-2.8.3.min.js"></script>
		<script src="https://use.typekit.net/dlu1riv.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
    <? if (is_page(468)) : ?>
    <?php wp_redirect( 'http://milliemarotta.co.uk/creaturecuriosities', 301 ); exit; ?>
    <? endif; ?>

		<?php wp_head(); ?>


	</head>
	<body <?php body_class(); ?>>
		<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<header id="header" role="banner" class="container cf">
        <h1 class="wrapper" id="logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/millie-marotta.png" alt="Millie Marotta" title="Millie Marotta"></a></h1>
        
		<nav id="menu" role="navigation">
			<?php wp_nav_menu( array( 
            'theme_location' => 'main-menu',
            'menu_class' => 'wrapper'
            ) ); ?>
		</nav>
	</header>