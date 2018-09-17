<h1>Webalive Theme Options</h1>

<?php settings_errors(); ?>

<form method="post" action="options.php">
    <?php
    settings_fields('webalive-settings-group');
    do_settings_sections("webalive_setting");
    submit_button();
    ?>
</form> 