<!DOCTYPE html>
<html lang="en">
<head>
<!--    <title>Blog Site Template</title>-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Site Template">
    <meta name="author" content="https://youtube.com/FollowAndrew">
    <link rel="shortcut icon" href="images/logo.png">

    <?php
    wp_head();
    $language = get_site_language();
    $home = get_home_url();
    ?>
</head>

<body>
<div class="follower"></div>
<?php
    if(is_front_page() || is_home()){
	    get_template_part("template-parts/header", "animation");
    }
?>
<header class="header">
    <div class="logo">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/logo.png" alt="">
    </div>
    <div class="header__menu">
        Menu
    </div>
</header>
<div class="menu">
    <ul class="menu__list">
        <li class="menu__item"><a href="<?php echo $home?>/">home</a></li>
        <li class="menu__item" class="prace">prace</li>
        <li class="menu__item"><a href="<?php echo $home?>/kontakt">kontakt</a></li>
        <li class="menu__item"><a href="<?php echo $home?>/na-sprzedaz">na sprzedaż</a></li>
        <li class="menu__item"><a href="<?php echo $home?>/prace/sytuacje">sytuacje</a></li>
    </ul>
	<?php get_template_part("template-parts/header", "language-selector") ?>
<!--    <ul class="hidden">-->
<!--		--><?php
//		$categories = get_katprace_categories_with_translations();
//		foreach ($categories as $category) {
//			$name = $category['name_' . $language];
//			$slug = $category['slug'];
//			echo "<li><a href='$home/prace/$slug'>$name</a></li>";
//		}
//		?>
<!--    </ul>-->
</div>
<script>
    const menu = document.querySelector('.menu');
    const button = document.querySelector('.header__menu');
    const prace = document.querySelector('.prace');

    const ease = 'circ';
    const duration = 0.1;

    function menuItemsEnter(){
        gsap.set('.menu__item', {
            y: "0",
            opacity: 1,
        });
        gsap.from('.menu__item', {
            duration: duration,
            y: "1rem",
            opacity: 0,
            stagger: duration,
            ease: ease
        })
    }
    function menuItemsLeave(){
        gsap.to('.menu__item', {
            duration: duration,
            y: "-1rem",
            opacity: 0,
            stagger: duration,
            ease: ease,
        })
    }

    // prace.addEventListener('click', () => {
    //     prace.querySelector('ul').classList.toggle('hidden');
    // });

    button.addEventListener('click', () => {
        menu.classList.add('active');
        menu.classList.remove("inactive");
        menuItemsEnter();
    });
    menu.addEventListener('click', (e) => {
        if(e.target === menu){
            menuItemsLeave();
                menu.classList.remove('active');
                menu.classList.add("inactive");
        }
    });
</script>

<main class="main-wrapper">
    <div class="page-title theme-bg-light text-center gradient py-5">
            <h1 class="heading">
	                <?php get_custom_header_template(); ?>
            </h1>
    </div>

