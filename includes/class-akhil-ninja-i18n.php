<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://feathertechlbs.com
 * @since      1.0.0
 *
 * @package    Akhil_Ninja
 * @subpackage Akhil_Ninja/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Akhil_Ninja
 * @subpackage Akhil_Ninja/includes
 * @author     Feather Techlabs <parth@feathertechlbs.com>
 */
class Akhil_Ninja_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'akhil-ninja',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
