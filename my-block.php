<?php

/**
 * Plugin Name:       My Block
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1
 * Text Domain:       my-block
 */

function create_block_my_block_block_init()
{
    // Load MO files for PHP.
    load_plugin_textdomain('my-block', false, dirname(plugin_basename(__FILE__)) . '/languages');

    register_block_type(__DIR__);
}
add_action('init', 'create_block_my_block_block_init');

function script_translations()
{
    // Load JSON files for JS - this is necessary if using a custom languages path!!
    $script_handle = generate_block_asset_handle('my-block/local', 'editorScript');
    wp_set_script_translations(
        $script_handle,
        'my-block',
        plugin_dir_path(__FILE__) . 'languages'
    );
}
add_action('enqueue_block_editor_assets', 'script_translations');



function create_admin_menu()
{

    add_menu_page(
        'my-block',
        __('My Block', 'my-block'),
        'manage_options',
        'my-block',
        'my_menu_page_template',
        'dashicons-buddicons-replies'
    );
}

add_action('admin_menu', 'create_admin_menu');


function my_menu_page_template()
{
    echo '<div id="wrap">';
    echo '<div id="my-block">' . __('My Block Local', 'my-block') . '</div>';
    echo '</div>';
}

function my_enqueue_admin_scripts()
{

    $asset = include plugin_dir_path(__FILE__) . 'build/index.asset.php';
    $asset['dependencies'][] = 'wp-api';
    $asset['dependencies'][] = 'wp-i18n';
    $asset['dependencies'][] = 'wp-components';
    $asset['dependencies'][] = 'wp-element';

    wp_enqueue_script(
        'my-block',
        plugin_dir_url(__FILE__) . 'build/index.js',
        $asset['dependencies'],
        $asset['version'],
        wp_rand(),
        true
    );
}

add_action('admin_enqueue_scripts', 'my_enqueue_admin_scripts');
