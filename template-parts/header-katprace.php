<?php
$language = get_site_language();

$term_name = '';
$term_slug = '';

$queried_object = get_queried_object();
$terms = get_the_terms( get_the_ID(), 'katprace' );
$working_object = $queried_object;
if ( $terms && !is_wp_error( $terms ) ) {
	$working_object = $terms[0];
}
$term_id = $working_object->term_id;
$term_name = $working_object->name;
$term_slug = $working_object->slug;
if ($language != "pl"){
	$term_name = get_field($language, 'katprace_' . $term_id);
}
?>

<?php echo $term_name?>
