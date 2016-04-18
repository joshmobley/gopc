<?php
        $postImage = get_the_post_thumbnail();

        include('activities-default-photos.php');

        if( $postImage == null ){

            $activities = wp_get_post_terms( $post->ID, 'activities' );

            if( $activities[0]['slug'] == 'paddle-act'){
                $postImage = wp_get_attachment_image_src( $paddleImg[$paddleCount], 'thumbnail' );
                $paddleCount++;
            }elseif( $activities[0]['slug'] == 'hiking-act'){
                $postImage = wp_get_attachment_image_src( $campImg[$campCount], 'thumbnail' );
                $campCount++;
            }elseif( $activities[0]['slug'] == 'climb-act'){
                $postImage = wp_get_attachment_image_src( $climbImg[$climbCount], 'thumbnail' );
                $climbCount++;
            }elseif( $activities[0]['slug'] == 'travel-act'){
                $postImage = wp_get_attachment_image_src( $travelImg[$travelCount], 'thumbnail' );
                $travelCount++;
            }elseif( $activities[0]['slug'] == 'fish-act' ){
                $postImage = wp_get_attachment_image_src( $fishImg[$fishCount], 'thumbnail' );
                $fishCount++;
            }else{
                $postImage = wp_get_attachment_image_src( $generalImg[$generalCount], 'thumbnail' );
                $generalCount++;
            }

        }
        ?>