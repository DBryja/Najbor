

<?php
/**
 * Template Name: Custom Template
 *
 * A custom template for displaying specific content.
 */
get_header();
$lang = get_site_language();
$labels = array(
	'metoda' => array(
		'pl' => 'Metoda',
		'en' => 'Method',
		'fr' => 'Méthode'
	),
	'wymiary' => array(
		'pl' => 'Wymiary',
		'en' => 'Dimensions',
		'fr' => 'Dimensions'
	),
	'oprawa' => array(
		'pl' => 'Oprawa',
		'en' => 'Framing',
		'fr' => 'Encadrement'
	),
	'rok_powstania' => array(
		'pl' => 'Rok powstania',
		'en' => 'Year of creation',
		'fr' => 'Année de création'
	)
);
?>

<?php while ( have_posts() ) : the_post();
    $ID = get_the_ID() ? get_the_ID() : the_ID();
    $acf = get_praca_data( $ID );
    $orientation = $acf["obraz"]["width"] > $acf["obraz"]["height"]*1.3 ? "landscape" : "portrait";
?>
<div class="single <?php echo $orientation?>">
	<article id="post-<?php echo $ID; ?>" <?php post_class(); ?>>
        <div class="single__image">
            <picture>
                <source srcset="<?php echo $acf["obraz"]["url"];?>.webp" type="image/webp">
                <source srcset="<?php echo $acf["obraz"]["url"]; ?>" type="image/jpeg">
                <img class="img-fluid" src="<?php echo $acf["obraz"]["url"]; ?>" alt="image">
            </picture>
        </div>
		<div class="single__details">
            <script>
                console.log(<?php echo json_encode($acf)?>);
            </script>
            <div>
                <h2><?php echo $acf["tytul"][$lang]?></h2>
                <p><?php echo $acf["opis"][$lang]?></p>
            </div>
            <table>
<!--                //TODO: make fallback for missing translations-->
                <?php
                foreach(array_keys($labels) as $field){
	                if (!empty($acf[$field][$lang]) && is_string($acf[$field][$lang])) {
		                echo "<tr>
                            <td>{$labels[$field][$lang]}:</td>
                            <td class='--heading'>{$acf[$field][$lang]}</td>
                        </tr>";
	                } elseif (!empty($acf[$field]) && is_string($acf[$field])) {
		                echo "<tr>
                           <td>{$labels[$field][$lang]}:</td>
                           <td class='--heading'>{$acf[$field]}</td>
                        </tr>";
	                }
                }
                ?>
            </table>
		</div>
		<?php endwhile; ?>
</div>

<?php get_footer(); ?>
