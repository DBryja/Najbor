<?php get_header(); ?>

<div class="container">
	<?php
	$categories_with_translations = get_katprace_categories_with_translations();
    $language = get_site_language();

	if (!empty($categories_with_translations)) {
        echo '<ul>';
        foreach ($categories_with_translations as $category) {
	        echo '<li> <a href="'.get_term_link($category['slug'], 'katprace') . '">';
            switch ($language) {
                case 'pl_PL':
                    echo esc_html($category['name']);
	                break;
                case 'fr_FR':
                    echo esc_html($category['name_fr']);
	                break;
                case 'en_US':
                    echo esc_html($category['name_en']);
	                break;
            }
	        echo '</a></li><br/>';
        }
        echo '</ul>';
	} else {
		echo 'Brak kategorii do wyświetlenia.';
	}
	?>

</div>

<?php get_footer(); ?>
