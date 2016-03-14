<?php get_header();

	echo '<div class="main-content">';

	$feature = get_field('featured-story');
    $postImage = get_the_post_thumbnail( $feature->ID);

	echo '<div class="full-width promo bg-image no-margin-top" id="post-">';
	echo '<a href="' . esc_url( get_the_permalink( $feature->ID ) )  . '">';
	if( $postImage == null ){
        $postImage = '<img src="http://placehold.it/1500x1000" />';
    }
    echo $postImage;
	echo '<div class="promo-content">';
	echo '<h2>' . esc_html( get_the_title( $feature->ID ) ) . '</h2>';

	echo '<p>' . esc_html( get_the_excerpt( $feature->ID ) ) . '</p>';
	echo '<a class="button" href="' . esc_url( get_the_permalink( $feature->ID ) ) . '">' . 'Read More' . ' &rarr;</a>';
	echo '</div><!--.promo-content-->';
	echo '</a>';
	echo '</div><!--.full-width.promo-->';
?>

<?php get_sidebar('adventure'); ?>

<?php

$adventureArgs = array(
	'post_type' => 'post'
);

$adventure = new WP_Query( $adventureArgs );


if ( $adventure->have_posts() ) :
	echo '<ul class="tiled-list">';
while ( $adventure->have_posts() ) : $adventure->the_post(); ?>


		<li class="tile">
			<a href="<?php esc_url( the_permalink() ); ?>"><img src="http://placehold.it/300x250" /></a>
			<a href="<?php esc_url( the_permalink() ); ?>"><h3><?php esc_html( the_title() ); ?></h3></a>
			<?php esc_html(the_excerpt()); ?>
		</li>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
	</ul>


</div><!--.main-content-->
<?php get_footer(); ?>
