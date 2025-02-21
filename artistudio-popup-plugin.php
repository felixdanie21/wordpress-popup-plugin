<?php
/**
 * Plugin Name: Artistudio Pop-up Plugin
 * Plugin URI:  https://github.com/felixdanie21/wordpress-popup-plugin
 * Description: Custom Pop-up Plugin using React and WP REST API.
 * Version:     1.0.0
 * Author:      Felix Daniel Irawan
 * Author URI:  https://felixdanie21.github.io/felix_web/
 * License:     GPL-2.0+
 */

if (!defined('ABSPATH')) {
    exit;
}

define('ARTISTUDIO_POPUP_PATH', plugin_dir_path(__FILE__));
define('ARTISTUDIO_POPUP_URL', plugin_dir_url(__FILE__));

require_once ARTISTUDIO_POPUP_PATH . 'includes/class-popup.php';
require_once ARTISTUDIO_POPUP_PATH . 'includes/class-api.php';

function artistudio_popup_init() {
    Artistudio_Popup::get_instance();
    Artistudio_Popup_API::get_instance();
}
add_action('plugins_loaded', 'artistudio_popup_init');
