<?php
// Load metatags helper
require_once '../metatags-helper.php';
loadMetatagsForPage('products');
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <?php
        // Render metatags with defaults
        renderMetatags(array(
            'title' => 'Продукция НЕО-ФРУТ - Натуральные фруктовые батончики | НПК НЕОФРУТ',
            'meta_title' => 'Продукция НЕО-ФРУТ - Натуральные фруктовые батончики',
            'description' => 'Каталог натуральных фруктовых батончиков НЕО-ФРУТ. Абрикосовые, сливовые и черносливовые батончики с орехами. Пастила из сухофруктов без сахара. Здоровые снеки для всей семьи.',
            'keywords' => 'продукция неофрут, каталог батончиков, купить батончики, фруктовые батончики ассортимент, пастила из сухофруктов',
            'canonical' => 'https://neo-fruit.ru/products/',
            'og_url' => 'https://neo-fruit.ru/products/',
            'og_title' => 'Продукция НЕО-ФРУТ - Натуральные фруктовые батончики',
            'og_description' => 'Каталог натуральных фруктовых батончиков и пастилы из сухофруктов. Здоровые снеки для всей семьи.',
            'twitter_url' => 'https://neo-fruit.ru/products/',
            'twitter_title' => 'Продукция НЕО-ФРУТ - Натуральные фруктовые батончики',
            'twitter_description' => 'Каталог натуральных фруктовых батончиков и пастилы из сухофруктов.'
        ));
        ?>

        <!-- Additional SEO -->
        <meta name="format-detection" content="telephone=yes" />
        <meta name="geo.region" content="RU" />
        <meta name="geo.placename" content="Россия" />

        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800;900&display=swap"
            rel="stylesheet"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="../styles.css" />
        <link rel="stylesheet" href="../cms-editor.css" />
        <link rel="stylesheet" href="../meta-editor.css" />
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            accent: "#f48a3a",
                            mint: "#eaf9ef",
                            teal: "#06a68a",
                            muted: "#7b7b7b",
                            cream: "#fff8f0",
                            peach: "#ffe8d6",
                            sage: "#d4e8de",
                        },
                        fontFamily: {
                            sans: [
                                "Montserrat",
                                "system-ui",
                                "Arial",
                                "sans-serif",
                            ],
                            display: ["Playfair Display", "serif"],
                        },
                    },
                },
            };
        </script>

        <!-- Structured Data (JSON-LD) for Product Listing -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ItemList",
            "itemListElement": [
                {
                    "@type": "Product",
                    "position": 1,
                    "name": "Абрикосовая пастила с фундуком",
                    "description": "Натуральный батончик из абрикосов с фундуком без сахара",
                    "image": "https://neo-fruit.ru/images/products/1%20Абрикосовая%20с%20фундуком.jpg",
                    "brand": {
                        "@type": "Brand",
                        "name": "НЕО-ФРУТ"
                    }
                },
                {
                    "@type": "Product",
                    "position": 2,
                    "name": "Абрикосово-сливовая с фундуком",
                    "description": "Натуральный батончик из абрикосов и слив с фундуком",
                    "image": "https://neo-fruit.ru/images/products/2%20Абриосово-сливовая%20с%20фундуко.jpg",
                    "brand": {
                        "@type": "Brand",
                        "name": "НЕО-ФРУТ"
                    }
                },
                {
                    "@type": "Product",
                    "position": 3,
                    "name": "Чернослив с орехами",
                    "description": "Натуральный батончик из чернослива с грецкими орехами",
                    "image": "https://neo-fruit.ru/images/products/3%20Чернослив%20с%20орехами.jpg",
                    "brand": {
                        "@type": "Brand",
                        "name": "НЕО-ФРУТ"
                    }
                }
            ]
        }
        </script>

        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                "@type": "ListItem",
                "position": 1,
                "name": "Главная",
                "item": "https://neo-fruit.ru/"
            },{
                "@type": "ListItem",
                "position": 2,
                "name": "Продукция",
                "item": "https://neo-fruit.ru/products/"
            }]
        }
        </script>
    </head>
    <body class="bg-white">
        <?php include '../includes/include.php'; includePartial('navigation'); ?>

        <!-- Hero Section -->
        <section
            class="pt-32 pb-16 bg-gradient-to-br from-cream via-white to-sage relative overflow-hidden"
            data-section-id="products_hero"
            data-duplicable="false"
        >
            <!-- Decorative circles -->
            <div
                class="decorative-circle w-96 h-96 bg-teal absolute -top-20 -right-20"
            ></div>
            <div
                class="decorative-circle w-80 h-80 bg-accent absolute -bottom-40 -left-40"
                style="animation-delay: 1s"
            ></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center">
                    <h1
                        class="font-display text-5xl md:text-7xl font-black text-gray-800 mb-6 gentle-fade"
                        data-editable="hero_title"
                        data-section-id="products_hero"
                    >
                        Наша <span class="gradient-text">продукция</span>
                    </h1>
                    <div
                        class="w-32 h-1.5 bg-gradient-to-r from-teal via-accent to-teal rounded-full mx-auto mb-8"
                    ></div>
                    <p
                        class="text-xl md:text-2xl text-gray-600 max-w-4xl mx-auto font-light leading-relaxed gentle-fade delay-1"
                        data-editable="hero_description"
                        data-section-id="products_hero"
                    >
                        Три уникальных вкуса натуральных фруктовых палочек,
                        созданных по запатентованной технологии для максимальной
                        пользы и энергии
                    </p>
                </div>
            </div>
        </section>

        <!-- Product 1: Абрикосовая с фундуком -->
        <section class="py-20 bg-white relative overflow-hidden" data-section-id="product1" data-duplicable="true">
            <div
                class="decorative-circle w-72 h-72 bg-peach absolute top-20 right-10"
            ></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div
                    class="product-detail-card bg-gradient-to-br from-orange-50 to-peach rounded-[3rem] overflow-hidden soft-shadow-lg"
                >
                    <div
                        class="grid grid-cols-1 lg:grid-cols-2 gap-0 items-center"
                    >
                        <!-- Image -->
                        <div
                            class="p-8 lg:p-10 flex flex-col angle-image-container"
                        >
                            <div class="relative w-full">
                                <!-- Layered photo effect - Image 1 -->
                                <div
                                    class="stylish-image-wrapper product-image-clickable mb-12"
                                    onclick="openLightbox('product1', 0, event)"
                                >
                                    <img
                                        src="../images/products/1 Абрикосовая с фундуком.jpg"
                                        alt="Абрикосовая с фундуком"
                                        class="relative rounded-2xl w-full shadow-2xl"
                                        data-editable-image="product1_image1"
                                    />
                                </div>
                                <!-- Layered photo effect - Image 2 -->
                                <div
                                    class="stylish-image-wrapper product-image-clickable"
                                    onclick="openLightbox('product1', 1, event)"
                                >
                                    <img
                                        src="../images/products/1 Абрикос.jpg"
                                        alt="Абрикосовая с фундуком - вид 2"
                                        class="relative rounded-2xl w-full shadow-2xl"
                                        data-editable-image="product1_image2"
                                    />
                                </div>
                            </div>

                            <!-- Benefits Icons -->
                            <div class="grid grid-cols-2 gap-4 mt-8">
                                <div
                                    class="bg-white/80 rounded-xl p-4 text-center"
                                >
                                    <div
                                        class="icon-badge rounded-full flex items-center justify-center text-2xl mx-auto mb-2 cms-editable"
                                        data-editable="benefit1_icon"
                                        data-section-id="product1"
                                    >
                                        💪
                                    </div>
                                    <p
                                        class="text-sm font-semibold text-gray-800 cms-editable"
                                        data-editable="benefit1"
                                        data-section-id="product1"
                                    >
                                        Высокая энергетическая ценность
                                    </p>
                                </div>
                                <div
                                    class="bg-white/80 rounded-xl p-4 text-center"
                                >
                                    <div
                                        class="icon-badge rounded-full flex items-center justify-center text-2xl mx-auto mb-2 cms-editable"
                                        data-editable="benefit2_icon"
                                        data-section-id="product1"
                                    >
                                        🌱
                                    </div>
                                    <p
                                        class="text-sm font-semibold text-gray-800 cms-editable"
                                        data-editable="benefit2"
                                        data-section-id="product1"
                                    >
                                        Натуральные витамины A, E
                                    </p>
                                </div>
                                <div
                                    class="bg-white/80 rounded-xl p-4 text-center"
                                >
                                    <div
                                        class="icon-badge rounded-full flex items-center justify-center text-2xl mx-auto mb-2 cms-editable"
                                        data-editable="benefit3_icon"
                                        data-section-id="product1"
                                    >
                                        ⚡
                                    </div>
                                    <p
                                        class="text-sm font-semibold text-gray-800 cms-editable"
                                        data-editable="benefit3"
                                        data-section-id="product1"
                                    >
                                        Быстрый заряд энергии
                                    </p>
                                </div>
                                <div
                                    class="bg-white/80 rounded-xl p-4 text-center"
                                >
                                    <div
                                        class="icon-badge rounded-full flex items-center justify-center text-2xl mx-auto mb-2 cms-editable"
                                        data-editable="benefit4_icon"
                                        data-section-id="product1"
                                    >
                                        ❤️
                                    </div>
                                    <p
                                        class="text-sm font-semibold text-gray-800 cms-editable"
                                        data-editable="benefit4"
                                        data-section-id="product1"
                                    >
                                        Полезно для сердца
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-12 flex flex-col justify-center">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="text-6xl cms-editable"
                                    data-editable="main_icon"
                                    data-section-id="product1"
                                >☀️</div>
                                <span
                                    class="text-sm font-bold text-orange-600 bg-white px-4 py-2 rounded-full cms-editable"
                                    data-editable="badge"
                                    data-section-id="product1"
                                >
                                    Бестселлер
                                </span>
                            </div>

                            <h2
                                class="font-display text-4xl md:text-5xl font-black text-gray-800 mb-6 cms-editable"
                                data-editable="title"
                                data-section-id="product1"
                            >
                                Абрикосовая с фундуком
                            </h2>

                            <p
                                class="text-lg text-gray-700 mb-6 leading-relaxed cms-editable"
                                data-editable="description"
                                data-section-id="product1"
                            >
                                Солнечный вкус спелого абрикоса в идеальном
                                сочетании с насыщенным ореховым вкусом
                                фундука.<br />
                                Эта палочка — настоящий заряд энергии и
                                витаминов для активного дня!
                            </p>

                            <div class="bg-white/80 rounded-2xl p-6 mb-6">
                                <h3
                                    class="font-bold text-gray-800 mb-4 text-xl cms-editable"
                                    data-editable="composition_title"
                                    data-section-id="product1"
                                >
                                    Состав:
                                </h3>
                                <p class="text-gray-700 leading-relaxed mb-4 cms-editable" data-editable="composition" data-section-id="product1">
                                    Абрикос обезвоженный, фундук, сахар
                                </p>
                                <div
                                    class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm text-gray-600"
                                >
                                    <div class="cms-editable" data-editable="weight" data-section-id="product1">
                                        <span class="font-semibold"
                                            >Вес Нетто:</span
                                        ><br />
                                        50г
                                    </div>
                                    <div class="cms-editable" data-editable="shelf_life" data-section-id="product1">
                                        <span class="font-semibold"
                                            >Срок хранения:</span
                                        ><br />
                                        12 месяцев
                                    </div>
                                    <div class="cms-editable" data-editable="price" data-section-id="product1">
                                        <span class="font-semibold"
                                            >Средняя цена:</span
                                        ><br />
                                        37-40 рублей
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white/80 rounded-2xl p-6 mb-6">
                                <h3
                                    class="font-bold text-gray-800 mb-3 text-lg cms-editable"
                                    data-editable="form_title"
                                    data-section-id="product1"
                                >
                                    Форма выпуска:
                                </h3>
                                <p
                                    class="text-gray-700 leading-relaxed text-sm mb-3 cms-editable"
                                    data-editable="form_description"
                                    data-section-id="product1"
                                >
                                    Батончик, упакованный в надежную двуслойную
                                    полимерную пленку с самоклеящейся этикеткой.
                                </p>
                                <p class="text-gray-600 text-sm cms-editable"
                                    data-editable="transport"
                                    data-section-id="product1"
                                >
                                    <span class="font-semibold"
                                        >Транспортная тара:</span
                                    >
                                    Гофрокороб по 150 штук.
                                </p>
                                <p class="text-gray-500 text-xs mt-3 cms-editable"
                                    data-editable="tu"
                                    data-section-id="product1"
                                >
                                    <span class="font-semibold"
                                        >ТУ 10.39.25-001-12681583-2017</span
                                    >
                                </p>
                            </div>

                            <div class="bg-white/80 rounded-2xl p-6 mb-6">
                                <p class="text-gray-700 text-sm leading-relaxed cms-editable"
                                    data-editable="nutritional_info"
                                    data-section-id="product1"
                                >
                                    <strong>Курага (абрикосы сушеные без косточки)</strong> богат такими витаминами и минералами, как: витамином А -64,8%, бэта-каротином -70%, витамином B2 -11,1%, витамином E -36,7%, витамином PP -19,5%, калием -68,7%, кальцием -16%, кремнием -86,7%, магнием -26,3%, фосфором -18,3%, железом -17,8%, кобальтом -84%, марганцем -11,8%, медью -34,3%, молибденом -17,4%, хромом -118%
                                    <br><br>
                                    <strong>Фундук</strong> богат такими витаминами и минералами, как: витамином B1 -20%, витамином B5 -23%, витамином B6 -28,2%, витамином B9 -28,3 %, витамином E -136%, витамином H -152%, витамином K -11,8%, витамином PP -26%, калием -28,7%, кальцием -17%, кремнием -166,7%, магнием -43%, фосфором -37,4%, железом -16,7%, кобальтом -123%, марганцем -308,8%, медью -112%, молибденом -42,4%, хромом -340%, цинком -20,4%
                                </p>
                            </div>

                            <a
                                href="#order-info"
                                class="soft-button bg-teal text-center text-white px-10 py-4 rounded-full font-bold text-lg w-full md:w-auto relative z-10 cms-editable"
                                data-editable="button"
                                data-section-id="product1"
                            >
                                Заказать сейчас
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Product 2: Абрикосово-сливовая с фундуком -->
        <section
            class="py-20 bg-gradient-to-br from-sage to-mint relative overflow-hidden"
            data-section-id="product2"
            data-duplicable="true"
        >
            <div
                class="decorative-circle w-72 h-72 bg-white absolute bottom-20 left-10"
            ></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div
                    class="product-detail-card bg-gradient-to-br from-purple-50 to-orange-50 rounded-[3rem] overflow-hidden soft-shadow-lg"
                >
                    <div
                        class="grid grid-cols-1 lg:grid-cols-2 gap-0 items-center"
                    >
                        <!-- Content -->
                        <div
                            class="p-8 lg:p-12 flex flex-col justify-center order-2 lg:order-1"
                        >
                            <div class="flex items-center gap-4 mb-6">
                                <div class="text-6xl cms-editable"
                                    data-editable="main_icon"
                                    data-section-id="product2"
                                >🍑</div>
                                <span
                                    class="text-sm font-bold text-purple-600 bg-white px-4 py-2 rounded-full cms-editable"
                                    data-editable="badge"
                                    data-section-id="product2"
                                >
                                    Сбалансированный вкус
                                </span>
                            </div>

                            <h2
                                class="font-display text-4xl md:text-5xl font-black text-gray-800 mb-6 cms-editable"
                                data-editable="title"
                                data-section-id="product2"
                            >
                                Абрикосово-сливовая с фундуком
                            </h2>

                            <p
                                class="text-lg text-gray-700 mb-6 leading-relaxed cms-editable"
                                data-editable="description"
                                data-section-id="product2"
                            >
                                Гармоничный дуэт солнечного абрикоса и
                                ароматного чернослива создает многогранный вкус.
                                Богатый фундук добавляет текстуру и
                                питательность, делая эту палочку идеальным
                                перекусом для гурманов.
                            </p>

                            <div class="bg-white/80 rounded-2xl p-6 mb-6">
                                <h3
                                    class="font-bold text-gray-800 mb-4 text-xl cms-editable"
                                    data-editable="composition_title"
                                    data-section-id="product2"
                                >
                                    Состав:
                                </h3>
                                <p class="text-gray-700 leading-relaxed mb-4 cms-editable"
                                    data-editable="composition"
                                    data-section-id="product2"
                                >
                                    Абрикос обезвоженный, чернослив
                                    обезвоженный, фундук, сахар
                                </p>
                                <div
                                    class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm text-gray-600"
                                >
                                    <div class="cms-editable" data-editable="weight" data-section-id="product2">
                                        <span class="font-semibold"
                                            >Вес Нетто:</span
                                        ><br />
                                        50г
                                    </div>
                                    <div class="cms-editable" data-editable="shelf_life" data-section-id="product2">
                                        <span class="font-semibold"
                                            >Срок хранения:</span
                                        ><br />
                                        12 месяцев
                                    </div>
                                    <div class="cms-editable" data-editable="price" data-section-id="product2">
                                        <span class="font-semibold"
                                            >Средняя цена:</span
                                        ><br />
                                        37-40 рублей
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white/80 rounded-2xl p-6 mb-6">
                                <h3
                                    class="font-bold text-gray-800 mb-3 text-lg cms-editable"
                                    data-editable="form_title"
                                    data-section-id="product2"
                                >
                                    Форма выпуска:
                                </h3>
                                <p
                                    class="text-gray-700 leading-relaxed text-sm mb-3 cms-editable"
                                    data-editable="form_description"
                                    data-section-id="product2"
                                >
                                    Батончик, упакованный в надежную двуслойную
                                    полимерную пленку с самоклеящейся этикеткой.
                                </p>
                                <p class="text-gray-600 text-sm cms-editable"
                                    data-editable="transport"
                                    data-section-id="product2"
                                >
                                    <span class="font-semibold"
                                        >Транспортная тара:</span
                                    >
                                    Гофрокороб по 150 штук.
                                </p>
                                <p class="text-gray-500 text-xs mt-3 cms-editable"
                                    data-editable="tu"
                                    data-section-id="product2"
                                >
                                    <span class="font-semibold"
                                        >ТУ 10.39.25-001-12681583-2017</span
                                    >
                                </p>
                            </div>

                            <div class="bg-white/80 rounded-2xl p-6 mb-6">
                                <p class="text-gray-700 text-sm leading-relaxed cms-editable"
                                    data-editable="nutritional_info"
                                    data-section-id="product2"
                                >
                                    <strong>Курага (абрикосы сушеные без косточки)</strong> богат такими витаминами и минералами, как: витамином А -64,8%, бэта-каротином -70%, витамином B2 -11,1%, витамином E -36,7%, витамином PP -19,5%, калием -68,7%, кальцием -16%, кремнием -86,7%, магнием -26,3%, фосфором -18,3%, железом -17,8%, кобальтом -84%, марганцем -11,8%, медью -34,3%, молибденом -17,4%, хромом -118%
                                    <br><br>
                                    <strong>Чернослив</strong> богат такими витаминами и минералами, как: витамином E -12%, витамином K -49,6%, калием -34,6%, магнием -25,5%, железом -16,7%, марганцем -15%, медью -28,1%
                                    <br><br>
                                    <strong>Фундук</strong> богат такими витаминами и минералами, как: витамином B1 -20%, витамином B5 -23%, витамином B6 -28,2%, витамином B9 -28,3 %, витамином E -136%, витамином H -152%, витамином K -11,8%, витамином PP -26%, калием -28,7%, кальцием -17%, кремнием -166,7%, магнием -43%, фосфором -37,4%, железом -16,7%, кобальтом -123%, марганцем -308,8%, медью -112%, молибденом -42,4%, хромом -340%, цинком -20,4%
                                </p>
                            </div>

                            <a
                                href="#order-info"
                                class="soft-button bg-accent text-center text-white px-10 py-4 rounded-full font-bold text-lg w-full md:w-auto relative z-10 cms-editable"
                                data-editable="button"
                                data-section-id="product2"
                            >
                                Заказать сейчас
                            </a>
                        </div>

                        <!-- Image -->
                        <div
                            class="p-8 lg:p-10 flex flex-col order-1 lg:order-2 angle-image-reverse"
                        >
                            <div class="relative w-full">
                                <!-- Layered photo effect - Image 1 -->
                                <div
                                    class="stylish-image-wrapper product-image-clickable mb-12"
                                    onclick="openLightbox('product2', 0, event)"
                                >
                                    <img
                                        src="../images/products/2 Абриосово-сливовая с фундуко.jpg"
                                        alt="Абрикосово-сливовая с фундуком"
                                        class="relative rounded-2xl w-full shadow-2xl"
                                        data-editable-image="product2_image1"
                                    />
                                </div>
                                <!-- Layered photo effect - Image 2 -->
                                <div
                                    class="stylish-image-wrapper product-image-clickable"
                                    onclick="openLightbox('product2', 1, event)"
                                >
                                    <img
                                        src="../images/products/2 Абрикосово-сливовая.jpg"
                                        alt="Абрикосово-сливовая с фундуком - вид 2"
                                        class="relative rounded-2xl w-full shadow-2xl"
                                        data-editable-image="product2_image2"
                                    />
                                </div>
                            </div>

                            <!-- Benefits Icons -->
                            <div class="grid grid-cols-2 gap-4 mt-8">
                                <div
                                    class="bg-white/80 rounded-xl p-4 text-center"
                                >
                                    <div
                                        class="icon-badge rounded-full flex items-center justify-center text-2xl mx-auto mb-2 cms-editable"
                                        data-editable="benefit1_icon"
                                        data-section-id="product2"
                                    >
                                        🧠
                                    </div>
                                    <p
                                        class="text-sm font-semibold text-gray-800 cms-editable"
                                        data-editable="benefit1"
                                        data-section-id="product2"
                                    >
                                        Улучшает работу мозга
                                    </p>
                                </div>
                                <div
                                    class="bg-white/80 rounded-xl p-4 text-center"
                                >
                                    <div
                                        class="icon-badge rounded-full flex items-center justify-center text-2xl mx-auto mb-2 cms-editable"
                                        data-editable="benefit2_icon"
                                        data-section-id="product2"
                                    >
                                        🍃
                                    </div>
                                    <p
                                        class="text-sm font-semibold text-gray-800 cms-editable"
                                        data-editable="benefit2"
                                        data-section-id="product2"
                                    >
                                        Богат клетчаткой
                                    </p>
                                </div>
                                <div
                                    class="bg-white/80 rounded-xl p-4 text-center"
                                >
                                    <div
                                        class="icon-badge rounded-full flex items-center justify-center text-2xl mx-auto mb-2 cms-editable"
                                        data-editable="benefit3_icon"
                                        data-section-id="product2"
                                    >
                                        💎
                                    </div>
                                    <p
                                        class="text-sm font-semibold text-gray-800 cms-editable"
                                        data-editable="benefit3"
                                        data-section-id="product2"
                                    >
                                        Антиоксиданты
                                    </p>
                                </div>
                                <div
                                    class="bg-white/80 rounded-xl p-4 text-center"
                                >
                                    <div
                                        class="icon-badge rounded-full flex items-center justify-center text-2xl mx-auto mb-2 cms-editable"
                                        data-editable="benefit4_icon"
                                        data-section-id="product2"
                                    >
                                        🌟
                                    </div>
                                    <p
                                        class="text-sm font-semibold text-gray-800 cms-editable"
                                        data-editable="benefit4"
                                        data-section-id="product2"
                                    >
                                        Поддержка иммунитета
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Product 3: Чернослив с орехами -->
        <section class="py-20 bg-white relative overflow-hidden" data-section-id="product3" data-duplicable="true">
            <div
                class="decorative-circle w-72 h-72 bg-purple-200 absolute top-20 left-10"
            ></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div
                    class="product-detail-card bg-gradient-to-br from-purple-50 to-purple-100 rounded-[3rem] overflow-hidden soft-shadow-lg"
                >
                    <div
                        class="grid grid-cols-1 lg:grid-cols-2 gap-0 items-center"
                    >
                        <!-- Image -->
                        <div
                            class="p-8 lg:p-10 flex flex-col angle-image-container"
                        >
                            <div class="relative w-full">
                                <!-- Layered photo effect - Image 1 -->
                                <div
                                    class="stylish-image-wrapper product-image-clickable mb-12"
                                    onclick="openLightbox('product3', 0, event)"
                                >
                                    <img
                                        src="../images/products/3 Чернослив с орехами.jpg"
                                        alt="Чернослив с орехами"
                                        class="relative rounded-2xl w-full shadow-2xl"
                                        data-editable-image="product3_image1"
                                    />
                                </div>
                                <!-- Layered photo effect - Image 2 -->
                                <div
                                    class="stylish-image-wrapper product-image-clickable"
                                    onclick="openLightbox('product3', 1, event)"
                                >
                                    <img
                                        src="../images/products/3 Чернослив-с-орехом.jpg"
                                        alt="Чернослив с орехами - вид 2"
                                        class="relative rounded-2xl w-full shadow-2xl"
                                        data-editable-image="product3_image2"
                                    />
                                </div>
                            </div>

                            <!-- Benefits Icons -->
                            <div class="grid grid-cols-2 gap-4 mt-8">
                                <div
                                    class="bg-white/80 rounded-xl p-4 text-center"
                                >
                                    <div
                                        class="icon-badge rounded-full flex items-center justify-center text-2xl mx-auto mb-2 cms-editable"
                                        data-editable="benefit1_icon"
                                        data-section-id="product3"
                                    >
                                        🦴
                                    </div>
                                    <p
                                        class="text-sm font-semibold text-gray-800 cms-editable"
                                        data-editable="benefit1"
                                        data-section-id="product3"
                                    >
                                        Для костей и зубов
                                    </p>
                                </div>
                                <div
                                    class="bg-white/80 rounded-xl p-4 text-center"
                                >
                                    <div
                                        class="icon-badge rounded-full flex items-center justify-center text-2xl mx-auto mb-2 cms-editable"
                                        data-editable="benefit2_icon"
                                        data-section-id="product3"
                                    >
                                        👀
                                    </div>
                                    <p
                                        class="text-sm font-semibold text-gray-800 cms-editable"
                                        data-editable="benefit2"
                                        data-section-id="product3"
                                    >
                                        Поддержка зрения
                                    </p>
                                </div>
                                <div
                                    class="bg-white/80 rounded-xl p-4 text-center"
                                >
                                    <div
                                        class="icon-badge rounded-full flex items-center justify-center text-2xl mx-auto mb-2 cms-editable"
                                        data-editable="benefit3_icon"
                                        data-section-id="product3"
                                    >
                                        🌿
                                    </div>
                                    <p
                                        class="text-sm font-semibold text-gray-800 cms-editable"
                                        data-editable="benefit3"
                                        data-section-id="product3"
                                    >
                                        Нормализует пищеварение
                                    </p>
                                </div>
                                <div
                                    class="bg-white/80 rounded-xl p-4 text-center"
                                >
                                    <div
                                        class="icon-badge rounded-full flex items-center justify-center text-2xl mx-auto mb-2 cms-editable"
                                        data-editable="benefit4_icon"
                                        data-section-id="product3"
                                    >
                                        🔋
                                    </div>
                                    <p
                                        class="text-sm font-semibold text-gray-800 cms-editable"
                                        data-editable="benefit4"
                                        data-section-id="product3"
                                    >
                                        Заряд энергии
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-8 lg:p-12 flex flex-col justify-center">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="text-6xl cms-editable"
                                    data-editable="main_icon"
                                    data-section-id="product3"
                                >🌰</div>
                                <span
                                    class="text-sm font-bold text-purple-700 bg-white px-4 py-2 rounded-full cms-editable"
                                    data-editable="badge"
                                    data-section-id="product3"
                                >
                                    Максимум пользы
                                </span>
                            </div>

                            <h2
                                class="font-display text-4xl md:text-5xl font-black text-gray-800 mb-6 cms-editable"
                                data-editable="title"
                                data-section-id="product3"
                            >
                                Чернослив с орехами
                            </h2>

                            <p
                                class="text-lg text-gray-700 mb-6 leading-relaxed cms-editable"
                                data-editable="description"
                                data-section-id="product3"
                            >
                                Насыщенный, глубокий вкус отборного чернослива в
                                сочетании с ароматным фундуком. Эта палочка —
                                кладезь витаминов и минералов, незаменимый
                                помощник для здоровья и долголетия.
                            </p>

                            <div class="bg-white/80 rounded-2xl p-6 mb-6">
                                <h3
                                    class="font-bold text-gray-800 mb-4 text-xl cms-editable"
                                    data-editable="composition_title"
                                    data-section-id="product3"
                                >
                                    Состав:
                                </h3>
                                <p class="text-gray-700 leading-relaxed mb-4 cms-editable"
                                    data-editable="composition"
                                    data-section-id="product3"
                                >
                                    Чернослив обезвоженный, фундук, сахар
                                </p>
                                <div
                                    class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm text-gray-600"
                                >
                                    <div class="cms-editable" data-editable="weight" data-section-id="product3">
                                        <span class="font-semibold"
                                            >Вес Нетто:</span
                                        ><br />
                                        50г
                                    </div>
                                    <div class="cms-editable" data-editable="shelf_life" data-section-id="product3">
                                        <span class="font-semibold"
                                            >Срок хранения:</span
                                        ><br />
                                        12 месяцев
                                    </div>
                                    <div class="cms-editable" data-editable="price" data-section-id="product3">
                                        <span class="font-semibold"
                                            >Средняя цена:</span
                                        ><br />
                                        37-40 рублей
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white/80 rounded-2xl p-6 mb-6">
                                <h3
                                    class="font-bold text-gray-800 mb-3 text-lg cms-editable"
                                    data-editable="form_title"
                                    data-section-id="product3"
                                >
                                    Форма выпуска:
                                </h3>
                                <p
                                    class="text-gray-700 leading-relaxed text-sm mb-3 cms-editable"
                                    data-editable="form_description"
                                    data-section-id="product3"
                                >
                                    Батончик, упакованный в надежную двуслойную
                                    полимерную пленку с самоклеящейся этикеткой.
                                </p>
                                <p class="text-gray-600 text-sm cms-editable"
                                    data-editable="transport"
                                    data-section-id="product3"
                                >
                                    <span class="font-semibold"
                                        >Транспортная тара:</span
                                    >
                                    Гофрокороб по 150 штук.
                                </p>
                                <p class="text-gray-500 text-xs mt-3 cms-editable"
                                    data-editable="tu"
                                    data-section-id="product3"
                                >
                                    <span class="font-semibold"
                                        >ТУ 10.39.25-001-12681583-2017</span
                                    >
                                </p>
                            </div>

                            <div class="bg-white/80 rounded-2xl p-6 mb-6">
                                <p class="text-gray-700 text-sm leading-relaxed cms-editable"
                                    data-editable="nutritional_info"
                                    data-section-id="product3"
                                >
                                    <strong>Чернослив</strong> богат такими витаминами и минералами, как: витамином E -12%, витамином K -49,6%, калием -34,6%, магнием -25,5%, железом -16,7%, марганцем -15%, медью -28,1%
                                    <br><br>
                                    <strong>Фундук</strong> богат такими витаминами и минералами, как: витамином B1 -20%, витамином B5 -23%, витамином B6 -28,2%, витамином B9 -28,3 %, витамином E -136%, витамином H -152%, витамином K -11,8%, витамином PP -26%, калием -28,7%, кальцием -17%, кремнием -166,7%, магнием -43%, фосфором -37,4%, железом -16,7%, кобальтом -123%, марганцем -308,8%, медью -112%, молибденом -42,4%, хромом -340%, цинком -20,4%
                                </p>
                            </div>

                            <a
                                href="#order-info"
                                class="soft-button bg-teal text-center text-white px-10 py-4 rounded-full font-bold text-lg w-full md:w-auto relative z-10 cms-editable"
                                data-editable="button"
                                data-section-id="product3"
                            >
                                Заказать сейчас
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section
            class="py-24 bg-gradient-to-br from-teal via-teal to-accent relative overflow-hidden"
            data-section-id="products_cta"
            data-duplicable="false"
        >
            <div
                class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE2YzAtMS4xLS45LTItMi0yaC00Yy0xLjEgMC0yIC45LTIgMnY0YzAgMS4xLjkgMiAyIDJoNGMxLjEgMCAyLS45IDItMnYtNHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-30"
            ></div>
            <div
                class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10"
            >
                <h2
                    class="font-display text-5xl md:text-6xl font-black mb-8 drop-shadow-lg cms-editable"
                    data-editable="title"
                    data-section-id="products_cta"
                >
                    Выберите свой вкус!
                </h2>
                <p
                    class="text-xl md:text-2xl mb-10 text-white/95 font-light leading-relaxed cms-editable"
                    data-editable="description"
                    data-section-id="products_cta"
                >
                    Все три вкуса доступны для заказа. Попробуйте каждый и
                    найдите свой любимый, или наслаждайтесь разнообразием каждый
                    день!
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a
                        href="#order-info"
                        class="bg-white text-teal px-12 py-5 rounded-full font-black text-xl hover:shadow-2xl transition transform hover:scale-105 cms-editable"
                        data-editable="button"
                        data-section-id="products_cta"
                    >
                        Оформить заказ
                    </a>
                </div>
            </div>
        </section>
        <?php includePartial('order-info'); ?>
        <?php includePartial('footer'); ?>

        <!-- Lightbox -->
        <div id="lightbox" class="lightbox" onclick="closeLightbox(event)">
            <div class="lightbox-content">
                <button class="lightbox-close" onclick="closeLightbox(event)">
                    ×
                </button>
                <img id="lightbox-img" src="" alt="" />
            </div>
        </div>

        <!-- Main JavaScript -->
        <script src="../main.js"></script>
        <!-- CMS Editor Script -->
        <script src="../cms-editor.js"></script>
        <!-- Meta Editor Script -->
        <script src="../meta-editor.js"></script>
    </body>
</html>
