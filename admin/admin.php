<?php



function create_db_table(): void
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'right_click';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        disable_right_click TINYINT(1) NOT NULL DEFAULT 0,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

function wprightclick_setting_page() : void 
{
    add_menu_page(
        'Right Click', 
        'RIght click option', 
        'manage_options', 
        'disable_right_click',
        'settings_page', 
        'dashicons-dismiss',
        6
    );    
}

function settings_page() : void 
{
    esc_html_e( 'Admin Page Test', 'textdomain' );	
}

add_action( 'admin_menu', 'wprightclick_setting_page' );
