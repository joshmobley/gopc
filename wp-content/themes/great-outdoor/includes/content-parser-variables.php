<?php

$title = get_the_title( $post->ID );
$desc = substr( $post->post_content, 0, 150 ) . '...';
$linkText = 'Read More';
$linkURL = get_the_permalink( $post->ID );

if( $post->post_type == 'product'){
    $product = wc_get_product();
    $postImage = get_image('large');
}else{
    $postImage = get_the_post_thumbnail($post->ID);
}

if( $postImage == null ){
    $postImage = '<img src="http://placehold.it/1500x1000" />';
}

if( $item['customize_content'] ){

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
