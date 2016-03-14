<?php
if( get_field('content') != null ){

		$content = get_field('content');
		$postCount = 0;

		foreach($content as $section){
			//print_r($section);
			$layout = $section['acf_fc_layout'];
			$title = $section['section-title'];
			$post = $section['post'];
			$posts = $section['posts'];

			if( $title != null ){
				echo '<h2 class="section-header">' . esc_html( $title ) . '</h2>';
			}

			switch ( $layout ){

				// ------ PROMOS ------
				case 'full-width-promo':

					if( $section['no-margin'] == true ){
						$class = 'no-margin-top';
					}

					$textPosition = $section['text-position'];

                    if( $post->post_type == 'product'){
                        $product = wc_get_product();
                        $postImage = $product->get_image_id();

                    }

					echo '<div class="full-width promo bg-image ' . $class . '" id="post-' . $postCount . '">';
					echo '<a href="' . esc_url( get_the_permalink( $post->ID ) ) . '">';
					echo '<style>#post-' . $postCount . '{ ' . $postImage . ' } </style>';
					echo '<div class="promo-content ' . $textPosition . '">';
					echo '<h2>' . esc_html( get_the_title( $post->ID ) ) . '</h2>';
					echo esc_html( get_the_content( $post->ID ) );
					echo '<a class="button" href="' . esc_url( get_the_permalink( $post->ID ) ) . '">' . 'Button Text Here' . ' &rarr;</a>';
					echo '</div><!--.promo-content-->';
					echo '</a>';
					echo '</div><!--.full-width.promo-->';
					break;

				case 'half-width-promo':

					foreach( $posts as $item ){
						$post = $item['post'];
						$bgcolor = 'bg-' . $item['text_background_color'];
						echo '<div class="half-width promo" id="post-' . $postCount . '">';
						echo '<a href="' . esc_url( get_the_permalink( $post->ID) ) . '">';
						gopc_imagesizer( '#post-' . $postCount );
						echo '<div class="promo-content ' . $bgcolor . '">';
						echo '<h3>' . esc_html( get_the_title( $post->ID ) ) . '</h3>';
						echo esc_html( get_the_content( $post->ID ) );
						echo '</div><!--.promo-content-->';
						echo '</a>';
						echo '</div><!--.half-width.promo-->';
					}
					break;

				case 'quarter-width-promo':

					foreach( $posts as $item ){
						$post = $item['post'];
						echo '<div class="quarter-width promo" id="post-' . $postCount . '">';
						echo '<a href="' . esc_url( get_the_permalink( $post->ID) ) . '">';
						gopc_imagesizer( '#post-' . $postCount );
						echo '<div class="promo-content">';
						echo '<h3>' . esc_html( get_the_title( $post->ID ) ) . '</h3>';
						echo esc_html( get_the_content( $post->ID ) );
						echo '</div><!--.promo-content-->';
						echo '</a>';
						echo '</div><!--.quarter-width.promo-->';
					}
					break;

				// ------- MENUS --------

				case 'inline-menu':

					echo '<div class="inline-menu">';
					echo '<h3>' . $section['menu-title'] . '</h3>';
					echo '<ul>';
					foreach( $section['menu-items'] as $item ){
						echo '<li><a href="' . $item['post-link'] . '">' . $item['label'] . '</a></li>';
					}
					echo '</ul>';
					echo '</div><!--.product-landing-menu-->';
					break;


			}

			$postCount++;

		}
	}else{
		the_content();
	}
?>
