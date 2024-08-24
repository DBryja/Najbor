<?php get_header();

get_template_part("template-parts/content", "archive-container");

?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        yOffset = -50;

        setTimeout(function() {
            if (window.location.hash) {
                const targetId = window.location.hash.substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    const y = targetElement.getBoundingClientRect().top + window.scrollY + yOffset;
                    window.scrollTo({top: y, behavior: 'smooth'});
                }
            }
        }, 150);
    });
</script>

<?php get_footer(); ?>
