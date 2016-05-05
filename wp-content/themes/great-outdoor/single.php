<?php get_header(); ?>

<section class="main-content">

    <?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

        <div class="blog-content">
    	<div class="blog-header">

       		<div class="blog-header-text">
       			<h2><?php esc_html( the_title() ); ?></h2>
        	</div>
            <?php gopc_image( $photoID ); ?>
        </div>
        <?php esc_html( the_content() ); ?>
       	</div>

    <?php endwhile; endif; ?>

</section><!--#main-->

<?php get_footer(); ?>
