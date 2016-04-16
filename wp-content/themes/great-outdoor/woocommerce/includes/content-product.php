<section class="main-content product-page">

    <?php //wc_get_template_part( 'content', 'single-product' ); ?>

    <?php //gopc_product_sizer(); ?>
    <?php
        $product = wc_get_product();
        ?>
        <div class="product-photo">
<?php
        if ( has_post_thumbnail() ) {
            $image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
            $image_link    = wp_get_attachment_url( get_post_thumbnail_id() );
            $image         = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
                'title' => get_the_title( get_post_thumbnail_id() )
            ) );

            $attachment_count = count( $product->get_gallery_attachment_ids() );

            if ( $attachment_count > 0 ) {
                $gallery = '[product-gallery]';
            } else {
                $gallery = '';
            }

            echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_caption, $image ), $post->ID );

        } else {

            echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );

        }
    ?>

    <?php do_action( 'woocommerce_product_thumbnails' ); ?>

    </div>
    <?php
       // echo '<div class="product-photo">' . $product->get_image('large') . '</div>';
     ?>

    <div class="product-info">

        <h2 class="section-header orange left"><?php esc_html(the_title()); ?></h2>

        <p class="product-info-text"><?php esc_html(the_excerpt()); ?></p>

        <?php /*

        HOLDING ON SIZES + COLORS UNTIL PHASE 2

        <h3 class="a11y availability-header">Colors available:</h3>
        <ul class="colors-available availability-list">
            <li class="orange">orange</li>
            <li class="blue">blue</li>
            <li class="green">green</li>
        </ul>

        <h3 class="a11y availability-header">Sizes available:</h3>
        <ul class="sizes-available availability-list">

        <?php
            $terms = get_terms('pa_sizes');

            foreach( $terms as $term ){

                $slug = $term -> slug;

                if( $slug == 'small'){
                    echo '<li>S</li>';
                }
                if( $slug == 'medium' ){
                    echo '<li>M</li>';
                }
                if( $slug == 'large' ){
                    echo '<li>L</li>';
                }

            }


        ?>
        </ul>
        <p>*Check your local store for your size</p> */ ?>

        <?php

        $activities = get_field('activities');
        if( $activities != null ) :

        ?>
        <h3 class="availability-header">Great for:</h3>
        <ul class="activities-available availability-list">
            <?php
                foreach( $activities as $activity){
                    if($activity == 'camp-hike'){
                        $activityLabel = 'Camp/Hike';
                    }elseif( $actievity == 'travel'){
                        $activityLabel = 'Travel';
                    }elseif( $activity == 'paddle'){
                        $activityLabel == 'Paddle';
                    }elseif( $activity == 'fish'){
                        $activityLabel == 'Fishing';
                    }else{
                        $activityLabel = 'Climb';
                    }
                    echo '<li class="' . $activity . '">' . $activityLabel . '</li>';
                }
            ?>
        </ul>

        <?php endif; ?>

        <?php
            $features = get_field('features');
            $length = get_field('length');
            $width = get_field('width');
            $weight = get_field('weight');
            $capacity = get_field('capacity');
            $legRoom = get_field('leg_room');
            $numberOfPaddlers = get_field('number_of_paddlers');
            $hatchesIncluded = get_field('hatches_included');
            $rodHoldersIncluded = get_field('rod_holders_included');
            $material = get_field('material');
            $madeIn = get_field('made_in');
            $specs = get_field('specs');
        ?>

        <div class="features-and-specs">

            <?php if( $features != null ) : ?>
                <a class="tab" data-tab="features" href="#">Features</a>
            <?php endif; ?>

            <?php if( $specs != null ) : ?>
                <a class="tab" data-tab="specs" href="#">Specs</a>
            <?php endif; ?>

            <?php if( $features != null ) : ?>
            <div class="features container is-active">
                <?php echo $features; ?>
            </div>
            <?php endif; ?>

            <?php if( $specs || $catSpecs ) : ?>
            <div class="specs container">
                <?php
                    echo '<ul class="category-specs">';
                    if( $length ){
                        $catSpecs = true;
                        $lengthFeet = $length . ' ft';
                        $lengthCM = $length*30.48 . ' cm';
                        echo '<li>Length: ' . $length . '/' . $lengthCM . '</li>';
                    }
                    if( $width ){
                        $catSpecs = true;
                        $widthIN = $width . ' in';
                        $widthCM = $width*2.54 . ' cm';
                        echo '<li>Width: ' . $widthIN . '/' . $widthCM . '</li>';
                    }
                    if( $weight ){
                        $catSpecs = true;
                        $weightLB = $weight . ' lbs';
                        $weightKG = $weight*0.453592 . ' kg';
                        echo '<li>Weight: ' . $weightLB . '/' . $weightKG . '</li>';
                    }
                    if( $capacity ){
                        $catSpecs = true;
                        $capacityLB = $capacity . ' lbs';
                        $capacityKG = $capacity*0.453592 . ' kg';
                        echo '<li>Capacity: ' . $capacityLB . '/' . $capacityKG . '</li>';
                    }
                    if( $legRoom ){
                        $catSpecs = true;
                        $legRoomIN = $legRoom . ' in';
                        $legRoomCM = $legRoom*2.54 . 'cm';
                        echo '<li>Leg Room: ' . $legRoomIN . '/' . $legRoomCM . '</li>';
                    }
                    if( $numberOfPaddlers ){
                        $catSpecs = true;
                        echo '<li>Number of Paddlers: ' . $numberOfPaddlers . '</li>';
                    }
                    if( $rodHoldersIncluded ){
                        $catSpecs = true;
                        echo '<li>Rod Holder Included: ' . $rodHoldersIncluded . '</li>';
                    }
                    if( $material ){
                        $catSpecs = true;
                        echo '<li>Material: ' . $material . '</li>';
                    }
                    if( $madeIn ){
                        $catSpecs = true;
                        echo '<li>Made in: ' . $madeIN . '</li>';
                    }
                    echo '</ul>';
                ?>
                <?php echo $specs; ?>
            </div>
         <?php endif; ?>

        </div><!--.features-and-specs-->

    </div><!--.product-info-->

    <div class="product-additional-info">



        <?php if( $video) : ?>

            <div class="product-video">
                <!--video goes here-->
            </div><!--.product-video-->
        <?php endif; ?>

        <?php if( $testimonial ) : ?>

            <div class="product-testimonial">
                <blockquote>&ldquo;I took this jacket with me to Florida. I was hot.&rdquo;</blockquote>
                <span class="quote-credit">- Molly Ringwald <span>Store Manager, Winston-Salem</span></span>
            </div><!--.product-testimonial-->

        <?php endif; ?>

    </div><!--.product-additional-info-->

</section><!--.main-content.has-sidebar-->
