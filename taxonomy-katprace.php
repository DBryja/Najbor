<?php get_header(); ?>

<div class="container">
    <?php if ( have_posts() ) : ?>
        <div class="prace-archive">
            <?php while ( have_posts() ) : the_post();
            $ID = get_the_ID();
            $image = get_field("Obraz", $ID);
            ?>
                <div class="prace-archive__row" id="<?php echo $ID; ?>">
                    <article class="prace-archive__item" data-shape="<?php echo get_image_shape($image["width"], $image["height"]); ?>">
                        <a href="<?php the_permalink(); ?>">
                            <picture>
                                <source srcset="<?php echo $image["url"]?>.webp" type="image/webp">
                                <source srcset="<?php echo $image["url"]?>" type="image/jpeg">
                                <img src="<?php echo $image["url"]?>" loading="lazy" alt="<?php echo $image["alt"]?>">
                            </picture>
                        </a>
                    </article>
                </div>
            <?php endwhile; ?>
        </div>

    <?php else : ?>
        <p><?php esc_html_e( 'Nie znaleziono żadnych prac.', 'twoj-motyw' ); ?></p>
    <?php endif; ?>
</div>

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
