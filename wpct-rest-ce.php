<?php

/**
 * Plugin Name:     Wpct Rest CE
 * Plugin URI:      https://git.coopdevs.org/coopdevs/website/wp/wp-plugins/wpct-rest-ce
 * Description:     CE Communities content driven by a rest api connection between WP and Odoo
 * Author:          Còdec
 * Author URI:      https://www.codeccoop.org
 * Text Domain:     wpct-rest-ce
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         wpct_rest_ce
 */

$JWT_AUTH_SECRET_KEY = '123456789';
define('JWT_AUTH_SECRET_KEY', $JWT_AUTH_SECRET_KEY);
define('JWT_AUTH_CORS_ENABLE', true);

define('WPCT_REST_CE_POST_TYPE', 'rest_ce_community');
define('WPCT_REST_CE_ENV', 'development');

require_once 'post_types/ce-community.php';

add_action('init', 'ce_register_meta_fields');
function ce_register_meta_fields()
{
    register_post_meta(
        WPCT_REST_CE_POST_TYPE,
        'odoo_company_id',
        array(
            'type' => 'integer',
            'description' => 'ID de la comunitat a Odoo',
            'single' => true,
            'show_in_rest' => true,
        )
    );
}

add_action('rest_api_init', 'wpct_rest_ce_register_meta_api');
function wpct_rest_ce_register_meta_api()
{
    register_rest_field(
        WPCT_REST_CE_POST_TYPE,
        'odoo_company_id',
        array(
            'get_callback' => 'wpct_rest_ce_get_odoo_id',
            'update_callback' => 'wpct_rest_ce_update_odoo_id',
        )
    );
}

function wpct_rest_ce_get_odoo_id($data, $field_name)
{
    return get_post_meta($data['id'], 'odoo_company_id', true);
}

function wpct_rest_ce_update_odoo_id($value, $object, $field_name)
{
    if (!$value) return;
    return update_post_meta($object->ID, 'odoo_company_id', abs((int) $value));
}

add_filter('single_template', 'wpct_rest_ce_template');
function wpct_rest_ce_template($template, $type = null)
{
    global $post;
    if ($post->post_type === WPCT_REST_CE_POST_TYPE) {
        return plugin_dir_path(__FILE__) . 'templates/single.php';
    }

    return $template;
}

add_filter('wpct_rest_ce_endpoint', 'wpct_rest_ce_endpoint');
function wpct_rest_ce_endpoint($company_id)
{
    if (WPCT_REST_CE_ENV === 'development') {
        return plugin_dir_url(__FILE__) . 'data/community/' . $company_id . '.json';
    } else {
        return 'https://erp-test.somcomunitats.coop/api/community/' . $company_id;
    }
}

add_filter('wpct_rest_ce_service_icon', 'wpct_rest_ce_service_icon');
function wpct_rest_ce_service_icon($service)
{
    switch ($service['id']) {
        case 56:
            return '<i class="fa-solid fa-solar-pannel"></i>';
            break;
        case 57:
            return '<i class="fa-solid fa-lightbulb"></i>';
            break;
        case 58:
            return '<i class="fa-solid fa-car-on"></i>';
            break;
        case 59:
            return '<i class="fa-solid fa-book-open-reader"></i>';
            break;
        case 60:
            return '<i class="fa-solid fa-house-fire"></i>';
            break;
        case 61:
            return '<i class="fa-solid fa-basket-shopping"></i>';
            break;
        case 62:
            return '<i class="fa-solid fa-leaf"></i>';
            break;
        case 63:
            return '<i class="fa-solid fa-chart-column"></i>';
            break;
    }
}
