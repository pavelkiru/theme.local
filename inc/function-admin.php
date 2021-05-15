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

  add_submenu_page('alecaddd_sunset','Sunset Theme Options', 'General',
    'manage_options', 'alecaddd_sunset','sunset_theme_create_page');

  add_submenu_page('alecaddd_sunset','Sunset CSS Options', 'Custom CSS',
    'manage_options', 'alecaddd_sunset_css','sunset_theme_settings_page');

  add_action('admin_init', 'sunset_custom_settings');
}

add_action('admin_menu','sunset_add_admin_page');

function sunset_custom_settings() {
  register_setting('sunset-settings-group','first_name');
  register_setting('sunset-settings-group','last_name');
  register_setting('sunset-settings-group','user_description');
  register_setting('sunset-settings-group','twitter','sanitize_input_custom_field');
  register_setting('sunset-settings-group','vk');
  register_setting('sunset-settings-group','facebook');

  add_settings_section('sunset-sidebar-options','Sidebar Option','sunset_sidebar_options','alecaddd_sunset');

  add_settings_field('sidebar-name','Full Name','sunset_sidebar_name','alecaddd_sunset','sunset-sidebar-options');
  add_settings_field('sidebar-user_description','User Description','sunset_sidebar_user_description','alecaddd_sunset','sunset-sidebar-options');
  add_settings_field('sidebar_twitter', 'Twitter handler','sunset_sidebar_twitter','alecaddd_sunset','sunset-sidebar-options');
  add_settings_field('sidebar_vk', 'vk','sunset_sidebar_vk','alecaddd_sunset','sunset-sidebar-options');
  add_settings_field('sidebar_facebook', 'facebook','sunset_sidebar_facebook','alecaddd_sunset','sunset-sidebar-options');
}

function sunset_sidebar_options() {
  echo 'Customize your Sidebar Information';
}

function sunset_sidebar_twitter() {
  $twitter = esc_attr( get_option('twitter'));
  echo '<input type="text" name="twitter" value="'.$twitter.'" placeholder="twitter" />
  <p class="description">Input twitter without "@"</p>';
}

function sunset_sidebar_vk() {
  $vk = esc_attr( get_option('vk'));
  echo '<input type="text" name="vk" value="'.$vk.'" placeholder="vk" />';
}

function sunset_sidebar_facebook() {
  $facebook = esc_attr( get_option('facebook'));
  echo '<input type="text" name="facebook" value="'.$facebook.'" placeholder="facebook" />';
}

function sunset_sidebar_name() {
  $firstName = esc_attr( get_option('first_name'));
  $lastName = esc_attr( get_option('last_name'));
  echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />';
  echo '<input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}

function sunset_sidebar_user_description() {
  $user_description = esc_attr( get_option('user_description'));
  echo '<input type="text" name="user_description" value="'.$user_description.'" placeholder="Description" />';
}

function sunset_theme_create_page() {
  //generate of our admin page
  require_once(get_template_directory() . '/inc/templates/sunset-admin.php');
}

function sunset_theme_settings_page() {
  //generate of our admin page
}

function sanitize_input_custom_field($input) {
  $output = sanitize_text_field($input);
  $output = str_replace('@', '',$output);
  return $output;
}


























