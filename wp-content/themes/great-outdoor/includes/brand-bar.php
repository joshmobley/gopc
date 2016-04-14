<section class="page-section brand-bar">

    <?php

        $brandParent = get_page_by_title('brands')->ID;


        $brands_args = array(
            'post_type' => 'page',
            'post_parent' => $brandParent,
            'meta_query' => array(
                array(
                    'key' => 'show_in_brand_bar',
                    'value' => true,
                    'compare' => '==',
                ),
            ),
        );

        // The Query
        $brands = new WP_Query( $brands_args );

        // The Loop
        if ( $brands->have_posts() ) {
            echo '<ul>';
            while ( $brands->have_posts() ) {
                $brands->the_post();
                echo '<li><a href="' . get_the_permalink() . '"><img src="' . get_field('brand_logo')['sizes']['medium'] . '" alt="' . get_the_title() . '" /></a></li>';
            }
            echo '</ul>';
        } else {
            echo '<p> No posts. </p>';
        }
        wp_reset_postdata();

    ?>

</section><!--.brand-bar-->
