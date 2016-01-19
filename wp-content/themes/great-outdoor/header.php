<!DOCTYPE html>
<html>
    <head>
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
    </head>

    <body>

        <header class="header">

            <a href="<?php echo esc_url( bloginfo('url') ); ?>"><h1><?php esc_html( bloginfo('name') ); ?></h1></a>

            <!--<a href="#" class="search-link">Search</a>-->
            <a href="#" class="menu-link">Menu</a>

            <div class="nav-wrapper">

                <?php
                    
                    get_search_form();

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

            


