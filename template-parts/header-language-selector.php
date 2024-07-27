<?php
	$language = get_site_language();
?>

<form id="language-form">
    <select id="language-select">
        <option value="pl" <?php selected($language, 'pl'); ?>><?php _e('Polski', 'textdomain'); ?></option>
        <option value="fr" <?php selected($language, 'fr'); ?>><?php _e('Français', 'textdomain'); ?></option>
        <option value="en" <?php selected($language, 'en'); ?>><?php _e('English', 'textdomain'); ?></option>
    </select>
</form>
<script>
    document.getElementById('language-select').addEventListener('change', function() {
        var selectedLanguage = this.value;
        document.cookie = "site_language=" + selectedLanguage + "; path=/";
        location.reload();
    });
</script>