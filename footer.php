<?php
wp_footer();
?>
</main>

<footer class="footer text-center py-2 theme-bg-dark">
    <script>
        const imageContainers = document.querySelectorAll('.image-container');
        const follower = document.querySelector('.follower');

        document.addEventListener('mousemove', (e) => {
            const mouseX = e.clientX;
            const mouseY = e.clientY;

            follower.style.left = `${mouseX}px`;
            follower.style.top = `${mouseY}px`;
        });

        imageContainers.forEach(container => {
            container.addEventListener('mouseenter', () => {
                follower.style.opacity = '0.5';
            });

            container.addEventListener('mouseleave', () => {
                follower.style.opacity = '1';
            });
        });
    </script>

</footer>
</body>
</html>
