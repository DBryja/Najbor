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
			$thumbnail = get_field('thumbnail', 'katprace_' . $category_id);
			$order = get_field('order', 'katprace_' . $category_id);

			$categories_with_translations[] = [
				'slug' => $category->slug,
				'name_pl' => $category->name,
				'name_fr' => $name_fr,
				'name_en' => $name_en,
				'thumbnail_url' => $thumbnail,
				'order' => $order,
			];
		}
	}
	usort($categories_with_translations, function($a, $b) {
		return $a['order'] <=> $b['order'];
	});

	return $categories_with_translations;
}

function get_heading_template() {
	if (is_front_page() || is_home()) {
		get_template_part('template-parts/header', 'home');
	} elseif (is_page('kontakt')) {
		get_template_part('template-parts/header', 'kontakt');
	} elseif (is_page('na-sprzedaz')) {
		get_template_part("template-parts/header", "na-sprzedaz");
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

function get_praca_data($ID){
	$custom_fields = array(
		'ID' => $ID,
		'obraz' => get_field('Obraz', $ID),
		'na_sprzedaz' => get_field('na_sprzedaz', $ID),
		'rok_powstania' => get_field('rok_powstania', $ID),
		'wymiary' => get_field('wymiary', $ID),
		"tytul" => array(
			"pl" => get_field("tytul", $ID),
			"en" => get_field('tytul_en', $ID),
			"fr" => get_field('tytul_fr', $ID),
		),
		"opis" => array(
			"pl" => get_field('opis', $ID),
			"en" => get_field('opis_en', $ID),
			"fr" => get_field('opis_fr', $ID),
		),
		"metoda" => array(
			"pl" => get_field('metoda', $ID),
			"en" => get_field('metoda_en', $ID),
			"fr" => get_field('metoda_fr', $ID),
		),
		"oprawa" => array(
			"pl" => get_field('oprawa', $ID),
			"en" => get_field('oprawa_en', $ID),
			"fr" => get_field('oprawa_fr', $ID),
		)
	);
	return $custom_fields;
}
function get_image_shape($width, $height) {
	$aspect_ratio = $width / $height;

	if ($aspect_ratio <= 0.8 ) {
		return 'thin';
	} elseif ($aspect_ratio > 0.8 && $aspect_ratio <= 1.25) {
		return 'square';
	} elseif ($aspect_ratio > 1.25 && $aspect_ratio <= 1.5) {
		return 'wide';
	} else {
		return 'very-wide';
	}
}
?>