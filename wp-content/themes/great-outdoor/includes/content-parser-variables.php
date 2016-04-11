<?php

$title = get_the_title( $post->ID );
if( get_the_excerpt( $post->ID ) != null ){
    $desc = strip_tags( get_the_excerpt( $post->ID ) );
}else{
    $desc = strip_tags( substr( $post->post_content, 0, 85 ) ). '...';
}
$linkText = 'Read More';
$linkURL = get_the_permalink( $post->ID );
$imageID = get_post_thumbnail_id($post->ID);
gopc_bgimageID( $imageID, '#bg-' . $postCount );

if( $automate != true ){
    if( $fullWidth == true ){

        if( $section['customize_content'] ){

            $customTitle    = $section['custom_title'];
            $customDesc     = $section['custom_description'];
            $customLinkText = $section['custom_link_text'];
            $customLinkURL  = $section['custom_link_url'];
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
        if( $item['link_text'] ){ $linkText = $item['custom_link_text']; }
        if( $item['link_url'] ){ $linkURL = $item['custom_link_url']; }
        if( $item['custom_image'] ){
            gopc_bgimage( $item['custom_image'], '#bg-' . $postCount );
        }
    }
}



?>
