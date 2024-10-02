<?php
$language = get_site_language();

$term_name = '';
$term_slug = '';
$ID = get_the_ID();
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

<a href="<?php echo get_term_link($term_slug, 'katprace'); ?>" class="hideOnScroll">
	<?php echo $term_name?>
</a>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hideOnScroll = document.querySelector('h3:has(.hideOnScroll)');
        const header = document.querySelector('.header');
        const headerHeight = header.offsetHeight;
        const headerBottom = header.offsetTop + headerHeight/2;
        let lastScroll = 0;
        let currentScroll;

        window.addEventListener('scroll', function() {
            currentScroll = window.scrollY;

            if (currentScroll > headerBottom) {
                // Scroll down animation
                gsap.to(hideOnScroll, { duration: 0.1, y: -20, opacity: 0, pointerEvents: "none", ease: 'none' });
            } else {
                // Scroll up animation
                gsap.to(hideOnScroll, { duration: 0.1, y: 0, opacity: 1, pointerEvents: "all", ease: 'none' });
            }

            lastScroll = currentScroll <= 0 ? 0 : currentScroll;
        });
    });
</script>