<?php get_header(); ?>

<section class="main-content">

    <?php

    $urlParams = explode('/', getenv('REQUEST_URI'))[2];

    if( !$urlParams ) :

    ?>

    <div class="page-section">

        <style>#bg-0{background-image: url(https://greatoutdoor.wpengine.com/wp-content/uploads/2016/04/GOPC16-fall-campfire-guitar-group-GOPC-22-3000x2000-400x267.jpg);}
            @media screen and (min-width: 400px){#bg-0{background-image: url(https://greatoutdoor.wpengine.com/wp-content/uploads/2016/04/GOPC16-fall-campfire-guitar-group-GOPC-22-3000x2000-600x400.jpg);}}
            @media screen and (min-width: 600px){#bg-0{background-image: url(https://greatoutdoor.wpengine.com/wp-content/uploads/2016/04/GOPC16-fall-campfire-guitar-group-GOPC-22-3000x2000-1024x683.jpg);}}
            @media screen and (min-width: 1024px){#bg-0{background-image: url(https://greatoutdoor.wpengine.com/wp-content/uploads/2016/04/GOPC16-fall-campfire-guitar-group-GOPC-22-3000x2000-1200x800.jpg);}}
            @media screen and (min-width: 1200px){#bg-0{background-image: url(https://greatoutdoor.wpengine.com/wp-content/uploads/2016/04/GOPC16-fall-campfire-guitar-group-GOPC-22-3000x2000-1600x1067.jpg);}}
        </style>

        <div class="full-width promo no-margin-top page-header bg-image" id="post-0">
            <div id="bg-0" class="promo-bg-image"></div>
            <div class="promo-content bottom-right light">
                <h2>Everybody's Got a Story.</h2>
                <p>Places, Experiences and the Gear That Got'em There.</p>
            </div><!--.promo-content-->
        </div><!--.full-width.promo-->

    </div>

    <?php endif; ?>

    <h2 class="section-header is-page-title">
        Adventure
    </h2>

    <p class="page-section">Filter stories by category and your favorite adventure or locale.</p>



<div class="archive-view">

<?php

    echo '<div class="post-filter">';

        /*wp_list_categories(
            array(
                'depth' => 1,
                'taxonomy' => 'category',
            ));

        wp_list_categories(
            array(
                'title_li' => 'Regions',
                'taxonomy' => 'regions',
            )
        );

        wp_list_categories(
            array(
                'title_li' => 'Activities',
                'taxonomy' => 'activities',
            )
        );*/
echo do_shortcode( '[searchandfilter id="35140"]' );
echo do_shortcode( '[searchandfilter id="34148"]' );
    echo '</div>';


?>


    <ul class="tiled-list">


<?php if ( have_posts() ) :

        include('includes/random-image-counter.php');

        while ( have_posts() ) : the_post(); ?>

        <?php
        $postImage = get_the_post_thumbnail();

        include('includes/random-image-generator.php');
        ?>

        <li class="tile">
            <a href="<?php esc_url( the_permalink() ); ?>"><?php echo $postImage; ?></a>
            <a href="<?php esc_url( the_permalink() ); ?>"><h3><?php esc_html( the_title() ); ?></h3></a>
            <?php
               // $body = get_the_excerpt();
                //echo esc_html(substr( $body, 0, strpos( $body, ' ', 85 ))) . '...';
            ?>
        </li>
<?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  
<?php endif; ?>
</ul>
        <div class="pagination-link"><?php posts_nav_link(); ?></div>
          

</div><!--.archive-view-->


</section><!--.main-content-->
<?php include('includes/brand-bar.php'); ?>
<?php get_footer(); ?>
