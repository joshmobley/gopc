<?php get_header(); ?>

<section class="main-content blog-single">

    <?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
        <?php echo get_the_post_thumbnail(); ?>


        <div class="blog-content">
    	<div class="blog-header">

       		<div class="blog-header-text">
       			<h2><?php esc_html( the_title() ); ?></h2>
        		<time><?php esc_html( the_date() ); ?></time>
        	</div>
        </div>
        <?php esc_html( the_content() ); ?>
       	</div>

    <?php endwhile; endif; ?>

</section><!--#main-->

<?php get_footer(); ?>
