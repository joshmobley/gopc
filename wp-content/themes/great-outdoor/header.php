<!DOCTYPE html>
<html>
    <head>
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.min.css?4.25.16" />

        <!--[if IE lt 9]>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js"></script>
        <![endif]-->

        <!-- responsive meta tag-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.png" />
        <!-- Google Tag Manager -->
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-M3D3LZ"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-M3D3LZ');</script>
        <!-- End Google Tag Manager -->
    </head>

    <?php
        if( is_search() ){
            $posttype = 'search';
        }else{
            global $post;
            $posttype = $post->post_name;
        }
    ?>

    <body class="<?php echo $posttype; ?>">

        <header class="header">

            <a href="<?php echo esc_url( bloginfo('url') ); ?>"><h1><?php esc_html( bloginfo('name') ); ?></h1></a>

            <!--<a href="#" class="search-link">Search</a>-->
            <a href="#" class="menu-link">Menu</a>

            <div class="utility-nav">

                <?php get_search_form(); ?>

            </div>

            <div class="nav-wrapper">

                <ul id="menu-main-nav">
                    <li data-mega="products-mega">
                        <a href="<?php echo get_bloginfo('url'); ?>/products"><span>Products</span></a>
                        <?php include('includes/mega-menu-products.php'); ?>
                    </li>
                    <li data-mega="adventure-mega">
                        <a href="<?php echo get_bloginfo('url'); ?>/adventure"><span>Adventure</span></a>
                        <?php include('includes/mega-menu-adventure.php'); ?>
                    </li>
                    <li data-mega="locations-mega">
                        <a href="<?php echo get_bloginfo('url'); ?>/locations"><span>Locations</span></a>
                        <?php include('includes/mega-menu-locations.php'); ?>
                    </li>
                    <li data-mega="community-mega">
                        <a href="<?php echo get_bloginfo('url'); ?>/community/about-us">Community</a>
                        <?php //include('includes/mega-menu-community.php'); ?>
                    </li>
                </ul>

            </div>



        </header>




