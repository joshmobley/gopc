<?php get_header(); ?>
    <section class="main-content">

    <?php 
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post(); 
            the_content();
        } // end while
    } // end if
    ?>

    <?php include( get_template_directory() . '/includes/content-parser.php'); ?>
    </section>
<?php get_footer(); ?>