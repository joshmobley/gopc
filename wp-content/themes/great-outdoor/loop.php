<div class="archive-view">
<?php if ( have_posts() ):
 while ( have_posts() ) : the_post(); ?>

    <article class="excerpt">

        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <time><?php echo get_the_date(); ?></time>

        <p><?php the_excerpt(); ?></p>

    </article>

<?php endwhile;
    echo '<div class="pagination-link">' . get_posts_nav_link() . '</div>';
else: ?>

    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>


<?php endif; ?>
</div>
