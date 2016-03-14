<?php
if( get_field('content') != null ){

		$content = get_field('content');
		$postCount = 0;

		foreach($content as $section){
			$layout = $section['acf_fc_layout'];
			$title = $section['section_title'];
			$post = $section['post'];
			$posts = $section['posts'];

			if( $title != null ){
				echo '<h2 class="section-header">' . esc_html( $title ) . '</h2>';
			}





			switch ( $layout ){

				// ------ PROMOS ------
				case 'full-width-promo':

                    echo '<div class="page-section">';

                    include( 'content-parser-variables.php' );

					if( $section['no_margin'] == true ){
						$class = 'no-margin-top';
					}

					$textPosition = $section['text_position'];

					echo '<div class="full-width promo bg-image ' . $class . '" id="post-' . $postCount . '">';
					echo '<a href="' . esc_url( $linkURL ) . '">';
					echo $postImage;
					echo '<div class="promo-content ' . $textPosition . '">';
					echo '<h2>' . esc_html( get_the_title( $post->ID ) ) . '</h2>';
					echo '<p>' . esc_html( substr( $post->post_content, 0, 150 ) . '...') . '</p>';
					echo '<a class="button" href="' . esc_url( $linkURL ) . '">' . $linkText . ' &rarr;</a>';
					echo '</div><!--.promo-content-->';
					echo '</a>';
					echo '</div><!--.full-width.promo-->';
                    echo '</div><!--.page-section-->';
					break;

				case 'half-width-promo':

                    echo '<div class="page-section">';

					foreach( $posts as $item ){

                        $post = $item['post'];

                        include( 'content-parser-variables.php' );

						$bgcolor = 'bg-' . $item['text_background_color'];
						echo '<div class="half-width promo" id="post-' . $postCount . '">';
						echo '<a href="' . esc_url( $linkURL ) . '">';
						echo $postImage;
						echo '<div class="promo-content ' . $bgcolor . '">';
						echo '<h3>' . esc_html( $title ) . '</h3>';
						echo '<p>' . esc_html( $desc ) . '</p>';
						echo '</div><!--.promo-content-->';
						echo '</a>';
						echo '</div><!--.half-width.promo-->';
					}

                    echo '</div><!--.page-section-->';

					break;

				case 'quarter-width-promo':

                    echo '<div class="page-section">';

					foreach( $posts as $item ){

                        $post = $item['post'];

                        include( 'content-parser-variables.php' );

						echo '<div class="quarter-width promo" id="post-' . $postCount . '">';
						echo '<a href="' . esc_url( $linkURL ) . '">';
                        echo $postImage;
						echo '<div class="promo-content">';
						echo '<h3>' . esc_html( $title ) . '</h3>';
						echo '<p>' . esc_html( $desc ) . '</p>';
						echo '</div><!--.promo-content-->';
						echo '</a>';
						echo '</div><!--.quarter-width.promo-->';
					}

                    echo '</div><!--.page-section-->';

					break;

				// ------- MENUS --------

				case 'inline-menu':

					echo '<div class="inline-menu">';
					echo '<h3>' . $section['menu_title'] . '</h3>';
					echo '<ul>';
					foreach( $section['menu_items'] as $item ){
						echo '<li><a href="' . $item['post_link'] . '">' . $item['label'] . '</a></li>';
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