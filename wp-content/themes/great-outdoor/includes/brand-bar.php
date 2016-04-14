<section class="page-section brand-bar">

    <?php

        $brandParent = get_page_by_title('brands')->ID;


        $brands_args = array(
            'post_type' => 'page',
            'post_parent' => $brandParent,
        );

        // The Query
        $brands = new WP_Query( $brands_args );

        // The Loop
        if ( $brands->have_posts() ) {
            echo '<ul>';
            while ( $brands->have_posts() ) {
                $brands->the_post();
                print_r(get_field('brand_logo'));
                echo '<li><a href="' . get_the_permalink() . '"><img src="' . get_field('brand_logo')['sizes']['small'] . '" alt="' . get_the_title() . '" /></a></li>';
            }
            echo '</ul>';
        } else {
            echo '<p> No posts. </p>';
        }
        wp_reset_postdata();

    ?>

</section><!--.brand-bar-->
