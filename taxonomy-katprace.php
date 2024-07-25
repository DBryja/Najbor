<?php get_header(); ?>

<div class="container">
    <h1><?php single_term_title(); ?></h1>

    <?php if ( have_posts() ) : ?>
        <div class="prace-archive">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="praca-item">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="praca-thumbnail image-container">
                        <picture>
                            <source srcset="<?php the_post_thumbnail_url('medium');?>.webp" type="image/webp">
                            <source srcset="<?php the_post_thumbnail_url('medium'); ?>" type="image/jpeg">
                            <img class="img-fluid" src="<?php the_post_thumbnail_url('medium'); ?>" alt="image">
                        </picture>
                    </div>
                    <div class="praca-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?php the_posts_pagination(); ?>
    <?php else : ?>
        <p><?php esc_html_e( 'Nie znaleziono żadnych prac.', 'twoj-motyw' ); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
