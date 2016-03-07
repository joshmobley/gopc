<?php get_header(); ?>

	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>



	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

		<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

	<?php endif; ?>

<!--<div class="breadcrumbs"><a href="#">Clothing &amp; Wearables</a> > <a href="#">Mens</a></div>-->

<section class="main-content has-sidebar product-page">

	<h2 class="section-header orange left">Shop</h2>

	<div class="full-width promo bg-image">

		<?php gopc_imagesizer( '#post-1' ); ?>

	</div>

	<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

	<?php /*	<div class="product-list products product-category type-product">

		<ul>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<li>
			<img src="http://placehold.it/300x300" />
			<h4 class="product-name"><?php echo esc_html( get_the_title() ); ?></h4>
		</li>

		<?php endwhile;endif; ?>

		</ul>

	</div><!--.product-list--> */ ?>

	<div class="related-products">

		<h2 class="section-header orange"><span>Interesting</span></h2>

		<ul>

			<li>
				<img src="http://placehold.it/300x300" />
				<div class="related-products-content">
					<h4 class="article-title">How to Choose Jacket Weight</h4>
					<p>Lorem ipsum sit amet...</p>
				</div>
			</li>

			<li>
				<img src="http://placehold.it/300x300" />
				<div class="related-products-content">
					<h4 class="article-title">How to Choose Jacket Weight</h4>
					<p>Lorem ipsum sit amet...</p>
				</div>
			</li>

			<li>
				<img src="http://placehold.it/300x300" />
				<div class="related-products-content">
					<h4 class="article-title">How to Choose Jacket Weight</h4>
					<p>Lorem ipsum sit amet...</p>
				</div>
			</li>

		</ul>

	</div><!--.related-products-->
	

</section><!--.main-content.has-sidebar-->

<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		do_action( 'woocommerce_sidebar' );
	?>
<?php get_footer(); ?>
