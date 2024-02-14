<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Delete options 
delete_option('mmbm_maintenance_mode_enabled');
delete_option('mmbm_maintenance_options');
