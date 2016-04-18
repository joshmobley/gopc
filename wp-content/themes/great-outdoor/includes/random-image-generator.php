<?php
        $postImage = get_the_post_thumbnail();

        include('activities-default-photos.php');

        if( $postImage == null ){

            $activityObj = wp_get_post_terms( $post->ID, 'activities' );

            if( $activities[0]->slug == 'paddle-act'){
                $postImage = wp_get_attachment_image_src( $paddleImg[$paddleCount], 'medium' );
                $postImage = '<img src="' . $postImage[0] . '" />';
                $paddleCount++;
            }elseif( $activities[0]->slug == 'hiking-act'){
                $postImage = wp_get_attachment_image_src( $campImg[$campCount], 'medium' );
                $postImage = '<img src="' . $postImage[0] . '" />';
                $campCount++;
            }elseif( $activities[0]->slug == 'climb-act'){
                $postImage = wp_get_attachment_image_src( $climbImg[$climbCount], 'medium' );
                $postImage = '<img src="' . $postImage[0] . '" />';
                $climbCount++;
            }elseif( $activities[0]->slug == 'travel-act'){
                $postImage = wp_get_attachment_image_src( $travelImg[$travelCount], 'medium' );
                $postImage = '<img src="' . $postImage[0] . '" />';
                $travelCount++;
            }elseif( $activities[0]->slug == 'fish-act' ){
                $postImage = wp_get_attachment_image_src( $fishImg[$fishCount], 'medium' );
                $postImage = '<img src="' . $postImage[0] . '" />';
                $fishCount++;
            }else{
                $postImage = wp_get_attachment_image_src( $generalImg[$generalCount], 'medium' );
                $postImage = '<img src="' . $postImage[0] . '" />';
                $generalCount++;
            }

        }
        ?>
