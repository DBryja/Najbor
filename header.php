<!DOCTYPE html>
<?php
    $lang = get_site_language();
    $description = ml_meta_description();
    $title = ml_meta_title();
?>
<html lang="<?php echo $lang ?>">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="pl,en,fr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="https://github.com/dbryja">
    <link rel="shortcut icon" href="<?php echo get_site_icon_url()?>">
    <meta name="description" content="<?php echo $description[$lang]?>">
    <meta property="og:locale" content="<?php echo ml_returnLocale($lang)?>">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Najbor.pl">
    <meta name="twitter:card" content="summary_large_image" class="yoast-seo-meta-tag">

    <!--dynamic-->
	<?php get_template_part("template-parts/head", "meta") ?>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@graph": [
                {
                    "@type": "CollectionPage",
                    "@id": "http://localhost/wordpress/",
                    "url": "http://localhost/wordpress/",
                    "name": [
                        {
                            "@language": "pl",
                            "@value": "Wiktor Najbor – Twórczość, która przenosi w inny wymiar."
                        },
                        {
                            "@language": "en",
                            "@value": "Wiktor Najbor – Art that transcends dimensions."
                        },
                        {
                            "@language": "fr",
                            "@value": "Wiktor Najbor – L'art qui transcende les dimensions."
                        }
                    ],
                    "isPartOf": {
                        "@id": "http://localhost/wordpress/#website"
                    },
                    "about": {
                        "@id": "http://localhost/wordpress/#organization"
                    },
                    "description": [
                      {
                        "@language": "pl",
                        "@value":"Odkryj fascynujący świat sztuki Wiktora Najbora. Zobacz jego wyjątkowe obrazy i projekty artystyczne, które łączą pasję z unikalnym stylem. Przeglądaj galerię dzieł, poznaj artystę i zanurz się w kreatywnym świecie Wiktora Najbora."
                      },
                        {
                            "@language": "en",
                            "@value":"Discover the fascinating world of Wiktor Najbor's art. Explore his unique paintings and artistic projects that blend passion with a distinctive style. Browse the gallery of works, get to know the artist, and immerse yourself in Wiktor Najbor's creative world."
                        },
                        {
                            "@language": "pl",
                            "@value":"Découvrez le monde fascinant de l'art de Wiktor Najbor. Explorez ses peintures uniques et ses projets artistiques qui allient passion et style distinctif. Parcourez la galerie des œuvres, faites connaissance avec l'artiste et plongez dans le monde créatif de Wiktor Najbor."
                        }
                    ],
                    "breadcrumb": {
                        "@id": "http://localhost/wordpress/#breadcrumb"
                    },
                    "inLanguage": ["pl-PL", "en-US", "fr-FR"]
                },
                {
                    "@type": "BreadcrumbList",
                    "@id": "http://localhost/wordpress/#breadcrumb",
                    "itemListElement": [
                        {
                            "@type": "ListItem",
                            "position": 1,
                            "name": [
                                {
                                    "@language": "pl",
                                    "@value": "Start"
                                },
                                {
                                    "@language": "en",
                                    "@value": "Home"
                                },
                                {
                                    "@language": "fr",
                                    "@value": "Accueil"
                                }
                            ],
                            "item": "http://localhost/wordpress/"
                        },
                        {
                            "@type": "ListItem",
                            "position": 2,
                            "name": [
                                {
                                    "@language": "pl",
                                    "@value": "Prace"
                                },
                                {
                                    "@language": "en",
                                    "@value": "Works"
                                },
                                {
                                    "@language": "fr",
                                    "@value": "Travaux"
                                }
                            ],
                            "item": "http://localhost/wordpress/prace"
                        },
                        {
                            "@type": "ListItem",
                            "position": 3,
                            "name": [
                                {
                                    "@language": "pl",
                                    "@value": "Kontakt"
                                },
                                {
                                    "@language": "en",
                                    "@value": "Contact"
                                },
                                {
                                    "@language": "fr",
                                    "@value": "Contact"
                                }
                            ],
                            "item": "http://localhost/wordpress/kontakt"
                        },
                        {
                            "@type": "ListItem",
                            "position": 4,
                            "name": [
                                {
                                    "@language": "pl",
                                    "@value": "Na Sprzedaż"
                                },
                                {
                                    "@language": "en",
                                    "@value": "For Sale"
                                },
                                {
                                    "@language": "fr",
                                    "@value": "à Vendre"
                                }
                            ],
                            "item": "http://localhost/wordpress/na-sprzedaz"
                        }
                    ]
                },
                {
                    "@type": "WebSite",
                    "@id": "http://localhost/wordpress/#website",
                    "url": "http://localhost/wordpress/",
                    "name": "Najbor",
                    "description": [
                        {
                            "@language": "pl",
                            "@value": "Wiktor Najbor – Twórczość, która przenosi w inny wymiar."
                        },
                        {
                            "@language": "en",
                            "@value": "Wiktor Najbor – Art that transcends dimensions."
                        },
                        {
                            "@language": "fr",
                            "@value": "Wiktor Najbor – L'art qui transcende les dimensions."
                        }
                    ],
                    "publisher": {
                        "@id": "http://localhost/wordpress/#organization"
                    },
                    "potentialAction": [
                        {
                            "@type": "ViewAction",
                            "target": [
                                {
                                    "@type": "EntryPoint",
                                    "urlTemplate": "http://localhost/wordpress/{category}/{post_title}"
                                },
                                {
                                    "@type": "EntryPoint",
                                    "urlTemplate": "http://localhost/wordpress/{category}"
                                }
                            ]
                        }
                    ],
                    "inLanguage": ["pl-PL", "en-US", "fr-FR"]
                },
                {
                    "@type": "Organization",
                    "@id": "http://localhost/wordpress/#organization",
                    "name": "Wiktor Najbor",
                    "url": "http://localhost/wordpress/",
                    "logo": {
                        "@type": "ImageObject",
                        "inLanguage": ["pl-PL", "en-US", "fr-FR"],
                        "@id": "http://localhost/wordpress/#/schema/logo/image/",
                        "url": "http://localhost/wordpress/wp-content/uploads/2024/07/cropped-logo-150x150-1.png",
                        "contentUrl": "http://localhost/wordpress/wp-content/uploads/2024/07/cropped-logo-150x150-1.png",
                        "width": 152,
                        "height": 152,
                        "caption": "Wiktor Najbor"
                    },
                    "image": {
                        "@id": "http://localhost/wordpress/#/schema/logo/image/"
                    },
                    "sameAs": [
                        "https://www.facebook.com/profile.php?id=100063761825254"
                    ]
                }
            ]
        }
    </script>

    <?php
    wp_head();
    $language = get_site_language();
    $home = get_home_url();

    $labels = ml_menuItems();
    ?>
</head>

<body>
<?php
    if(is_front_page() || is_home()){
	    get_template_part("template-parts/header", "animation");
    }
?>
<header class="header">
    <div class="logo">
        <a href="<?php echo $home?>"><img src="<?php echo get_template_directory_uri()?>/assets/images/logo.png" alt="logo"></a>
    </div>
    <h3>
        <?php get_heading_template(); ?>
    </h3>
    <button class="header__menu cursor--click">
        <h4>
        menu
        </h4>
    </button>
</header>
<div class="menu inactive">
    <ul class="menu__list main">
        <li class="menu__item cursor--click item animate"><a href="<?php echo $home?>"><?php echo $labels["home"][$language]?></a></li>
        <li class="menu__item cursor--click item animate prace"><?php echo $labels["prace"][$language]?></li>
        <li class="menu__item cursor--click item animate"><a href="<?php echo $home?>/kontakt"><?php echo $labels["kontakt"][$language]?></a></li>
        <li class="menu__item cursor--click item animate"><a href="<?php echo $home?>/na-sprzedaz"><?php echo $labels["na_sprzedaz"][$language]?></a></li>
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
    <?php
    get_template_part("template-parts/content", "copyrights");
    ?>
</div>

<div class="cursor">
    <div class="cursor__arrow">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#FE0000" stroke="#FE0000" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
    </div>
    <div class="cursor__image"></div>
</div>


<script>
    const menuContainer = document.querySelector('.menu');
    const button = document.querySelector('.header__menu');
    const prace = document.querySelector('li.prace');
    const mainMenu = document.querySelector('ul.main');
    const subMenu = document.querySelector('ul.categories');
    const cursor = document.querySelector(".cursor");
    const mainMenuItems = mainMenu.querySelectorAll(".menu__item");

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

        if(menuContainer.classList.contains("active"))
            menuContainer.appendChild(cursor);
        else
            document.body.appendChild(cursor);
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

