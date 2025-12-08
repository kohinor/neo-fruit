// Metatag Editor - PHP 5.6 compatible (no arrow functions, no const/let)
(function() {
    'use strict';

    var MetaEditor = {
        currentPage: 'index',
        isOpen: false,
        metatags: {},

        init: function() {
            this.createMetaButton();
            this.loadCurrentPageMetatags();
        },

        getApiPath: function() {
            // Detect if we're in a subfolder
            var path = window.location.pathname;
            if (path.includes('/company/') || path.includes('/products/')) {
                return '../meta-api.php';
            }
            return 'meta-api.php';
        },

        createMetaButton: function() {
            var self = this;
            var toolbar = document.querySelector('.cms-toolbar');
            if (!toolbar) return;

            var metaBtn = document.createElement('button');
            metaBtn.className = 'cms-btn cms-btn-meta';
            metaBtn.textContent = 'Метатеги';
            metaBtn.onclick = function() { self.openMetaEditor(); };

            // Insert before logout button
            var logoutBtn = toolbar.querySelector('.cms-btn-danger');
            if (logoutBtn) {
                toolbar.insertBefore(metaBtn, logoutBtn);
            } else {
                toolbar.appendChild(metaBtn);
            }
        },

        detectCurrentPage: function() {
            var path = window.location.pathname;

            // Check for root or index page
            if (path === '/' || path === '/index.php') {
                return 'index';
            }

            // Check for specific page folders
            if (path.includes('/company')) {
                return 'company';
            }
            if (path.includes('/products')) {
                return 'products';
            }

            // Extract page name from path (for future pages)
            var matches = path.match(/\/([^\/]+)\/index\.php$/);
            if (matches) {
                return matches[1];
            }
            matches = path.match(/\/([^\/]+)\/?$/);
            if (matches && matches[1] !== '') {
                return matches[1];
            }

            return 'index';
        },

        loadCurrentPageMetatags: function() {
            var self = this;
            self.currentPage = self.detectCurrentPage();

            fetch(self.getApiPath() + '?page=' + self.currentPage)
                .then(function(response) { return response.json(); })
                .then(function(data) {
                    if (data.success && data.metatags) {
                        self.metatags = data.metatags;
                    }
                })
                .catch(function(error) {
                    console.error('Error loading metatags:', error);
                });
        },

        openMetaEditor: function() {
            if (this.isOpen) return;
            this.isOpen = true;

            var overlay = document.createElement('div');
            overlay.className = 'meta-editor-overlay';
            overlay.onclick = function(e) {
                if (e.target === overlay) {
                    MetaEditor.closeMetaEditor();
                }
            };

            var modal = document.createElement('div');
            modal.className = 'meta-editor-modal';
            modal.innerHTML = this.generateModalHTML();

            overlay.appendChild(modal);
            document.body.appendChild(overlay);

            this.attachModalEvents();
            this.loadAllPages();
        },

        closeMetaEditor: function() {
            var overlay = document.querySelector('.meta-editor-overlay');
            if (overlay) {
                overlay.remove();
            }
            this.isOpen = false;
        },

        generateModalHTML: function() {
            return '<div class="meta-editor-header">' +
                '<h2>Управление метатегами</h2>' +
                '<button class="meta-editor-close" onclick="MetaEditor.closeMetaEditor()">&times;</button>' +
            '</div>' +
            '<div class="meta-editor-body">' +
                '<div class="meta-editor-sidebar">' +
                    '<h3>Страницы</h3>' +
                    '<div id="meta-pages-list" class="meta-pages-list">' +
                        '<div class="meta-loading">Загрузка...</div>' +
                    '</div>' +
                '</div>' +
                '<div class="meta-editor-content">' +
                    '<div id="meta-form-container"></div>' +
                '</div>' +
            '</div>';
        },

        loadAllPages: function() {
            var self = this;
            fetch(self.getApiPath())
                .then(function(response) { return response.json(); })
                .then(function(data) {
                    if (data.success && data.data && data.data.pages) {
                        self.renderPagesList(data.data.pages);
                    }
                })
                .catch(function(error) {
                    console.error('Error loading pages:', error);
                    document.getElementById('meta-pages-list').innerHTML =
                        '<div class="meta-error">Ошибка загрузки страниц</div>';
                });
        },

        renderPagesList: function(pages) {
            var listHTML = '';
            for (var page in pages) {
                if (pages.hasOwnProperty(page)) {
                    var isActive = page === this.currentPage ? ' meta-page-active' : '';
                    listHTML += '<div class="meta-page-item' + isActive + '" data-page="' + page + '">' +
                        '<span class="meta-page-name">' + page + '</span>' +
                    '</div>';
                }
            }

            document.getElementById('meta-pages-list').innerHTML = listHTML;
            this.attachPagesListEvents(pages);

            // Load first page or current page
            var pageToLoad = pages.hasOwnProperty(this.currentPage) ? this.currentPage : Object.keys(pages)[0];
            if (pageToLoad) {
                this.loadPageMetatags(pageToLoad, pages[pageToLoad]);
            }
        },

        attachPagesListEvents: function(pages) {
            var self = this;
            var items = document.querySelectorAll('.meta-page-item');

            for (var i = 0; i < items.length; i++) {
                (function(item) {
                    var page = item.getAttribute('data-page');
                    item.addEventListener('click', function(e) {
                        self.loadPageMetatags(page, pages[page]);

                        // Update active state
                        var allItems = document.querySelectorAll('.meta-page-item');
                        for (var j = 0; j < allItems.length; j++) {
                            allItems[j].classList.remove('meta-page-active');
                        }
                        item.classList.add('meta-page-active');
                    });
                })(items[i]);
            }
        },

        loadPageMetatags: function(page, metatags) {
            this.currentPage = page;
            this.metatags = metatags || {};
            this.renderMetatagsForm();
        },

        renderMetatagsForm: function() {
            var container = document.getElementById('meta-form-container');
            var meta = this.metatags;

            var html = '<div class="meta-form">' +
                '<h3>Метатеги для страницы: <span class="meta-page-title">' + this.currentPage + '</span></h3>' +

                '<div class="meta-section">' +
                    '<h4>Основные метатеги</h4>' +
                    this.generateInput('title', 'Title (заголовок страницы)', meta.title || '', 'text', true) +
                    this.generateInput('meta_title', 'Meta Title', meta.meta_title || '', 'text') +
                    this.generateTextarea('description', 'Description', meta.description || '') +
                    this.generateTextarea('keywords', 'Keywords', meta.keywords || '') +
                    this.generateInput('author', 'Author', meta.author || 'НПК НЕОФРУТ', 'text') +
                    this.generateInput('robots', 'Robots', meta.robots || 'index, follow', 'text') +
                    this.generateInput('canonical', 'Canonical URL', meta.canonical || '', 'url') +
                '</div>' +

                '<div class="meta-section">' +
                    '<h4>Open Graph (Facebook)</h4>' +
                    this.generateInput('og_type', 'OG Type', meta.og_type || 'website', 'text') +
                    this.generateInput('og_url', 'OG URL', meta.og_url || '', 'url') +
                    this.generateInput('og_title', 'OG Title', meta.og_title || '', 'text') +
                    this.generateTextarea('og_description', 'OG Description', meta.og_description || '') +
                    this.generateInput('og_image', 'OG Image URL', meta.og_image || '', 'url') +
                    this.generateInput('og_locale', 'OG Locale', meta.og_locale || 'ru_RU', 'text') +
                    this.generateInput('og_site_name', 'OG Site Name', meta.og_site_name || 'НПК НЕОФРУТ', 'text') +
                '</div>' +

                '<div class="meta-section">' +
                    '<h4>Twitter Card</h4>' +
                    this.generateInput('twitter_card', 'Twitter Card Type', meta.twitter_card || 'summary_large_image', 'text') +
                    this.generateInput('twitter_url', 'Twitter URL', meta.twitter_url || '', 'url') +
                    this.generateInput('twitter_title', 'Twitter Title', meta.twitter_title || '', 'text') +
                    this.generateTextarea('twitter_description', 'Twitter Description', meta.twitter_description || '') +
                    this.generateInput('twitter_image', 'Twitter Image URL', meta.twitter_image || '', 'url') +
                '</div>' +

                '<div class="meta-form-actions">' +
                    '<button class="meta-btn meta-btn-primary" onclick="MetaEditor.saveMetatags()">Сохранить</button>' +
                    '<button class="meta-btn meta-btn-secondary" onclick="MetaEditor.closeMetaEditor()">Отмена</button>' +
                '</div>' +
            '</div>';

            container.innerHTML = html;
        },

        generateInput: function(name, label, value, type, required) {
            var req = required ? ' <span class="meta-required">*</span>' : '';
            return '<div class="meta-form-group">' +
                '<label for="meta-' + name + '">' + label + req + '</label>' +
                '<input type="' + type + '" id="meta-' + name + '" name="' + name + '" value="' + this.escapeHtml(value) + '" ' + (required ? 'required' : '') + '>' +
            '</div>';
        },

        generateTextarea: function(name, label, value, required) {
            var req = required ? ' <span class="meta-required">*</span>' : '';
            return '<div class="meta-form-group">' +
                '<label for="meta-' + name + '">' + label + req + '</label>' +
                '<textarea id="meta-' + name + '" name="' + name + '" rows="3" ' + (required ? 'required' : '') + '>' + this.escapeHtml(value) + '</textarea>' +
            '</div>';
        },

        escapeHtml: function(text) {
            var div = document.createElement('div');
            div.textContent = text;
            return div.innerHTML;
        },

        attachModalEvents: function() {
            // Events are attached via onclick in HTML for PHP 5.6 compatibility
        },

        showAddPageForm: function() {
            var pageName = prompt('Введите название страницы (например: products, contacts):');
            if (pageName) {
                pageName = pageName.trim().toLowerCase();
                if (pageName) {
                    this.createNewPage(pageName);
                }
            }
        },

        createNewPage: function(pageName) {
            var self = this;
            var defaultMetatags = {
                title: '',
                meta_title: '',
                description: '',
                keywords: '',
                author: 'НПК НЕОФРУТ',
                robots: 'index, follow',
                canonical: '',
                og_type: 'website',
                og_url: '',
                og_title: '',
                og_description: '',
                og_image: '',
                og_locale: 'ru_RU',
                og_site_name: 'НПК НЕОФРУТ',
                twitter_card: 'summary_large_image',
                twitter_url: '',
                twitter_title: '',
                twitter_description: '',
                twitter_image: ''
            };

            fetch(self.getApiPath(), {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'save',
                    page: pageName,
                    metatags: defaultMetatags
                })
            })
            .then(function(response) { return response.json(); })
            .then(function(data) {
                if (data.success) {
                    alert('Страница "' + pageName + '" создана');
                    self.loadAllPages();
                } else {
                    alert('Ошибка создания страницы: ' + (data.error || 'неизвестная ошибка'));
                }
            })
            .catch(function(error) {
                console.error('Error creating page:', error);
                alert('Ошибка создания страницы');
            });
        },

        deletePage: function(pageName) {
            var self = this;

            fetch(self.getApiPath(), {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    action: 'delete',
                    page: pageName
                })
            })
            .then(function(response) { return response.json(); })
            .then(function(data) {
                if (data.success) {
                    alert('Страница удалена');
                    self.loadAllPages();
                } else {
                    alert('Ошибка удаления: ' + (data.error || 'неизвестная ошибка'));
                }
            })
            .catch(function(error) {
                console.error('Error deleting page:', error);
                alert('Ошибка удаления страницы');
            });
        },

        saveMetatags: function() {
            var self = this;
            var form = document.querySelector('.meta-form');
            var inputs = form.querySelectorAll('input, textarea');
            var metatags = {};

            for (var i = 0; i < inputs.length; i++) {
                var input = inputs[i];
                metatags[input.name] = input.value.trim();
            }

            // Validation
            if (!metatags.title) {
                alert('Заполните обязательное поле "Title"');
                return;
            }

            fetch(self.getApiPath(), {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                credentials: 'same-origin',
                body: JSON.stringify({
                    action: 'save',
                    page: self.currentPage,
                    metatags: metatags
                })
            })
            .then(function(response) {
                if (!response.ok) {
                    throw new Error('HTTP ' + response.status + ': ' + response.statusText);
                }
                return response.json();
            })
            .then(function(data) {
                console.log('Save response:', data);
                if (data.success) {
                    alert('Метатеги сохранены успешно!');
                    self.metatags = metatags;

                    // Reload page to see changes
                    if (self.detectCurrentPage() === self.currentPage) {
                        if (confirm('Перезагрузить страницу для применения изменений?')) {
                            window.location.reload();
                        }
                    }
                } else {
                    console.error('Save failed:', data);
                    alert('Ошибка сохранения: ' + (data.error || 'неизвестная ошибка'));
                }
            })
            .catch(function(error) {
                console.error('Error saving metatags:', error);
                alert('Ошибка сохранения метатегов: ' + error.message);
            });
        }
    };

    // Initialize when DOM is ready and user is authenticated
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            if (window.cmsAuthStatus && window.cmsAuthStatus.authenticated) {
                MetaEditor.init();
            }
        });
    } else {
        if (window.cmsAuthStatus && window.cmsAuthStatus.authenticated) {
            MetaEditor.init();
        }
    }

    // Expose to global scope
    window.MetaEditor = MetaEditor;
})();
