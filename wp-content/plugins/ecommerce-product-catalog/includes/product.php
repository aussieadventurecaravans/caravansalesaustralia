<?php

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Manages product post type
 *
 * Here all product fields are defined.
 *
 * @version        1.1.1
 * @package        ecommerce-product-catalog/includes
 * @author        impleCode
 */
class ic_product {

	public $ID, $post;

	function __construct( $product_id = null, $post = null ) {
		if ( empty( $product_id ) && empty( $post ) ) {
			$product_id = ic_get_product_id();
		}
		if ( !empty( $product_id ) && empty( $post ) ) {
			$post = get_post( $product_id );
		}
		if ( is_ic_product( $product_id ) ) {
			$this->ID	 = $product_id;
			$this->post	 = $post;
		}
	}

	/**
	 * Returns product name
	 *
	 * @return string
	 */
	function name() {
		$name = get_the_title( $this->ID );
		return apply_filters( 'ic_product_name', $name, $this->ID );
	}

	function archive_price_html() {
		if ( empty( $this->post ) ) {
			return '';
		}
		$archive_price = apply_filters( 'archive_price_filter', '', $this->post );
		return $archive_price;
	}

	/**
	 * Returns product description
	 *
	 * @return string
	 */
	function description() {
		$product_desc = $this->post->post_content;
		return apply_filters( 'get_product_description', $product_desc, $this->ID );
	}

	/**
	 * Returns product short description
	 *
	 * @return string
	 */
	function short_description() {
		$product_desc = '';
		if ( !empty( $this->post->post_excerpt ) ) {
			$product_desc = $this->post->post_excerpt;
		}
		return apply_filters( 'get_product_short_description', $product_desc, $this->ID );
	}

	function url() {
		$permalink = get_permalink( $this->ID );
		return apply_filters( 'ic_product_url', $permalink, $this->ID );
	}

	function image_html( $show_default = true ) {
		$product_image = ic_get_global( $this->ID . "_product_image" );
		if ( $product_image ) {
			return $product_image;
		}
		do_action( 'ic_before_get_image_html', $this->ID );
		if ( has_post_thumbnail( $this->ID ) ) {
			$image_size	 = apply_filters( 'product_image_size', 'product-page-image' );
			$attr		 = 'itemprop=image';
			if ( is_ic_magnifier_enabled() && is_ic_product_page() ) {
				$attr	 .= '&class=attachment-product-page-image size-product-page-image ic_magnifier';
				$attr	 .= '&data-zoom-image=' . $this->image_url();
			}
			$product_image = get_the_post_thumbnail( $this->ID, $image_size, $attr );
		} else if ( $show_default ) {
			$single_options = get_product_page_settings();
			if ( $single_options[ 'enable_product_gallery_only_when_exist' ] != 1 ) {
				$product_image = default_product_thumbnail();
			}
		}
		$product_image = apply_filters( 'ic_get_product_image', $product_image, $this->ID );
		ic_save_global( $this->ID . "_product_image", $product_image );
		return $product_image;
	}

	function listing_image_html() {
		$image_html = ic_get_global( 'ic_listing_image_html_' . $this->ID );
		if ( !empty( $image_html ) ) {
			return $image_html;
		} else {
			$image_html = apply_filters( 'ic_listing_image_html_' . $this->ID, '', $this->ID );
		}
		if ( empty( $image_html ) ) {
			$image_html = $this->image_html();
		}
		ic_save_global( 'ic_listing_image_html_' . $this->ID, $image_html );
		return $image_html;
	}

	function image_url() {
		if ( is_ic_magnifier_enabled() ) {
			$size = 'full';
		} else {
			$size = 'large';
		}
		$img_url = wp_get_attachment_image_src( $this->image_id(), $size );
		if ( !$img_url ) {
			$img_url[ 0 ] = default_product_thumbnail_url();
		}
		return $img_url[ 0 ];
	}

	function image_id() {
		return get_post_thumbnail_id( $this->ID );
	}

}
