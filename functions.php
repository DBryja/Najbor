<?php
function najbor_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
//    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form'));
}
add_action("after_setup_theme", "najbor_theme_support");
function najbor_register_styles(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('najbor-style', get_template_directory_uri() . '/style.css', array(), $version, 'all');
	wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/css/style.css', array(), null, 'all');
}
add_action("wp_enqueue_scripts", "najbor_register_styles");

function najbor_register_scripts(){
//    wp_deregister_script('jquery');
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js', array(), '3.4.1', true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), null, true);
}
add_action("wp_enqueue_scripts", "najbor_register_scripts");

// <<< UTILS
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


// UTILS >>>

// <<< REJESTROWANIE ACF I CPT
function cptui_register_my_taxes_katprace() {
	$labels = [
		"name" => esc_html__( "Kategorie Prac", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Kategorie Prac", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "Kategorie Prac", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		'rewrite' => [ 'slug' => 'prace', 'with_front' => true ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "katprace",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "katprace", [ "prace" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_katprace' );

// REJESTROWANIE ACF I CPT >>>

// <<< PRZEKSZTAŁCANIE LINKÓW
function custom_post_permalink( $post_link, $post ) {
	if ( 'prace' === $post->post_type ) {
		$terms = wp_get_object_terms( $post->ID, 'katprace' );
		if ( $terms && ! is_wp_error( $terms ) ) {
			$taxonomy_slug = $terms[0]->slug;
			$post_link = str_replace( '%katprace%', $taxonomy_slug, $post_link );
		}
	}
	return $post_link;
}
add_filter( 'post_type_link', 'custom_post_permalink', 10, 2 );
function custom_taxonomy_permalink( $termlink, $term, $taxonomy ) {
	if ( 'katprace' === $taxonomy ) {
		$termlink = home_url( user_trailingslashit( 'prace/' . $term->slug ) );
	}
	return $termlink;
}
add_filter( 'term_link', 'custom_taxonomy_permalink', 10, 3 );

// PRZEKSZTAŁCANIE LINKÓW >>>


// <<< DODATKOWE POLA W PANELU ADMINISTRACYJNYM
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

// USUWANIE ZBĘDNYCH ELEMENTÓW Z PANELU ADMINISTRACYJNEGO >>>
?>


