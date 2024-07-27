<?php
function get_site_language() {
	if (isset($_COOKIE['site_language'])) {
		return $_COOKIE['site_language'];
	}
	return 'pl'; // domyślny język
}
function get_katprace_categories_with_translations() {
	$categories = get_terms([
		'taxonomy' => 'katprace',
		'hide_empty' => false,
	]);

	$categories_with_translations = [];
	if (!is_wp_error($categories)) {
		foreach ($categories as $category) {
			$category_id = $category->term_id;
			$name_fr = get_field('fr', 'katprace_' . $category_id);
			$name_en = get_field('en', 'katprace_' . $category_id);

			$categories_with_translations[] = [
				'slug' => $category->slug,
				'name_pl' => $category->name,
				'name_fr' => $name_fr,
				'name_en' => $name_en,
			];
		}
	}
	return $categories_with_translations;
}

function get_custom_header_template() {
	if (is_front_page() || is_home()) {
		get_template_part('template-parts/header', 'home');
	} elseif (is_page('kontakt')) {
		get_template_part('template-parts/header', 'kontakt');
	} elseif (is_post_type_archive('prace')) {
		get_template_part('template-parts/header', 'prace');
	} elseif (is_tax('katprace')) {
		get_template_part('template-parts/header', 'katprace');
	} elseif (is_singular("prace")){
		get_template_part('template-parts/header', 'single-prace');
	}
	else {
		get_template_part('template-parts/header', 'default');
	}
}
?>