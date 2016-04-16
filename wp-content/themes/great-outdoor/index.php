<?php get_header(); ?>

<section class="main-content">

    <div class="page-section wysiwyg">

    <?php if( is_search() ){
        echo '<h2 class="section-title">Search Results: ' . get_search_query() . '</h2>';
    }
    ?>

    <?php get_template_part('loop'); ?>

</div>

</section><!--#main-->

<?php get_Footer(); ?>
