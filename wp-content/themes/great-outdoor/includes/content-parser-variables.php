<?php

$title = get_the_title( $post->ID );
$desc = strip_tags( substr( $post->post_content, 0, 120 ) ). '...';
$linkText = 'Read More';
$linkURL = get_the_permalink( $post->ID );
$imageID = get_post_thumbnail_id($post->ID);
gopc_bgimageID( $imageID, '#bg-' . $postCount );



if( $post->post_type == 'product'){
    $product = wc_get_product();
    $desc = strip_tags( substr( $post->post_excerpt, 0, 120 ) ) . '...';
}

if( $fullWidth == true ){

    if( $section['customize_content'] ){

        $customTitle    = $section['custom_title'];
        $customDesc     = $section['custom_description'];
        $customLinkText = $section['link_text'];
        $customLinkURL  = $section['link_url'];
        $customImage    = $section['custom_image'];

        if( $customTitle ){ $title = $customTitle; }
        if( $customDesc ){ $desc = $customDesc; }
        if( $customLinkText ){ $linkText = $customLinkText; }
        if( $customLinkURL ){ $linkURL = $customLinkURL; }
        if( $customImage ){
            gopc_bgimage( $customImage, '#bg-' . $postCount );
        }
    }

}else if( $item['customize_content'] ){

    if( $item['custom_title'] ){ $title = $item['custom_title']; }
    if( $item['custom_description'] ){ $desc = $item['custom_description']; }
    if( $item['link_text'] ){ $linkText = $item['link_text']; }
    if( $item['link_url'] ){ $linkURL = $item['link_url']; }
    if( $item['custom_image'] ){
        gopc_bgimage( $item['custom_image'], '#bg-' . $postCount );
    }
}
?>
