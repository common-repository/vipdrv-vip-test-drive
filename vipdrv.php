<?php
/*
Plugin Name: VIPdrv - VIP Test Drive
Plugin URI:  https://www.testdrive.pw
Description: The best new plugin for your dealer website. Add VIPdrv and generate more test drive appointment leads while creating the best online customer experience, driving to the best dealership visit and sales of a car.
Version:     1.0.3
Author:      jointventuredigital.com
Author URI:  https://www.testdrive.pw/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: vipdrv
Domain Path: /languages

vipdrv is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

vipdrv is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with vipdrv. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

function vipdrv_options_page()
{
    add_menu_page(
        '',
        'VIPdrv',
        'manage_options',
        plugin_dir_path(__FILE__) . 'admin/portal.php',
        null,
        plugin_dir_url(__FILE__) . '/admin/images/viprdv-menu-logo.png',
        20
    );

    add_submenu_page(
        plugin_dir_path(__FILE__) . 'admin/portal.php',
        '',
        'Settings',
        'manage_options',
        plugin_dir_path(__FILE__) . 'admin/integration.php',
        null
    );
}

add_action('admin_menu', 'vipdrv_options_page');

function register_mysettings()
{
    register_setting('vipdrv-settings-group', 'vipdrv-site-id');
    register_setting('vipdrv-settings-group', 'inject-widget-to-vlp');
    register_setting('vipdrv-settings-group', 'inject-widget-to-vdp');
}

add_action('admin_init', 'register_mysettings');

if (!is_admin()) {
    add_action('wp_footer', 'vipdrv_integration');
}
function vipdrv_integration()
{
    $siteId = get_option('vipdrv-site-id', null);
    $siteId = $siteId == null ? 0 : $siteId;
    $injectWidgetToVlp = get_option('inject-widget-to-vlp', true) == null ? 'false' : 'true';
    $injectWidgetToVdp = get_option('inject-widget-to-vdp', true) == null ? 'false' : 'true';

    wp_enqueue_script('vipdrv_scripts', "https://code.testdrive.pw/vipdrv/vipdrv.min.js?hash=" . base64_encode(random_bytes(10)));
    wp_add_inline_script('vipdrv_scripts', "VipDrive.init({siteId: $siteId, injectWidgetToVlp: $injectWidgetToVlp, injectWidgetToVdp: $injectWidgetToVdp})");
}