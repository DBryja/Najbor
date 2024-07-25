<?php
/* Template Name: Prace Na Sprzedaż */

get_header();
$language = get_site_language();

$p1 = new stdClass();
$p1->pl = get_field('p1_pl');
$p1->en = get_field('p1_en');
$p1->fr = get_field('p1_fr');
?>

<div class="content-area">
	<main class="site-main">
		<h1><?php the_title(); ?></h1>
        <p><?php echo esc_html($p1->$language) ?></p>

		<?php
		// WP_Query zapytanie
		$args = [
			'post_type' => 'prace',
			'meta_query' => [
				[
					'key' => 'na_sprzedaz',
					'value' => '1', // True zapisywane jest jako 1
					'compare' => '='
				]
			]
		];

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) : $query->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
			<?php endwhile;
			wp_reset_postdata();
		else :
            echo '<p> . esc_html($p1->$language) . </p>';
            ?>
		<?php endif; ?>
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
