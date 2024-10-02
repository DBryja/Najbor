<?php
	$language = get_site_language();
?>

<form id="language-form" class="lang">
    <label class="cursor--click lang__item <?php echo ($language == 'pl') ? 'active' : ''; ?>">
        <input type="radio" name="language" value="pl" <?php checked($language, 'pl'); ?>>
        <span>
            <?php _e('PL', 'textdomain'); ?>
        </span>
    </label>
    <label class="cursor--click lang__item <?php echo ($language == 'fr') ? 'active' : ''; ?>">
        <input type="radio" name="language" value="fr" <?php checked($language, 'fr'); ?>>
        <span>
            <?php _e('FR', 'textdomain'); ?>
        </span>
    </label>
    <label class="cursor--click lang__item <?php echo ($language == 'en') ? 'active' : ''; ?>">
        <input type="radio" name="language" value="en" <?php checked($language, 'en'); ?>>
        <span>
            <?php _e('EN', 'textdomain'); ?>
        </span>
    </label>
</form>

<script>
    // const userLanguage = navigator.language || navigator.userLanguage;
    // const supportedLanguages = ['pl', 'en', 'fr'];
    // const languageCode = userLanguage.substring(0, 2);
    // const currentLanguage = document.cookie.split('; ').find(row => row.startsWith('site_language=')).split('=')[1];
    // if (supportedLanguages.includes(languageCode) && currentLanguage !== languageCode) {
    //     document.cookie = "site_language=" + languageCode + "; path=/";
    //     location.reload();
    // }

    document.querySelectorAll('input[name="language"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            const selectedLanguage = this.value;
            document.cookie = "site_language=" + selectedLanguage + "; path=/";
            location.reload();
        });
    });
</script>
