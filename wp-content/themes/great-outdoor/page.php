<?php get_header(); ?>
	<section class="main-content">
    <?php the_content(); ?>
	<?php include( get_template_directory() . '/includes/content-parser.php'); ?>
	</section>
<?php get_footer(); ?>
