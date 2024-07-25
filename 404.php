<?php
get_header();
$page_slug = '404-not-found'; // Slug strony 404-not-found
$page = get_page_by_path($page_slug);
if ($page) {
	$language = get_site_language();
    $quote = get_field('cytat_'.$language, $page->ID);
}

?>

<article class="content px-3 py-5 p-md-5">
    <h1>
	<?php
	if ($quote) {
		echo esc_html($quote);
	} else {
        echo '404 - Page not found';
    }
	?>
    </h1>
</article>
<?php
get_footer();
?>

