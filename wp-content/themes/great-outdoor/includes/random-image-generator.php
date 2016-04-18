<?php
        $postImage = get_the_post_thumbnail();

        include('activities-default-photos.php');

        if( $postImage == null ){

            $activityObj = wp_get_post_terms( $post->ID, 'activities' );

            if( $activities[0]->slug == 'paddle-act'){
                $key = array_rand( $paddleImgHistory, 1);
                $selected = $paddleImgHistory[$key];
                unset( $paddleImgHistory[$key]);
                $postImage = wp_get_attachment_image_src( $selected, 'medium' );
                $postImage = '<img src="' . $postImage . '" />';
                $paddleCount++;
            }elseif( $activities[0]->slug == 'hiking-act'){
                $key = array_rand( $campImgHistory, 1);
                $selected = $campImgHistory[$key];
                unset( $campImgHistory[$key]);
                $postImage = wp_get_attachment_image_src( $selected, 'medium' );
                $postImage = '<img src="' . $postImage . '" />';
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
                $key = array_rand( $generalImgHistory, 1);
                $selected = $generalImgHistory[$key];
                unset( $generalImgHistory[$key]);
                $postImage = wp_get_attachment_image_src( $selected, 'medium' );
                $postImage = '<img src="' . $postImage . '" />';
                $generalCount++;
            }

        }
        ?>
