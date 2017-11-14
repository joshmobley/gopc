<!DOCTYPE html>
<html>
    <head>
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.min.css?7.31.2017" />

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
        <!-- N&O Retargeting Pixel -->
        <script async src="https://i.simpli.fi/dpx.js?cid=89853&action=100&segment=ralgreatoutdoorsiteretargeting&m=1&sifi_tuid=51878"></script>
        <!-- End Retargeting Pixel -->
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
		<svg width="0" height="0" style="display: none;">
			<symbol id="close" viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;">
				<path style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312
				c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312
				l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937
				c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
			</symbol>
		</svg>
		<?php
		// pulls in ACF from options page
		$cta = get_field( 'paddle_cta_text', 'options' );
		$promotion = get_field( 'promotion_text', 'options' );
		$promotion_cta = get_field( 'cta_text', 'options' );

		// grab URL slug
		$page_slug = basename(get_permalink());

		// grab product category, slugs
		$postID = get_the_ID();
		$terms = wp_get_post_terms( $postID, $taxonomy, $args );
		$product_cats = array();

		foreach ($terms as $term) :
			array_push( $product_cats, $term->slug );
		endforeach;
		?>

		<?php if ( in_array( 'paddle', $product_cats ) ) : ?>
			<?php if ( isset( $cta ) ) : ?>
				<aside class="paddle-cta">
					<div class="paddle-cta-close">
						<svg><use xlink:href="#close"></use></svg>
					</div>
					<p><?php echo $cta; ?></p>
					<div class="paddle-cta-links">
						<div class="paddle-appointment">
							<a href="https://www.gopcpaddlepro.com/?quiz=true" target="_blank">Make An Appointment</a>
						</div>
						<div class="paddle-schedule">
							<a href="https://www.gopcpaddlepro.com/?schedule=true" target="_blank">Take Quiz</a>
						</div>
					</div>
				</aside>
			<?php endif; ?>
		<?php endif; ?>

		<?php // Paddle page, show dropdown promotion ?>
		<?php if ( $page_slug == 'paddle' ) : ?>
			<?php
			// promotion fields are set, add promo markup
			if ( isset( $promotion, $promotion_cta ) ) : ?>
					<div class="site-promotion js-promotion">
						<div class="site-promotion-wrapper">
							<div class="site-promotion-text">
								<p><?php echo $promotion; ?></p>
							</div>
							<div class="site-promotion-cta">
								<div class="cta-wrapper">
									<a href="<?php the_field( 'cta_link', 'options' ); ?>" target="_blank">
										<?php echo $promotion_cta; ?>
									</a>
								</div>
							</div>
						</div>
						<div class="close-site-promotion">
							<svg><use xlink:href="#close"></use></svg>
						</div>
					</div>
			<?php endif; ?>
		<?php endif; ?>

        <header class="header">
            <a href="<?php echo esc_url( bloginfo('url') ); ?>">
                <img id="masthead-logo" src="<?php echo get_stylesheet_directory_uri() . '/assets/logo.png' ?>" alt="GOPC logo">
            </a>
            <!--<a href="#" class="search-link">Search</a>-->
            <a href="#" class="menu-link">Menu</a>

            <div class="utility-nav">
                <?php get_search_form(); ?>
                <a href="<?php echo bloginfo('url'); ?>/join-muleteam/">Join MuleTeam</a>
            </div>

            <div class="nav-wrapper">
                <a href="#" class="do-menu-close">Close</a>
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
                        <a href="<?php echo get_bloginfo('url'); ?>/community">Community</a>
                        <?php include('includes/mega-menu-community.php'); ?>
                    </li>
                </ul>
            </div>
        </header>