<?php


function wprightclick_setting_page() : void 
{
    add_menu_page(
        __( 'Right Click', 'textdomain'),
        __( 'Right click', 'textdomain'),
        'manage_options', 
        'disable_right_click',
        'settings_page', 
        'dashicons-dismiss',
        6
    );    
}

function settings_page() : void 
{
    ?>

    <div class="wrap">
        <h1>Disable Right click on your website</h1>
        <form method="post" action="options.php" novalidate="novalidate">
            <?php settings_fields('disable_right_click'); ?>

            <table class="form-table" role="presentation">
                <?php do_settings_fields('disable_right_click', 'default'); ?>
            </table>

            <?php submit_button(); ?>

        </form>
    </div>

    <?php
}

add_action( 'admin_menu', 'wprightclick_setting_page' );

function wprightclick_register_setting() {

    $args = array(
        'type' => 'boolean',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => NULL,
    );

    register_setting('disable_right_click', 'wp_right_click_1', $args );

    add_settings_field(
        'wp_right_click_1',
        esc_html__( 'Disable Right Click', 'default' ),
        'settings_field_callback',
        'disable_right_click'
    );
}

function settings_field_callback(){

    $getPreValue = get_option('wp_right_click_1');

    echo '<input type="checkbox" name="wp_right_click_1" value="1"' . checked( 1, get_option('wp_right_click_1'), false ) .  '/>';
}


add_action('admin_init', 'wprightclick_register_setting');

