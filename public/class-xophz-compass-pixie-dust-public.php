<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Xophz_Compass_Pixie_Dust
 * @subpackage Xophz_Compass_Pixie_Dust/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and hooks for injecting pixels
 * into the public-facing side of the site.
 *
 * @package    Xophz_Compass_Pixie_Dust
 * @subpackage Xophz_Compass_Pixie_Dust/public
 * @author     Your Name <email@example.com>
 */
class Xophz_Compass_Pixie_Dust_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/xophz-compass-pixie-dust-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/xophz-compass-pixie-dust-public.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Inject pixels into wp_head.
	 *
	 * @since    1.0.0
	 */
	public function inject_head_pixels() {
		$this->inject_pixels( 'head' );
	}

	/**
	 * Inject pixels into wp_body_open.
	 *
	 * @since    1.0.0
	 */
	public function inject_body_open_pixels() {
		$this->inject_pixels( 'body_open' );
	}

	/**
	 * Inject pixels into wp_footer.
	 *
	 * @since    1.0.0
	 */
	public function inject_footer_pixels() {
		$this->inject_pixels( 'body_close' );
	}

	/**
	 * Inject all pixels for a given location.
	 *
	 * @since    1.0.0
	 * @param    string    $location    The location (head, body_open, body_close).
	 */
	private function inject_pixels( $location ) {
		// Don't inject in admin
		if ( is_admin() ) {
			return;
		}

		$pixels = Xophz_Compass_Pixie_Dust_Post_Type::get_all_pixels();

		foreach ( $pixels as $pixel ) {
			if ( ! Xophz_Compass_Pixie_Dust_Post_Type::should_load( $pixel ) ) {
				continue;
			}

			$output = Xophz_Compass_Pixie_Dust_Post_Type::render_pixel( $pixel, $location );
			
			if ( ! empty( $output ) ) {
				echo "\n" . $output . "\n";
			}
		}
	}

}
