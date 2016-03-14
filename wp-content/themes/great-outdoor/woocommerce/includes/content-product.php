<section class="main-content product-page">

    <?php //wc_get_template_part( 'content', 'single-product' ); ?>

    <?php //gopc_product_sizer(); ?>
    <?php
        $product = wc_get_product();
        echo '<div class="product-photo">' . $product->get_image('large') . '</div>';
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

        <h3 class="availability-header">Great for:</h3>
        <ul class="activities-available availability-list">
            <?php
                $activities = get_field('activities');
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

        <?php
            if( get_field('features') != null ){ $features = true; }
            if( get_field('specs') != null ){ $specs = true; }
        ?>

        <div class="features-and-specs">

            <?php if( $features ) : ?>
                <a class="tab" data-tab="features" href="#">Features</a>
            <?php endif; ?>

            <?php if( $specs ) : ?>
                <a class="tab" data-tab="specs" href="#">Specs</a>
            <?php endif; ?>

            <?php if( $features ) : ?>
            <div class="features container is-active">
                <?php esc_html(the_field('features')); ?>
            </div>
            <?php endif; ?>

            <?php if( $specs ) : ?>
            <div class="specs container">
                <?php esc_html(the_field('specs')); ?>
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

    <div class="related-products">

        <h2 class="section-header orange"><span>You Might Also Like</span></h2>

        <ul>

            <li>
                <img src="http://placehold.it/300x300" />
                <div class="related-products-content">
                    <h4 class="article-title">How to Choose Jacket Weight</h4>
                    <p>Lorem ipsum sit amet...</p>
                </div>
            </li>

            <li>
                <img src="http://placehold.it/300x300" />
                <div class="related-products-content">
                    <h4 class="article-title">How to Choose Jacket Weight</h4>
                    <p>Lorem ipsum sit amet...</p>
                </div>
            </li>

            <li>
                <img src="http://placehold.it/300x300" />
                <div class="related-products-content">
                    <h4 class="article-title">How to Choose Jacket Weight</h4>
                    <p>Lorem ipsum sit amet...</p>
                </div>
            </li>

        </ul>

    </div><!--.related-products-->

    <div class="related-products">

        <h2 class="section-header orange"><span>Interesting</span></h2>

        <ul>

            <li>
                <img src="http://placehold.it/300x300" />
                <div class="related-products-content">
                    <h4 class="article-title">How to Choose Jacket Weight</h4>
                    <p>Lorem ipsum sit amet...</p>
                </div>
            </li>

            <li>
                <img src="http://placehold.it/300x300" />
                <div class="related-products-content">
                    <h4 class="article-title">How to Choose Jacket Weight</h4>
                    <p>Lorem ipsum sit amet...</p>
                </div>
            </li>

            <li>
                <img src="http://placehold.it/300x300" />
                <div class="related-products-content">
                    <h4 class="article-title">How to Choose Jacket Weight</h4>
                    <p>Lorem ipsum sit amet...</p>
                </div>
            </li>

        </ul>

    </div><!--.related-products-->

</section><!--.main-content.has-sidebar-->
