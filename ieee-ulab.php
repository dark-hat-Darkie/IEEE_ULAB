<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://se7encoders.com
 * @since             1.0.0
 * @package           Ieee_Ulab
 *
 * @wordpress-plugin
 * Plugin Name:       IEEE ULAB
 * Plugin URI:        https://ieeeulab.org
 * Description:       This plugin is the all-in-one plugin for IEEE ULAB website
 * Version:           1.0.0
 * Author:            Shakil Shareef / Rakib Ahmed
 * Author URI:        https://se7encoders.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ieee-ulab
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
define( 'IEEE_ULAB_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ieee-ulab-activator.php
 */
function activate_ieee_ulab() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ieee-ulab-activator.php';
	Ieee_Ulab_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ieee-ulab-deactivator.php
 */
function deactivate_ieee_ulab() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ieee-ulab-deactivator.php';
	Ieee_Ulab_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ieee_ulab' );
register_deactivation_hook( __FILE__, 'deactivate_ieee_ulab' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ieee-ulab.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ieee_ulab() {

	global $ieee;
	$ieee = new Ieee_Ulab();
	$ieee->plugin_path = plugin_dir_path( __FILE__ );
	$ieee->run();

}
run_ieee_ulab();
