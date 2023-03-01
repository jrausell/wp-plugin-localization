<?php
/*
Plugin Name: Test Localization Plugin
Description: Plugin Localization Test.
Author: Test
Version: 1.0
Text Domain: test-loc
Domain Path: /languages
*/

if (!defined('ABSPATH')) die('No direct access allowed');
/**
 * Load plugin textdomain.
 */
function test_load_textdomain()
{
   load_plugin_textdomain('test-loc', false, basename(dirname(__FILE__)) . '/languages/');
}
add_action('init', 'test_load_textdomain');

function test_menu_page()
{
   add_menu_page(
      __('Test Setting Page', 'test-loc'),
      __('Test Setting Page', 'test-loc'),
      'manage_options',
      'test_setting_page',
      'test_setting_page',
      '',
      6
   );
}
add_action('admin_menu', 'test_menu_page');

function udp_setting_page()
{
?>
   <h2><?php _e('My Plugin Title', 'test-loc'); ?></h2>
<?php
}
