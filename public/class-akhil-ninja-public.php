<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://feathertechlbs.com
 * @since      1.0.0
 *
 * @package    Akhil_Ninja
 * @subpackage Akhil_Ninja/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Akhil_Ninja
 * @subpackage Akhil_Ninja/public
 * @author     Feather Techlabs <parth@feathertechlbs.com>
 */
class Akhil_Ninja_Public {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/akhil-ninja-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/akhil-ninja-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'wp_urls', array( 'ajax_url' => admin_url('admin-ajax.php')) );

	}

	public function themeslug_query_vars($qvars){
		$qvars[] = 'name';
    	return $qvars;
	}

	public function restaurant_near_by() {
		include_once('wp-content\themes\twentytwentyone\customtemplate\Restaurants.php');
	}

	public function laptops() {
		include_once('wp-content\themes\salient-child\laptops.php');
	}

	public function get_restaurant_meta(){
		$search = $_GET['search'];
		$args=array(
			'post_type'      => 'restaurant',
			'meta_query'     => array(
			  'relation' => 'OR',
			  array(
				  'key' => 'address',
				  'value' => $search,
				  'compare' => 'LIKE'
			  ),
			  array(
				'key' => 'firstname',
				'value' => $search,
				'compare' => 'LIKE'
			  )
			)
		);
		$post_id = []; 
		$my_posts = get_posts($args);
		foreach ($my_posts as $value) {
			array_push($post_id,$value->ID);
		}
		foreach($post_id as $id){
			$name = get_post_meta( $id,'firstname',true);
			$address = get_post_meta( $id,'address',true);
		};
		echo $address;
		die;
	}
}
