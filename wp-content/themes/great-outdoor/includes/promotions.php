<svg width="0" height="0" style="display: none;">
	<symbol id="close" viewBox="0 0 212.982 212.982" style="enable-background:new 0 0 212.982 212.982;">
		<path style="fill-rule:evenodd;clip-rule:evenodd;" d="M131.804,106.491l75.936-75.936c6.99-6.99,6.99-18.323,0-25.312
		c-6.99-6.99-18.322-6.99-25.312,0l-75.937,75.937L30.554,5.242c-6.99-6.99-18.322-6.99-25.312,0c-6.989,6.99-6.989,18.323,0,25.312
		l75.937,75.936L5.242,182.427c-6.989,6.99-6.989,18.323,0,25.312c6.99,6.99,18.322,6.99,25.312,0l75.937-75.937l75.937,75.937
		c6.989,6.99,18.322,6.99,25.312,0c6.99-6.99,6.99-18.322,0-25.312L131.804,106.491z"/>
	</symbol>
</svg>
<?php
// pulls in ACF from options page
$cta = get_field( 'paddle_cta_text', 'options' );
$promotion = get_field( 'promotion_text', 'options' );
$promotion_cta = get_field( 'cta_text', 'options' );

// grab URL slug
$page_slug = basename(get_permalink());

// grab product category, slugs
$postID = get_the_ID();
$terms = wp_get_post_terms( $postID, $taxonomy, $args );
$product_cats = array();

foreach ($terms as $term) :
	array_push( $product_cats, $term->slug );
endforeach;
?>

<?php if ( in_array( 'paddle', $product_cats ) ) : ?>
	<?php if ( isset( $cta ) ) : ?>
		<aside class="paddle-cta">
			<div class="paddle-cta-close">
				<svg><use xlink:href="#close"></use></svg>
			</div>
			<p><?php echo $cta; ?></p>
			<div class="paddle-cta-links">
				<div class="paddle-appointment">
					<a href="https://www.gopcpaddlepro.com/?quiz=true" target="_blank">Make An Appointment</a>
				</div>
				<div class="paddle-schedule">
					<a href="https://www.gopcpaddlepro.com/?schedule=true" target="_blank">Take Quiz</a>
				</div>
			</div>
		</aside>
	<?php endif; ?>
<?php endif; ?>

<?php // Paddle page, show dropdown promotion ?>
<?php if ( $page_slug == 'paddle' ) : ?>
	<?php
	// promotion fields are set, add promo markup
	if ( isset( $promotion, $promotion_cta ) ) : ?>
			<div class="site-promotion js-promotion">
				<div class="site-promotion-wrapper">
					<div class="site-promotion-text">
						<p><?php echo $promotion; ?></p>
					</div>
					<div class="site-promotion-cta">
						<div class="cta-wrapper">
							<a href="<?php the_field( 'cta_link', 'options' ); ?>" target="_blank">
								<?php echo $promotion_cta; ?>
							</a>
						</div>
					</div>
				</div>
				<div class="close-site-promotion">
					<svg><use xlink:href="#close"></use></svg>
				</div>
			</div>
	<?php endif; ?>
<?php endif; ?>