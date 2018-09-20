<h1>Sunset Sidebar Options</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php">
    <?php settings_fields('sunset-settings-group'); ?>
    <?php do_settings_sections('alecaddd_sunset'); ?>
    <?php submit_button() ?>
</form>

<form method="post" action="options.php">
    <?php settings_fields('sunset-settings-social-group'); ?>
    <?php do_settings_sections('alecaddd_sunset_social'); ?>
    <?php submit_button() ?>
</form>
