<?php

			global $wp_query;
    	 	$cat = $wp_query->get_queried_object();
		 	$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
		 	$image = wp_get_attachment_url( $thumbnail_id ); 

		 	echo '<style>.page-title{ background-image: url(' . $image . '); </style>';



		if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="page-title"><b><?php woocommerce_page_title(); ?></b></h1>

		<?php endif; 

?>