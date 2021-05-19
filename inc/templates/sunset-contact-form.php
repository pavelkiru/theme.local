<h1>Sunset Contact Form</h1>
<?php settings_errors();?>


<form method="post" action="options.php" class="sunset-general-form">
  <?php
  settings_fields('sunset-contact-options');
  do_settings_sections('alecaddd_sunset_theme_contact');
  submit_button('Save Changes', 'primary','btnSubmit');
  ?>
</form>
