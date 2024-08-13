<?php
/* Template Name: Prace Na Sprzedaż */

get_header();
$language = get_site_language();

$p1 = new stdClass();
$p1->pl = get_field('p1_pl');
$p1->en = get_field('p1_en');
$p1->fr = get_field('p1_fr');
?>

<div class="container">
		<?php
		$args = [
			'post_type' => 'prace',
			'meta_query' => [
				[
					'key' => 'na_sprzedaz',
					'value' => '1',
					'compare' => '='
				]
			]
		];
		$query = new WP_Query( $args );

		if ( $query->have_posts() ) : ?>
        <div class="prace-archive">
			<?php while ( $query->have_posts() ) : $query->the_post();
				$ID = get_the_ID();
				$image = get_field("Obraz", $ID);
                ?>
                <div class="prace-archive__row">
                    <article class="prace-archive__item" data-shape="<?php echo get_image_shape($image["width"], $image["height"]); ?>">
                        <a href="<?php the_permalink(); ?>">
                            <picture>
                                <source srcset="<?php echo $image["url"]?>.webp" type="image/webp">
                                <source srcset="<?php echo $image["url"]?>" type="image/jpeg">
                                <img loading="lazy" src="<?php echo $image["url"]?>" alt="<?php echo $image["alt"]?>">
                            </picture>
                        </a>
                    </article>
                </div>
			<?php
                endwhile;
                wp_reset_postdata();?>
        </div>
			<?php else : ?>
            <p><?php esc_html_e( 'Nie znaleziono żadnych prac.', 'twoj-motyw' ); ?></p>
		<?php endif; ?>
<?php get_footer(); ?>
