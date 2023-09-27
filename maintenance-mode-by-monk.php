<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
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

 class Mmmbs_Maintenance_Mode_Main {
	public function __construct(){
		/** Initializing the Constants */
		define( 'MMBM_URL', plugin_dir_url( __FILE__ ) );
        define( 'MMBM_PATH', plugin_dir_path( __FILE__ ) );
        define( 'MMBM_VERSION', '1.0.0' );
	}
 }