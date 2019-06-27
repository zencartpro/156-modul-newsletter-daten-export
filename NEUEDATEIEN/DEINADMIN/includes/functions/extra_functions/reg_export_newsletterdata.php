<?php
if (!defined('IS_ADMIN_FLAG')) {
    die('Illegal Access');
}
if (function_exists('zen_register_admin_page')) {
    if (!zen_page_key_exists('export_newsletterdata')) {
        // Add Newsletter Data Export to customers menu
        zen_register_admin_page('export_newsletterdata', 'BOX_EXPORT_NEWSLETTERDATA','FILENAME_EXPORT_NEWSLETTERDATA', '', 'customers', 'Y', 60);
    }
}