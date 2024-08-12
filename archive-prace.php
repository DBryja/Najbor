<?php get_header(); ?>

<div class="page-prace">
    <ul class="menu__list categories">
		<?php
		$home = get_home_url();
		$language = get_site_language();
		$categories = get_katprace_categories_with_translations();
		foreach ($categories as $category) {
			$name = $category['name_' . $language];
			$slug = $category['slug'];
			$thumbnail_url = $category['thumbnail_url'];
			echo "<li class='menu__item cursor--img item black' data-thumbnail='$thumbnail_url'><a href='$home/prace/$slug'>$name</a></li>";
		}
		?>
    </ul>
</div>

<?php get_footer(); ?>
