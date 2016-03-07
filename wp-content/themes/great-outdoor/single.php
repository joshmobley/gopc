<?php get_header(); ?>

<section class="main-content blog-single">

    <?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

    	<div class="blog-header">
    		<img class="featured-image" src="http://placehold.it/1600x400" />
       		<div class="blog-header-text">
       			<h2><?php esc_html( the_title() ); ?></h2>
        		<time><?php esc_html( the_date() ); ?></time>
        	</div>
        </div>

        <div class="blog-content">
        <?php esc_html( the_content() ); ?>
       	</div>

    <?php endwhile; endif; ?>

</section><!--#main-->

<?php get_footer(); ?>
