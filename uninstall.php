<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('vipdrv-site-id');
delete_option('inject-widget-to-vlp');
delete_option('inject-widget-to-vdp');