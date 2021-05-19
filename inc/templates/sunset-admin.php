<h1>sunset admin php h1 h </h1>
<?php settings_errors();?>

<?php
  $firstName = esc_attr( get_option('first_name'));
  $lastName = esc_attr( get_option('last_name'));
  $fullName = $firstName . ' ' . $lastName;
  $user_description = esc_attr( get_option('user_description'));
  $picture = esc_attr( get_option('profile_picture'));
?>

<div class="show_form_wr">
  <div class="sunset-sidebar-preview">
    <div class="sunset-sidebar">
      <div id="profile-picture-preview" style="background-image: url(<?php print $picture?>)"></div>
      <h1><?php print $firstName ?></h1>
      <h2><?php print $lastName ?></h2>
      <p><?php print $user_description ?></p>
      <div class="icon-wrapper">

      </div>
    </div>
  </div>

  <form method="post" action="options.php" class="sunset-general-form">
    <?php
      settings_fields('sunset-settings-group');
      do_settings_sections('alecaddd_sunset');
      submit_button('Save Changes', 'primary','btnSubmit');
    ?>
  </form>
</div>
