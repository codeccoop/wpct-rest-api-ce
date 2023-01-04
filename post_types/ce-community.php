<?php
add_action('init', 'wpct_rest_ce_community');
function wpct_rest_ce_community()
{
    register_post_type(
        'rest_ce_community',
        array(
            'labels' => array(
                'name' => "REST Comunitats",
                'singular_name' => "REST Comunitat"
            ),
            // Frontend
            'has_archive' => true,
            'public' => true,
            'publicly_queryable' => true,

            // Admin
            'capability_type' => 'post',
            'menu_icon' => 'dashicons-admin-home',
            'menu_position' => 28,
            'query_var' => true,
            'show_in_menu' => true,
            'show_ui' => true,
            'show_in_rest' => true,
            'supports' => array(
                'title',
                'author',
                'editor',
                'comments'
            ),
            'rewrite' => array(
                'slug' => 'rest-ce'
            ),
        )
    );
}
