<?php

/*
 * ==========================
 *  ADMIN PAGE
 * ==========================
 * */

function sunset_add_admin_page() {
  //generate sunset admin page
  add_menu_page('Sunset Theme Options', 'Sunset','manage_options','alecaddd_sunset','sunset_theme_create_page','','110');
  //generate sunset admin sub page

  add_submenu_page('alecaddd_sunset','Sunset Sidebar Options', 'Sidebar','manage_options', 'alecaddd_sunset','sunset_theme_create_page');

  add_submenu_page('alecaddd_sunset','Sunset CSS Options', 'Custom CSS','manage_options', 'alecaddd_sunset_css','sunset_theme_settings_page');

  add_submenu_page('alecaddd_sunset','Sunset Theme Options', 'Theme Options','manage_options',
    'alecaddd_sunset_theme','sunset_theme_support_page');

  add_submenu_page('alecaddd_sunset', 'Sunset Contact Form', 'Contact Form','manage_options','sunset_contact_section','alecaddd_sunset_theme_contact');

  add_action('admin_init', 'sunset_custom_settings');
}

add_action('admin_menu','sunset_add_admin_page');

function sunset_custom_settings() {
  //sidebar options
  register_setting('sunset-settings-group','profile_picture');
  register_setting('sunset-settings-group','first_name');
  register_setting('sunset-settings-group','last_name');
  register_setting('sunset-settings-group','user_description');
  register_setting('sunset-settings-group','twitter','sanitize_input_custom_field');
  register_setting('sunset-settings-group','vk');
  register_setting('sunset-settings-group','facebook');

  add_settings_section('sunset-sidebar-options','Sidebar Option','sunset_sidebar_options','alecaddd_sunset');

  add_settings_field('sidebar-profile-picture','Profile Picture','sunset_sidebar_profile','alecaddd_sunset','sunset-sidebar-options');
  add_settings_field('sidebar-name','Full Name','sunset_sidebar_name','alecaddd_sunset','sunset-sidebar-options');
  add_settings_field('sidebar-user_description','User Description','sunset_sidebar_user_description','alecaddd_sunset','sunset-sidebar-options');
  add_settings_field('sidebar_twitter', 'Twitter handler','sunset_sidebar_twitter','alecaddd_sunset','sunset-sidebar-options');
  add_settings_field('sidebar_vk', 'vk','sunset_sidebar_vk','alecaddd_sunset','sunset-sidebar-options');
  add_settings_field('sidebar_facebook', 'facebook','sunset_sidebar_facebook','alecaddd_sunset','sunset-sidebar-options');

  //Theme support options



  register_setting( 'sunset-theme-support', 'post_formats' );
  register_setting( 'sunset-theme-support', 'custom_header' );
  register_setting( 'sunset-theme-support', 'custom_background' );

  add_settings_section( 'sunset-theme-options', 'Theme Options', 'sunset_theme_options', 'alecaddd_sunset_theme' );

  add_settings_field( 'post-formats', 'Post Formats', 'sunset_post_formats', 'alecaddd_sunset_theme', 'sunset-theme-options' );
  add_settings_field( 'custom-header', 'Custom Header', 'sunset_custom_header', 'alecaddd_sunset_theme', 'sunset-theme-options' );
  add_settings_field( 'custom-background', 'Custom Background', 'sunset_custom_background', 'alecaddd_sunset_theme', 'sunset-theme-options' );


  //contact form options
  register_setting('sunset-contact-options','activate_contact');
  add_settings_section('sunset-contact-section','Contact Form','sunset_contact_section','alecaddd_sunset_theme_contact');
  add_settings_field('activate-form', 'Activate Contact Form','sunset_activate_contact','alecaddd_sunset_theme_contact','sunset-contact-section');
}

//post formats callback function


function sunset_theme_options() {
  echo 'Activate an deactivate specific Theme Support Options';
}

function sunset_contact_section() {
  echo 'Activate an deactivate the Built-in Contact Form';
}


/////sunset_post_formats

function sunset_post_formats() {
  $options = get_option( 'post_formats' );
  $formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
  $output = '';
  foreach ( $formats as $format ){
    $checked = ( @$options[$format] == 1 ? 'checked' : '' );
    $output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
  }
  echo $output;
}

function sunset_custom_header() {
  $options = get_option( 'custom_header' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}

function sunset_custom_background() {
  $options = get_option( 'custom_background' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' />Activate the Custom Background</label>';
}

function sunset_activate_contact() {
  $options = get_option( 'activate_contact' );
  $checked = ( @$options == 1 ? 'checked' : '' );
  echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '.$checked.' /></label>';
}

//sidebar_options
function sunset_sidebar_options() {
  echo 'Customize your Sidebar Information';
}

function sunset_sidebar_profile() {
  $picture = esc_attr( get_option('profile_picture'));
  if(empty($picture)) {
    echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button">
<input type="hidden" id="profile-picture" name="profile_picture" value=""/>';
  }
  else {
    echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button">
<input type="hidden" id="profile-picture" name="profile_picture" value="'
      .$picture.'"/> <input type="button" class="button button-secondary"
value="Remove" id="remove-picture">';
  }

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
  echo '<h1>Sunset CSS Options</h1>';
}

function sunset_theme_support_page() {
  require_once(get_template_directory() . '/inc/templates/sunset-theme-support.php');
}

function alecaddd_sunset_theme_contact() {
  require_once(get_template_directory() . '/inc/templates/sunset-contact-form.php');
}



function sanitize_input_custom_field($input) {
  $output = sanitize_text_field($input);
  $output = str_replace('@', '',$output);
  return $output;
}

























