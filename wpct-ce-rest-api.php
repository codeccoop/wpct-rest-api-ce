<?php

/**
 * Plugin Name:     Wpct Rest API CE's
 * Plugin URI:      https://git.coopdevs.org/coopdevs/website/wp/wp-plugins/wpct-rest-api-ce
 * Description:     CE Communities content driven by a rest api connection between WP and Odoo
 * Author:          Còdec
 * Author URI:      https://www.codeccoop.org
 * Text Domain:     wpct-rest-api-ce
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         wpct_rest_api_ce
 */

$JWT_AUTH_SECRET_KEY = '123456789';
define('JWT_AUTH_SECRET_KEY', $JWT_AUTH_SECRET_KEY);
define('JWT_AUTH_CORS_ENABLE', true);

add_action('init', 'ce_register_meta_fields');
function ce_register_meta_fields()
{
    register_post_meta(
        'ce_community',
        'odoo_community_id',
        array(
            'type' => 'integer',
            'description' => 'ID de la comunitat a Odoo',
            'single' => true,
            'show_in_rest' => true,
        )
    );
}

add_action('rest_api_init', 'ce_register_meta_api');
function ce_register_meta_api()
{
    register_rest_field(
        'ce_community',
        'odoo_community_id',
        array(
            'get_callback' => 'ce_get_odoo_id',
            'update_callback' => 'ce_update_odoo_id',
        )
    );
}

function ce_get_odoo_id($data, $field_name)
{
    return get_post_meta($data['id'], 'odoo_community_id', true);
}

function ce_update_odoo_id($value, $object, $field_name)
{
    if (!$value) return;
    return update_post_meta($object->ID, 'odoo_community_id', abs((int) $value));
}

add_filter('single_template', 'wpct_rest_api_ce_template');
function wpct_rest_api_ce_template($template, $type = null)
{
    global $post;
    if ($post->post_type === 'ce_community') {
        $dir = plugin_dir_path(__DIR__);
        return $dir . 'wpct-rest-api-ce/templates/single.php';
    }

    return $template;
}
