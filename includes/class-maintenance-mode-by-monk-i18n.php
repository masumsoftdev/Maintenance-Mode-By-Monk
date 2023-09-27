<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://masum.anothermonk.com
 * @since      1.0.0
 *
 * @package    Maintenance_Mode_By_Monk
 * @subpackage Maintenance_Mode_By_Monk/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Maintenance_Mode_By_Monk
 * @subpackage Maintenance_Mode_By_Monk/includes
 * @author     Masum Billah <personaldotmasum@gmail.com>
 */
class Maintenance_Mode_By_Monk_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'maintenance-mode-by-monk',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
