<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://feathertechlbs.com
 * @since             1.0.0
 * @package           Akhil_Ninja
 *
 * @wordpress-plugin
 * Plugin Name:       Akhil Demo
 * Plugin URI:        https://feathertechlbs.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Feather Techlabs
 * Author URI:        https://feathertechlbs.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       akhil-ninja
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AKHIL_NINJA_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-akhil-ninja-activator.php
 */
function activate_akhil_ninja() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-akhil-ninja-activator.php';
	Akhil_Ninja_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-akhil-ninja-deactivator.php
 */
function deactivate_akhil_ninja() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-akhil-ninja-deactivator.php';
	Akhil_Ninja_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_akhil_ninja' );
register_deactivation_hook( __FILE__, 'deactivate_akhil_ninja' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-akhil-ninja.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_akhil_ninja() {

	$plugin = new Akhil_Ninja();
	$plugin->run();

}
run_akhil_ninja();
if(!function_exists("_dd")) {
	function _dd($data, $true = true) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		if($true)
			exit;
	}
}