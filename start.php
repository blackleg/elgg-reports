<?php

elgg_register_event_handler( 'init', 'system', 'rm_group_reports_init' );

function rm_group_reports_init() {
    
    elgg_extend_view('admin.css', 'rm_group_reports/rm_group_reports.css');
    
    // Register item menu.
    elgg_register_admin_menu_item( 'administer', 'groups', 'statistics' );
    elgg_register_admin_menu_item( 'administer', 'users', 'statistics' );
    
}