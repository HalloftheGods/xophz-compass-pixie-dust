<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Xophz_Compass_Pixie_Dust
 * @subpackage Xophz_Compass_Pixie_Dust/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Xophz_Compass_Pixie_Dust
 * @subpackage Xophz_Compass_Pixie_Dust/admin
 * @author     Your Name <email@example.com>
 */
class Xophz_Compass_Pixie_Dust_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/xophz-compass-pixie-dust-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/xophz-compass-pixie-dust-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Add menu item 
	 *
	 * @since    1.0.0
	 */
	public function addToMenu(){
        Xophz_Compass::add_submenu($this->plugin_name);
	}

	/**
	 * Get all pixels.
	 *
	 * @since    1.0.0
	 */
	public function getPixels() {
		$pixels = Xophz_Compass_Pixie_Dust_Post_Type::get_all_pixels();
		$stats = Xophz_Compass_Pixie_Dust_Post_Type::get_stats();
		
		Xophz_Compass::output_json( array(
			'success' => true,
			'data'    => array(
				'pixels' => $pixels,
				'stats'  => $stats,
			),
		) );
	}

	/**
	 * Get pixel templates.
	 *
	 * @since    1.0.0
	 */
	public function getTemplates() {
		$templates = Xophz_Compass_Pixie_Dust_Post_Type::get_templates();
		
		Xophz_Compass::output_json( array(
			'success'   => true,
			'data'      => $templates,
		) );
	}

	/**
	 * Get a single pixel by ID.
	 *
	 * @since    1.0.0
	 */
	public function getPixel() {
		$id = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;
		
		if ( ! $id ) {
			Xophz_Compass::output_json( array(
				'success' => false,
				'error'   => 'Pixel ID required',
			) );
			return;
		}

		$pixel = Xophz_Compass_Pixie_Dust_Post_Type::get_pixel( $id );
		
		if ( ! $pixel ) {
			Xophz_Compass::output_json( array(
				'success' => false,
				'error'   => 'Pixel not found',
			) );
			return;
		}

		Xophz_Compass::output_json( array(
			'success' => true,
			'data'    => $pixel,
		) );
	}

	/**
	 * Save (create/update) a pixel.
	 *
	 * @since    1.0.0
	 */
	public function savePixel() {
		$data = array(
			'id'          => isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0,
			'name'        => isset( $_REQUEST['name'] ) ? sanitize_text_field( $_REQUEST['name'] ) : '',
			'type'        => isset( $_REQUEST['type'] ) ? sanitize_text_field( $_REQUEST['type'] ) : 'custom',
			'pixel_id'    => isset( $_REQUEST['pixel_id'] ) ? sanitize_text_field( $_REQUEST['pixel_id'] ) : '',
			'enabled'     => isset( $_REQUEST['enabled'] ) ? filter_var( $_REQUEST['enabled'], FILTER_VALIDATE_BOOLEAN ) : false,
			'placement'   => isset( $_REQUEST['placement'] ) ? sanitize_text_field( $_REQUEST['placement'] ) : 'head',
			'conditions'  => isset( $_REQUEST['conditions'] ) ? (array) $_REQUEST['conditions'] : array( 'all' ),
			'custom_code' => isset( $_REQUEST['custom_code'] ) ? wp_unslash( $_REQUEST['custom_code'] ) : '',
		);

		if ( empty( $data['name'] ) ) {
			Xophz_Compass::output_json( array(
				'success' => false,
				'error'   => 'Pixel name is required',
			) );
			return;
		}

		$result = Xophz_Compass_Pixie_Dust_Post_Type::save_pixel( $data );

		if ( isset( $result['error'] ) ) {
			Xophz_Compass::output_json( array(
				'success' => false,
				'error'   => $result['error'],
			) );
			return;
		}

		Xophz_Compass::output_json( array(
			'success' => true,
			'data'    => $result,
		) );
	}

	/**
	 * Delete a pixel.
	 *
	 * @since    1.0.0
	 */
	public function deletePixel() {
		$id = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;
		
		if ( ! $id ) {
			Xophz_Compass::output_json( array(
				'success' => false,
				'error'   => 'Pixel ID required',
			) );
			return;
		}

		$result = Xophz_Compass_Pixie_Dust_Post_Type::delete_pixel( $id );

		Xophz_Compass::output_json( array(
			'success' => $result,
			'error'   => $result ? null : 'Failed to delete pixel',
		) );
	}

	/**
	 * Toggle a pixel's enabled state.
	 *
	 * @since    1.0.0
	 */
	public function togglePixel() {
		$id = isset( $_REQUEST['id'] ) ? intval( $_REQUEST['id'] ) : 0;
		
		if ( ! $id ) {
			Xophz_Compass::output_json( array(
				'success' => false,
				'error'   => 'Pixel ID required',
			) );
			return;
		}

		$result = Xophz_Compass_Pixie_Dust_Post_Type::toggle_pixel( $id );

		if ( isset( $result['error'] ) ) {
			Xophz_Compass::output_json( array(
				'success' => false,
				'error'   => $result['error'],
			) );
			return;
		}

		Xophz_Compass::output_json( array(
			'success' => true,
			'data'    => $result,
		) );
	}

}
