<?php
/*
Plugin Name: RBCM Top 100 Image Slider
Plugin URI: http://sumobi.com/shop/easy-image-gallery/
Description: Minorly tweaked by Scott @ thenumber! Now dependent on the top 100 theme & scripts to function.
Version: 1.0.4
Author: Andrew Munro, Sumobi (and Scott)
Author URI: http://sumobi.com
License: GPL-2.0+
License URI: http://www.opensource.org/licenses/gpl-license.php
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'Easy_Image_Gallery' ) ) {

	/**
	 * PHP5 constructor method.
	 *
	 * @since 1.0
	*/
	class Easy_Image_Gallery {

		public function __construct() {
			add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
			add_action( 'plugins_loaded', array( $this, 'constants' ));
			add_action( 'plugins_loaded', array( $this, 'includes' ) );
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'easy_image_gallery_plugin_action_links' );
		}


		/**
		 * Internationalization
		 *
		 * @since 1.0
		*/
		public function load_textdomain() {
			load_plugin_textdomain( 'easy-image-gallery', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		}


		/**
		 * Constants
		 *
		 * @since 1.0
		*/
		public function constants() {

			if ( !defined( 'EASY_IMAGE_GALLERY_DIR' ) )
				define( 'EASY_IMAGE_GALLERY_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

			if ( !defined( 'EASY_IMAGE_GALLERY_URL' ) )
			    define( 'EASY_IMAGE_GALLERY_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );

			if ( ! defined( 'EASY_IMAGE_GALLERY_VERSION' ) )
			    define( 'EASY_IMAGE_GALLERY_VERSION', '1.0.4' );

			if ( ! defined( 'EASY_IMAGE_GALLERY_INCLUDES' ) )
			    define( 'EASY_IMAGE_GALLERY_INCLUDES', EASY_IMAGE_GALLERY_DIR . trailingslashit( 'includes' ) );

		}


		/**
		* Loads the initial files needed by the plugin.
		*
		* @since 1.0
		*/
		public function includes() {

			require_once( EASY_IMAGE_GALLERY_INCLUDES . 'template-functions.php' );
			require_once( EASY_IMAGE_GALLERY_INCLUDES . 'scripts.php' );
			require_once( EASY_IMAGE_GALLERY_INCLUDES . 'metabox.php' );
			require_once( EASY_IMAGE_GALLERY_INCLUDES . 'admin-page.php' );
			
		}

		

	}
}

$Easy_Image_Gallery = new Easy_Image_Gallery();