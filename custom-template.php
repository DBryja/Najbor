

<?php
/**
 * Template Name: Custom Template
 *
 * A custom template for displaying specific content.
 */

get_header(); ?>

<div class="container">
	<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<picture>
			<source srcset="<?php the_post_thumbnail_url('full');?>.webp" type="image/webp">
			<source srcset="<?php the_post_thumbnail_url('full'); ?>" type="image/jpeg">
			<img class="img-fluid" src="<?php the_post_thumbnail_url('full'); ?>" alt="image">
		</picture>

		<div class="entry-content">
			<?php the_content(); ?>

			<?php
			$ID = get_the_ID();
			$custom_fields = array(
				'ID' => $ID,
				'tytul' => get_field('tytul', $ID),
				'Obraz' => get_field('Obraz', $ID),
				'na_sprzedaz' => get_field('na_sprzedaz', $ID),
				'opis' => get_field('opis', $ID),
				'metoda' => get_field('metoda', $ID),
				'wymiary' => get_field('wymiary', $ID),
				'oprawa' => get_field('oprawa', $ID),
				'rok_powstania' => get_field('rok_powstania', $ID),
				'tytul_en' => get_field('tytul_en', $ID),
				'opis_en' => get_field('opis_en', $ID),
				'metoda_en' => get_field('metoda_en', $ID),
				'oprawa_en' => get_field('oprawa_en', $ID),
				'tytul_fr' => get_field('tytul_fr', $ID),
				'opis_fr' => get_field('opis_fr', $ID),
				'metoda_fr' => get_field('metoda_fr', $ID),
				'oprawa_fr' => get_field('oprawa_fr', $ID)
			);
			echo "<script>console.log(". json_encode($custom_fields).")</script>";
			echo '<h2>Informacje o pracy</h2>';
			echo '<ul>';
			foreach ($custom_fields as $key => $value) {
				if ($key == 'Obraz' && is_array($value)) {
					echo '';
				} else {
					echo '<li style="color: #000; ">' . ucfirst(str_replace('_', ' ', $key)) . ': ' . esc_html($value) . '</li>';
				}
			}
			echo '</ul>';
			?>
		</div>
		<?php endwhile; ?>
</div>

<?php get_footer(); ?>
