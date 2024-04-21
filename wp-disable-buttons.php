<?php

/**
 * WordPress Disable right click on a website with one click
 * 
 * @since             1.0.0
 * @package           wp_disable_buttons
 *
 * Plugin Name:       WP Disable all Buttons
 * Description:       Protect your website content with our WordPress plugin! Prevent unauthorized copying and downloading by disabling right-click functionality. Safeguard your valuable content and maintain control over your intellectual property effortlessly
 * Version:           1.0.0
 * Author:            Joseph Bassey
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
require_once 'admin/admin.php';

define('WP_DISABLE_RIGHT_CLICK', '1.0.0');


function disable_right_click_js_file()
{

    if (get_option('wp_right_click_1') == true) {
        wp_enqueue_script( 'disable-script', plugin_dir_url( __FILE__ ) . '/js/js-disable.js');
    }
}

add_action( 'wp_footer', 'disable_right_click_js_file' );

register_activation_hook(__FILE__, 'disable_right_click_js_file');
