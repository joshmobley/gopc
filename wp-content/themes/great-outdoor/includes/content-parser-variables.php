<?php

$title = get_the_title( $post->ID );
$desc = strip_tags( substr( $post->post_content, 0, 120 ) ). '...';
$linkText = 'Read More';
$linkURL = get_the_permalink( $post->ID );
$postImage = get_the_post_thumbnail($post->ID);


if( $post->post_type == 'product'){
    $product = wc_get_product();
    $desc = strip_tags( substr( $post->post_excerpt, 0, 120 ) ) . '...';
    //$desc = $product['post_excerpt'];
  //  $postImage = get_image('large');
}

//print_r('post image: ' . $postImage);

if( $fullWidth == true ){
    if( get_field('customize_content') ){
        $customTitle    = get_field('custom_title');
        $customDesc     = get_field('custom_description');
        $customLinkText = get_field('link_text');
        $customLinkURL  = get_field('link_url');
        $customImage    = get_field('custom_image');

        if( $customTitle ){ $title = $customTitle; }
        if( $customDesc ){ $desc = $customDesc; }
        if( $customLinkText ){ $linkText = $customLinkText; }
        if( $customLinkURL ){ $linkURL = $customLinkURL; }
        if( $customImage ){
            $postImage = $customImage;
            $srcSet = '<img width="2080" height="1544" src="' . $postImage['url'] . '" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="' . $postImage['name'] . '" srcset="' . $postImage['sizes']['gopc-small'] . ' 300w, ' . $postImage['sizes']['gopc-large'] . ' 1024w,' . $postImage['sizes']['medium'] . ' 400w, ' . $postImage['sizes']['gopc-medium'] . ' 600w, ' . $postImage['sizes']['gopc-extralarge'] . ' 1200w, ' . $postImage['sizes']['gopc-fullbleed'] . ' 1600w, ' . $postImage['sizes']['full-size'] . '" sizes="(max-width: 2080px) 100vw, 2080px">';
            $postImage = $srcSet;
        }
    }
}else if( $item['customize_content'] ){

    if( $item['custom_title'] ){ $title = $item['custom_title']; }
    if( $item['custom_description'] ){ $desc = $item['custom_description']; }
    if( $item['link_text'] ){ $linkText = $item['link_text']; }
    if( $item['link_url'] ){ $linkURL = $item['link_url']; }
    if( $item['custom_image' ] ){
        $postImage = $item['custom_image'];
        $srcSet = '<img width="2080" height="1544" src="' . $postImage['url'] . '" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="' . $postImage['name'] . '" srcset="' . $postImage['sizes']['gopc-small'] . ' 300w, ' . $postImage['sizes']['gopc-large'] . ' 1024w,' . $postImage['sizes']['medium'] . ' 400w, ' . $postImage['sizes']['gopc-medium'] . ' 600w, ' . $postImage['sizes']['gopc-extralarge'] . ' 1200w, ' . $postImage['sizes']['gopc-fullbleed'] . ' 1600w, ' . $postImage['sizes']['full-size'] . '" sizes="(max-width: 2080px) 100vw, 2080px">';
        $postImage = $srcSet;
    }
}
?>
