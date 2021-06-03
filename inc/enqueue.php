<?php
/*
 * ==========================
 *  ADMIN ENQUEUE FUNCTIONS
 * ==========================
 * */


function sunset_load_admin_scripts($hook) {
 // echo $hook;
  if("toplevel_page_alecaddd_sunset" == $hook) {
    wp_register_style('sunset_admin',get_template_directory_uri() . '/css/sunset.admin.css', array(), '1.0.0', 'all');
    wp_enqueue_style('sunset_admin');
    wp_enqueue_media();
    wp_register_script('sunset-admin-script', get_template_directory_uri() . '/js/sunset.admin2.js', array('jquery'),'1.0.0',
      false);
    wp_enqueue_script('sunset-admin-script');
  }
  else if('sunset_page_alecadd_sunset_css' == $hook) {
    wp_enqueue_script('ace',get_template_directory_uri() . '/js/ace/ace/js', array('jquery'), '1.2.1', true);
  }
  else {
    return;
  }

}

add_action('admin_enqueue_scripts','sunset_load_admin_scripts');


/*
 * ==========================
 *  FRONT-END ENQUEUE FUNCTIONS
 * ==========================
 * */




















