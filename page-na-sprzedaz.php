<?php
/* Template Name: Prace Na Sprzedaż */

get_header(); ?>

<div class="content-area">
	<main class="site-main">
		<h1><?php the_title(); ?></h1>

		<?php
		// WP_Query zapytanie
		$args = [
			'post_type' => 'prace',
			'meta_query' => [
				[
					'key' => 'na_sprzedaz',
					'value' => '1', // Zakładając, że wartość True jest zapisywana jako '1'
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
		else : ?>
			<p><?php esc_html_e( 'Nie znaleziono prac na sprzedaż.', 'text-domain' ); ?></p>
		<?php endif; ?>
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
