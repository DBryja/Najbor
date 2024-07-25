<?php get_header(); ?>

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
                // Wczytaj dane z custom fields
//                $autor_pracy = get_post_meta( get_the_ID(), 'autor_pracy', true );
//                $data_wykonania = get_post_meta( get_the_ID(), 'data_wykonania', true );
//                $opis_pracy = get_post_meta( get_the_ID(), 'opis_pracy', true );
                $ID = get_the_ID();
                $metoda = get_field('metoda', $ID );
                $data_wykonania = get_field('rok_powstania', $ID );
                $opis_pracy = get_field('opis', $ID );
                $na_sprzedaz = get_field("na_sprzedaz", $ID);
                echo '<h2>Informacje o pracy</h2>';

                // Sprawdź, czy dane są dostępne i wyświetl je
                if ( !empty( $metoda ) ) {
                    echo '<p><strong>Metoda:</strong> ' . esc_html( $metoda ) . '</p>';
                }

                if ( !empty( $data_wykonania ) ) {
                    echo '<p><strong>Data wykonania:</strong> ' . esc_html( $data_wykonania ) . '</p>';
                }

                if ( !empty( $opis_pracy ) ) {
                    echo '<p><strong>Opis:</strong> ' . wp_kses_post($opis_pracy) . '</p>';
                }
                if ( !empty( $opis_pracy ) ) {
	                echo '<p><strong>Na sprzedaż:</strong> ' . esc_html($na_sprzedaz) . '</p>';
                }
                ?>
            </div>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
