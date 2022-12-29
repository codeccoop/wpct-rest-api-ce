<?php

/**
 * Plugin Name:     WPCT REST API CE
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          Còdec
 * Author URI:      YOUR SITE HERE
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
