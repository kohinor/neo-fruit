<?php
// Load metatags helper
require_once '../metatags-helper.php';
loadMetatagsForPage('company');
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <?php
        // Render metatags with defaults
        renderMetatags(array(
            'title' => 'О компании НЕО-ФРУТ - Производитель натуральных фруктовых батончиков | НПК НЕОФРУТ',
            'meta_title' => 'О компании НЕО-ФРУТ - Производитель натуральных фруктовых батончиков',
            'description' => 'НПК НЕОФРУТ - производитель натуральных фруктовых батончиков и пастилы из сухофруктов. Наша миссия - здоровое питание без компромиссов. Качественная продукция из натуральных ингредиентов.',
            'keywords' => 'о компании неофрут, производитель батончиков, НПК НЕОФРУТ, натуральные продукты, компания неофрут',
            'canonical' => 'https://neo-fruit.ru/company/',
            'og_url' => 'https://neo-fruit.ru/company/',
            'og_title' => 'О компании НЕО-ФРУТ - Производитель натуральных фруктовых батончиков',
            'og_description' => 'НПК НЕОФРУТ - производитель натуральных фруктовых батончиков из сухофруктов. Качественная продукция из натуральных ингредиентов.',
            'twitter_url' => 'https://neo-fruit.ru/company/',
            'twitter_title' => 'О компании НЕО-ФРУТ - Производитель натуральных фруктовых батончиков',
            'twitter_description' => 'НПК НЕОФРУТ - производитель натуральных фруктовых батончиков из сухофруктов.'
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
                                    class="text-sm font-bold text-teal bg-white px-4 py-2 rounded-full cms-editable"
                                    data-editable="badge"
                                    data-section-id="foundation"
                                >
                                    С 2003 года
                                </span>
                            </div>

                            <h2
                                class="font-display text-4xl md:text-5xl font-black text-gray-800 mb-6 cms-editable"
                                data-editable="title"
                                data-section-id="foundation"
                            >
                                История создания
                            </h2>

                            <p
                                class="text-lg text-gray-700 mb-6 leading-relaxed cms-editable"
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
                                    class="font-bold text-gray-800 mb-4 text-xl cms-editable"
                                    data-editable="founder_title"
                                    data-section-id="foundation"
                                >
                                    Основатель и руководитель
                                </h3>
                                <p class="text-gray-700 leading-relaxed cms-editable"
                                    data-editable="founder_text"
                                    data-section-id="foundation">
                                    <strong>Кольцова В. П.</strong> — более 25
                                    лет проработала старшим научным сотрудником
                                    в НИИ пищевой промышленности, создававшего
                                    новые технологии производства продуктов
                                    питания (рационов) для космонавтов.
                                </p>
                            </div>

                            <p
                                class="text-base text-gray-600 leading-relaxed italic cms-editable"
                                data-editable="recipe_note"
                                data-section-id="foundation"
                            >
                                Рецептуры разрабатывались с учетом изменения
                                вкусовых качеств человека в условиях
                                невесомости, с применением осмоса,
                                сублимирования и других передовых технологий.
                            </p>
                        </div>

                        <!-- Image -->
                        <div
                            class="p-8 lg:p-10 flex flex-col items-center justify-start"
                        >
                            <div class="relative w-3/4 angle-image-reverse mb-6">
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
                            <div class="bg-white/80 rounded-2xl p-6 w-full">
                                <p class="text-gray-700 text-sm leading-relaxed italic cms-editable"
                                    data-editable="historical_note"
                                    data-section-id="foundation">
                                    Технология сублимационной сушки фруктовых палочек берет свое начало из разработок молдавского НИИ пищевой промышленности, который с 1963 года создавал витаминное питание для советских космонавтов. Метод основан на испарении льда, минуя жидкую фазу, что позволяет сохранить натуральные продукты компактными, легкими и пригодными для длительного хранения без специальных условий.
                                </p>
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
                        class="font-display text-4xl md:text-6xl font-black text-gray-800 mb-6 cms-editable"
                        data-editable="title"
                        data-section-id="innovation"
                    >
                        Уникальная <span class="gradient-text">технология</span>
                    </h2>
                    <div
                        class="w-32 h-1.5 bg-gradient-to-r from-teal via-accent to-teal rounded-full mx-auto"
                    ></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12" id="patents-gallery">
                    <div
                        class="bg-white rounded-3xl p-8 soft-shadow-lg text-center"
                        data-section-id="patent_1"
                    >
                        <div class="mb-6 patent-image-wrapper cursor-pointer" onclick="openPatentLightbox(event)">
                            <img
                                src="../images/patent1.png"
                                alt="Патент № 2358451 С2"
                                class="h-32 object-contain mx-auto rounded-lg hover:shadow-xl transition"
                                data-editable-image="patent1_image"
                                data-section-id="patent_1"
                            />
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 cms-editable"
                            data-editable="patent1_title"
                            data-section-id="innovation">
                            Патент № 2358451 С2
                        </h3>
                        <p class="text-gray-600 leading-relaxed cms-editable"
                            data-editable="patent1_desc"
                            data-section-id="innovation">
                            «Способ производства фруктовых палочек»
                        </p>
                    </div>

                    <div
                        class="bg-white rounded-3xl p-8 soft-shadow-lg text-center"
                        data-section-id="patent_2"
                    >
                        <div class="mb-6 patent-image-wrapper cursor-pointer" onclick="openPatentLightbox(event)">
                            <img
                                src="../images/patent2.png"
                                alt="Патент № 2612784 С1"
                                class="h-32 object-contain mx-auto rounded-lg hover:shadow-xl transition"
                                data-editable-image="patent2_image"
                                data-section-id="patent_2"
                            />
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4 cms-editable"
                            data-editable="patent2_title"
                            data-section-id="innovation">
                            Патент № 2612784 С1
                        </h3>
                        <p class="text-gray-600 leading-relaxed cms-editable"
                            data-editable="patent2_desc"
                            data-section-id="innovation">
                            «Способ производства фруктовых батончиков»
                        </p>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-white to-cream rounded-3xl p-10 soft-shadow-lg"
                >
                    <h3
                        class="text-3xl font-bold text-gray-800 mb-6 text-center cms-editable"
                        data-editable="advantages_title"
                        data-section-id="innovation"
                    >
                        Преимущества продукции
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex items-start space-x-4">
                            <div class="text-3xl">✅</div>
                            <div>
                                <p class="text-gray-700 leading-relaxed cms-editable"
                                    data-editable="advantage1"
                                    data-section-id="innovation">
                                    Исключительно натуральное сырье без
                                    заменителей, красителей и консервантов
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-3xl">✅</div>
                            <div>
                                <p class="text-gray-700 leading-relaxed cms-editable"
                                    data-editable="advantage2"
                                    data-section-id="innovation">
                                    Отборные экологически чистые фрукты, богатые
                                    витаминами и микроэлементами
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-3xl">✅</div>
                            <div>
                                <p class="text-gray-700 leading-relaxed cms-editable"
                                    data-editable="advantage3"
                                    data-section-id="innovation">
                                    Высокая калорийность и пищевая ценность для
                                    экстремальных условий
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-3xl">✅</div>
                            <div>
                                <p class="text-gray-700 leading-relaxed cms-editable"
                                    data-editable="advantage4"
                                    data-section-id="innovation">
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
                        class="font-display text-4xl md:text-6xl font-black text-gray-800 mb-6 cms-editable"
                        data-editable="title"
                        data-section-id="recognition"
                    >
                        Признание
                        <span class="gradient-text">на высшем уровне</span>
                    </h2>
                    <div
                        class="w-32 h-1.5 bg-gradient-to-r from-teal via-accent to-teal rounded-full mx-auto mb-8"
                    ></div>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto cms-editable"
                        data-editable="subtitle"
                        data-section-id="recognition">
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
                            <h3 class="text-2xl font-bold text-gray-800 mb-4 cms-editable"
                                data-editable="timeline1_title"
                                data-section-id="recognition">
                                Первое предложение
                            </h3>
                            <p class="text-gray-700 leading-relaxed cms-editable"
                                data-editable="timeline1_text"
                                data-section-id="recognition">
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
                            <h3 class="text-2xl font-bold text-gray-800 mb-4 cms-editable"
                                data-editable="timeline2_title"
                                data-section-id="recognition">
                                Всесторонние исследования
                            </h3>
                            <p class="text-gray-700 leading-relaxed mb-4 cms-editable"
                                data-editable="timeline2_text"
                                data-section-id="recognition">
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
                            <h3 class="text-2xl font-bold text-gray-800 mb-4 cms-editable"
                                data-editable="timeline3_title"
                                data-section-id="recognition">
                                Официальное одобрение
                            </h3>
                            <p class="text-gray-700 leading-relaxed mb-4 cms-editable"
                                data-editable="timeline3_text"
                                data-section-id="recognition">
                                Получено Санитарно-эпидемиологическое заключение
                                № 77. МО. 01.916.Т.001288.08.09 от 21.08.2009г.
                                Главного Центра Государственного
                                санитарно-эпидемиологического надзора Минобороны
                                России.
                            </p>
                            <p class="text-sm text-gray-600 italic cms-editable"
                                data-editable="timeline3_note"
                                data-section-id="recognition">
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
                            <h3 class="text-2xl font-bold text-gray-800 mb-4 cms-editable"
                                data-editable="timeline4_title"
                                data-section-id="recognition">
                                Включение в нормы рационов питания
                            </h3>
                            <p class="text-gray-700 leading-relaxed mb-4 cms-editable"
                                data-editable="timeline4_text"
                                data-section-id="recognition">
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
                        class="font-display text-4xl md:text-6xl font-black text-gray-800 mb-6 cms-editable"
                        data-editable="title"
                        data-section-id="gov_orders"
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
                        <div class="text-4xl mb-4 cms-editable"
                            data-editable="order1_icon"
                            data-section-id="gov_orders">🛡️</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2 cms-editable"
                            data-editable="order1_title"
                            data-section-id="gov_orders">
                            Министерство обороны РФ
                        </h3>
                        <p class="text-sm text-gray-600 cms-editable"
                            data-editable="order1_text"
                            data-section-id="gov_orders">
                            Приказ от 21 июня 2011 г. №888
                        </p>
                    </div>

                    <!-- Order 2 -->
                    <div
                        class="bg-white rounded-2xl p-6 soft-shadow-lg hover:shadow-xl transition"
                    >
                        <div class="text-4xl mb-4 cms-editable"
                            data-editable="order2_icon"
                            data-section-id="gov_orders">🔐</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2 cms-editable"
                            data-editable="order2_title"
                            data-section-id="gov_orders">
                            Федеральная служба безопасности РФ
                        </h3>
                        <p class="text-sm text-gray-600 cms-editable"
                            data-editable="order2_text"
                            data-section-id="gov_orders">
                            Приказ от 14 февраля 2011 г. № 55
                        </p>
                    </div>

                    <!-- Order 3 -->
                    <div
                        class="bg-white rounded-2xl p-6 soft-shadow-lg hover:shadow-xl transition"
                    >
                        <div class="text-4xl mb-4 cms-editable"
                            data-editable="order3_icon"
                            data-section-id="gov_orders">🚔</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2 cms-editable"
                            data-editable="order3_title"
                            data-section-id="gov_orders">
                            Министерство внутренних дел РФ
                        </h3>
                        <p class="text-sm text-gray-600 cms-editable"
                            data-editable="order3_text"
                            data-section-id="gov_orders">
                            Приказ от 19 апреля 2010 г. №292
                        </p>
                    </div>

                    <!-- Order 4 -->
                    <div
                        class="bg-white rounded-2xl p-6 soft-shadow-lg hover:shadow-xl transition"
                    >
                        <div class="text-4xl mb-4 cms-editable"
                            data-editable="order4_icon"
                            data-section-id="gov_orders">👮</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2 cms-editable"
                            data-editable="order4_title"
                            data-section-id="gov_orders">
                            ФС войск национальной гвардии РФ
                        </h3>
                        <p class="text-sm text-gray-600 cms-editable"
                            data-editable="order4_text"
                            data-section-id="gov_orders">
                            Приказ от 2 августа 2017 г. №244
                        </p>
                    </div>

                    <!-- Order 5 -->
                    <div
                        class="bg-white rounded-2xl p-6 soft-shadow-lg hover:shadow-xl transition"
                    >
                        <div class="text-4xl mb-4 cms-editable"
                            data-editable="order5_icon"
                            data-section-id="gov_orders">🚒</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2 cms-editable"
                            data-editable="order5_title"
                            data-section-id="gov_orders">
                            МЧС России
                        </h3>
                        <p class="text-sm text-gray-600 cms-editable"
                            data-editable="order5_text"
                            data-section-id="gov_orders">
                            Приказ от 29 апреля 2013 г. №290
                        </p>
                    </div>

                    <!-- Order 6 -->
                    <div
                        class="bg-white rounded-2xl p-6 soft-shadow-lg hover:shadow-xl transition"
                    >
                        <div class="text-4xl mb-4 cms-editable"
                            data-editable="order6_icon"
                            data-section-id="gov_orders">⚖️</div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2 cms-editable"
                            data-editable="order6_title"
                            data-section-id="gov_orders">
                            Федеральная служба исполнения наказаний
                        </h3>
                        <p class="text-sm text-gray-600 cms-editable"
                            data-editable="order6_text"
                            data-section-id="gov_orders">
                            Приказ от 9 декабря 2008 г. №685
                        </p>
                    </div>
                </div>

                <div
                    class="mt-12 bg-gradient-to-r from-teal/10 to-accent/10 rounded-3xl p-8 text-center"
                >
                    <p class="text-xl text-gray-700 font-semibold cms-editable"
                        data-editable="summary"
                        data-section-id="gov_orders">
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
                            class="font-display text-4xl md:text-5xl font-black text-gray-800 mb-6 cms-editable"
                            data-editable="title"
                            data-section-id="civilian"
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
                            <h3 class="text-2xl font-bold text-gray-800 mb-4 cms-editable"
                                data-editable="children_title"
                                data-section-id="civilian">
                                Для детей
                            </h3>
                            <p class="text-gray-700 mb-4 leading-relaxed cms-editable"
                                data-editable="children_text"
                                data-section-id="civilian">
                                Свидетельство о государственной регистрации
                                №RU.50.99.01.005.Е.004032.01.13. от 28.01.2013г.
                                Продукция разрешена для детей дошкольного (с 3
                                до 6 лет) и школьного (с 6 до 14 лет) возраста.
                            </p>
                            <div
                                class="bg-mint/50 rounded-xl p-4 text-sm text-gray-700 cms-editable"
                                data-editable="children_norms"
                                data-section-id="civilian"
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
                            <h3 class="text-2xl font-bold text-gray-800 mb-4 cms-editable"
                                data-editable="awards_title"
                                data-section-id="civilian">
                                Награды и признание
                            </h3>
                            <p class="text-gray-700 mb-4 leading-relaxed cms-editable"
                                data-editable="awards_text"
                                data-section-id="civilian">
                                В 2014 году наша компания представляла Фруктовые
                                палочки на Ежегодной Национальной Премии
                                <strong>«Здоровое питание-2014»</strong> и была
                                выбрана призером премии в номинации
                                <strong>«Технология года»</strong>.
                            </p>

                            <!-- Awards Gallery -->
                            <div class="flex justify-center mt-6" id="awards-gallery">
                                <div class="award-image-wrapper cursor-pointer" data-section-id="award_1" data-duplicable="true" onclick="openAwardLightbox(event)">
                                    <img
                                        src="../images/award1.png"
                                        alt="Награда 1"
                                        class="h-32 object-contain rounded-lg hover:shadow-lg transition"
                                        data-editable-image="award_1_image"
                                        data-section-id="award_1"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div
                            class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition"
                        >
                            <div class="text-4xl mb-3">🏔️</div>
                            <h4 class="font-bold text-gray-800 mb-2 cms-editable"
                                data-editable="use1_title"
                                data-section-id="civilian">
                                Спортсмены и туристы
                            </h4>
                            <p class="text-sm text-gray-600 mb-4 cms-editable"
                                data-editable="use1_text"
                                data-section-id="civilian">
                                Официальный партнер финала кубка ДОСААФ России
                                по трофи-рейдам 2018
                            </p>
                            <div class="flex justify-center">
                                <div class="award-image-wrapper cursor-pointer" data-section-id="sports_award" data-duplicable="true" onclick="openAwardLightbox(event)">
                                    <img
                                        src="../images/award2.png"
                                        alt="Награда спортсменам и туристам"
                                        class="h-32 object-contain rounded-lg hover:shadow-lg transition"
                                        data-editable-image="sports_award_image"
                                        data-section-id="sports_award"
                                    />
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition"
                        >
                            <div class="text-4xl mb-3">🎒</div>
                            <h4 class="font-bold text-gray-800 mb-2 cms-editable"
                                data-editable="use2_title"
                                data-section-id="civilian">
                                Образовательные учреждения
                            </h4>
                            <p class="text-sm text-gray-600 mb-4 cms-editable"
                                data-editable="use2_text"
                                data-section-id="civilian">
                                Регулярные поставки для колледжей и школ
                            </p>
                            <div class="flex justify-center">
                                <div class="award-image-wrapper cursor-pointer" data-section-id="education_award" data-duplicable="true" onclick="openAwardLightbox(event)">
                                    <img
                                        src="../images/award2.png"
                                        alt="Награда образовательным учреждениям"
                                        class="h-32 object-contain rounded-lg hover:shadow-lg transition"
                                        data-editable-image="education_award_image"
                                        data-section-id="education_award"
                                    />
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition"
                        >
                            <div class="text-4xl mb-3">🤖</div>
                            <h4 class="font-bold text-gray-800 mb-2 cms-editable"
                                data-editable="use3_title"
                                data-section-id="civilian">
                                Вендинговые автоматы
                            </h4>
                            <p class="text-sm text-gray-600 mb-4 cms-editable"
                                data-editable="use3_text"
                                data-section-id="civilian">
                                Идеально подходят для автоматов быстрого питания
                            </p>
                            <div class="flex justify-center">
                                <div class="award-image-wrapper cursor-pointer" data-section-id="vending_award" data-duplicable="true" onclick="openAwardLightbox(event)">
                                    <img
                                        src="../images/award2.png"
                                        alt="Награда вендинговым автоматам"
                                        class="h-32 object-contain rounded-lg hover:shadow-lg transition"
                                        data-editable-image="vending_award_image"
                                        data-section-id="vending_award"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Geography Section -->
        <section
            class="py-12 bg-gradient-to-br from-sage to-mint relative overflow-hidden"
            id="location" data-section-id="location"
            data-duplicable="false"
        >
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-8">
                    <h2
                        class="font-display text-3xl md:text-4xl font-black text-gray-800 mb-4 cms-editable"
                        data-editable="title"
                        data-section-id="geography"
                    >
                        География <span class="gradient-text">поставок</span>
                    </h2>
                    <p class="text-base text-gray-600 max-w-2xl mx-auto cms-editable"
                        data-editable="subtitle"
                        data-section-id="geography">
                        Продукция компании «НЕОФРУТ» поставляется по
                        индивидуальным заказам в разные регионы России и страны
                        СНГ
                    </p>
                </div>

                <div
                    class="bg-white rounded-2xl p-6 soft-shadow-lg max-w-3xl mx-auto" data-section-id="location_cities"
                >
                    <div class="grid grid-cols-3 md:grid-cols-4 gap-3">
                        <div class="text-center p-2" data-section-id="city_1" data-duplicable="true">
                            <div class="text-2xl mb-1">📍</div>
                            <p class="font-semibold text-gray-800 text-sm cms-editable" data-editable="name" data-section-id="city_1">Барнаул</p>
                        </div>
                        <div class="text-center p-2" data-section-id="city_2" data-duplicable="true">
                            <div class="text-2xl mb-1">📍</div>
                            <p class="font-semibold text-gray-800 text-sm cms-editable" data-editable="name" data-section-id="city_2">Екатеринбург</p>
                        </div>
                        <div class="text-center p-2" data-section-id="city_3" data-duplicable="true">
                            <div class="text-2xl mb-1">📍</div>
                            <p class="font-semibold text-gray-800 text-sm cms-editable" data-editable="name" data-section-id="city_3">Хабаровск</p>
                        </div>
                        <div class="text-center p-2" data-section-id="city_4" data-duplicable="true">
                            <div class="text-2xl mb-1">📍</div>
                            <p class="font-semibold text-gray-800 text-sm cms-editable" data-editable="name" data-section-id="city_4">Петрозаводск</p>
                        </div>
                        <div class="text-center p-2" data-section-id="city_5" data-duplicable="true">
                            <div class="text-2xl mb-1">📍</div>
                            <p class="font-semibold text-gray-800 text-sm cms-editable" data-editable="name" data-section-id="city_5">Краснодар</p>
                        </div>
                        <div class="text-center p-2" data-section-id="city_6" data-duplicable="true">
                            <div class="text-2xl mb-1">📍</div>
                            <p class="font-semibold text-gray-800 text-sm cms-editable" data-editable="name" data-section-id="city_6">Нижний Новгород</p>
                        </div>
                        <div class="text-center p-2" data-section-id="city_7" data-duplicable="true">
                            <div class="text-2xl mb-1">📍</div>
                            <p class="font-semibold text-gray-800 text-sm cms-editable" data-editable="name" data-section-id="city_7">Вологда</p>
                        </div>
                        <div class="text-center p-2" data-section-id="city_8" data-duplicable="true">
                            <div class="text-2xl mb-1">📍</div>
                            <p class="font-semibold text-gray-800 text-sm cms-editable" data-editable="name" data-section-id="city_8">Архангельск</p>
                        </div>
                        <div class="text-center p-2" data-section-id="country_1" data-duplicable="true">
                            <div class="text-2xl mb-1">🌍</div>
                            <p class="font-semibold text-gray-800 text-sm cms-editable" data-editable="name" data-section-id="country_1">Казахстан</p>
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
                        <div class="bg-white rounded-2xl p-8" data-section-id="development_1" data-duplicable="true">
                            <h3 class="text-2xl font-bold text-gray-800 mb-4 cms-editable" data-editable="title" data-section-id="development_1">
                                Высокобелковые палочки
                            </h3>
                            <p class="text-gray-700 leading-relaxed cms-editable" data-editable="description" data-section-id="development_1">
                                Разработка технологии производства палочек с
                                повышенным содержанием белка за счет применения
                                высокобелковых фракций переработки амаранта (до
                                34% белка).
                            </p>
                        </div>

                        <div class="bg-white rounded-2xl p-8" data-section-id="development_2" data-duplicable="true">
                            <h3 class="text-2xl font-bold text-gray-800 mb-4 cms-editable" data-editable="title" data-section-id="development_2">
                                Обогащенные палочки
                            </h3>
                            <p class="text-gray-700 leading-relaxed cms-editable" data-editable="description" data-section-id="development_2">
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
                        href="/cms/products/"
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

        <!-- Lightbox for award images -->
        <div id="lightbox" class="lightbox" onclick="closeLightbox(event)">
            <div class="lightbox-content">
                <button class="lightbox-close" onclick="closeLightbox(event)">
                    ×
                </button>
                <button class="lightbox-nav lightbox-prev" onclick="navigateLightbox(-1, event)">
                    ‹
                </button>
                <button class="lightbox-nav lightbox-next" onclick="navigateLightbox(1, event)">
                    ›
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

        <!-- Awards & Patents Gallery Script -->
        <script>
            let awardImages = [];
            let currentAwardIndex = 0;
            let patentImages = [];
            let currentPatentIndex = 0;
            let currentGalleryType = null; // 'awards' or 'patents'

            /**
             * Open award lightbox
             * @param {Event} event - Click event
             */
            function openAwardLightbox(event) {
                event.preventDefault();
                event.stopPropagation();

                const gallery = document.getElementById('awards-gallery');
                if (!gallery) return;

                // Get all award images from the gallery
                const imageWrappers = gallery.querySelectorAll('.award-image-wrapper img');
                awardImages = Array.from(imageWrappers);

                // Find which image was clicked
                let clickedImg = event.target;
                if (clickedImg.tagName !== 'IMG') {
                    clickedImg = event.currentTarget.querySelector('img');
                }

                currentAwardIndex = awardImages.indexOf(clickedImg);
                currentGalleryType = 'awards';

                // Open lightbox
                const lightbox = document.getElementById('lightbox');
                const lightboxImg = document.getElementById('lightbox-img');

                if (lightbox && lightboxImg && clickedImg) {
                    lightboxImg.src = clickedImg.src;
                    lightboxImg.alt = clickedImg.alt;
                    lightbox.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            }

            /**
             * Open patent lightbox
             * @param {Event} event - Click event
             */
            function openPatentLightbox(event) {
                event.preventDefault();
                event.stopPropagation();

                const gallery = document.getElementById('patents-gallery');
                if (!gallery) return;

                // Get all patent images from the gallery
                const imageWrappers = gallery.querySelectorAll('.patent-image-wrapper img');
                patentImages = Array.from(imageWrappers);

                // Find which image was clicked
                let clickedImg = event.target;
                if (clickedImg.tagName !== 'IMG') {
                    clickedImg = event.currentTarget.querySelector('img');
                }

                currentPatentIndex = patentImages.indexOf(clickedImg);
                currentGalleryType = 'patents';

                // Open lightbox
                const lightbox = document.getElementById('lightbox');
                const lightboxImg = document.getElementById('lightbox-img');

                if (lightbox && lightboxImg && clickedImg) {
                    lightboxImg.src = clickedImg.src;
                    lightboxImg.alt = clickedImg.alt;
                    lightbox.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            }

            // Override navigateLightbox for awards and patents
            const originalNavigateLightbox = navigateLightbox;
            navigateLightbox = function(direction, event) {
                event.stopPropagation();

                // Check if we're viewing awards
                if (currentGalleryType === 'awards' && awardImages.length > 0) {
                    currentAwardIndex = (currentAwardIndex + direction + awardImages.length) % awardImages.length;

                    const lightboxImg = document.getElementById('lightbox-img');
                    if (lightboxImg && awardImages[currentAwardIndex]) {
                        lightboxImg.src = awardImages[currentAwardIndex].src;
                        lightboxImg.alt = awardImages[currentAwardIndex].alt;
                    }
                } else if (currentGalleryType === 'patents' && patentImages.length > 0) {
                    // Navigate through patents
                    currentPatentIndex = (currentPatentIndex + direction + patentImages.length) % patentImages.length;

                    const lightboxImg = document.getElementById('lightbox-img');
                    if (lightboxImg && patentImages[currentPatentIndex]) {
                        lightboxImg.src = patentImages[currentPatentIndex].src;
                        lightboxImg.alt = patentImages[currentPatentIndex].alt;
                    }
                } else {
                    // Fall back to original function for product images
                    originalNavigateLightbox(direction, event);
                }
            };

            // Reset images when lightbox closes
            const originalCloseLightbox = closeLightbox;
            closeLightbox = function(event) {
                originalCloseLightbox(event);
                awardImages = [];
                currentAwardIndex = 0;
                patentImages = [];
                currentPatentIndex = 0;
                currentGalleryType = null;
            };
        </script>
    </body>
</html>
