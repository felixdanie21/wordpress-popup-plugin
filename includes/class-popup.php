<?php
namespace Artistudio\Popup;

if (!defined('ABSPATH')) {
    exit;
}

class Artistudio_Popup {
    private static $instance = null;

    private function __construct() {
        add_action('init', [$this, 'register_popup_cpt']);
    }

    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function register_popup_cpt() {
        $labels = array(
            'name'          => 'Pop-ups',
            'singular_name' => 'Pop-up',
            'menu_name'     => 'Pop-ups',
        );

        $args = array(
            'label'         => 'Pop-ups',
            'public'        => true,
            'show_ui'       => true,
            'menu_icon'     => 'dashicons-admin-appearance',
            'supports'      => array('title', 'editor'),
            'has_archive'   => false,
        );

        register_post_type('artistudio_popup', $args);
    }
}