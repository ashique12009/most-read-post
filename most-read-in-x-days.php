<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ashique12009.blogspot.com
 * @since             1.0.0
 * @package           Most_Read_In_X_Days
 *
 * @wordpress-plugin
 * Plugin Name:       Most Read in X Days
 * Plugin URI:        https://ashique12009.blogspot.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Khandoker Ashique Mahamud
 * Author URI:        https://ashique12009.blogspot.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       most-read-in-x-days
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
define( 'MOST_READ_IN_X_DAYS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-most-read-in-x-days-activator.php
 */
function activate_most_read_in_x_days() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-most-read-in-x-days-activator.php';
	Most_Read_In_X_Days_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-most-read-in-x-days-deactivator.php
 */
function deactivate_most_read_in_x_days() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-most-read-in-x-days-deactivator.php';
	Most_Read_In_X_Days_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_most_read_in_x_days' );
register_deactivation_hook( __FILE__, 'deactivate_most_read_in_x_days' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-most-read-in-x-days.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_most_read_in_x_days() {

	$plugin = new Most_Read_In_X_Days();
	$plugin->run();

}
run_most_read_in_x_days();
