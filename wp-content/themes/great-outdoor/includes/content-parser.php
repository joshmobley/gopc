<?php
if( get_field('content') != null ){

		$content = get_field('content');
		$postCount = 0;

		foreach($content as $section){
			$layout = $section['acf_fc_layout'];
			$title = $section['section_title'];
			$post = $section['post'];
			$posts = $section['posts'];
            $automate = $section['automate_content'];
            if( $automate == true ){
                $category = $section['automated_category'];
            }
            $fullWidth = false;

			if( $title != null && $layout != 'full-width-promo' ){
                echo '<h2 class="section-header">' . esc_html( $title ) . '</h2>';
			}

			switch ( $layout ){

				// ------ PROMOS ------
				case 'full-width-promo':

                    $fullWidth = true;

                    echo '<div class="page-section">';

                    $sectionTitle = $title;

                    include( 'content-parser-variables.php' );

					if( $section['no_margin'] == '1' ){
						$class = 'no-margin-top page-header bg-image';
					}else{
                        $class = '';
                    }

					$textPosition = $section['text_position'];

					echo '<div class="full-width promo ' . $class . '" id="post-' . $postCount . '">';
                    if( $sectionTitle != null ){
                        echo '<h2 class="section-header">' . esc_html( $sectionTitle ) . '</h2>';
                    }

					echo '<a href="' . esc_url( $linkURL ) . '">';
                    echo '<div id="bg-' . $postCount . '" class="promo-bg-image" ></div>';
					echo '<div class="promo-content ' . $textPosition . '">';
					echo '<h2>' . esc_html( $title ) . '</h2>';
					echo '<p>' . esc_html( $desc . '...') . '</p>';
					echo '<a class="button" href="' . esc_url( $linkURL ) . '">' . $linkText . ' &rarr;</a>';
					echo '</div><!--.promo-content-->';
					echo '</a>';
					echo '</div><!--.full-width.promo-->';
                    echo '</div><!--.page-section-->';
                    $postCount++;
					break;

				case 'half-width-promo':

                    echo '<div class="page-section half-container">';

					foreach( $posts as $item ){

                        $post = $item['post'];

                        include( 'content-parser-variables.php' );

						$bgcolor = 'bg-' . $item['text_background_color'];
						echo '<div class="half-width promo" id="post-' . $postCount . '">';
						echo '<a href="' . esc_url( $linkURL ) . '">';
                        echo '<div id="bg-' . $postCount . '" class="promo-bg-image" ></div>';
						echo '<div class="promo-content ' . $bgcolor . '">';
						echo '<h3>' . esc_html( $title ) . '</h3>';
						echo '<p>' . esc_html( $desc ) . '</p>';
						echo '</div><!--.promo-content-->';
						echo '</a>';
						echo '</div><!--.half-width.promo-->';
                        $postCount++;
					}

                    echo '</div><!--.page-section-->';

					break;

				case 'quarter-width-promo':

                    echo '<div class="page-section quarter-container">';

                    if( $automate == true ){

                        foreach( $category as $catID ){
                            $catList .= $catID . ',';
                        }

                        $automate_args = array(
                            'post_type' => 'product',
                            'posts_per_page' => 4,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'tag_ID',
                                    'terms' => array($catList)
                                )
                            )

                        );

                        $posts = new WP_Query( $automate_args );

                        while ( $posts->have_posts() ) {
                            $posts->the_post();

                            include( 'content-parser-variables.php' );

                            echo '<div class="quarter-width promo" id="post-' . $postCount . '">';
                            echo '<a href="' . esc_url( $linkURL ) . '">';
                            echo '<div id="bg-' . $postCount . '" class="promo-bg-image" ></div>';
                            echo '<div class="promo-content">';
                            echo '<h3>' . esc_html( $title ) . '</h3>';
                            echo '<p>' . esc_html( $desc ) . '</p>';
                            echo '</div><!--.promo-content-->';
                            echo '</a>';
                            echo '</div><!--.quarter-width.promo-->';
                            $postCount++;
                        }



                    }else{
                        foreach( $posts as $item ){

                            $post = $item['post'];

                            include( 'content-parser-variables.php' );

                            echo '<div class="quarter-width promo" id="post-' . $postCount . '">';
                            echo '<a href="' . esc_url( $linkURL ) . '">';
                            echo '<div id="bg-' . $postCount . '" class="promo-bg-image" ></div>';
                            echo '<div class="promo-content">';
                            echo '<h3>' . esc_html( $title ) . '</h3>';
                            echo '<p>' . esc_html( $desc ) . '</p>';
                            echo '</div><!--.promo-content-->';
                            echo '</a>';
                            echo '</div><!--.quarter-width.promo-->';
                            $postCount++;
                        }
                    }



                    echo '</div><!--.page-section-->';

					break;

				// ------- MENUS --------

                case 'wysiwyg':

                    echo '<div class="page-section wysiwyg">';
                    if( $section['add_photos_or_videos'] == true ){ echo '<div class="half-width">'; }
                    echo $section['content'];
                    if( $section['add_photos_or_videos'] == true ){
                        echo '</div><div class="half-width">';
                        print_r($section['add_media']);
                        foreach( $section['add_media'] as $media ){
                            if( $media['choose_format'] == 'image' ){
                                gopc_image($media['image']);
                            }else{
                                '<iframe width="100%" src="' . $media['video'] . '" />';
                            }
                        }


                    echo '</div>';

                    break;

				case 'inline-menu':

					echo '<div class="inline-menu">';
					echo '<h3>' . $section['menu_title'] . '</h3>';
					echo '<ul>';
					foreach( $section['menu_items'] as $item ){
						echo '<li><a href="' . get_term_link( $item['post_link'], 'product_cat' ) . '">' . $item['label'] . '</a></li>';
                        $postCount++;
					}
					echo '</ul>';
					echo '</div><!--.product-landing-menu-->';
					break;

                case 'activity-menu':

                    echo '<div class="adventure-menu">';
                    echo '<h2>What&rsquo;s your adventure? <span>Destinations, expert advice, stories, meetups, &amp; more</span></h2>';
                    echo '<ul>';
                    echo '<li><a href="' . get_bloginfo('url') . '/shop/camp-hike" class="camp">Camp/Hike</a></li>';
                    echo '<li><a href="' . get_bloginfo('url') . '/shop/climb" class="climb">Climb</a></li>';
                    echo '<li><a href="' . get_bloginfo('url') . '/shop/fish" class="fish">Fish</a></li>';
                    echo '<li><a href="' . get_bloginfo('url') . '/shop/paddle" class="paddle">Paddle</a></li>';
                    echo '<li><a href="' . get_bloginfo('url') . '/shop/travel" class="travel">Travel</a></li>';
                    echo '</ul>';
                    echo '</div>';

                    break;

			}

		}
	}else{
		the_content();
	}
?>
