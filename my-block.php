<?php
/**
 * Plugin Name:       My Block
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1
 * Text Domain:       my-block
 */

function create_block_my_block_block_init() {
    register_block_type( __DIR__ );

    // Load MO files for PHP.
    load_plugin_textdomain( 'my-block', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

    // Load JSON files for JS - this is necessary if using a custom languages path!!
    wp_set_script_translations( 'my-block-local-edit-script', 'my-block', plugin_dir_path( __FILE__ ) . '/languages' );
}
add_action( 'init', 'create_block_my_block_block_init' );