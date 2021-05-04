<?php

/*
 * ==========================
 *  ADMIN PAGE
 * ==========================
 * */

function sunset_add_admin_page() {
  //generate sunset admin page
  add_menu_page('Sunset Theme Options', 'Sunset','manage_options',
                'alecaddd_sunset','sunset_theme_create_page',
                '','110');
  //generate sunset admin sub page

  add_submenu_page('alecaddd_sunset','Sunset Theme Options', 'Settings',
    'manage_options', 'alecaddd_sunset','sunset_theme_create_page');

  add_submenu_page('alecaddd_sunset','Sunset CSS Options', 'Custom CSS',
    'manage_options', 'alecaddd_sunset_css','sunset_theme_settings_page');
}

add_action('admin_menu','sunset_add_admin_page');

function sunset_theme_create_page() {
  //generate of our admin page
  require_once(get_template_directory() . '/inc/templates/sunset-admin.php');
}

function sunset_theme_settings_page() {
  //generate of our admin page
}
