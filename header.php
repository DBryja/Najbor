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
<div class="cursor">
    <div class="cursor__arrow"></div>
    <div class="cursor__image"></div>
</div>
<?php
    if(is_front_page() || is_home()){
	    get_template_part("template-parts/header", "animation");
    }
?>
<header class="header">
    <div class="logo">
        <a href="<?php echo $home?>"><img src="<?php echo get_template_directory_uri()?>/assets/images/logo.png" alt=""></a>
    </div>
    <h3>
        <?php get_heading_template(); ?>
    </h3>
    <div class="header__menu cursor--click">
        Menu
    </div>
</header>
<div class="menu inactive">
    <ul class="menu__list main">
        <li class="menu__item cursor--click item"><a href="<?php echo $home?>/">home</a></li>
        <li class="menu__item cursor--click item prace">prace</li>
        <li class="menu__item cursor--click item"><a href="<?php echo $home?>/kontakt">kontakt</a></li>
        <li class="menu__item cursor--click item"><a href="<?php echo $home?>/na-sprzedaz">na sprzedaż</a></li>
        <li class="menu__item cursor--click item"><a href="<?php echo $home?>/prace/sytuacje">sytuacje</a></li>
	    <br/>
        <?php get_template_part("template-parts/header", "language-selector") ?>
    </ul>
    <ul class="menu__list hidden categories">
		<?php
		$categories = get_katprace_categories_with_translations();
		foreach ($categories as $category) {
			$name = $category['name_' . $language];
			$slug = $category['slug'];
			$thumbnail_url = $category['thumbnail_url'];
			echo "<li class='menu__item animate cursor--img item' data-thumbnail='$thumbnail_url'><a href='$home/prace/$slug'>$name</a></li>";
		}
		?>
    </ul>
</div>
<script>
    const menuContainer = document.querySelector('.menu');
    const button = document.querySelector('.header__menu');
    const prace = document.querySelector('.prace');
    const mainMenu = document.querySelector('ul.main');
    const subMenu = document.querySelector('ul.categories');

    const selector = ".menu__list:not([hidden]) .menu__item.animate"
    const ease = 'circ';
    const duration = 0.1;

    function menuItemsEnter({reverse}={reverse: false}) {
        reverse = reverse ? -1 : 1;
        return new Promise((resolve) => {
            gsap.set(selector, {
                y: "0",
                opacity: 1,
            });
            gsap.from(selector, {
                duration: duration,
                y: "1rem",
                opacity: 0,
                stagger: reverse * duration/2,
                ease: ease,
                onComplete: resolve
            });
        });
    }
    function menuItemsLeave({reverse}={reverse: false}){
        reverse = reverse ? -1 : 1;
        return new Promise((resolve) => {
            gsap.to(selector, {
                duration: duration/2,
                y: "-1rem",
                opacity: 0,
                stagger: reverse*duration/1.5,
                ease: ease,
                onComplete: resolve
            });
        });
    }
    function toggleMenu(){
        menuContainer.classList.toggle('active');
        menuContainer.classList.toggle("inactive");
    }
    function toggleMenuOptions(){
        mainMenu.classList.toggle('hidden');
        subMenu.classList.toggle('hidden');
    }

    prace.addEventListener('click',async () => {
        menuItemsLeave({reverse:true}).then(()=>{
            menuItemsEnter({reverse:true});
            toggleMenuOptions();
            }
        );
    });

    button.addEventListener('click', () => {
        toggleMenu();
        menuItemsEnter();
    });
    menuContainer.addEventListener('click', async (e) => {
        if(e.target === menuContainer){
            setTimeout(()=>{
                toggleMenu();
            }, 300);
            await menuItemsLeave().then(()=>{
                if(document.querySelector("ul.main").classList.contains("hidden"))
                 toggleMenuOptions();
            });
        }
    });
</script>

<main class="main-wrapper">

