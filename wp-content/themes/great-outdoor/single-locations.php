<?php get_header(); ?>

<div class=""main-content"">

    <?php

        $headerImg      = get_field('header_image');
        $shoppingCenter = get_field('shopping_center');
        $address        = get_field('address');
        $phone          = get_field('phone_number');
        $hours          = get_field('hours');
        $locationDesc   = get_field('location_description');
        $googleView     = get_field('location_google_view');
        $locationImage  = get_field('location_image');
        $resourceLinks  = get_field('resource_links');
        $facebook       = get_field('facebook_url');
        $twitter        = 'https://twitter.com/' . get_field('twitter_username');
        $instagram      = 'https://instagram.com/' . get_field('instragram_username');
        $promoText      = get_field('promo_content');
        $promoImage     = get_field('promo_image');
        $promoURL       = get_field('promo_url');

        gopc_bgimage( $headerImg, '#header-bg');
    ?>

    <div class=""full-width promo no-margin-top page-header bg-image"">

        <div id=""header-bg"" class=""promo-bg-image""></div>

        <div class=""location-details"">
            <h3><?php echo esc_html( get_the_title() ); ?></br>Address &amp; Hours</h3>
            <p class=""address"">
                <a target=""_blank"" href=""https://maps.google.com/?q=<?php echo $address; ?>"">
                <?php echo $shoppingCenter; ?><br/>
                <?php echo $address; ?>
                </a>
            </p>
            <p class=""phone""><a href=""tel:<?php echo $phone; ?>""><?php echo $phone; ?></a></p>
            <p class=""hours""><?php echo $hours; ?></p>
        </div><!--.promo-content-->

    </div>

    <h2 class=""section-header""><span>Greetings from our <span><?php echo get_the_title(); ?> Store</h2>

    <?php gopc_bgimage( $promoImage, '#promo-bg' ); ?>

<section class=""main-content"">
        <?php include( get_template_directory() . '/includes/content-parser.php'); ?>
        </section>

    <div class=""full-width promo"">

        <div class=""half-width location-description"">
            <?php echo $locationDesc; ?>
        </div>

        <div class=""half-width"">
           <?php
                if( $googleView) { echo $googleView; }
                else{ gopc_image($locationImage); }

            ?>
        </div>

    </div>


    <div class=""page-section half-container"">

        <div class=""half-width promo"">
            <?php
                $promoURL = get_field('promo_url');
                if( $promoURL ){
                    echo '<a href=""' . $promoURL . '"">';
                }
            ?>
                <div id=""promo-bg"" class=""promo-bg-image""></div>
                <div class=""promo-content bg-green"">
                    <h3><?php echo $promoText; ?></h3>
                </div><!--.promo-content-->
            <?php
                if($promoURL){
                    echo '</a>';
                }
            ?>
        </div>

        <div class=""location-events half-width promo"">
            <?php

                if( $post->post_name == 'raleigh' ){
                    echo do_shortcode('[ai1ec view=""stream"" cat_name=""Triangle"" events_limit=""3""]');
                }elseif( $post->post_name == 'chapel-hill'){
                    echo do_shortcode('[ai1ec view=""stream"" cat_name=""Triangle"" events_limit=""3""]');
                }elseif( $post->post_name == 'charlotte' ){
                    echo do_shortcode('[ai1ec view=""stream"" cat_name=""Charlotte"" events_limit=""3""]');
                }elseif( $post->post_name == 'charlottesville' ){
                    echo do_shortcode('[ai1ec view=""stream"" cat_name=""Charlottesville"" events_limit=""3""]');
                }elseif( $post->post_name == 'greenville' ){
                    echo do_shortcode('[ai1ec view=""stream"" cat_name=""Greenville"" events_limit=""3""]');
                }elseif( $post->post_name == 'greensboro' ){
                    echo do_shortcode('[ai1ec view=""stream"" cat_name=""Triad"" events_limit=""3""]');
                }elseif( $post->post_name == 'virginia-beach' ){
                    echo do_shortcode('[ai1ec view=""stream"" cat_name=""Virginia Beach"" events_limit=""3""]');
                }elseif( $post->post_name == 'wilmington' ){
                    echo do_shortcode('[ai1ec view=""stream"" cat_name=""Wilmington"" events_limit=""3""]');
                }elseif( $post->post_name == 'winston-salem' ){
                    echo do_shortcode('[ai1ec view=""stream"" cat_name=""Triad"" events_limit=""3""]');
                }else{
                    echo do_shortcode('[ai1ec view=""stream"" events_limit=""3""]');
                }

               /* $locationEventsArgs = array(
                    'post_type' => 'ai1ec_event',
                    'tax_query' => array(
                        array(
                            'taxonomy'  => 'events_categories',
                            'field'     => 'slug',
                            'terms'     => 'event-' . $term,
                        ),
                    ),
                );

                echo '<h2 class=""section-title"">Upcoming ' . $term . ' Events</h2>';

                include('includes/timely-helper.php');

                // The Query
                $locationEvents = new WP_Query( $locationEventsArgs );

                // The Loop
                if ( $locationEvents->have_posts() ) {
                    echo '<ul>';
                    while ( $locationEvents->have_posts() ) {
                        $locationEvents->the_post();

                        echo '<li class=""event-item"">';
                        echo '<span class=""date"">' . $event->long_start_date . '</span>';
                        echo '<span class=""title"">' . get_the_title() . '</span>';
                        echo '<span class=""venue"">' . $event->venue . '</span>';
                        echo '</li>';
                    }
                    echo '</ul>';
                } else {
                    // no posts found
                }
                /* Restore original Post Data
                wp_reset_postdata();*/
            ?>
        </div>

    </div>

    <div class=""page-section half-container"">

        <div class=""half-width promo local-resources"" style=""background: none; "">
            <h3 class=""section-title"">Local Outdoor Resources</h3>
            <ul>
            <?php
            foreach( $resourceLinks as $link ){
                echo '<li><a href=""' . $link['link_url'] . '"">' . $link['link_title'] . '</a></li>';
            }
            ?>
            </ul>
        </div>

        <div class=""half-width promo social-links"">

            <div class="fb-page" data-href="<?php echo $facebook; ?>" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/newkindcommunity/" class="fb-xfbml-parse-ignore"><a href="<?php echo $facebook; ?>">New Kind</a></blockquote></div>

            <a href=""<?php echo $facebook; ?>"" target=""_blank"" class=""facebook-link"">The <?php echo get_the_title(); ?> Shop on Facebook</a>
            <a href=""<?php echo $twitter; ?>"" target=""_blank"" class=""twitter-link"">The <?php echo get_the_title(); ?> Shop on Twitter</a>
            <a href=""<?php echo $instagram; ?>"" target=""_blank"" class=""instagram-link"">The <?php echo get_the_title(); ?> Shop on Instagram</a>

        </div>


    </div>

</div>

<?php get_footer(); ?>