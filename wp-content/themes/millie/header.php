<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" lang="en">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width" />
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/libs/modernizr-2.8.3.min.js"></script>
        <?php wp_head(); ?>
        <script src="https://use.typekit.net/dlu1riv.js"></script>
        <script>try{Typekit.load({ async: false });}catch(e){}</script>
        <?php if (is_page_template('template-app-page.php')) : ?>
            <link href="http://vjs.zencdn.net/5.19.2/video-js.css" rel="stylesheet">
        <?php endif; ?>
    </head>
    <body <?php body_class(); ?>>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <header id="header" role="banner" class="container cf">
        <h1 class="wrapper" id="logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/millie-marotta.png" alt="Millie Marotta" title="Millie Marotta"></a></h1>

    <?php if (!is_page(11492)) : ?>
        <nav id="menu" role="navigation">
            <?php wp_nav_menu( array(
            'theme_location' => 'main-menu',
            'menu_class' => 'wrapper'
            ) ); ?>
        </nav>
    <?php endif ?>
    </header>
