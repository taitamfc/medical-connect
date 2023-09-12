<?php
add_action( 'admin_menu', 'mc_options_page' );
function mc_options_page() {
    add_menu_page(
        MC_PLUGIN_NAME,//tiêu đề
        MC_PLUGIN_NAME,
        'manage_options',
        MC_PLUGIN_BACKEND_URL,
        'mc_app_backend',
        'dashicons-businessman',
        20
    );

    $manage_pages = [
        'Appointment' => 'Appointments',
        'Category' => 'Categories',
        'Provider' => 'Providers',
        'Customer' => 'Customers',
        'Location' => 'Locations',
        'Service' => 'Services',
        'MedicalHistory' => 'Medical histories',
        'TestResult' => 'Test results',
        'EmailNotification' => 'Email Notifications',
    ];

    foreach( $manage_pages as $manage_page_name => $manage_page ){
        add_submenu_page(
            MC_PLUGIN_BACKEND_URL,
            $manage_page,
            $manage_page,
            'manage_options',
            MC_PLUGIN_BACKEND_URL.'&controller='.$manage_page_name,
            'mc_app_backend',
        );
    }
}

function mc_app_backend(){
    $controller = isset( $_REQUEST['controller'] ) && $_REQUEST['controller'] ? $_REQUEST['controller'] : 'Dashboard';
    $action = isset( $_REQUEST['action'] ) && $_REQUEST['action'] ? $_REQUEST['action'] : 'index';
    MCAppHelpper::loadController($controller,$action);
}
