<?php get_header(); ?>

<section class="main-content">

    <?php include( get_template_directory() . '/includes/content-parser.php'); ?>


<div class="archive-view test">

<?php

    echo '<div class="post-filter">';


       /* wp_list_categories(
            array(
                'depth' => 1,
                'taxonomy' => 'category',
            )
        );

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

    echo do_shortcode( '[searchandfilter id="34148"]' );

    echo '</div>';

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$adventureArgs = array(
	'post_type' => 'post',
    'paged' => $paged,
);



$adventure = new WP_Query( $adventureArgs );



if ( have_posts() ) :
	echo '<ul class="tiled-list">';

    while ( have_posts() ) : the_post(); ?>

        <?php include('includes/random-image-generator.php'); ?>

		<li class="tile">
			<a href="<?php esc_url( the_permalink() ); ?>"><?php echo $postImage; ?></a>
			<a href="<?php esc_url( the_permalink() ); ?>"><h3><?php esc_html( the_title() ); ?></h3></a>
			<?php
                $body = get_the_excerpt();
                echo esc_html(substr( $body, 0, strpos( $body, ' ', 85 ))) . '...';
            ?>
		</li>



<?php endwhile; ?>
    <div class="pagination-link">
        <?php previous_posts_link( 'Newer Posts', max_num_pages ); ?>
        <?php next_posts_link( 'Older Posts', max_num_pages ); ?>
    </div>
    </ul>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php endif; ?>

</div><!--.archive-view-->


</section><!--.main-content-->
<?php get_footer(); ?>
