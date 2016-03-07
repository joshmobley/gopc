<aside class="sidebar filter">
    
    <h3 class="filter-header">Activity</h3>

    <ul class="filter-options">
        
        <?php 
            //print_r( get_terms( 'product_cat' ) ); 
            
            echo '<li><a href="#" data-cat="' . $cats->slug . '">Camp/Hike</a></li>';
            echo '<li><a href="#" data-cat="' . $cats->slug . '">Climb</a></li>';
            echo '<li><a href="#" data-cat="' . $cats->slug . '">Fish</a></li>';
            echo '<li><a href="#" data-cat="' . $cats->slug . '">Paddle</a></li>';
            echo '<li><a href="#" data-cat="' . $cats->slug . '">Travel</a></li>';
            
        ?>
    </ul>

    <h3 class="filter-header">Region</h3>

    <ul class="filter-options">
    	<li><a href="#" class="is-selected">Chapel Hill</a></li>
    	<li><a href="#">Charlotte</a></li>
        <li><a href="#">Charlottesville</a></li> 
    	<li><a href="#">Greensboro</a></li>
        <li><a href="#">Greenville</a></li>
        <li><a href="#">Raleigh</a></li>
        <li><a href="#">Wilmington</a></li>
        <li><a href="#">Winston-Salem</a></li> 
    </ul>

    <div class="advert">
        <a href="#"><?php gopc_adsizer( '#post-1' ); ?></a>
    </div>
    
</aside>
