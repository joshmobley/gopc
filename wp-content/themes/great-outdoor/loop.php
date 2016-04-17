<div class="archive-view">
<?php if ( have_posts() ):
 while ( have_posts() ) : the_post();

 $posttype = $post->post_type;

 ?>

    <article class="excerpt" data-posttype="<?php echo $posttype; ?>">

        <?php if( $posttype == 'locations' ): ?>

            <h2><a href="<?php the_permalink(); ?>"><span class="type">Location </span>The <?php the_title(); ?> Shop</a></h2>

            <div class="location-info">
                <p class="address"><?php the_field('address'); ?></p>
                <p class="telephone"><?php the_field('phone_number'); ?></p>
            </div>

            <div class="location-excerpt"><?php echo substr( get_field('location_description'), 0, 340 ) . '...';  ?></div>

        <?php elseif( $posttype == 'product' ): ?>

            <h2><a href="<?php the_permalink(); ?>"><span class="type">Product </span><?php the_title(); ?></a></h2>

            <time><?php echo get_the_date(); ?></time>

            <p><?php the_excerpt(); ?></p>

        <?php else: ?>


            <h2><a href="<?php the_permalink(); ?>"><span class="type">Blog </span><?php the_title(); ?></a></h2>

            <time><?php echo get_the_date(); ?></time>

            <p><?php the_excerpt(); ?></p>

        <?php endif; ?>

    </article>

<?php endwhile;
    echo '<div class="pagination-link">' . get_posts_nav_link() . '</div>';
else: ?>

    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>


<?php endif; ?>
</div>
