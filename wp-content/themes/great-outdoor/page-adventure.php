<?php get_header(); ?>

<section class="main-content">

    <?php include( get_template_directory() . 'includes/content-parser.php'); ?>

<?php

$adventureArgs = array(
	'post_type' => 'post'
);

$adventure = new WP_Query( $adventureArgs );


if ( $adventure->have_posts() ) :
	echo '<ul class="tiled-list">';
while ( $adventure->have_posts() ) : $adventure->the_post(); ?>

        <?php
        $postImage = get_the_post_thumbnail();
        if( $postImage == null ){
            $postImage = '<img src="http://placehold.it/300x250" />';
        }
        ?>

		<li class="tile">
			<a href="<?php esc_url( the_permalink() ); ?>"><?php echo $postImage; ?></a>
			<a href="<?php esc_url( the_permalink() ); ?>"><h3><?php esc_html( the_title() ); ?></h3></a>
			<?php esc_html(the_excerpt()); ?>
		</li>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
	</ul>


</section><!--.main-content-->
<?php get_footer(); ?>
