<div class="post-filter">


    <div class="responsive-column">
        <ul>
    <?php wp_list_categories(array(
        'taxonomy' => 'product_cat',
        'depth' => 3,
        'hierarchical' => true,
        'title_li' => '',
        'orderby' => 'count',
        'order' => 'desc',
    )); ?>
        </ul>

        <ul>
    <?php wp_list_categories( array(
        'taxonomy' => 'pa_brands',
        'depth' => 1,
        'hierarchical' => false,
        )); ?>
    </div>

   <?php /* <div class="responsive-column">
        <h4 class="mega-menu-column-title"><a href="<?php echo get_bloginfo('url'); ?>/product-category/mens-clothing/">Men's Clothing</a></h4>
        <ul class="children" data-path="mens-clothing">
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/mens-clothing/mens-shirts/">Shirts</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/mens-clothing/mens-shorts/">Shorts</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/mens-clothing/mens-swim/">Swim</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/mens-clothing/mens-pants/">Pants</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/mens-clothing/">All Mens</a></li>
        </ul>
        <h4 class="mega-menu-column-title"><a href="<?php echo get_bloginfo('url'); ?>/product-category/womens-clothing/">Women's Clothing</a></h4>
        <ul class="children" data-path="womens-clothing">
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/womens-clothing/womens-tops/">Tops</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/womens-clothing/women-dresses/">Dresses &amp; Skirts</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/womens-clothing/womens-shorts/">Shorts</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/womens-clothing/womens-swim/">Swim</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/womens-clothing/">All Womens</a></li>
        </ul>
        <h4 class="mega-menu-column-title"><a href="<?php echo get_bloginfo('url'); ?>/product-category/footwear/">Footwear</a></h4>
        <ul class="children" data-path="footwear">
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/footwear/mens-footwear/">Mens</a></li>
            <ul class="children" data-path="mens-footwear">
                <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/mens-footwear/mens-hiking">Hiking</a></li>
                <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/mens-footwear/">Mens</a></li>
            </ul>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/footwear/womens-footwear/">Womens</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/footwear/kids-footwear/">Kids</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/footwear/">All Footwear</a></li>
        </ul>
        <h4 class="mega-menu-column-title"><a href="<?php echo get_bloginfo('url'); ?>/product-category/accessories/">Accessories</a></h4>

        <h4 class="mega-menu-column-title"><a href="<?php echo get_bloginfo('url'); ?>/product-category/camp-hike/">Camp &amp; Hike Gear</a></h4>
        <ul class="children" data-path="camp-hike">
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/camp-hike/tents/">Tents</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/camp-hike/packs/">Packs</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/camp-hike/sleeping/">Sleeping Systems</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/camp-hike/hydration/">Hydration</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/camp-hike/kitchen/">Camp Kitchen</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/camp-hike/">All Camp/Hike</a></li>
        </ul>
    </div>
    <div class="responsive-column">
        <h4 class="mega-menu-column-title"><a href="<?php echo get_bloginfo('url'); ?>/product-category/climb/">Climb</a></h4>
        <h4 class="mega-menu-column-title"><a href="<?php echo get_bloginfo('url'); ?>/product-category/fish/">Fish</a></h4>

        <h4 class="mega-menu-column-title"><a href="<?php echo get_bloginfo('url'); ?>/product-category/paddle/">Paddle</a></h4>
        <ul class="children" data-path="paddle">
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/paddle/kayaks/">Kayaks</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/paddle/canoes/">Canoes</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/paddle/paddle-boards/">Paddleboards</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/paddle/paddles/">Paddles</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/paddle/pdfs/">PFDs</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/product-category/paddle/">All Paddle</a></li>
        </ul>
        <h4 class="mega-menu-column-title"><a href="<?php echo get_bloginfo('url'); ?>/product-category/travel">Travel</a></h4>
        <h4 class="mega-menu-column-title"><a href="<?php echo get_bloginfo('url'); ?>/product-category/pets/">Pets</a></h4>
        <h4 class="mega-menu-column-title"><a href="<?php echo get_bloginfo('url'); ?>/product-category/outdoor-fun/">Outdoor Fun</a></h4>
        <ul class="children" data-path="disc-golf">
            <li><a href="#">Disc Golf</a></li>
            <li><a href="#">Kites</a></li>
            <li><a href="#">Outdoor Toys</a></li>
            <li><a href="#">High Tech Gadgets</a></li>
        </ul>

        <h4 class="mega-menu-column-title"><a href="<?php echo get_bloginfo('url'); ?>/product-category/gift-card/gift-card/">Gift Cards</a></h4>

        <h4 class="mega-menu-column-title">Featured Brands</h4>
        <ul id="featured-brand-list" class="children is-active">
            <li><a href="<?php echo get_bloginfo('url'); ?>/products/?pa_brands=black-diamond">Black Diamond</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/products/?pa_brands=osprey">Osprey</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/products/?pa_brands=patagonia">Patagonia</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/products/?pa_brands=smartwool">Smartwool</a></li>
            <li><a href="<?php echo get_bloginfo('url'); ?>/products/?pa_brands=toadco">Toad&amp;Co</a></li>
        </ul>
    </div>

    */?>
</div>
