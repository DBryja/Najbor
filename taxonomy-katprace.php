<?php get_header(); ?>

<div class="container">
    <?php if ( have_posts() ) : ?>
        <div class="prace-archive">
            <?php while ( have_posts() ) : the_post();
            $ID = get_the_ID();
            $image = get_field("Obraz", $ID);
            ?>
                <div class="prace-archive__row">
                    <div class="prace-archive__item" data-shape="<?php echo get_image_shape($image["width"], $image["height"]); ?>">
                        <a href="<?php the_permalink(); ?>">
                            <picture>
                                <source srcset="<?php echo $image["url"]?>.webp" type="image/webp">
                                <source srcset="<?php echo $image["url"]?>" type="image/jpeg">
                                <img class="img-fluid" src="<?php echo $image["url"]?>" alt="<?php echo $image["alt"]?>">
                            </picture>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

    <?php else : ?>
        <p><?php esc_html_e( 'Nie znaleziono żadnych prac.', 'twoj-motyw' ); ?></p>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const items = document.querySelectorAll('.prace-archive__item');
        items.forEach(item => {
            const shape = item.getAttribute('data-shape');
            let startColumn, endColumn, span;

            switch (shape) {
                case 'thin':
                    span = 3;
                    break;
                case 'square':
                    span = 5;
                    break;
                case 'wide':
                    span = 7;
                    break;
                case 'very-wide':
                    span = 10;
                    break;
                default:
                    span = 5;
                    break;
            }
            startColumn = Math.floor(Math.random() * (10 - span + 1)) + 1;
            endColumn = startColumn + span;

            item.style.gridColumnStart = startColumn;
            item.style.gridColumnEnd = endColumn;
        });
    });
</script>


<?php get_footer(); ?>
