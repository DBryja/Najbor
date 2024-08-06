<?php
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

function custom_single_template($template) {
	global $wp, $wp_query;

	// Uzyskaj aktualną ścieżkę URL
	$current_url = home_url(add_query_arg(array(), $wp->request));

	// Podziel URL na komponenty
	$path = trim(parse_url($current_url, PHP_URL_PATH), '/');
	$path_parts = explode('/', $path);
	$taxonomies = get_terms(array('taxonomy' => 'katprace', 'fields' => 'slugs', 'hide_empty' => false));
	function returnTemplate($wp_query, $post_title){
		$post = get_page_by_path($post_title, OBJECT, 'prace');

		if($post){
			$wp_query->query_vars['post_type'] = 'prace';
			$wp_query->query_vars['name'] = $post_title;
			$wp_query->queried_object = $post;
			$wp_query->queried_object_id = $post->ID;
			$wp_query->is_single = true;
			$wp_query->is_404 = false;
			$wp_query->post = $post;
			$wp_query->posts = array($post);
			$wp_query->found_posts = 1;
			$wp_query->post_count = 1;
			$wp_query->max_num_pages = 1;
			setup_postdata($post);
		}

		$new_template = locate_template(array('custom-template.php'));
		if (!empty($new_template)) {
			echo "<script>console.log('zwrocilem template');</script>";
			return $new_template;
		}
	}

	// Sprawdź, czy ścieżka ma odpowiednie komponenty
	if (count($path_parts) === 4 || count($path_parts) === 3) {
		if (count($path_parts) === 4) {
			list($wordpress, $post_type, $taxonomy, $post_title) = $path_parts;
//			echo "<script>console.log(" . json_encode($taxonomies) . ")</script>";
			if ($wordpress === 'wordpress' && $post_type === 'prace' && in_array($taxonomy, $taxonomies)) $template = returnTemplate($wp_query, $post_title);
		} elseif (count($path_parts) === 3) {
			list($post_type, $taxonomy, $post_title) = $path_parts;
			if ($post_type === 'prace' && in_array($taxonomy, $taxonomies)) $template = returnTemplate($wp_query, $post_title);
		}
	}

	return $template;
}
add_filter('template_include', 'custom_single_template');

?>