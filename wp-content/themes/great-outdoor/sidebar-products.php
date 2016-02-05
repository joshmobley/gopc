<aside class="sidebar filter">
    
    <h3 class="filter-header">Product Category</h3>



    <ul class="filter-options">
        <?php //print_r(get_categories('products')); ?>
    	<!--<li><a href="#" class="is-selected">Jackets</a></li>
    	<li><a href="#">Pullovers &amp; Vests</a></li>
    	<li><a href="#">Shirts</a></li>
    	<li><a href="#">Pants</a></li>
    	<li><a href="#">Shorts</a></li>-->
        <?php 
            //print_r( get_terms( 'product_cat' ) ); 
            $productCats = get_terms( 'product_cat' );
            foreach( $productCats as $cats ){
            //    print_r($cats);
                echo '<li><a href="#" data-cat="' . $cats->slug . '">' . $cats->name . '</a></li>';
            }
        ?>
    </ul>

    <h3 class="filter-header">Filter by Brand</h3>

    <ul class="filter-options">
    	<li><a href="#" class="is-selected">Patagonia</a></li>
    	<li><a href="#">Columbia</a></li>
    	<li><a href="#">The North Face</a></li>
    </ul>

    <div class="advert">
        <a href="#"><?php gopc_adsizer( '#post-1' ); ?></a>
    </div>
    
</aside>
