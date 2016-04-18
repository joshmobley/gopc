<?php
        $postImage = get_the_post_thumbnail();

        include('activities-default-photos.php');

        if( $postImage == null ){

            print_r('randomizer');

            print_r($post->ID);

            $activityObj = wp_get_post_terms( $post->ID, 'activities' );

           // $activityObj = wp_get_post_terms( $post->ID, 'activities' );
           // print_r( $activityObj);

            if( $activities[0]->slug == 'paddle-act'){
                $postImage = wp_get_attachment_image_src( $paddleImg[$paddleCount], 'thumbnail' );
                $postImage = '<img src="' . $postImage[0] . '" />';
                $paddleCount++;
            }elseif( $activities[0]->slug == 'hiking-act'){
                $postImage = wp_get_attachment_image_src( $campImg[$campCount], 'thumbnail' );
                $postImage = '<img src="' . $postImage[0] . '" />';
                $campCount++;
            }elseif( $activities[0]->slug == 'climb-act'){
                $postImage = wp_get_attachment_image_src( $climbImg[$climbCount], 'thumbnail' );
                $postImage = '<img src="' . $postImage[0] . '" />';
                $climbCount++;
            }elseif( $activities[0]->slug == 'travel-act'){
                $postImage = wp_get_attachment_image_src( $travelImg[$travelCount], 'thumbnail' );
                $postImage = '<img src="' . $postImage[0] . '" />';
                $travelCount++;
            }elseif( $activities[0]->slug == 'fish-act' ){
                $postImage = wp_get_attachment_image_src( $fishImg[$fishCount], 'thumbnail' );
                $postImage = '<img src="' . $postImage[0] . '" />';
                $fishCount++;
            }else{
                $postImage = wp_get_attachment_image_src( $generalImg[$generalCount], 'thumbnail' );
                $postImage = '<img src="' . $postImage[0] . '" />';
                $generalCount++;
            }

          print_r($postImage);

        }
        ?>
