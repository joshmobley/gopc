<?php

	class WC_Prdctfltr_Shortcodes {

		public static function init() {
			$class = __CLASS__;
			new $class;
		}

		function __construct() {

			add_shortcode( 'prdctfltr_sc_products', __CLASS__ . '::prdctfltr_sc_products' );
			add_shortcode( 'prdctfltr_sc_get_filter', __CLASS__ . '::prdctfltr_sc_get_filter' );

			add_action( 'woocommerce_before_subcategory', __CLASS__. '::add_category_support', 10, 1 );

			add_action( 'wp_ajax_nopriv_prdctfltr_respond', __CLASS__ . '::prdctfltr_respond' );
			add_action( 'wp_ajax_prdctfltr_respond', __CLASS__ . '::prdctfltr_respond' );

		}

		public static function add_category_support( $category ) {

			echo '<span class="prdctfltr_cat_support" style="display:none!important;" data-slug="' . $category->slug . '"></span>';

		}

		public static function get_categories() {

			global $wp_query, $prdctfltr_global;

			$defaults = array(
				'before'        => '',
				'after'         => '',
				'force_display' => false
			);

			$args = array();

			$args = wp_parse_args( $args, $defaults );

			extract( $args );

			$selected_term = isset( $prdctfltr_global['active_taxonomies']['product_cat'][0] ) ? $prdctfltr_global['active_taxonomies']['product_cat'][0] : '';

			if ( $selected_term !== '' ) {
				if ( term_exists( $selected_term, 'product_cat' ) ) {
					$term = get_term_by( 'slug', $selected_term, 'product_cat' );
				}
			}
			if ( !isset( $term ) ) {
				$term = (object) array( 'term_id' => 0 );
			}

			$parent_id = ( $term->term_id == 0 ? 0 : $term->term_id );

/*			if ( $term->term_id !== 0 ) {
				$display_type = get_woocommerce_term_meta( $term->term_id, 'display_type', true );

				switch ( $display_type ) {
					case 'products' :
						return;
					break;
					case '' :
						if ( get_option( 'woocommerce_category_archive_display' ) == '' ) {
							return;
						}
					break;
				}
			}*/

			$product_categories = get_categories( apply_filters( 'woocommerce_product_subcategories_args', array(
				'parent'       => $parent_id,
				'menu_order'   => 'ASC',
				'hide_empty'   => 0,
				'hierarchical' => 1,
				'taxonomy'     => 'product_cat',
				'pad_counts'   => 1
			) ) );

/*			if ( ! apply_filters( 'woocommerce_product_subcategories_hide_empty', false ) ) {
				$product_categories = wp_list_filter( $product_categories, array( 'count' => 0 ), 'NOT' );
			}*/

			if ( $product_categories ) {
				echo $before;

				foreach ( $product_categories as $category ) {
					wc_get_template( 'content-product_cat.php', array(
						'category' => $category
					) );
				}

				if ( $term->term_id !== 0 ) {
					$display_type = get_woocommerce_term_meta( $term->term_id, 'display_type', true );

					switch ( $display_type ) {
						case 'subcategories' :
							$wp_query->post_count    = 0;
							$wp_query->max_num_pages = 0;
						break;
						case '' :
							if ( get_option( 'woocommerce_category_archive_display' ) == 'subcategories' ) {
								$wp_query->post_count    = 0;
								$wp_query->max_num_pages = 0;
							}
						break;
					}
				}

				if ( $term->term_id == 0 && get_option( 'woocommerce_shop_page_display' ) == 'subcategories' ) {
					$wp_query->post_count    = 0;
					$wp_query->max_num_pages = 0;
				}

				echo $after;

				return true;
			}

		}

		public static function prdctfltr_sc_products( $atts, $content = null ) {

			extract( shortcode_atts( array(
				'preset' => '',
				'rows' => 4,
				'columns' => 4,
				'cat_columns' => 4,
				'fallback_css' => 'no',
				'ajax' => 'no',
				'pagination' => 'yes',
				'use_filter' => 'yes',
				'no_products' => 'no',
				'show_categories' => 'no',
				'show_products' => 'yes',
				'min_price' => '',
				'max_price' => '',
				'orderby' => '',
				'order' => '',
				'product_cat'=> '',
				'product_tag'=> '',
				'product_characteristics'=> '',
				'product_attributes'=> '',
				'sale_products' => '',
				'instock_products' => '',
				'http_query' => '',
				'disable_overrides' => 'yes',
				'action' => '',
				'bot_margin' => 36,
				'class' => '',
				'shortcode_id' => ''
			), $atts ) );


			$query_args = array();

			$paged = isset( $_GET['paged'] ) ? intval( $_GET['paged'] ) : get_query_var('paged');

			if ( $no_products == 'no' ) {
				$query_args = $query_args + array (
					'prdctfltr' => 'active'
				);
			}
			else {
				$use_filter = 'no';
				$pagination = 'no';
				$orderby = 'rand';
			}

			global $prdctfltr_global;

			if ( $action !== '' ) {
				$prdctfltr_global['action'] = $action;
			}
			else {
				$prdctfltr_global['action'] = '';
			}
			if ( $preset !== '' ) {
				$prdctfltr_global['preset'] = $preset;
			}
			else {
				$prdctfltr_global['preset'] = '';
			}

			if ( $disable_overrides !== '' ) {
				$prdctfltr_global['disable_overrides'] = $disable_overrides;
			}
			else {
				$prdctfltr_global['disable_overrides'] = '';
			}

			$query_args = $query_args + array (
				'prdctfltr' 			=> 'active',
				'post_type' 			=> 'product',
				'post_status' 			=> 'publish',
				'posts_per_page' 		=> $columns*$rows,
				'paged' 				=> $paged,
				'wc_query' 				=> 'product_query',
				'meta_query' 			=> array(
					array(
						'key' 			=> '_visibility',
						'value' 		=> array('catalog', 'visible'),
						'compare' 		=> 'IN'
					)
				)
			);

			$args = array();

			if ( $orderby !== '' ) {
				$args['orderby'] = $orderby;
			}
			if ( $order !== '' ) {
				$args['order'] = $order;
			}
			if ( $min_price !== '' ) {
				$args['min_price'] = $min_price;
			}
			if ( $max_price !== '' ) {
				$args['max_price'] = $max_price;
			}
			if ( $product_cat !== '' ) {
				$args['product_cat'] = $product_cat;
			}
			if ( $product_tag !== '' ) {
				$args['product_tag'] = $product_tag;
			}
			if ( $product_characteristics !== '' ) {
				$args['characteristics'] = $product_characteristics;
			}
			if ( $instock_products !== '' ) {
				$args['instock_products'] = $instock_products;
			}
			if ( $sale_products !== '' ) {
				$args['sale_products'] = $sale_products;
			}
			if ( $http_query !== '' ) {
				$args['http_query'] = $http_query;
			}

			if ( $ajax == 'yes' ) {
				$add_ajax = ' data-page="' . $paged . '"';

				$prdctfltr_global['ajax_js'] = $atts;
				$prdctfltr_global['sc_ajax'] = true;
			}

			$prdctfltr_global['sc_query'] = $args;

			$bot_margin = (int)$bot_margin;
			$margin = " style='margin-bottom:".$bot_margin."px'";

			$out = '';

			if ( isset( $prdctfltr_global['unique_id'] ) ) {
				$prdctfltr_id = $prdctfltr_global['unique_id'];
				$prdctfltr_global['filter_js'][$prdctfltr_id]['args'] = $args;
				$prdctfltr_global['filter_js'][$prdctfltr_id]['atts'] = $atts;
			}
			else {
				$prdctfltr_id = uniqid( 'prdctfltr-' );
				$prdctfltr_global['unique_id'] = $prdctfltr_id;
				$prdctfltr_global['filter_js'][$prdctfltr_id]['args'] = $args;
				$prdctfltr_global['filter_js'][$prdctfltr_id]['atts'] = $atts;
			}

			global $woocommerce, $woocommerce_loop, $wp_query, $wp_the_query;
			
			$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

			$products = new WP_Query( array_merge( $query_args, $args ) );

			ob_start();

			if ( $use_filter == 'yes' ) {
				include( WC_Prdctfltr::$dir . 'woocommerce/loop/product-filter.php' );
			}

			if ( $products->have_posts() ) :

				if ( $show_products == 'yes' ) {

					woocommerce_product_loop_start();

					if ( $show_categories == 'yes' ) {
						if ( isset( $atts['cat_columns'] ) ) {
							$woocommerce_loop['columns'] = $cat_columns;
						}
						self::get_categories();
					}

					while ( $products->have_posts() ) : $products->the_post();

						if ( isset( $atts['columns'] ) ) {
							$woocommerce_loop['columns'] = $columns;
						}

						wc_get_template_part( 'content', 'product' );

					endwhile;

					woocommerce_product_loop_end();

					}
					else {
						$pagination = 'no';
					}

			else :
				include( WC_Prdctfltr::$dir . 'woocommerce/loop/product-filter-no-products-found.php' );
			endif;

			$shortcode = ob_get_clean();

			$out .= '<div' . ( $shortcode_id != '' ? ' id="' . $shortcode_id.'"' : '' ) . ' class="prdctfltr_sc_products woocommerce' . ( $ajax=='yes'? ' prdctfltr_ajax' : '' ) . ( $fallback_css == 'yes' ? ' prdctfltr_fallback_css prdctfltr_columns_fallback_' . $columns : '' ) . ( $class != '' ? ' '.$class.'' : '' ) . '"' . $margin . ( $ajax == 'yes' ? $add_ajax : '' ) . '>';
			$out .= do_shortcode($shortcode);

			if ( $pagination == 'yes' ) {

				global $wp_the_query;
				$wp_query->max_num_pages = $products->max_num_pages;

				if ( $ajax == 'yes' ) {
					add_filter( 'woocommerce_pagination_args', array( 'WC_Prdctfltr', 'prdctfltr_pagination_filter' ), 999, 1 );
				}

				ob_start();

				wc_get_template( 'loop/pagination.php' );

				$pagination = ob_get_clean();

				if ( $ajax == 'yes' ) {
					remove_filter( 'woocommerce_pagination_args', array( 'WC_Prdctfltr', 'prdctfltr_pagination_filter' ), 999 );
				}

				$out .= $pagination;
			}

			$out .= '</div>';

			wp_reset_postdata();
			wp_reset_query();

			return $out;

		}

		public static function prdctfltr_respond() {

			global $prdctfltr_global, $woocommerce, $woocommerce_loop, $wp_the_query, $wp_query, $products;

			$prdctfltr_global['unique_id'] = isset( $_POST['pf_id'] ) ? $_POST['pf_id'] : uniqid( 'prdctfltr-' );

			if ( empty( $_POST['pf_shortcode'] ) ) {
				$preset = '';
				$columns = floatval( WC_Prdctfltr::$settings['wc_settings_prdctfltr_ajax_columns'] ) > 0 ? floatval( WC_Prdctfltr::$settings['wc_settings_prdctfltr_ajax_columns'] ) : apply_filters( 'loop_shop_columns', 4 );
				$rows = floatval( WC_Prdctfltr::$settings['wc_settings_prdctfltr_ajax_rows'] ) > 0 ? floatval( WC_Prdctfltr::$settings['wc_settings_prdctfltr_ajax_rows'] ) : 4;
				$pagination = 'yes';
				$no_products = '';
				$show_products = 'yes';
				$use_filter = ( isset( $prdctfltr_global['widget_search'] ) ? 'no' : 'yes' );
				$action = '';
				$bot_margin = '';
				$class = '';
				$shortcode_id = '';
				$disable_overrides = '';
				$show_categories = 'archive';
				$cat_columns = '';
				$fallback_css = 'no';
			}
			else {
				extract( shortcode_atts( array(
					'preset' => '',
					'rows' => 4,
					'columns' => 4,
					'cat_columns' => 4,
					'fallback_css' => 'no',
					'ajax' => 'no',
					'pagination' => 'yes',
					'use_filter' => 'yes',
					'no_products' => 'no',
					'show_categories' => 'no',
					'show_products' => 'yes',
					'min_price' => '',
					'max_price' => '',
					'orderby' => '',
					'order' => '',
					'product_cat'=> '',
					'product_tag'=> '',
					'product_characteristics'=> '',
					'product_attributes'=> '',
					'sale_products' => '',
					'instock_products' => '',
					'http_query' => '',
					'disable_overrides' => 'yes',
					'action' => '',
					'bot_margin' => 36,
					'class' => '',
					'shortcode_id' => ''
				), $_POST['pf_shortcode'] ) );
			}

			$page = ( isset( $_POST['pf_paged'] ) ? $_POST['pf_paged'] : $_POST['pf_page'] );
/*
			if ( isset( $_POST['pf_add'] ) ) {
				$prdctfltr_global['filter_js'][$prdctfltr_global['unique_id']]['add'] = $_POST['pf_add'];
			}*/

			$qargs = $_POST['pf_query'];

			$qargs['paged'] = $page;
			$qargs['posts_per_page'] = $columns*$rows;

			$ajax_query = http_build_query( $qargs );
/*
			$current_page = WC_Prdctfltr::prdctfltr_get_between( $ajax_query, 'paged=', '&' );

			$args = str_replace( 'paged=' . $current_page . '&', 'paged=' . $page . '&', $ajax_query );*/
			$args = str_replace( 'false', '0', $ajax_query );
			$args = str_replace( 'true', '1', $args );

			if ( $no_products == 'yes' ) {
				$use_filter = 'no';
				$pagination = 'no';
				$orderby = 'rand';
			}

			$add_ajax = ' data-page="' . $page . '"';

			$bot_margin = (int)$bot_margin;
			$margin = " style='margin-bottom:" . $bot_margin . "px'";

			$curr_filters = isset( $_POST['pf_filters'] ) && is_array( $_POST['pf_filters'] ) ? $_POST['pf_filters'] : array();

			if ( !isset( $prdctfltr_global['done_filters'] ) || $prdctfltr_global['done_filters'] !== true ) {
				WC_Prdctfltr::make_global( $curr_filters, 'AJAX' );
			}

			$prdctfltr_global['ajax_query'] = $args;

			$args = $args . '&prdctfltr=active';

			$prdctfltr_global['ajax_paged'] = $page;

			if ( $action !== '' ) {
				$prdctfltr_global['action'] = $action;
			}
			if ( $preset !== '' ) {
				$prdctfltr_global['preset'] = $preset;
			}
			if ( $disable_overrides !== '' ) {
				$prdctfltr_global['disable_overrides'] = $disable_overrides;
			}

			$out = '';

			$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $columns );

			$prdctfltr_global['ajax'] = true;
			$prdctfltr_global['sc_ajax'] = $_POST['pf_mode'] == 'no' ? 'no' : null;

			$products = new WP_Query( $args );

			$products->is_search = false;

/*			$wp_query = $products;
			$wp_the_query = $products;*/

			ob_start();

			if ( $use_filter == 'yes' && $_POST['pf_widget'] !== 'yes' ) {
				include( WC_Prdctfltr::$dir . 'woocommerce/loop/product-filter.php' );
			}

			if ( $products->have_posts() ) :

				if ( $show_products == 'yes' ) {

					woocommerce_product_loop_start();

					if ( isset( $prdctfltr_global['categories_active'] ) && $prdctfltr_global['categories_active'] === true ) {

						if ( $show_categories == 'archive' ) {
							if ( isset( $cat_columns ) ) {
								$woocommerce_loop['columns'] = $cat_columns;
							}
							woocommerce_product_subcategories();
						}
						else if ( $show_categories == 'yes' ) {
							if ( isset( $cat_columns ) ) {
								$woocommerce_loop['columns'] = $cat_columns;
							}
							self::get_categories();
						}

					}

					while ( $products->have_posts() ) : $products->the_post();

						if ( isset( $columns ) ) {
							$woocommerce_loop['columns'] = $columns;
						}

						wc_get_template_part( 'content', 'product' );

					endwhile;

					woocommerce_product_loop_end();

					}
					else {
						$pagination = 'no';
					}

			else :
				include( WC_Prdctfltr::$dir . 'woocommerce/loop/product-filter-no-products-found.php' );
			endif;

			$prdctfltr_global['ajax'] = null;

			$shortcode = str_replace( 'type-product', 'product type-product', ob_get_clean() );

			$out .= '<div' . ( $shortcode_id != '' ? ' id="'.$shortcode_id.'"' : '' ) . ' class="prdctfltr_sc_products woocommerce prdctfltr_ajax' . ( $fallback_css == 'yes' ? ' prdctfltr_fallback_css prdctfltr_columns_fallback_' . $columns : '' ) . ( $class != '' ? ' ' . $class . '' : '' ) . '"' . $margin . $add_ajax . '>';
			$out .= do_shortcode($shortcode);

			if ( $pagination == 'yes' ) {
				$wp_query = $products;
				ob_start();

				add_filter( 'woocommerce_pagination_args', array( 'WC_Prdctfltr', 'prdctfltr_pagination_filter' ), 999, 1 );
				wc_get_template( 'loop/pagination.php' );
				remove_filter( 'woocommerce_pagination_args', array( 'WC_Prdctfltr', 'prdctfltr_pagination_filter' ), 999 );

				$pagination = ob_get_clean();

				$out .= $pagination;

			}

			if ( $_POST['pf_widget'] == 'yes' && !isset( $_POST['pf_pag'] ) ) {

				if ( isset( $_POST['pf_widget_title'] ) ) {
					$curr_title = explode('%%%', $_POST['pf_widget_title']);
				}

				ob_start();

				the_widget( 'prdctfltr', 'preset=' . $_POST['pf_preset'] . '&template=' . $_POST['pf_template'], array( 'before_title' => stripslashes( $curr_title[0] ), 'after_title'=>stripslashes( $curr_title[1] ) ) );

				$out .= ob_get_clean();

			}

			$out .= '</div>';

			die( $out );
			exit;
		}

		public static function prdctfltr_sc_get_filter( $atts, $content = null ) {
			return include( WC_Prdctfltr::$dir . 'woocommerce/loop/orderby.php' );
		}

	}

	add_action( 'init', array( 'WC_Prdctfltr_Shortcodes', 'init' ), 999 );

?>