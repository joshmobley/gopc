<?php get_header(); ?>

<section class="main-content">

    <?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>

        <?php $photoID = get_post_thumbnail_id($post->ID); ?>

        <?php gopc_bgimageID( $photoID, '#bg-0' ); ?>



        <div class="full-width promo no-margin-top page-header bg-image" id="post-0" style="height:250px;">
           <div id="bg-0" class="promo-bg-image" style="height: 250px;"></div>
        </div>

        <div class="blog-content">
    	<div class="blog-header">

       		<div class="blog-header-text">
       			<h2><?php esc_html( the_title() ); ?></h2>
        	</div>
        </div>
        <?php esc_html( the_content() ); ?>
       	</div>

    <?php endwhile; endif; ?>

</section><!--#main-->

<?php get_footer(); ?>
