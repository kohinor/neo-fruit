<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Primary Meta Tags -->
        <title>О компании НЕО-ФРУТ - Производитель натуральных фруктовых батончиков | НПК НЕОФРУТ</title>
        <meta name="title" content="О компании НЕО-ФРУТ - Производитель натуральных фруктовых батончиков" />
        <meta name="description" content="НПК НЕОФРУТ - производитель натуральных фруктовых батончиков и пастилы из сухофруктов. Наша миссия - здоровое питание без компромиссов. Качественная продукция из натуральных ингредиентов." />
        <meta name="keywords" content="о компании неофрут, производитель батончиков, НПК НЕОФРУТ, натуральные продукты, производство пастилы, компания неофрут" />
        <meta name="author" content="НПК НЕОФРУТ" />
        <meta name="robots" content="index, follow" />
        <link rel="canonical" href="https://neo-fruit.ru/company/" />

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://neo-fruit.ru/company/" />
        <meta property="og:title" content="О компании НЕО-ФРУТ - Производитель натуральных фруктовых батончиков" />
        <meta property="og:description" content="НПК НЕОФРУТ - производитель натуральных фруктовых батончиков и пастилы из сухофруктов. Качественная продукция из натуральных ингредиентов." />
        <meta property="og:image" content="https://neo-fruit.ru/images/hero.jpg" />
        <meta property="og:locale" content="ru_RU" />
        <meta property="og:site_name" content="НПК НЕОФРУТ" />

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="https://neo-fruit.ru/company/" />
        <meta property="twitter:title" content="О компании НЕО-ФРУТ - Производитель натуральных фруктовых батончиков" />
        <meta property="twitter:description" content="НПК НЕОФРУТ - производитель натуральных фруктовых батончиков и пастилы из сухофруктов." />
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
        <link rel="stylesheet" href="../styles.css" />
        <link rel="stylesheet" href="../cms-editor.css">
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
            "@type": "AboutPage",
            "mainEntity": {
                "@type": "Organization",
                "name": "НПК НЕОФРУТ",
                "alternateName": "НЕО-ФРУТ",
                "url": "https://neo-fruit.ru/",
                "description": "Производитель натуральных фруктовых батончиков и пастилы из сухофруктов без сахара"
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
            },{
                "@type": "ListItem",
                "position": 2,
                "name": "О компании",
                "item": "https://neo-fruit.ru/company/"
            }]
        }
        </script>
    </head>
    <body class="bg-white">
        <?php include '../includes/include.php'; includePartial('navigation'); ?>

        <!-- Hero Section -->
        <section
            class="pt-32 pb-16 bg-gradient-to-br from-cream via-white to-sage relative overflow-hidden"
            data-section-id="company_hero"
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
                        data-section-id="company_hero"
                    >
                        О <span class="gradient-text">компании</span>
                    </h1>
                    <div
                        class="w-32 h-1.5 bg-gradient-to-r from-teal via-accent to-teal rounded-full mx-auto mb-8"
                    ></div>
                    <p
                        class="text-xl md:text-2xl text-gray-600 max-w-4xl mx-auto font-light leading-relaxed gentle-fade delay-1"
                        data-editable="hero_description"
                        data-section-id="company_hero"
                    >
                        Более 20 лет опыта в создании натуральных продуктов
                        функционального питания
                    </p>
                </div>
            </div>
        </section>

        <!-- Foundation Story -->
        <section class="py-20 bg-white relative overflow-hidden" data-section-id="foundation" data-duplicable="true">
            <div
                class="decorative-circle w-72 h-72 bg-mint absolute top-20 right-10"
            ></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div
                    class="bg-gradient-to-br from-sage/30 to-mint/50 rounded-[3rem] overflow-hidden soft-shadow-lg"
                >
                    <div
                        class="grid grid-cols-1 lg:grid-cols-2 gap-0 items-center"
                    >
                        <!-- Content -->
                        <div class="p-12 flex flex-col justify-center">
                            <div class="flex items-center gap-4 mb-6">
                                <div class="text-6xl">🏢</div>
                                <span
                                    class="text-sm font-bold text-teal bg-white px-4 py-2 rounded-full"
                                >
                                    С 2003 года
                                </span>
                            </div>

                            <h2
                                class="font-display text-4xl md:text-5xl font-black text-gray-800 mb-6"
                                data-editable="title"
                                data-section-id="foundation"
                            >
                                История создания
                            </h2>

                            <p
                                class="text-lg text-gray-700 mb-6 leading-relaxed"
                                data-editable="description"
                                data-section-id="foundation"
                            >
                                Научно-производственная компания «НЕОФРУТ»
                                организована в 2003 году для разработки и
                                производства новой серии отечественных
                                плодово-ягодных продуктов питания, изготовленных
                                по уникальной технологии, максимально
                                сохраняющей все полезные вещества и вкусовые
                                качества плодов и ягод.
                            </p>

                            <div class="bg-white/80 rounded-2xl p-6 mb-6">
                                <h3
                                    class="font-bold text-gray-800 mb-4 text-xl"
                                >
                                    Основатель и руководитель
                                </h3>
                                <p class="text-gray-700 leading-relaxed">
                                    <strong>Кольцова В. П.</strong> — более 25
                                    лет проработала старшим научным сотрудником
                                    в НИИ пищевой промышленности, создававшего
                                    новые технологии производства продуктов
                                    питания (рационов) для космонавтов.
                                </p>
                            </div>

                            <p
                                class="text-base text-gray-600 leading-relaxed italic"
                            >
                                Рецептуры разрабатывались с учетом изменения
                                вкусовых качеств человека в условиях
                                невесомости, с применением осмоса,
                                сублимирования и других передовых технологий.
                            </p>
                        </div>

                        <!-- Image -->
                        <div
                            class="p-8 lg:p-10 flex items-center justify-center"
                        >
                            <div class="relative w-full angle-image-reverse">
                                <div
                                    class="absolute -inset-4 bg-gradient-to-r from-teal to-accent rounded-[3.5rem] opacity-20 blur-2xl"
                                ></div>
                                <div
                                    class="relative soft-shadow-lg rounded-3xl overflow-hidden bg-white p-4"
                                >
                                    <img
                                        src="../images/hero.jpg"
                                        alt="НПК НЕОФРУТ"
                                        class="w-full rounded-2xl"
                                        data-editable-image="company_hero_image"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Innovation Section -->
        <section
            class="py-20 bg-gradient-to-br from-sage to-mint relative overflow-hidden"
        >
            <div
                class="decorative-circle w-72 h-72 bg-white absolute bottom-20 left-10"
            ></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <h2
                        class="font-display text-4xl md:text-6xl font-black text-gray-800 mb-6"
                    >
                        Уникальная <span class="gradient-text">технология</span>
                    </h2>
                    <div
                        class="w-32 h-1.5 bg-gradient-to-r from-teal via-accent to-teal rounded-full mx-auto"
                    ></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                    <div
                        class="bg-white rounded-3xl p-8 soft-shadow-lg text-center"
                    >
                        <div
                            class="icon-badge rounded-full flex items-center justify-center text-4xl mx-auto mb-6"
                        >
                            📜
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">
                            Патент № 2358451 С2
                        </h3>
                        <p class="text-gray-600 leading-relaxed">
                            «Способ производства фруктовых палочек»
                        </p>
                    </div>

                    <div
                        class="bg-white rounded-3xl p-8 soft-shadow-lg text-center"
                    >
                        <div
                            class="icon-badge rounded-full flex items-center justify-center text-4xl mx-auto mb-6"
                        >
                            📜
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">
                            Патент № 2612784 С1
                        </h3>
                        <p class="text-gray-600 leading-relaxed">
                            «Способ производства фруктовых батончиков»
                        </p>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-white to-cream rounded-3xl p-10 soft-shadow-lg"
                >
                    <h3
                        class="text-3xl font-bold text-gray-800 mb-6 text-center"
                    >
                        Преимущества продукции
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start space-x-4">
                            <div class="text-3xl">✅</div>
                            <div>
                                <p class="text-gray-700 leading-relaxed">
                                    Исключительно натуральное сырье без
                                    заменителей, красителей и консервантов
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-3xl">✅</div>
                            <div>
                                <p class="text-gray-700 leading-relaxed">
                                    Отборные экологически чистые фрукты, богатые
                                    витаминами и микроэлементами
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-3xl">✅</div>
                            <div>
                                <p class="text-gray-700 leading-relaxed">
                                    Высокая калорийность и пищевая ценность для
                                    экстремальных условий
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-3xl">✅</div>
                            <div>
                                <p class="text-gray-700 leading-relaxed">
                                    Компактная герметичная упаковка, срок
                                    годности 24 месяца
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Military Adoption Timeline -->
        <section class="py-20 bg-white relative overflow-hidden">
            <div
                class="decorative-circle w-72 h-72 bg-peach absolute top-20 right-10"
            ></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <h2
                        class="font-display text-4xl md:text-6xl font-black text-gray-800 mb-6"
                    >
                        Признание
                        <span class="gradient-text">на высшем уровне</span>
                    </h2>
                    <div
                        class="w-32 h-1.5 bg-gradient-to-r from-teal via-accent to-teal rounded-full mx-auto mb-8"
                    ></div>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        С 2009 года в составе индивидуальных рационов питания
                        силовых структур РФ
                    </p>
                </div>

                <div class="max-w-4xl mx-auto">
                    <!-- Timeline Item 1 -->
                    <div class="timeline-item mb-12">
                        <div class="timeline-dot">2005</div>
                        <div
                            class="bg-gradient-to-br from-mint to-sage/30 rounded-2xl p-8 soft-shadow-lg"
                        >
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                                Первое предложение
                            </h3>
                            <p class="text-gray-700 leading-relaxed">
                                Фруктовые палочки «НЕОФРУТ» с фундуком были
                                предложены для включения в рационы питания
                                силовых структур Министерства обороны РФ.
                            </p>
                        </div>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="timeline-item mb-12">
                        <div class="timeline-dot">2005</div>
                        <div
                            class="bg-gradient-to-br from-peach/40 to-orange-50 rounded-2xl p-8 soft-shadow-lg"
                        >
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                                Всесторонние исследования
                            </h3>
                            <p class="text-gray-700 leading-relaxed mb-4">
                                В течение 3 лет проведены множественные
                                экспертизы и всесторонние исследования в ГНУ НИИ
                                пищеконцентратной промышленности и специальной
                                пищевой технологии совместно со специалистами
                                ЦПУ Минобороны.
                            </p>
                        </div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="timeline-item mb-12">
                        <div class="timeline-dot">2009</div>
                        <div
                            class="bg-gradient-to-br from-mint to-sage/30 rounded-2xl p-8 soft-shadow-lg"
                        >
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                                Официальное одобрение
                            </h3>
                            <p class="text-gray-700 leading-relaxed mb-4">
                                Получено Санитарно-эпидемиологическое заключение
                                № 77. МО. 01.916.Т.001288.08.09 от 21.08.2009г.
                                Главного Центра Государственного
                                санитарно-эпидемиологического надзора Минобороны
                                России.
                            </p>
                            <p class="text-sm text-gray-600 italic">
                                С 2009 по 2011 год проводились тестовые полевые
                                испытания в различных рационах питания.
                            </p>
                        </div>
                    </div>

                    <!-- Timeline Item 4 -->
                    <div class="timeline-item">
                        <div class="timeline-dot">2011</div>
                        <div
                            class="bg-gradient-to-br from-teal/20 to-mint rounded-2xl p-8 soft-shadow-lg border-2 border-teal"
                        >
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                                Включение в нормы рационов питания
                            </h3>
                            <p class="text-gray-700 leading-relaxed mb-4">
                                <strong
                                    >Приказом Минобороны РФ №888 от 21 июня 2011
                                    года</strong
                                >
                                Фруктовые палочки «НЕОФРУТ» были включены в
                                нормы рационов питания «ИРП, МГРП, Горный».
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Government Orders Section -->
        <section
            class="py-20 bg-gradient-to-br from-cream to-white relative overflow-hidden"
        >
            <div
                class="decorative-circle w-64 h-64 bg-sage absolute -top-20 right-1/4"
            ></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-16">
                    <h2
                        class="font-display text-4xl md:text-6xl font-black text-gray-800 mb-6"
                    >
                        Официальный поставщик
                        <span class="gradient-text">силовых структур</span>
                    </h2>
                    <div
                        class="w-32 h-1.5 bg-gradient-to-r from-teal via-accent to-teal rounded-full mx-auto"
                    ></div>
                </div>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
                >
                    <!-- Order 1 -->
                    <div
                        class="bg-white rounded-2xl p-6 soft-shadow-lg hover:shadow-xl transition"
                    >
                        <div class="text-4xl mb-4">🛡️</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            Министерство обороны РФ
                        </h3>
                        <p class="text-sm text-gray-600">
                            Приказ от 21 июня 2011 г. №888
                        </p>
                    </div>

                    <!-- Order 2 -->
                    <div
                        class="bg-white rounded-2xl p-6 soft-shadow-lg hover:shadow-xl transition"
                    >
                        <div class="text-4xl mb-4">🔐</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            Федеральная служба безопасности РФ
                        </h3>
                        <p class="text-sm text-gray-600">
                            Приказ от 14 февраля 2011 г. № 55
                        </p>
                    </div>

                    <!-- Order 3 -->
                    <div
                        class="bg-white rounded-2xl p-6 soft-shadow-lg hover:shadow-xl transition"
                    >
                        <div class="text-4xl mb-4">🚔</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            Министерство внутренних дел РФ
                        </h3>
                        <p class="text-sm text-gray-600">
                            Приказ от 19 апреля 2010 г. №292
                        </p>
                    </div>

                    <!-- Order 4 -->
                    <div
                        class="bg-white rounded-2xl p-6 soft-shadow-lg hover:shadow-xl transition"
                    >
                        <div class="text-4xl mb-4">🪖</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            ФС войск национальной гвардии РФ
                        </h3>
                        <p class="text-sm text-gray-600">
                            Приказ от 2 августа 2017 г. №244
                        </p>
                    </div>

                    <!-- Order 5 -->
                    <div
                        class="bg-white rounded-2xl p-6 soft-shadow-lg hover:shadow-xl transition"
                    >
                        <div class="text-4xl mb-4">🚒</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            МЧС России
                        </h3>
                        <p class="text-sm text-gray-600">
                            Приказ от 29 апреля 2013 г. №290
                        </p>
                    </div>

                    <!-- Order 6 -->
                    <div
                        class="bg-white rounded-2xl p-6 soft-shadow-lg hover:shadow-xl transition"
                    >
                        <div class="text-4xl mb-4">⚖️</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            Федеральная служба исполнения наказаний
                        </h3>
                        <p class="text-sm text-gray-600">
                            Приказ от 9 декабря 2008 г. №685
                        </p>
                    </div>
                </div>

                <div
                    class="mt-12 bg-gradient-to-r from-teal/10 to-accent/10 rounded-3xl p-8 text-center"
                >
                    <p class="text-xl text-gray-700 font-semibold">
                        Во всех приказах силовых структур предусмотрено
                        использование фруктовой палочки весом
                        <span class="text-teal">50 г</span>
                    </p>
                </div>
            </div>
        </section>

        <!-- Civilian Use Section -->
        <section class="py-20 bg-white relative overflow-hidden">
            <div
                class="decorative-circle w-72 h-72 bg-purple-200 absolute top-20 left-10"
            ></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div
                    class="bg-gradient-to-br from-sage/20 to-mint/30 rounded-[3rem] p-12 soft-shadow-lg"
                >
                    <div class="text-center mb-12">
                        <h2
                            class="font-display text-4xl md:text-5xl font-black text-gray-800 mb-6"
                        >
                            Для <span class="gradient-text">гражданского</span>
                            использования
                        </h2>
                        <div
                            class="w-32 h-1.5 bg-gradient-to-r from-teal via-accent to-teal rounded-full mx-auto"
                        ></div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                        <div class="bg-white rounded-2xl p-8">
                            <div class="text-5xl mb-4">👶</div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                                Для детей
                            </h3>
                            <p class="text-gray-700 mb-4 leading-relaxed">
                                Свидетельство о государственной регистрации
                                №RU.50.99.01.005.Е.004032.01.13. от 28.01.2013г.
                                Продукция разрешена для детей дошкольного (с 3
                                до 6 лет) и школьного (с 6 до 14 лет) возраста.
                            </p>
                            <div
                                class="bg-mint/50 rounded-xl p-4 text-sm text-gray-700"
                            >
                                <p class="font-semibold mb-2">
                                    Рекомендуемая норма:
                                </p>
                                <ul class="space-y-1">
                                    <li>
                                        • Дошкольный возраст (3-6 лет): 50г 1
                                        раз в неделю
                                    </li>
                                    <li>
                                        • Школьный возраст (6-14 лет): 50г 2
                                        раза в неделю
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-8">
                            <div class="text-5xl mb-4">🏆</div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                                Награды и признание
                            </h3>
                            <p class="text-gray-700 mb-4 leading-relaxed">
                                В 2014 году наша компания представляла Фруктовые
                                палочки на Ежегодной Национальной Премии
                                <strong>«Здоровое питание-2014»</strong> и была
                                выбрана призером премии в номинации
                                <strong>«Технология года»</strong>.
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div
                            class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition"
                        >
                            <div class="text-4xl mb-3">🏔️</div>
                            <h4 class="font-bold text-gray-800 mb-2">
                                Спортсмены и туристы
                            </h4>
                            <p class="text-sm text-gray-600">
                                Официальный партнер финала кубка ДОСААФ России
                                по трофи-рейдам 2018
                            </p>
                        </div>

                        <div
                            class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition"
                        >
                            <div class="text-4xl mb-3">🎒</div>
                            <h4 class="font-bold text-gray-800 mb-2">
                                Образовательные учреждения
                            </h4>
                            <p class="text-sm text-gray-600">
                                Регулярные поставки для колледжей и школ
                            </p>
                        </div>

                        <div
                            class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition"
                        >
                            <div class="text-4xl mb-3">🤖</div>
                            <h4 class="font-bold text-gray-800 mb-2">
                                Вендинговые автоматы
                            </h4>
                            <p class="text-sm text-gray-600">
                                Идеально подходят для автоматов быстрого питания
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Geography Section -->
        <section
            class="py-20 bg-gradient-to-br from-sage to-mint relative overflow-hidden"
        >
            <div
                class="decorative-circle w-72 h-72 bg-white absolute bottom-20 right-10"
            ></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-12">
                    <h2
                        class="font-display text-4xl md:text-6xl font-black text-gray-800 mb-6"
                    >
                        География <span class="gradient-text">поставок</span>
                    </h2>
                    <div
                        class="w-32 h-1.5 bg-gradient-to-r from-teal via-accent to-teal rounded-full mx-auto mb-8"
                    ></div>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Продукция компании «НЕОФРУТ» поставляется по
                        индивидуальным заказам в разные регионы России и страны
                        СНГ
                    </p>
                </div>

                <div
                    class="bg-white rounded-3xl p-10 soft-shadow-lg max-w-4xl mx-auto"
                >
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                        <div class="text-center p-4">
                            <div class="text-3xl mb-2">📍</div>
                            <p class="font-semibold text-gray-800">Барнаул</p>
                        </div>
                        <div class="text-center p-4">
                            <div class="text-3xl mb-2">📍</div>
                            <p class="font-semibold text-gray-800">
                                Екатеринбург
                            </p>
                        </div>
                        <div class="text-center p-4">
                            <div class="text-3xl mb-2">📍</div>
                            <p class="font-semibold text-gray-800">Хабаровск</p>
                        </div>
                        <div class="text-center p-4">
                            <div class="text-3xl mb-2">📍</div>
                            <p class="font-semibold text-gray-800">
                                Петрозаводск
                            </p>
                        </div>
                        <div class="text-center p-4">
                            <div class="text-3xl mb-2">📍</div>
                            <p class="font-semibold text-gray-800">Краснодар</p>
                        </div>
                        <div class="text-center p-4">
                            <div class="text-3xl mb-2">📍</div>
                            <p class="font-semibold text-gray-800">
                                Нижний Новгород
                            </p>
                        </div>
                        <div class="text-center p-4">
                            <div class="text-3xl mb-2">📍</div>
                            <p class="font-semibold text-gray-800">Вологда</p>
                        </div>
                        <div class="text-center p-4">
                            <div class="text-3xl mb-2">📍</div>
                            <p class="font-semibold text-gray-800">
                                Архангельск
                            </p>
                        </div>
                        <div class="text-center p-4">
                            <div class="text-3xl mb-2">🌍</div>
                            <p class="font-semibold text-gray-800">Казахстан</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Future Development Section -->
        <section class="py-20 bg-white relative overflow-hidden">
            <div
                class="decorative-circle w-72 h-72 bg-accent/20 absolute top-20 right-10"
            ></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-12">
                    <h2
                        class="font-display text-4xl md:text-6xl font-black text-gray-800 mb-6"
                    >
                        Разработки <span class="gradient-text">будущего</span>
                    </h2>
                    <div
                        class="w-32 h-1.5 bg-gradient-to-r from-teal via-accent to-teal rounded-full mx-auto"
                    ></div>
                </div>

                <div
                    class="bg-gradient-to-br from-peach/40 to-orange-50 rounded-3xl p-12 soft-shadow-lg"
                >
                    <div class="text-center mb-8">
                        <div class="text-6xl mb-4">🔬</div>
                        <p class="text-xl text-gray-700 leading-relaxed">
                            Компания НЕОФРУТ постоянно ведет научные разработки
                            новых технологий и видов продукции
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-white rounded-2xl p-8">
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                                Высокобелковые палочки
                            </h3>
                            <p class="text-gray-700 leading-relaxed">
                                Разработка технологии производства палочек с
                                повышенным содержанием белка за счет применения
                                высокобелковых фракций переработки амаранта (до
                                34% белка).
                            </p>
                        </div>

                        <div class="bg-white rounded-2xl p-8">
                            <h3 class="text-2xl font-bold text-gray-800 mb-4">
                                Обогащенные палочки
                            </h3>
                            <p class="text-gray-700 leading-relaxed">
                                Палочки с повышенным содержанием йода и калия за
                                счет использования очищенной ламинарии и других
                                натуральных компонентов.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section
            class="py-24 bg-gradient-to-br from-teal via-teal to-accent relative overflow-hidden"
        >
            <div
                class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE2YzAtMS4xLS45LTItMi0yaC00Yy0xLjEgMC0yIC45LTIgMnY0YzAgMS4xLjkgMiAyIDJoNGMxLjEgMCAyLS45IDItMnYtNHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-30"
            ></div>
            <div
                class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white relative z-10"
            >
                <h2
                    class="font-display text-5xl md:text-6xl font-black mb-8 drop-shadow-lg"
                >
                    Здоровое питание<br />для активной жизни!
                </h2>
                <p
                    class="text-xl md:text-2xl mb-10 text-white/95 font-light leading-relaxed"
                >
                    Надеемся на плодотворное сотрудничество
                </p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a
                        href="/cms/products"
                        class="bg-white text-teal px-12 py-5 rounded-full font-black text-xl hover:shadow-2xl transition transform hover:scale-105"
                    >
                        Наша продукция
                    </a>
                    <a
                        href="#contacts"
                        class="bg-accent text-white px-12 py-5 rounded-full font-black text-xl hover:shadow-2xl transition transform hover:scale-105"
                    >
                        Связаться с нами
                    </a>
                </div>
            </div>
        </section>

        <?php includePartial('order-info'); ?>

        <?php includePartial('footer'); ?>

        <!-- Main JavaScript -->
        <script src="../main.js"></script>
        <!-- CMS Editor Script -->
        <script src="../cms-editor.js"></script>
    </body>
</html>
