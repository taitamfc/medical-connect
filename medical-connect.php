<?php
/*
Plugin Name: Medical Connect
Text Domain: medical-connect
Domain Path: /languages
*/

define('MC_PATH', plugin_dir_path(__FILE__) );
define('MC_URI', plugin_dir_url(__FILE__) );
define('MC_PLUGIN_NAME', 'Medical Connect' );
define('MC_PLUGIN_BACKEND_URL', 'mc_backend' );

register_activation_hook( __FILE__, 'mc_plugin_active' );
register_deactivation_hook( __FILE__, 'mc_plugin_deactivate' );
function mc_plugin_active(){

}
function mc_plugin_deactivate(){

}
include_once MC_PATH.'includes.php';