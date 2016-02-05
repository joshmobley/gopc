<?php get_header(); ?>

<div class="breadcrumbs"><a href="#">Clothing &amp; Wearables</a> > <a href="#">Mens</a> > <a href="#">Jackets</a> > <a href="#">Tonnerro Down Jacket</a></div>

<section class="main-content product-page">

	<?php //wc_get_template_part( 'content', 'single-product' ); ?>

	<?php //gopc_product_sizer(); ?>
	<img class="product-photo" src="http://placehold.it/480x480" />

	<div class="product-info">

		<h2 class="section-header orange left"><?php esc_html(the_title()); ?></h2>

		<p class="product-info-text"><?php esc_html(the_excerpt()); ?></p>

		<h3 class="a11y availability-header">Colors available:</h3>
		<ul class="colors-available availability-list">
			<li class="orange">orange</li>
			<li class="blue">blue</li>
			<li class="green">green</li>
		</ul>

		<h3 class="a11y availability-header">Sizes available:</h3>
		<ul class="sizes-available availability-list">

		<?php
			$terms = get_terms('pa_sizes');

			foreach( $terms as $term ){
				
				$slug = $term -> slug;
				
				if( $slug == 'small'){
					echo '<li>S</li>';
				}
				if( $slug == 'medium' ){
					echo '<li>M</li>';
				}
				if( $slug == 'large' ){
					echo '<li>L</li>';
				}

			}


		?>
		</ul>
		<p>*Check your local store for your size</p>

		<h3 class="availability-header">Great for:</h3>
		<ul class="activities-available availability-list">
			<?php  
				$activities = get_field('activities');
				foreach( $activities as $activity){
					if($activity == 'camp-hike'){
						$activityLabel = 'Camp/Hike';
					}elseif( $actievity == 'travel'){
						$activityLabel = 'Travel';
					}elseif( $activity == 'paddle'){
						$activityLabel == 'Paddle';
					}elseif( $activity == 'fish'){
						$activityLabel == 'Fishing';
					}else{
						$activityLabel = 'Climb';
					}
					echo '<li class="' . $activity . '">' . $activityLabel . '</li>';
				}
			?>
		</ul>

	</div><!--.product-info-->

	<div class="product-additional-info">

		<div class="features-and-specs">
	
			<a class="tab is-active" href="#">Features</a>
			<a class="tab" href="#">Specs</a>
	
			<div class="features is-active">
				<?php esc_html(the_field('features')); ?>
			</div>
	
			<div class="specs">
				<ul>
					<li>Lorem</li>
					<li>Lorem</li>
					<li>Lorem</li>
					<li>Lorem</li>
					<li>Lorem</li>
					<li>Lorem</li>
				</ul>
			</div>
	
		</div><!--.features-and-specs-->

		<div class="product-video">
			<!--video goes here-->
		</div><!--.product-video-->
	
		<div class="product-testimonial">
			<blockquote>&ldquo;I took this jacket with me to Florida. I was hot.&rdquo;</blockquote>
			<span class="quote-credit">- Molly Ringwald <span>Store Manager, Winston-Salem</span></span>
		</div><!--.product-testimonial-->

	</div><!--.product-additional-info-->

	<div class="related-products">

		<h2 class="section-header orange"><span>You Might Also Like</span></h2>

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

<?php //get_sidebar('products'); ?>
<?php get_footer(); ?>
