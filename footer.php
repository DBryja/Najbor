</main>
<div class="transition-box"></div>

<script>
    const transitionBox = document.querySelector('.transition-box');

    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            gsap.fromTo(transitionBox, {
                y: "100%",
                duration: 0.6,
                ease: 'power4.inOut',
            },{
                y: "0%",
                onComplete: () => {
                    window.location.href = link.href;
                }
            });
        });
    });

    window.addEventListener('DOMContentLoaded', () => {
        gsap.to(transitionBox, {
            y: "-100%",
            duration: 0.6,
            ease: 'power4.inOut',
        });
    });
</script>

<footer class="footer text-center py-2 theme-bg-dark">
	<?php
	wp_footer();
	?>
</footer>
</body>
</html>
