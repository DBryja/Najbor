</main>
<div class="transition-box">
    <div class="loader"></div>
</div>

<script>
    const transitionBox = document.querySelector('.transition-box');
    let isTransitioning = false;

    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', (event) => {
            if(isTransitioning) return;
            isTransitioning = true;

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
    function runTransitionAnimation() {
        gsap.to(transitionBox, {
            y: "-100%",
            duration: 0.6,
            ease: 'power4.inOut',
            onComplete: () => {
                transitionBox.classList.add('ranAnim');
            }
        });
    }

    window.addEventListener('DOMContentLoaded', () => {
        runTransitionAnimation()
    });
    window.addEventListener('load', () => {
       setTimeout(() => {
            if(!transitionBox.classList.contains('ranAnim')){
                runTransitionAnimation()
            }
         }, 1500);
    });
</script>

<footer class="footer">
	<?php
    if(!is_page("kontakt")){
	    get_template_part("template-parts/contact", "form");
    }
	wp_footer();
	?>
</footer>
</body>
</html>
