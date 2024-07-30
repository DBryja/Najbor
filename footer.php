<?php
wp_footer();
?>
</main>

<footer class="footer text-center py-2 theme-bg-dark">
    <script>
        const cursorBox = document.querySelector('.cursor');
        const cursorImage = document.querySelector('.cursor__image');

        document.addEventListener('mousemove', (e) => {
            const mouseX = e.clientX;
            const mouseY = e.clientY;

            gsap.to(cursorBox, {
                duration: 0.3,
                x: mouseX,
                y: mouseY,
            });
        });
        const categoryItems = document.querySelectorAll('.categories .menu__item');

        let mouseX, lastMouseX = 0;
        let speed = 0;
        let directionX = 0;
        let skewX = 0;
        function applyTransform(){
            skewX = directionX * speed * 0.8;
            gsap.to(cursorImage, {
                skewX: skewX,
            })
        }
        function updateMouseAttributes(e){
            mouseX = e.clientX;
            const deltaX = mouseX - lastMouseX;
            speed = Math.sqrt(deltaX * deltaX);
            directionX = deltaX / speed || 0;
            lastMouseX = mouseX;
            applyTransform();
        }

        let hideImageTimeout = null;

        categoryItems.forEach((item) => {
            item.addEventListener('mouseover', function() {
                if(hideImageTimeout){
                    clearTimeout(hideImageTimeout);
                }
                const thumbnail = this.getAttribute('data-thumbnail');
                gsap.set(cursorImage, {
                    backgroundImage: `url(${thumbnail})`,
                    translateX: "-50%",
                    translateY: "-50%",
                });
                gsap.fromTo(cursorImage, {
                    width: 0,
                    opacity: 1,
                    filter: "brightness(2)",
                },{
                    opacity: 1,
                    duration: 0.5,
                    width: '10rem',
                    ease: 'power2.out',
                    filter: "brightness(1)"
                });
            });
            item.addEventListener('mousemove', updateMouseAttributes)

            item.addEventListener('mouseleave', function () {
                gsap.to(cursorImage, {
                    duration: 0.15,
                    width: 0,
                    opacity: 0,
                    ease: 'power2.out',
                });
                hideImageTimeout = setTimeout(() => {
                    gsap.set(cursorImage, {
                        backgroundImage: 'none',
                    });
                }, 150);
            });
        })
    </script>
</footer>
</body>
</html>
