<?php

    /**
     **  This file is organized in 5 main components:
     **
     **  i.   Wordpress Resets
     **  ii.  Custom Post Types
     **  iii. Custom Taxonomies
     **  iv.  Theme Functions
     **  v.   Short Codes
     **
     **/

    /*****************************************************************************
    *** i.   Wordpress Resets
    ******************************************************************************/

    ## Resource: http://codex.wordpress.org/Plugin_API#Hooks.2C_Actions_and_Filters



    // enqueue jquery from google cdn
    function my_jquery_enqueue() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_template_directory_uri() . "/js/jquery-2.2.0.min.js", false, null);
        wp_enqueue_script('jquery');
    }

    if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);

    function enqueue_scripts() {
        wp_register_script('main-script', get_template_directory_uri() . "/js/main.min.js?10.6.2016a", null, true);
        wp_enqueue_script('main-script');
    }

    add_action( 'wp_enqueue_scripts', 'enqueue_scripts');

    function add_favicon() {
        $favicon_url = site_url() . '/favicon.png';
        echo '<rel="icon" type="image/png" href="' . $favicon_url . '"/>';
    }

    add_action('login_head', 'add_favicon');
    add_action('admin_head', 'add_favicon');

    /*****************************************************************************
    *** ii.   Custom Post Types
    ******************************************************************************/

    ## Documentation: http://codex.wordpress.org/Post_Types

    // removing content box from product CPT
    add_action('init', 'remove_content_editor');

    function remove_content_editor() {
        //remove_post_type_support( 'product', 'editor' );
        remove_post_type_support( 'locations', 'editor' );
    }

    add_action( 'init', 'create_locations' );

    function create_locations() {
      register_post_type( 'locations',
        array(
          'labels' => array(
            'name' => __( 'Locations' ),
            'singular_name' => __( 'Location' )
          ),
          'menu_icon' => 'dashicons-store',
          'public' => true,
          'has_archive' => true,
        )
      );
    }


    /* ensuring all CPTS make it to search results */
    if( !is_admin ){
        function filter_search($query) {
            if ($query->is_search) {
            $query->set('post_type', array('post', 'page', 'product', 'locations', 'events'));
            };
            return $query;
        };
        add_filter('pre_get_posts', 'filter_search');
    }


    /* adding random sorting to woocommerce */

    add_filter( 'woocommerce_get_catalog_ordering_args', 'custom_woocommerce_get_catalog_ordering_args' );

    function custom_woocommerce_get_catalog_ordering_args( $args ) {
        $orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );

        if ( 'random_list' == $orderby_value ) {
            $args['orderby'] = 'rand';
            $args['order'] = '';
            $args['meta_key'] = '';
        }
        return $args;
    }

    add_filter( 'woocommerce_default_catalog_orderby_options', 'custom_woocommerce_catalog_orderby' );
    add_filter( 'woocommerce_catalog_orderby', 'custom_woocommerce_catalog_orderby' );

    function custom_woocommerce_catalog_orderby( $sortby ) {
        $sortby['random_list'] = 'Random';
        return $sortby;
    }



    /*****************************************************************************
    *** iii.  Custom Taxonomies
    ******************************************************************************/

    ## Documentation: http://codex.wordpress.org/Taxonomies

    /*****************************************************************************
    *** iv.  Theme Functions
    ******************************************************************************/

    ## FYI: http://codex.wordpress.org/Functions_File_Explained

    function show_rss_feed( $source = "", $cnt = 5 , $class = "" ){

        if (!empty($source)) {

            // content of feed
            $feedContent = "";

            // create curl object and set options
            if (strlen($feedContent) < 1){
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL,$source);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);

                // load xml object from curl execution
                $feedContent = curl_exec($curl);
                curl_close($curl);
            }

            if ($feedContent == false || strstr($feedContent,"<title>WordPress &rsaquo; Error</title>"))
                return false;

            // load curl content into simplexml
            $feedObj = simplexml_load_string($feedContent);

            if (count($feedObj->channel->item) < 1)
                return;

            if (empty($class))
                echo "<ul>";
            else
                echo "<ul class=\"$class\">";

            foreach ($feedObj->channel->item as $item) {
                if ($cnt-- > 0) {
                	echo "<li>";
                    echo "<a href=\"" . $item->link . "\">";
                    echo $item->title;
                    echo "</a>";
                    echo "<span>" . date("n/j/Y",strtotime($item->pubDate)) . "</span>";
                    echo "</li>";
                }
            }

            echo "</ul>";

        }

    }

    //add main nav
    function register_menus() {
        register_nav_menu('main-nav',__( 'Main Navigation ' ));
        register_nav_menu('products-nav',__( 'Products Menu' ));
        register_nav_menu('adventure-nav',__( 'Adventure Menu' ));
        register_nav_menu('locations-nav',__( 'Locations Menu' ));
        register_nav_menu('community-nav',__( 'Community Menu' ));
       /* register_nav_menu('mens-nav',__( 'Product - Mens Clothing' ));
        register_nav_menu('womens-nav',__( 'Product - Womens Clothing' ));
        register_nav_menu('kids-nav',__( 'Product - Kids Clothing' ));
        register_nav_menu('accessories-nav',__( 'Product - Accessories' ));
        register_nav_menu('footwear-nav',__( 'Product - Footwear' ));
        register_nav_menu('camp-nav',__( 'Product - Camp &amp; Hike' ));
        register_nav_menu('climb-nav',__( 'Product - Climb' ));
        register_nav_menu('fish-nav',__( 'Product - Fish' ));
        register_nav_menu('paddle-nav',__( 'Product - Paddle' ));
        register_nav_menu('travel-nav',__( 'Product - Travel' ));
        register_nav_menu('pets-nav',__( 'Product - Pets' ));
        register_nav_menu('outdoor-nav',__( 'Product - Outdoor Fun' ));*/
    }
    add_action( 'init', 'register_menus' );


    //use dashicons

    add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );

    function load_dashicons_front_end() {
        wp_enqueue_style( 'dashicons' );
    }

    /**
     * Register our sidebars and widgetized areas.
     *
     */
    function product_filter_init() {

        register_sidebar( array(
            'name'          => 'Shop/Products sidebar',
            'id'            => 'product-filter',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));

        register_sidebar( array(
            'name'          => 'Mens Promo',
            'id'            => 'promo-mens-clothing',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));

        register_sidebar( array(
            'name'          => 'Womens Promo',
            'id'            => 'promo-womens-clothing',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));

        register_sidebar( array(
            'name'          => 'Kids Promo',
            'id'            => 'promo-kids-clothing',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));

        register_sidebar( array(
            'name'          => 'Accessories Promo',
            'id'            => 'promo-accessories',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));

        register_sidebar( array(
            'name'          => 'Footwear Promo',
            'id'            => 'promo-footwear',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));

        register_sidebar( array(
            'name'          => 'Camp & Hike Promo',
            'id'            => 'promo-camp-hike',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));

        register_sidebar( array(
            'name'          => 'Climb Promo',
            'id'            => 'promo-climb',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));

        register_sidebar( array(
            'name'          => 'Fish Promo',
            'id'            => 'promo-fish',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));

        register_sidebar( array(
            'name'          => 'Paddle Promo',
            'id'            => 'promo-paddle',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));

        register_sidebar( array(
            'name'          => 'Travel Promo',
            'id'            => 'promo-travel',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));

        register_sidebar( array(
            'name'          => 'Pets Promo',
            'id'            => 'promo-pets',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));

        register_sidebar( array(
            'name'          => 'Outdoor Fun Promo',
            'id'            => 'promo-outdoor-fun',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));


        register_sidebar( array(
            'name'          => 'Gift Cards Promo',
            'id'            => 'promo-gift-card',
            'before_widget' => '<div>',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>',
        ));

    }
    add_action( 'widgets_init', 'product_filter_init' );

    /**
    * Custom Taxonomy for Blog Posts
    */

    function regions_tax_init() {
    // create a new taxonomy
    register_taxonomy(
        'regions',
        'post',
        array(
            'label' => __( 'Regions' ),
            'labels' => array(
                'name'          => 'Regions',
                'singular_name' => 'Region',
                'add_new'       => 'Add Region',
                'add_new_item'  => 'Add Region',
                'edit_item'     => 'Edit Region',
                'new_item'      => 'New Region',
                'view_item'     => 'View Region',
                'all_items'     => 'All Regions',
                'menu_name'     => 'Regions'
            ),
            'rewrite' => array( 'slug' => 'region' ),
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_quick_edit' => true,
            'hierarchical' => true

        )
    );
}
add_action( 'init', 'regions_tax_init' );

function activities_tax_init() {
    // create a new taxonomy
    register_taxonomy(
        'activities',
        'post',
        array(
            'label' => __( 'Activities' ),
            'labels' => array(
                'name'          => 'Activities',
                'singular_name' => 'Activity',
                'add_new'       => 'Add Activity',
                'add_new_item'  => 'Add Activity',
                'edit_item'     => 'Edit Activity',
                'new_item'      => 'New Activity',
                'view_item'     => 'View Activity',
                'all_items'     => 'All Activities',
                'menu_name'     => 'Activities'
            ),
            'rewrite' => array( 'slug' => 'activity' ),
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_quick_edit' => true,
            'hierarchical' => true

        )
    );
}
add_action( 'init', 'activities_tax_init' );


    /*****************************************************************************s
    *** v.  Short Codes
    ******************************************************************************/

    ## Docuementation: http://codex.wordpress.org/Shortcode_API

    /******************************************************************************
    *** vi. Custom Image Functions
    ******************************************************************************/

    add_image_size( 'gopc-small', 400, 400 );
    add_image_size( 'gopc-medium', 600, 600 );
    add_image_size( 'gopc-large', 1024, 1024 );
    add_image_size( 'gopc-extralarge', 1200, 1200 );
    add_image_size( 'gopc-fullbleed', 1600, 1600 );

    function gopc_bgimageID( $imageID, $selector){




        // set image urls
        $smallImage       = wp_get_attachment_image_src( $imageID, 'gopc-small' )[0];
        $medImage         = wp_get_attachment_image_src( $imageID, 'gopc-medium' )[0];
        $largeImage       = wp_get_attachment_image_src( $imageID, 'gopc-large' )[0];
        $xlargeImage      = wp_get_attachment_image_src( $imageID, 'gopc-extralarge' )[0];
        $fullbleedImage   = wp_get_attachment_image_src( $imageID, 'gopc-fullbleed' )[0];

        $mediaQueries = array(
          '400'  => $medImage,
          '600'  => $largeImage,
          '1024' => $xlargeImage,
          '1200' => $fullbleedImage
        );

        echo '<style>';
        echo $selector . '{';
        echo 'background-image: url(' . esc_url( $smallImage ) . ');';
        echo '}';
        foreach( $mediaQueries as $px => $url ){
          echo '@media screen and (min-width: ' . esc_html( $px ) . 'px){';
          echo esc_html( $selector ) . '{';
          echo 'background-image: url(' . esc_url( $url ) . ');';
          echo '}';
          echo '}';
        }
        echo '</style>';
    }


    function gopc_bgimage( $imageObj , $selector ){



          // set image urls
          $smallImage       = $imageObj['sizes']['gopc-small'];
          $medImage         = $imageObj['sizes']['gopc-medium'];
          $largeImage       = $imageObj['sizes']['gopc-large'];
          $xlargeImage      = $imageObj['sizes']['gopc-extralarge'];
          $fullbleedImage   = $imageObj['sizes']['gopc-fullbleed'];

          $mediaQueries = array(
            '400'  => $medImage,
            '600'  => $largeImage,
            '1024' => $xlargeImage,
            '1200' => $fullbleedImage
          );

          echo '<style>';
          echo $selector . '{';
          echo 'background-image: url(' . esc_url( $smallImage ) . ');';
          echo '}';
          foreach( $mediaQueries as $px => $url ){
            echo '@media screen and (min-width: ' . esc_html( $px ) . 'px){';
            echo esc_html( $selector ) . '{';
            echo 'background-image: url(' . esc_url( $url ) . ');';
            echo '}';
            echo '}';
          }
          echo '</style>';
    }


    function gopc_image( $imageObj ){

        $mediaQueries = array(
            '1600' => $fullbleedImage,
            '1024' => $xlargeImage,
            '600'  => $largeImage,
            '340'  => $medImage
        );

         // set image urls
          $smallImage       = $imageObj['sizes']['gopc-small'];
          $medImage         = $imageObj['sizes']['gopc-medium'];
          $largeImage       = $imageObj['sizes']['gopc-large'];
          $xlargeImage      = $imageObj['sizes']['gopc-extralarge'];
          $fullbleedImage   = $imageObj['sizes']['gopc-fullbleed'];

        echo '<picture>';


        foreach( $mediaQueries as $px => $url ){
            echo '<source media="(min-width: ' . esc_html( $px ) . 'px)" srcset="' . esc_url( $url ) . '">';
        }

        echo '<source srcset="' . esc_url( $smallImage ) . '">';
        echo '<img src="' . esc_url( $smallImage ) . '" alt="">';
        echo '</picture>';

    }

    function gopc_videoBg( $embed, $selector ){
        //echo $embed;
        echo '<style>'.
                $selector . '{' .
                'position: relative;' .
                '}' .
                $selector . ' iframe{' .
                'position: absolute;' .
                'top: 0;' .
                'left: 0; ' .
                'height: 100%!important;' .
                'width: 100%!important;' .
                '}' .
             '</style>';
    }


    /******************************************************************************
    *** vii. WooCommerce Hooks
    ******************************************************************************/

    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

    add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

    function my_theme_wrapper_start() {
      echo '<section id="main-content">';
    }

    function my_theme_wrapper_end() {
      echo '</section>';
    }

    add_action( 'after_setup_theme', 'woocommerce_support' );

    function woocommerce_support() {
        add_theme_support( 'woocommerce' );
    }




?>
