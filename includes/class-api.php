<?php
namespace Artistudio\Popup;

if (!defined('ABSPATH')) {
    exit;
}

class Artistudio_Popup_API {
    private static $instance = null;

    private function __construct() {
        add_action('rest_api_init', [$this, 'register_routes']);
    }

    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function register_routes() {
        register_rest_route('artistudio/v1', '/popup/', array(
            'methods'  => 'GET',
            'callback' => [$this, 'get_popups'],
            'permission_callback' => function () {
                return is_user_logged_in();
            },
        ));
    }

    public function get_popups() {
        $args = array(
            'post_type'      => 'artistudio_popup',
            'posts_per_page' => -1,
        );

        $query = new \WP_Query($args);
        $popups = array();

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $popups[] = array(
                    'title'       => get_the_title(),
                    'description' => get_the_content(),
                );
            }
        }
        wp_reset_postdata();

        return rest_ensure_response($popups);
    }
}
