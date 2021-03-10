<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://feathertechlbs.com
 * @since      1.0.0
 *
 * @package    Akhil_Ninja
 * @subpackage Akhil_Ninja/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Akhil_Ninja
 * @subpackage Akhil_Ninja/admin
 * @author     Feather Techlabs <parth@feathertechlbs.com>
 */
class Akhil_Ninja_Admin {

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

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Akhil_Ninja_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Akhil_Ninja_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		// wp_enqueue_style( $this->plugin_name, 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css', array(), $this->version, 'all' );
		// wp_enqueue_style( $this->plugin_name, 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/akhil-ninja-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Akhil_Ninja_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Akhil_Ninja_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		// wp_enqueue_script( $this->plugin_name, 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/akhil-ninja-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function setup_cpt() {
		register_post_type('restaurant',
			array(
			'labels'      => array(
				'name'          => __('Restaurants', 'textdomain'),
				'singular_name' => __('Restaurant', 'textdomain'),
			),
				'public'      => true,
				'has_archive' => true,
			)
		);
	}
     
    function post_edit_form_tag( ) {
        echo ' enctype="multipart/form-data"';
    }

	public function global_notice_meta_box() {
		add_meta_box(
			'Add-Data',
			__( 'Add--Data', 'sitepoint' ),
			[$this, 'global_notice_meta_box_callback'],
			'restaurant',
		);
		
	}

	public function global_notice_meta_box_callback() {
		include_once('partials/restaurant-meta-box.php');
	}

	public function save_restaurant_meta($post_id) {
		if($_POST){
			$uploadedfile = $_FILES['file'];
     
			$upload_overrides = array(
				'test_form' => false
			);
			update_post_meta( $post_id, "whatsapp_number", $_POST['whatsapp_number'] );
			update_post_meta( $post_id, "firstname", $_POST['firstname'] );
			update_post_meta( $post_id, "address", $_POST['address'] );
			update_post_meta( $post_id, "date", $_POST['date'] );
			update_post_meta( $post_id, "email", $_POST['email'] );
			update_post_meta( $post_id, "search", $_POST['search'] );
			$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
			update_post_meta($post_id, 'file', $movefile['url']);
			
		}
	}

	

}
