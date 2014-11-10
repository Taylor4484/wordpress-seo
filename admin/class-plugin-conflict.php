<?php

/**
 * @package Admin
 */

if ( ! defined( 'WPSEO_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

if ( ! class_exists( 'WPSEO_Plugin_Conflict' ) ) {

	class WPSEO_Plugin_Conflict extends Yoast_Plugin_Conflict {

		/**
		 * The plugins must be grouped per section.
		 *
		 * It's possible to check for each section if there are conflicting plugin
		 *
		 * @var array
		 */
		protected $plugins = array(
			// The plugin which are writing OG metadata
			'open_graph' => array(
				'2-click-socialmedia-buttons/2-click-socialmedia-buttons.php',

				// 2 Click Social Media Buttons
				'add-link-to-facebook/add-link-to-facebook.php',         // Add Link to Facebook
				'add-meta-tags/add-meta-tags.php',                       // Add Meta Tags
				'easy-facebook-share-thumbnails/esft.php',               // Easy Facebook Share Thumbnail
				'facebook/facebook.php',                                 // Facebook (official plugin)
				'facebook-awd/AWD_facebook.php',                         // Facebook AWD All in one
				'facebook-featured-image-and-open-graph-meta-tags/fb-featured-image.php',
				// Facebook Featured Image & OG Meta Tags
				'facebook-meta-tags/facebook-metatags.php',              // Facebook Meta Tags
				'wonderm00ns-simple-facebook-open-graph-tags/wonderm00n-open-graph.php',
				// Facebook Open Graph Meta Tags for WordPress
				'facebook-revised-open-graph-meta-tag/index.php',        // Facebook Revised Open Graph Meta Tag
				'facebook-thumb-fixer/_facebook-thumb-fixer.php',        // Facebook Thumb Fixer
				'facebook-and-digg-thumbnail-generator/facebook-and-digg-thumbnail-generator.php',
				// Fedmich's Facebook Open Graph Meta
				'header-footer/plugin.php',                              // Header and Footer
				'network-publisher/networkpub.php',                      // Network Publisher
				'nextgen-facebook/nextgen-facebook.php',                 // NextGEN Facebook OG
				'social-networks-auto-poster-facebook-twitter-g/NextScripts_SNAP.php',
				// NextScripts SNAP
				'opengraph/opengraph.php',                               // Open Graph
				'open-graph-protocol-framework/open-graph-protocol-framework.php',
				// Open Graph Protocol Framework
				'seo-facebook-comments/seofacebook.php',                 // SEO Facebook Comments
				'seo-ultimate/seo-ultimate.php',                         // SEO Ultimate
				'sexybookmarks/sexy-bookmarks.php',                      // Shareaholic
				'shareaholic/sexy-bookmarks.php',                        // Shareaholic
				'sharepress/sharepress.php',                             // SharePress
				'simple-facebook-connect/sfc.php',                       // Simple Facebook Connect
				'social-discussions/social-discussions.php',             // Social Discussions
				'social-sharing-toolkit/social_sharing_toolkit.php',     // Social Sharing Toolkit
				'socialize/socialize.php',                               // Socialize
				'only-tweet-like-share-and-google-1/tweet-like-plusone.php',
				// Tweet, Like, Google +1 and Share
				'wordbooker/wordbooker.php',                             // Wordbooker
				'wpsso/wpsso.php',                                       // WordPress Social Sharing Optimization
				'wp-caregiver/wp-caregiver.php',                         // WP Caregiver
				'wp-facebook-like-send-open-graph-meta/wp-facebook-like-send-open-graph-meta.php',
				// WP Facebook Like Send & Open Graph Meta
				'wp-facebook-open-graph-protocol/wp-facebook-ogp.php',   // WP Facebook Open Graph protocol
				'wp-ogp/wp-ogp.php',                                     // WP-OGP
				'zoltonorg-social-plugin/zosp.php',                      // Zolton.org Social Plugin
			),

			'xml_sitemaps' => array(
				'xml-sitemap-feed/xml-sitemap.php'						 // XML Sitemap & Google News feeds

			)
		);

		/**
		 * Overrides instance to set with this class as class
		 * 
		 * @return Yoast_Plugin_Conflict
		 */
		public static function get_instance() {
			return parent::get_instance( __CLASS__ );
		}

		/**
		 * After activating any plugin, this method will be executed by a hook.
		 *
		 * If the activated plugin is conflicting with ours a notice will be shown.
		 *
		 * @param string|bool $plugin
		 *
		 */
		public static function hook_check_for_plugin_conflicts( $plugin = false ) {
			// The instance of itself
			$instance = self::get_instance();

			// Only add plugin as active plugin if $plugin isn't false
			if ( $plugin ) {
				// Because it's just activated
				$instance->add_active_plugin( $instance->find_plugin_category( $plugin ), $plugin );
			}

			$plugin_sections = array(
				'open_graph'   => 'open graph',
				'xml_sitemaps' => 'xml sitemaps'
			);

			$instance->check_plugin_conflicts( $plugin_sections );
		}

	}

}