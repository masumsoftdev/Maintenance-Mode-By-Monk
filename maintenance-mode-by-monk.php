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

		/** Loading Assets */

		// add_action( 'wp_enqueue_scripts', [$this, 'mmbm_public_assets_loading'] );
		add_action( 'admin_enqueue_scripts', [$this, 'mmbm_admin_assets_loading'] );

		/**Hooks Defining */
		add_action( 'plugins_loaded', [$this, 'mmbm_plugins_loaded'] );
		add_action( 'init', [$this, 'mmbm_maintenance_init'] );
		add_action( 'admin_bar_menu', [$this, 'mmbm_admin_bar_menu'], 90 );
		add_action( 'admin_menu', [$this, 'mmbm_admin_menu'] );
	}




	/** Loading Plugin Text Domain */
	public function mmbm_plugins_loaded(){
		load_plugin_textdomain('maintenance-mode-by-monk', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }

	/** Loading Public Assets */
	// public function mmbm_public_assets_loading(){
	// 	wp_enqueue_style( 'mmbm-public-styles', MMBM_URL.'public/css/maintenance-mode-by-monk-public.css', [], MMBM_VERSION, 'all' );
	// 	wp_enqueue_script( 'mmbm-public-scripts', MMBM_URL.'public/js/maintenance-mode-by-monk-public.js', ['jquery'], MMBM_VERSION, true );
	// }

	/** Loading Admin Assets */
	public function mmbm_admin_assets_loading(){
		wp_enqueue_style( 'mmbm-public-styles', MMBM_URL.'admin/css/maintenance-mode-by-monk-admin.css', [], MMBM_VERSION, 'all' );
		wp_enqueue_script( 'mmbm-admin-scripts', MMBM_URL.'admin/js/maintenance-mode-by-monk-admin.js', ['jquery'], MMBM_VERSION, true );
		wp_localize_script( 'mmbm-admin-scripts', 'mmbm_option_enable_disable_object', [
			'admin_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    	=> wp_create_nonce('mmbm_ajax_nonce')
		] );
	}

	/** Maintenance Main Function */
	public function mmbm_maintenance_init(){
		if (current_user_can('administrator')) {
            return;
        }

        if (!$this->mmbm_is_admin() && !is_customize_preview()) {
            add_filter('template_include', [ $this, 'mmbm_maintenance_mode_template']);
        }
	}

	public function mmbm_is_admin() {
        return strpos($_SERVER['REQUEST_URI'], '/wp-admin/') !== false;
    }

    public function mmbm_maintenance_mode_template($template) {
        return MMBM_PATH . 'public/partials/maintenance_mode_preview.php';
    }


	/** Admin Bar Menu  */
	public function mmbm_admin_bar_menu($mmbm_admin_bar){
		$mmbm_admin_bar->add_menu(
			array(
				'id' => 'maintenance_mode_by_monk',
				'title' => __('Maintenance Mode by MONK', 'maintenance-mode-by-monk'),
				'href' => admin_url('admin.php?page=maintenance-mode-by-monk')
			)
		);
		
	}

	/** Admin Menu */
	public function mmbm_admin_menu(){
		add_menu_page( __('Maintenance Mode Settings', 'maintenance-mode-by-monk'), __('Maintanence', 'maintenance-mode-by-monk'), 'manage_options', 'maintenance-mode-by-monk', [$this, 'mmbs_add_submenu_page'], 'dashicons-controls-pause', '60' );
	}
	public function mmbs_add_submenu_page(){
		require_once(MMBM_PATH.'admin/partials/maintenance-mode-by-monk-settings.php');
		$markup =  Mmbm_Settings::mmbm_loading_settings_markup();
		echo $markup;
	}
	
 }

 new Mmmbs_Maintenance_Mode_Main();