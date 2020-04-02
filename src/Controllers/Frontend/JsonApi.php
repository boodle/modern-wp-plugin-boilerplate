<?php

namespace KnkGenerator\Controllers\Frontend;

use KnkGenerator\Controllers\AbstractController;

class JsonApi extends AbstractController
{
    public function registerApiEndpoints()
    {
        // Example endpoint would be https://www.yoursite.com/wp-json/knk-generator/v1/thing
        register_rest_route(
            'knk-generator/v1',
            '/thing',
            [
                'methods' => 'GET',
                'callback' => [$this, 'getThing'],
                'permission_callback' => [$this, 'hasPermission'] // this is optional
            ]
        );
    }

    public function hasPermission()
    {
        /*
        
        Do logic checks here to see if the endpoint can be accessed.
        Return true if it's fine, or an instance of \WP_Error if not

        if (
            !is_user_logged_in()
            || !in_array('subscriber', wp_get_current_user()->roles)
        ) {
            return new \WP_Error(
                'rest_forbidden',
                esc_html__('Not logged in as an subscriber', $this->plugin_name),
                ['status' => 401]
            );
        }*/

        return true;
    }

    public function getThing(\WP_REST_Request $request)
    {
        return new \WP_REST_Response(['woo' => 'yay']);
    }
}
