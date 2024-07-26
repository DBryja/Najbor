<?php
// Dodaj nowy widok "Na sprzedaż" do menu podtypów
function add_na_sprzedaz_view($views) {
	$current = (isset($_GET['na_sprzedaz']) && $_GET['na_sprzedaz'] == 1) ? 'class="current"' : '';
	$views['na_sprzedaz'] = '<a href="' . admin_url('edit.php?post_type=prace&na_sprzedaz=1') . '" ' . $current . '>Na sprzedaż</a>';
	return $views;
}
add_filter('views_edit-prace', 'add_na_sprzedaz_view');

// Filtrowanie postów w widoku "Na sprzedaż"
function filter_prace_by_na_sprzedaz($query) {
	if (!is_admin() || !$query->is_main_query()) {
		return;
	}

	if ($query->get('post_type') == 'prace' && isset($_GET['na_sprzedaz']) && $_GET['na_sprzedaz'] == 1) {
		$meta_query = [
			[
				'key' => 'na_sprzedaz',
				'value' => '1',
				'compare' => '='
			]
		];
		$query->set('meta_query', $meta_query);
	}
}
add_action('pre_get_posts', 'filter_prace_by_na_sprzedaz');
// DODATKOWE POLA W PANELU ADMINISTRACYJNYM >>>

// <<< USUWANIE ZBĘDNYCH ELEMENTÓW Z PANELU ADMINISTRACYJNEGO
// Usuwa elementy menu komentarzy z panelu administracyjnego
function remove_comment_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_comment_menu');

// Usuwa widgety komentarzy z pulpitu nawigacyjnego
function remove_comment_dashboard_widgets() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'remove_comment_dashboard_widgets');

// Wyłącza funkcje związane z komentarzami
function disable_comments_support() {
	// Wyłącza wsparcie dla komentarzy w typach postów
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'disable_comments_support');

// Usuwa opcje z menu administracyjnego
function disable_comments_admin_bar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'disable_comments_admin_bar');


// Usuwa elementy menu postów z panelu administracyjnego
function remove_post_menu() {
	remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_post_menu');

// Usuwa widgety postów z pulpitu nawigacyjnego
function remove_post_dashboard_widgets() {
	remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
}
add_action('wp_dashboard_setup', 'remove_post_dashboard_widgets');

// Wyłącza wsparcie dla postów
function disable_posts_support() {
	// Wyłącza wsparcie dla domyślnych postów
	remove_post_type_support('post', 'editor');
	remove_post_type_support('post', 'comments');
	remove_post_type_support('post', 'trackbacks');
	remove_post_type_support('post', 'revisions');
	remove_post_type_support('post', 'author');
	remove_post_type_support('post', 'excerpt');
	remove_post_type_support('post', 'page-attributes');
	remove_post_type_support('post', 'thumbnail');
	remove_post_type_support('post', 'custom-fields');
}
add_action('init', 'disable_posts_support');


?>