<?php get_header(); ?>

<div class="breadcrumbs"><a href="#">Adventure</a> > <a href="#">Events</a> > <a href="#">Fish</a> > <a href="#">Fly Tying Class</a> </div>

<section class="main-content event-page">

	<img class="event-photo" src="http://placehold.it/480x480" />

	<div class="event-text">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<h2 class="section-header orange left icon-fish"><?php esc_html(the_title()); ?></h2>

		<div class="event-info">

			<div class="store"><span class="dashicons dashicons-store"></span><?php echo esc_html( get_field('store') ); ?></div>

			<div class="location"><span class="dashicons dashicons-location"></span><?php echo get_field('location'); ?></div>

			<div class="date"><span class="dashicons dashicons-calendar"></span><?php echo 'Every ' . esc_html( ucfirst( get_field('event-day') ) ); ?></div>

			<div class="time"><span class="dashicons dashicons-clock"></span><?php echo esc_html( get_field('start-time') ) . ' - ' . esc_html( get_field('end-time') ); ?></div>

			<div class="cost"><span class="dashicons dashicons-money"></span><?php echo esc_html( get_field('cost') ); ?></div>

			<div class="contact"><span class="dashicons dashicons-phone"></span><?php echo esc_html( get_field('phone') );?></div>

			<div class="email"><span class="dashicons dashicons-email"></span><?php echo '<a href="mailto:' . esc_html( get_field('email') ) . '">' . esc_html( get_field('email') ) . '</a>'; ?></div>

			<a href="#" class="register-link">Register Now</a>

		</div><!--.event-info-->

		<div class="event-info-text"><?php esc_html( the_content() ); ?></div>

	</div><!--.event-text-->

		
		<?php endwhile; else : ?>

		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

		<?php endif; ?>


</section><!--.main-content-->

<?php //get_sidebar('products'); ?>
<?php get_footer(); ?>
