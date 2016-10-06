<?php get_header(); ?>

<div class="main-content">

<div class="mega-menu is-static" id="locations-mega">
    <h2 class="mega-menu-title">Visit us throughout NC &amp; VA</h2>
    <h3 class="mega-menu-subtitle">What's Happening in Your Local Shop?</h3>

    <div>

    <?php

        $locationsArgs = array(
            'post_type' => 'locations',
            'orderby' => 'title',
            'order' => 'asc',
        );

        $locations = new WP_Query( $locationsArgs );

        if ( $locations->have_posts() ){

            while ( $locations->have_posts() ){
                
                $locations->the_post();

                $address = get_field('address');
                $center  = get_field('shopping_center');
                 
                echo '<div class="mega-menu-column fifth">' .
                        '<h4 class="mega-menu-column-title">' .
                            '<a href="' . get_the_permalink() . '">' .
                                get_the_title() . 
                            '</a>' .
                        '</h4>' .
                        '<p>' . $center . '<br/>' .
                            $address . '</a>' .
                        '</p>' .
                    '</div>';
                 

            }

            

        }else{
            echo 'Sorry, no posts found.';
        }
        wp_reset_postdata();

    ?>

    </div>

 </div><!--.mega-menu#products-mega-->

</div>

<?php include('includes/brand-bar.php'); ?>
<?php get_footer(); ?>
