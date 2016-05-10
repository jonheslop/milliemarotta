<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js" lang="en">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width" />
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/libs/modernizr-2.8.3.min.js"></script>
		<script src="https://use.typekit.net/dlu1riv.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<header id="header" role="banner" class="container cf">
        <h1 class="wrapper" id="logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/millie-marotta.png" alt="Millie Marotta" title="Millie Marotta"></a></h1>
        <aside class="social-icons">
            <a class="social-icon-link" href="http://www.facebook.com/milliemarotta"><svg class="social-icon social-icon_facebook" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 266.893 266.895" enable-background="new 0 0 266.893 266.895">
                <title>Facebook Icon</title>
                <path id="Blue_1_" fill="#000" d="M248.082,262.307c7.854,0,14.223-6.369,14.223-14.225V18.812
                c0-7.857-6.368-14.224-14.223-14.224H18.812c-7.857,0-14.224,6.367-14.224,14.224v229.27c0,7.855,6.366,14.225,14.224,14.225
                H248.082z"/>
                <path id="f" fill="#FFFFFF" d="M182.409,262.307v-99.803h33.499l5.016-38.895h-38.515V98.777c0-11.261,3.127-18.935,19.275-18.935
                l20.596-0.009V45.045c-3.562-0.474-15.788-1.533-30.012-1.533c-29.695,0-50.025,18.126-50.025,51.413v28.684h-33.585v38.895h33.585
                v99.803H182.409z"/>
            </svg></a>
            <a class="social-icon-link" href="http://www.instagram.com/milliemarotta"><svg class="social-icon social-icon_instagram" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 510 510" enable-background="new 0 0 510 510">
                <g id="post-instagram">
                    <path d="M459,0H51C22.95,0,0,22.95,0,51v408c0,28.05,22.95,51,51,51h408c28.05,0,51-22.95,51-51V51C510,22.95,487.05,0,459,0z
                         M255,153c56.1,0,102,45.9,102,102c0,56.1-45.9,102-102,102c-56.1,0-102-45.9-102-102C153,198.9,198.9,153,255,153z M63.75,459
                        C56.1,459,51,453.9,51,446.25V229.5h53.55C102,237.15,102,247.35,102,255c0,84.15,68.85,153,153,153c84.15,0,153-68.85,153-153
                        c0-7.65,0-17.85-2.55-25.5H459v216.75c0,7.65-5.1,12.75-12.75,12.75H63.75z M459,114.75c0,7.65-5.1,12.75-12.75,12.75h-51
                        c-7.65,0-12.75-5.1-12.75-12.75v-51c0-7.65,5.1-12.75,12.75-12.75h51C453.9,51,459,56.1,459,63.75V114.75z"/>
                </g>
            </svg></a>
        </aside>
		<nav id="menu" role="navigation">
			<?php wp_nav_menu( array( 
            'theme_location' => 'main-menu',
            'menu_class' => 'wrapper'
            ) ); ?>
		</nav>
	</header>