<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Primary Meta Tags -->
        <title>НЕО-ФРУТ - Натуральные фруктовые батончики и пастила из сухофруктов | НПК НЕОФРУТ</title>
        <meta name="title" content="НЕО-ФРУТ - Натуральные фруктовые батончики и пастила из сухофруктов" />
        <meta name="description" content="Производство натуральных фруктовых батончиков и пастилы из сухофруктов без сахара. Абрикосовые, сливовые и черносливовые батончики с орехами. Здоровое питание для активной жизни." />
        <meta name="keywords" content="фруктовые батончики, пастила из сухофруктов, натуральные батончики, батончики без сахара, абрикосовая пастила, батончики с орехами, здоровое питание, НЕО-ФРУТ, неофрут" />
        <meta name="author" content="НПК НЕОФРУТ" />
        <meta name="robots" content="index, follow" />
        <link rel="canonical" href="https://neo-fruit.ru/" />

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://neo-fruit.ru/" />
        <meta property="og:title" content="НЕО-ФРУТ - Натуральные фруктовые батончики и пастила" />
        <meta property="og:description" content="Производство натуральных фруктовых батончиков и пастилы из сухофруктов без сахара. Здоровое питание для активной жизни." />
        <meta property="og:image" content="https://neo-fruit.ru/images/hero.jpg" />
        <meta property="og:locale" content="ru_RU" />
        <meta property="og:site_name" content="НПК НЕОФРУТ" />

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="https://neo-fruit.ru/" />
        <meta property="twitter:title" content="НЕО-ФРУТ - Натуральные фруктовые батончики и пастила" />
        <meta property="twitter:description" content="Производство натуральных фруктовых батончиков и пастилы из сухофруктов без сахара." />
        <meta property="twitter:image" content="https://neo-fruit.ru/images/hero.jpg" />

        <!-- Additional SEO -->
        <meta name="format-detection" content="telephone=yes" />
        <meta name="geo.region" content="RU" />
        <meta name="geo.placename" content="Россия" />

        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@700;800;900&display=swap"
            rel="stylesheet"
        />
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="styles.css" />
        <link rel="stylesheet" href="cms-editor.css" />
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

        <!-- Structured Data (JSON-LD) -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "НПК НЕОФРУТ",
            "alternateName": "НЕО-ФРУТ",
            "url": "https://neo-fruit.ru/",
            "logo": "https://neo-fruit.ru/images/logo.png",
            "description": "Производство натуральных фруктовых батончиков и пастилы из сухофруктов без сахара",
            "address": {
                "@type": "PostalAddress",
                "addressCountry": "RU",
                "addressRegion": "Россия"
            },
            "sameAs": []
        }
        </script>

        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "НЕО-ФРУТ",
            "url": "https://neo-fruit.ru/",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://neo-fruit.ru/?s={search_term_string}",
                "query-input": "required name=search_term_string"
            }
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
            }]
        }
        </script>
    </head>
    <body class="bg-white">
        <?php include 'includes/include.php'; includePartial('navigation'); ?>

        <!-- Hero Section -->
        <section
            id="hero"
            class="pt-32 pb-20 bg-gradient-to-br from-cream via-white to-sage relative overflow-hidden"
            data-section-id="hero"
            data-duplicable="true"
        >
            <!-- Decorative circles with animation -->
            <div
                class="decorative-circle w-96 h-96 bg-teal absolute -top-20 -right-20"
            ></div>
            <div
                class="decorative-circle w-80 h-80 bg-accent absolute -bottom-40 -left-40"
                style="animation-delay: 1s"
            ></div>
            <div
                class="decorative-circle w-64 h-64 bg-peach absolute top-1/2 right-1/4"
                style="animation-delay: 2s"
            ></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Merged Layout -->
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center"
                >
                    <!-- Left: Text Content -->
                    <div class="text-left lg:pr-8">
                        <div
                            class="pill-badge gentle-fade mb-6 sc-content"
                            data-editable="hero_badge"
                            data-section-id="hero"
                        >
                            С 2003 года на рынке здорового питания
                        </div>
                        <h1
                            class="font-display text-4xl md:text-6xl lg:text-7xl font-bold text-gray-800 mb-6 gentle-fade delay-1"
                            data-editable="hero_title"
                            data-section-id="hero"
                        >
                            Фруктовые палочки
                            <span class="gradient-text block mt-2"
                                >НЕОФРУТ</span
                            >
                        </h1>
                        <p
                            class="text-lg md:text-xl text-gray-600 mb-8 gentle-fade delay-2 leading-relaxed"
                            data-editable="hero_description"
                            data-section-id="hero"
                        >
                            Заряди тело и ум энергией природы!<br />
                            100% натуральный продукт функционального питания для
                            активной жизни.
                        </p>
                        <div class="flex flex-wrap gap-4 gentle-fade delay-3">
                            <a href="/cms/products"
                                class="soft-button bg-teal text-white px-8 py-4 rounded-full font-semibold text-lg relative z-10"
                            >
                                Смотреть продукцию
                            </a>
                        </div>
                    </div>

                    <!-- Right: Image with enhanced effects -->
                    <div class="gentle-fade delay-4">
                        <div class="relative angle-image-container">
                            <div
                                class="absolute -inset-4 bg-gradient-to-r from-teal to-accent rounded-[3.5rem] opacity-20 blur-2xl"
                            ></div>
                            <div
                                class="relative soft-shadow-lg rounded-3xl overflow-hidden bg-white p-4"
                            >
                                <img
                                    src="images/hero.jpg"
                                    alt="Products"
                                    class="w-full rounded-2xl"
                                    data-editable-image="hero_main_image"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section with enhanced design -->
        <section class="py-12 bg-white relative overflow-hidden">
            <div
                class="absolute inset-0 bg-gradient-to-r from-sage/10 to-cream/10"
            ></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-2 md:grid-cols-5 gap-8 items-center">
                    <div class="text-center gentle-fade delay-1">
                        <div
                            class="stat-number text-5xl md:text-6xl font-black mb-2 cms-editable"
                            data-editable="stat1_number"
                            data-section-id="stats"
                        >
                            100%
                        </div>
                        <div class="text-gray-600 font-medium cms-editable"
                            data-editable="stat1_label"
                            data-section-id="stats"
                        >
                            Натуральный состав
                        </div>
                    </div>
                    <div class="text-center gentle-fade delay-2">
                        <div
                            class="text-5xl md:text-6xl font-black text-accent mb-2 cms-editable"
                            data-editable="stat2_number"
                            data-section-id="stats"
                        >
                            20+
                        </div>
                        <div class="text-gray-600 font-medium cms-editable"
                            data-editable="stat2_label"
                            data-section-id="stats"
                        >
                            Лет опыта
                        </div>
                    </div>

                    <!-- Jumping Apple Logo -->
                    <div
                        class="text-center col-span-2 md:col-span-1 gentle-fade delay-3"
                    >
                        <img
                            src="images/logo-jump.gif"
                            alt="NEOFRUIT"
                            class="w-28 md:w-36 mx-auto float-slow drop-shadow-xl"
                        />
                    </div>

                    <div class="text-center gentle-fade delay-4">
                        <div
                            class="stat-number text-5xl md:text-6xl font-black mb-2 cms-editable"
                            data-editable="stat3_number"
                            data-section-id="stats"
                        >
                            c 2009
                        </div>
                        <div class="text-gray-600 font-medium cms-editable"
                            data-editable="stat3_label"
                            data-section-id="stats"
                        >
                            входят в ИРП МО РФ
                        </div>
                    </div>
                    <div class="text-center gentle-fade delay-5">
                        <div
                            class="text-5xl md:text-6xl font-black text-accent mb-2 cms-editable"
                            data-editable="stat4_number"
                            data-section-id="stats"
                        >
                            3
                        </div>
                        <div class="text-gray-600 font-medium cms-editable"
                            data-editable="stat4_label"
                            data-section-id="stats"
                        >
                            Вкуса на выбор
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section with enhanced card -->
        <section
            id="about"
            class="py-24 bg-gradient-to-br from-sage to-mint relative overflow-hidden"
            data-section-id="about"
            data-duplicable="true"
        >
            <div
                class="decorative-circle w-72 h-72 bg-white absolute top-10 right-10"
            ></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div
                    class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center"
                >
                    <div class="relative group angle-image-reverse">
                        <div
                            class="absolute -inset-3 bg-gradient-to-r from-teal to-accent rounded-[3.5rem] opacity-30 blur-2xl group-hover:opacity-40 transition"
                        ></div>
                        <div
                            class="relative soft-shadow-lg rounded-3xl overflow-hidden bg-white p-4"
                        >
                            <img
                                src="images/options.jpg"
                                alt="Products Options"
                                class="w-full rounded-2xl"
                                data-editable-image="about_image"
                            />
                        </div>
                    </div>
                    <div>
                        <h2
                            class="font-display text-4xl md:text-5xl font-bold text-gray-800 mb-6"
                            data-editable="about_title"
                            data-section-id="about"
                        >
                            Что такое
                            <span class="gradient-text">НЕОФРУТ</span>?
                        </h2>
                        <div
                            class="w-24 h-1.5 bg-gradient-to-r from-teal to-accent rounded-full mb-6"
                        ></div>
                        <p
                            class="text-lg text-gray-700 mb-6 leading-relaxed"
                            data-editable="about_p1"
                            data-section-id="about"
                        >
                            Фруктовые палочки НЕОФРУТ — это 100% натуральный
                            продукт функционального питания, созданный по
                            уникальной запатентованной технологии, сохраняющей
                            максимум пользы орехов и сухофруктов на долгий срок.
                        </p>
                        <p
                            class="text-lg text-gray-700 mb-8 leading-relaxed"
                            data-editable="about_p2"
                            data-section-id="about"
                        >
                            Идеальный выбор для спортсменов, туристов, военных и
                            всех, кто всегда в движении.
                        </p>
                        <p
                            class="text-lg text-gray-700 mb-8 leading-relaxed"
                            data-editable="about_p3"
                            data-section-id="about"
                        >
                            Для тех, кто идёт вперёд — без компромиссов.
                        </p>
                        <div class="flex items-center space-x-4">
                            <div class="timeline-dot"></div>
                            <span
                                class="text-teal font-semibold text-lg"
                                data-editable="about_s1"
                                data-section-id="about"
                                >Проверено временем и профессионалами</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products Section with unique asymmetric layout -->
        <section
            id="products"
            class="py-24 bg-gradient-to-br from-white via-cream to-sage relative overflow-hidden"
            data-section-id="products"
            data-duplicable="false"
        >
            <!-- Decorative elements -->
            <div
                class="decorative-circle w-96 h-96 bg-teal absolute -top-40 -left-40"
            ></div>
            <div
                class="decorative-circle w-80 h-80 bg-accent absolute -bottom-20 -right-20"
                style="animation-delay: 1.5s"
            ></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Header -->
                <div class="text-center mb-24">
                    <h2
                        class="font-display text-4xl md:text-6xl font-black text-gray-800 mb-6"
                        data-editable="products_title"
                        data-section-id="products"
                    >
                        Наш <span class="gradient-text">ассортимент</span>
                    </h2>
                    <div
                        class="w-32 h-1.5 bg-gradient-to-r from-teal via-accent to-teal rounded-full mx-auto mb-8"
                    ></div>
                    <p
                        class="text-xl md:text-2xl text-gray-600 max-w-3xl mx-auto font-light"
                        data-editable="products_p1"
                        data-section-id="products"
                    >
                        Откройте для себя природные энергию и вкус в каждом
                        кусочке
                    </p>
                </div>

                <!-- Products Asymmetric Layout -->
                <div
                    class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center"
                >
                    <!-- Product 1 - Large Left -->
                    <div
                        class="lg:col-span-5 product-card group"
                        data-section-id="products_large"
                        data-duplicable="true"
                    >
                        <div class="relative">
                            <div
                                class="absolute -top-8 -left-8 w-40 h-40 bg-gradient-to-br from-orange-300 to-peach rounded-full opacity-60 blur-3xl"
                            ></div>
                            <div
                                class="relative bg-gradient-to-br from-orange-50 to-peach rounded-[3rem] p-10 soft-shadow-lg overflow-hidden"
                            >
                                <img
                                    src="images/products/1 Абрикос.jpg"
                                    alt="Абрикосовая с фундуком"
                                    class="product-image w-full rounded-3xl"
                                    data-editable-image="apricot_image"
                                />
                            </div>
                        </div>
                        <div class="mt-8 text-center px-4 pb-4">
                            <h3
                                class="font-display text-3xl md:text-4xl font-bold text-gray-800 mb-8 leading-tight"
                                data-editable="products_h1"
                                data-section-id="products"
                            >
                                Абрикосовая с фундуком
                            </h3>
                            <a
                                href="/cms/products"
                                class="soft-button bg-teal text-white px-10 py-4 rounded-full font-bold text-lg relative z-10"
                            >
                                Узнать больше
                            </a>
                        </div>
                    </div>

                    <!-- Product 2 & 3 - Right side -->
                    <div class="lg:col-span-7 lg:col-start-6 lg:-mt-16">
                        <div
                            class="grid grid-cols-1 md:grid-cols-2 gap-10 items-start"
                        >
                            <!-- Product 2 - Elevated -->
                            <div class="product-card group md:mt-20" data-section-id="products_middle"
                            data-duplicable="true">
                                <div class="relative">
                                    <div
                                        class="absolute -top-8 -right-8 w-40 h-40 bg-gradient-to-br from-purple-300 to-orange-300 rounded-full opacity-60 blur-3xl"
                                    ></div>
                                    <div
                                        class="relative bg-gradient-to-br from-purple-50 to-orange-50 rounded-[3rem] p-8 soft-shadow-lg overflow-hidden"
                                    >
                                        <img
                                            src="images/products/3 Чернослив-с-орехом.jpg"
                                            alt="Абрикосово-сливовая с фундуком"
                                            class="product-image w-full rounded-3xl"
                                            data-editable-image="apricot_plum_image"
                                        />
                                    </div>
                                </div>
                                <div class="mt-6 text-center px-4 pb-4">
                                    <h3
                                        class="font-display text-2xl md:text-2xl font-bold text-gray-800 mb-6 leading-tight"
                                        data-editable="products_h2"
                                        data-section-id="products"
                                    >
                                        Абрикосово-сливовая с фундуком
                                    </h3>
                                    <a
                                        href="/cms/products"
                                        class="soft-button bg-accent text-white px-8 py-3.5 rounded-full font-bold relative z-10"
                                    >
                                        Узнать больше
                                    </a>
                                </div>
                            </div>

                            <!-- Product 3 - Right -->
                            <div
                                class="product-card group"
                                data-section-id="products_small"
                                data-duplicable="true"
                            >
                                <div class="relative">
                                    <div
                                        class="absolute -bottom-8 -left-8 w-40 h-40 bg-gradient-to-br from-purple-300 to-purple-400 rounded-full opacity-60 blur-3xl"
                                    ></div>
                                    <div
                                        class="relative bg-gradient-to-br from-purple-50 to-purple-100 rounded-[3rem] p-8 soft-shadow-lg overflow-hidden"
                                    >
                                        <img
                                            src="images/options.jpg"
                                            alt="Чернослив с орехами"
                                            class="product-image w-full rounded-3xl"
                                            data-editable-image="nuts_image"
                                        />
                                    </div>
                                </div>
                                <div class="mt-6 text-center px-4 pb-4">
                                    <h3
                                        class="font-display text-2xl md:text-2xl font-bold text-gray-800 mb-6 leading-tight"
                                        data-editable="products_h3"
                                        data-section-id="products"
                                    >
                                        Чернослив с орехами
                                    </h3>
                                    <a
                                        href="/cms/products"
                                        class="soft-button bg-teal text-white px-8 py-3.5 rounded-full font-bold relative z-10"
                                    >
                                        Узнать больше
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Benefits Section with enhanced cards -->
        <section
            id="benefits"
            class="py-24 bg-gradient-to-br from-cream to-white relative overflow-hidden"
            data-section-id="benefits"
            data-duplicable="false"
        >
            <div
                class="decorative-circle w-64 h-64 bg-sage absolute -top-20 right-1/4"
                style="animation-delay: 0.5s"
            ></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-20">
                    <h2
                        class="font-display text-4xl md:text-6xl font-black text-gray-800 mb-6"
                        data-editable="benefits_title"
                        data-section-id="benefits"
                    >
                        Почему выбирают
                        <span class="gradient-text">НЕОФРУТ</span>?
                    </h2>
                    <div
                        class="w-32 h-1.5 bg-gradient-to-r from-teal via-accent to-teal rounded-full mx-auto"
                    ></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    <!-- Benefit 1 -->
                    <div
                        class="light-card outlined-card border-teal/30 rounded-3xl p-10 bg-white text-center"
                    >
                        <div
                            class="w-24 h-24 bg-gradient-to-br from-sage to-mint rounded-full flex items-center justify-center text-5xl mx-auto mb-6 glow-shadow"
                        >
                            🌿
                        </div>
                        <h3
                            class="text-2xl font-bold text-gray-800 mb-5"
                            data-editable="benefit1_title"
                            data-section-id="benefits"
                        >
                            100% натуральный
                        </h3>
                        <p
                            class="text-gray-600 leading-relaxed text-lg"
                            data-editable="benefit1_text"
                            data-section-id="benefits"
                        >
                            Содержит отборные исключительно натуральные
                            растительные компоненты и биологически активные
                            вещества высокого качества.
                        </p>
                    </div>

                    <!-- Benefit 2 -->
                    <div
                        class="light-card outlined-card border-accent/30 rounded-3xl p-10 bg-white text-center"
                    >
                        <div
                            class="w-24 h-24 bg-gradient-to-br from-peach to-orange-100 rounded-full flex items-center justify-center text-5xl mx-auto mb-6 glow-shadow"
                        >
                            ⚡
                        </div>
                        <h3
                            class="text-2xl font-bold text-gray-800 mb-5"
                            data-editable="benefit2_title"
                            data-section-id="benefits"
                        >
                            Природная польза
                        </h3>
                        <p
                            class="text-gray-600 leading-relaxed text-lg"
                            data-editable="benefit2_text"
                            data-section-id="benefits"
                        >
                            Растительные белки и жиры, быстрые углеводы,
                            витамины и микроэлементы улучшают функции ЖКТ,
                            сердца, глаз и мозга.
                        </p>
                    </div>

                    <!-- Benefit 3 -->
                    <div
                        class="light-card outlined-card border-teal/30 rounded-3xl p-10 bg-white text-center"
                    >
                        <div
                            class="w-24 h-24 bg-gradient-to-br from-sage to-mint rounded-full flex items-center justify-center text-5xl mx-auto mb-6 glow-shadow"
                        >
                            🛡️
                        </div>
                        <h3
                            class="text-2xl font-bold text-gray-800 mb-5"
                            data-editable="benefit3_title"
                            data-section-id="benefits"
                        >
                            Проверено профессионалами
                        </h3>
                        <p
                            class="text-gray-600 leading-relaxed text-lg"
                            data-editable="benefit3_text"
                            data-section-id="benefits"
                        >
                            С 2009 года включены в специальные индивидуальные
                            рационы питания силовых структур РФ.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section with enhanced design -->
        <section
            id="taste"
            class="py-24 bg-gradient-to-br from-teal via-teal to-accent relative overflow-hidden"
            data-section-id="taste"
            data-duplicable="false"
        >
            <div
                class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE2YzAtMS4xLS45LTItMi0yaC00Yy0xLjEgMC0yIC45LTIgMnY0YzAgMS4xLjkgMiAyIDJoNGMxLjEgMCAyLS45IDItMnYtNHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-30"
            ></div>
            <div
                class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10"
            >
                <h2
                    class="font-display text-5xl md:text-6xl font-black mb-8 drop-shadow-lg"
                    data-editable="taste_title"
                    data-section-id="taste"
                >
                    Попробуйте! <br />Вам понравится!
                </h2>
                <p
                    class="text-xl md:text-2xl mb-10 text-white/95 font-light leading-relaxed"
                    data-editable="taste_text"
                    data-section-id="taste"
                >
                    Каждая палочка НЕОФРУТ — это 100% натуральный,
                    высококалорийный перекус, который питает тело, поддерживает
                    активность и заряжает энергией на весь день!
                </p>
                <a
                    href="#order-info"
                    class="bg-white text-teal px-12 py-5 rounded-full font-black text-xl hover:shadow-2xl transition transform hover:scale-105"
                >
                    Заказать сейчас
                </a>
            </div>
        </section>

        <?php includePartial('order-info'); ?>

        <?php includePartial('footer'); ?>

        <!-- Main JavaScript -->
        <script src="main.js"></script>
        <!-- CMS Editor Script -->
        <script src="cms-editor.js"></script>
    </body>
</html>
