<!DOCTYPE html>
<html>
    <head>
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
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

    <body class="<?php global $post; echo $post->post_name; ?>">

        <header class="header">

            <a href="<?php echo esc_url( bloginfo('url') ); ?>"><h1><?php esc_html( bloginfo('name') ); ?></h1></a>

            <!--<a href="#" class="search-link">Search</a>-->
            <a href="#" class="menu-link">Menu</a>

            <div class="utility-nav">

                <?php get_search_form(); ?>

            </div>

            <div class="nav-wrapper">

                    <?php

                        $args = array(
                            'container' => false,
                            'menu_class' => false,
                            'fallback_cb' => 'wp_list_categories',
                            'title_li' => false
                            );

                        wp_nav_menu($args);

                    ?>

            </div>

        </header>




