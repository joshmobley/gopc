<?php get_header(); ?>

<div class="main-content">

    <?php

        $headerImg      = get_field('header_image');
        $address        = get_field('address');
        $phone          = get_field('phone_number');
        $hours          = get_field('hours');
        $locationDesc   = get_field('location_description');
        $googleView     = get_field('location_google_view');
        $resourceLinks  = get_field('resource_links');
        $facebook       = get_field('facebook_url');
        $twitter        = get_field('twitter_usrname');
        $instagram      = get_field('instagram_username');
        $promoText      = get_field('promo_content');
        $promoImage     = get_field('promo_image');
        $promoURL       = get_field('promo_url');

        gopc_bgimage( $headerImg, '#header-bg');
    ?>

    <div class="full-width promo no-margin-top page-header bg-image">

        <div id="header-bg" class="promo-bg-image"></div>

        <div class="location-details">
            <h3>Address &amp; Hours</h3>
            <p class="address"><?php echo $address; ?></p>
            <p class="phone"><?php echo $phone; ?></p>
            <p class="hours"><?php echo $hours; ?></p>
        </div><!--.promo-content-->

    </div>

    <h2 class="section-header"><span>Greetings from our <span>Raleigh Store</h2>

    <?php gopc_bgimage( $promoImage, '#promo-bg' ); ?>

    <div class="page-section half-container">

        <div class="half-width promo">
            <a href="https://greatoutdoor.wpengine.com/2014/07/30/chacotour-2014/">
                <div id="promo-bg" class="promo-bg-image"></div>
                <div class="promo-content bg-green">
                    <h3><?php echo $promoText; ?></h3>
                </div><!--.promo-content-->
            </a>
        </div>

        <div>
            <!-- events go here -->
        </div>

    </div>

    <div class="full-width promo">

        <div class="half-width">
            <?php echo $locationDesc; ?>
        </div>

        <div class="half-width">
           <?php echo $googleView; ?>
        </div>

    </div>

    <div class="full-width promo" style="background: none; ">
        <h3 class="section-title">Local Outdoor Resources</h3>
        <ul>
        <?php
        foreach( $resourceLinks as $link ){
            echo '<li><a href="' . $link['link_url'] . '">' . $link['link_title'] . '</a></li>';
        }
        ?>
        </ul>
    </div>

</div>

<?php get_footer(); ?>
