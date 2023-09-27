<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://masum.anothermonk.com
 * @since             1.0.0
 * @package           Maintenance_Mode_By_Monk
 *
 * @wordpress-plugin
 * Plugin Name:       Maintenance Mode by MONK
 * Plugin URI:        https://anothermonk.com/plugins/maintenance-mode-by-monk
 * Description:       The plugin Maintenance Mode by MONK, that will help you to be transition your website into Under Construction, Coming Soon, or full Maintenance Mode with a customizable landing page. Keep your audience informed and engaged while you enhance your online presence.
 * Version:           1.0.0
 * Author:            Masum Billah
 * Author URI:        https://masum.anothermonk.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       maintenance-mode-by-monk
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
define( 'MAINTENANCE_MODE_BY_MONK_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-maintenance-mode-by-monk-activator.php
 */
function activate_maintenance_mode_by_monk() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-maintenance-mode-by-monk-activator.php';
	Maintenance_Mode_By_Monk_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-maintenance-mode-by-monk-deactivator.php
 */
function deactivate_maintenance_mode_by_monk() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-maintenance-mode-by-monk-deactivator.php';
	Maintenance_Mode_By_Monk_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_maintenance_mode_by_monk' );
register_deactivation_hook( __FILE__, 'deactivate_maintenance_mode_by_monk' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-maintenance-mode-by-monk.php';


function run_maintenance_mode_by_monk() {

	$plugin = new Maintenance_Mode_By_Monk();
	$plugin->run();

}
run_maintenance_mode_by_monk();
