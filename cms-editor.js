// CMS Editor - On-Page Text Editing and Section Duplication System
class CMSEditor {
    constructor() {
        this.isEditMode = false;
        this.isLoggedIn = false;
        this.contentData = {};
        this.basePath = this.getBasePath();
        this.init();
    }

    getBasePath() {
        // Determine the base path relative to current page
        const depth = (window.location.pathname.match(/\//g) || []).length - 1;
        const projectFolder = '/';

        // If we're in a subfolder (company/, products/), go up one level
        if (window.location.pathname.includes('/company/') || window.location.pathname.includes('/products/')) {
            return '../';
        }
        // If we're at the root level of the project
        return './';
    }

    async init() {
        await this.checkAuthStatus();
        this.createAdminPanel();
        this.loadContent();

        // Show admin panel if logged in OR if ?admin is in URL
        if (this.isLoggedIn || this.hasAdminParam()) {
            this.showAdminPanel();
        }

        // Ensure edit mode is off by default
        this.isEditMode = false;
        this.cleanupEditIndicators();
    }

    cleanupEditIndicators() {
        // Remove any leftover edit indicators
        const indicators = document.querySelectorAll('.cms-edit-indicator');
        indicators.forEach(indicator => indicator.remove());

        // Remove edit mode class
        document.body.classList.remove('cms-edit-mode');

        // Ensure contentEditable is false
        const editables = document.querySelectorAll('[data-editable]');
        editables.forEach(element => {
            element.contentEditable = 'false';
            element.classList.remove('cms-editable');
        });
    }

    hasAdminParam() {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.has('admin');
    }

    async checkAuthStatus() {
        try {
            const response = await fetch(this.basePath + 'auth.php?check=1');
            const data = await response.json();
            this.isLoggedIn = data.logged_in;

            // Expose auth status globally for other modules
            window.cmsAuthStatus = {
                authenticated: this.isLoggedIn
            };
        } catch (error) {
            console.error('Auth check failed:', error);
            window.cmsAuthStatus = {
                authenticated: false
            };
        }
    }

    createAdminPanel() {
        const panel = document.createElement('div');
        panel.id = 'cms-admin-panel';
        panel.innerHTML = `
            <button id="cms-menu-toggle" class="cms-menu-toggle" title="CMS Menu">
                ⚙️
            </button>
            <div class="cms-dropdown-menu" id="cms-dropdown-menu">
                ${this.isLoggedIn ? `
                    <div class="cms-menu-header">
                        <span class="cms-status-badge">🟢 Вы вошли</span>
                    </div>
                    <button id="cms-toggle-edit" class="cms-menu-btn">
                        <span class="cms-menu-icon">${this.isEditMode ? '👁️' : '✏️'}</span>
                        <span class="cms-menu-text">${this.isEditMode ? 'Просмотр' : 'Редактирование'}</span>
                    </button>
                    <button id="cms-version-history" class="cms-menu-btn">
                        <span class="cms-menu-icon">⏮️</span>
                        <span class="cms-menu-text">История версий</span>
                    </button>
                    <button id="cms-metatags-btn" class="cms-menu-btn">
                        <span class="cms-menu-icon">🏷️</span>
                        <span class="cms-menu-text">Метатеги</span>
                    </button>
                    <button id="cms-reset-original" class="cms-menu-btn cms-menu-btn-warning">
                        <span class="cms-menu-icon">🔄</span>
                        <span class="cms-menu-text">Сбросить к оригиналу</span>
                    </button>
                    <button id="cms-logout" class="cms-menu-btn cms-menu-btn-danger">
                        <span class="cms-menu-icon">🚪</span>
                        <span class="cms-menu-text">Выйти</span>
                    </button>
                ` : `
                    <div class="cms-menu-header">
                        <span class="cms-status-badge cms-status-offline">⚫ Не авторизован</span>
                    </div>
                    <button id="cms-login-btn" class="cms-menu-btn cms-menu-btn-primary">
                        <span class="cms-menu-icon">🔐</span>
                        <span class="cms-menu-text">Войти в CMS</span>
                    </button>
                `}
            </div>
        `;
        document.body.appendChild(panel);

        this.attachPanelEvents();
        this.attachMenuToggle();
    }

    attachMenuToggle() {
        const toggle = document.getElementById('cms-menu-toggle');
        const menu = document.getElementById('cms-dropdown-menu');

        if (toggle && menu) {
            toggle.addEventListener('click', (e) => {
                e.stopPropagation();
                menu.classList.toggle('cms-dropdown-show');
            });

            // Close menu when clicking outside
            document.addEventListener('click', (e) => {
                if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                    menu.classList.remove('cms-dropdown-show');
                }
            });
        }
    }

    showAdminPanel() {
        const panel = document.getElementById('cms-admin-panel');
        if (panel) {
            panel.style.display = 'block';
        }
    }

    hideDropdown() {
        const menu = document.getElementById('cms-dropdown-menu');
        if (menu) {
            menu.classList.remove('cms-dropdown-show');
        }
    }

    attachPanelEvents() {
        const loginBtn = document.getElementById('cms-login-btn');
        const logoutBtn = document.getElementById('cms-logout');
        const toggleEditBtn = document.getElementById('cms-toggle-edit');
        const versionHistoryBtn = document.getElementById('cms-version-history');
        const metatagsBtn = document.getElementById('cms-metatags-btn');
        const resetOriginalBtn = document.getElementById('cms-reset-original');

        if (loginBtn) {
            loginBtn.addEventListener('click', () => this.showLoginModal());
        }

        if (logoutBtn) {
            logoutBtn.addEventListener('click', () => this.logout());
        }

        if (toggleEditBtn) {
            toggleEditBtn.addEventListener('click', () => this.toggleEditMode());
        }

        if (versionHistoryBtn) {
            versionHistoryBtn.addEventListener('click', () => this.showVersionHistory());
        }

        if (metatagsBtn) {
            metatagsBtn.addEventListener('click', () => {
                this.hideDropdown();
                if (window.MetaEditor) {
                    window.MetaEditor.openMetaEditor();
                } else {
                    console.error('MetaEditor not loaded');
                    alert('Ошибка: редактор метатегов не загружен');
                }
            });
        }

        if (resetOriginalBtn) {
            resetOriginalBtn.addEventListener('click', () => this.resetToOriginal());
        }
    }

    showLoginModal() {
        const modal = document.createElement('div');
        modal.id = 'cms-login-modal';
        modal.innerHTML = `
            <div class="cms-modal-backdrop"></div>
            <div class="cms-modal-content">
                <h2>Вход в CMS</h2>
                <form id="cms-login-form">
                    <div class="cms-form-group">
                        <label>Логин:</label>
                        <input type="text" name="username" required autocomplete="username">
                    </div>
                    <div class="cms-form-group">
                        <label>Пароль:</label>
                        <input type="password" name="password" required autocomplete="current-password">
                    </div>
                    <div class="cms-form-actions">
                        <button type="submit" class="cms-btn cms-btn-primary">Войти</button>
                        <button type="button" id="cms-cancel-login" class="cms-btn cms-btn-secondary">Отмена</button>
                    </div>
                    <div id="cms-login-error" class="cms-error" style="display: none;"></div>
                </form>
            </div>
        `;
        document.body.appendChild(modal);

        document.getElementById('cms-login-form').addEventListener('submit', (e) => this.handleLogin(e));
        document.getElementById('cms-cancel-login').addEventListener('click', () => {
            modal.remove();
        });
    }

    async handleLogin(e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);
        formData.append('action', 'login');

        try {
            const response = await fetch(this.basePath + 'auth.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();

            if (data.success) {
                this.isLoggedIn = true;
                location.reload();
            } else {
                document.getElementById('cms-login-error').textContent = 'Неверный логин или пароль';
                document.getElementById('cms-login-error').style.display = 'block';
            }
        } catch (error) {
            console.error('Login failed:', error);
            document.getElementById('cms-login-error').textContent = 'Ошибка входа';
            document.getElementById('cms-login-error').style.display = 'block';
        }
    }

    async logout() {
        const formData = new FormData();
        formData.append('action', 'logout');

        try {
            await fetch(this.basePath + 'auth.php', {
                method: 'POST',
                body: formData
            });
            location.reload();
        } catch (error) {
            console.error('Logout failed:', error);
        }
    }

    async loadContent() {
        try {
            const response = await fetch(this.basePath + 'api.php');
            const data = await response.json();
            this.contentData = data.sections || {};
            this.duplicatedSections = data.duplicated_sections || [];
            this.restoreDuplicatedSections();
            this.applyContent();
            this.initializeProductImages();
        } catch (error) {
            console.error('Failed to load content:', error);
        }
    }

    restoreDuplicatedSections() {
        // Restore duplicated sections in correct order
        this.duplicatedSections.forEach(dupSection => {
            const afterSection = document.querySelector(`[data-section-id="${dupSection.after_section_id}"]`);
            if (afterSection) {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = dupSection.html;
                const newSection = tempDiv.firstChild;
                afterSection.parentNode.insertBefore(newSection, afterSection.nextSibling);
            }
        });
    }

    initializeProductImages() {
        // Initialize productImages array from saved content (for products.html)
        if (typeof productImages !== 'undefined') {
            // Update productImages with saved image URLs
            Object.keys(this.contentData).forEach(key => {
                if (key.startsWith('image_product')) {
                    const match = key.match(/^image_(product\d+)_image(\d+)$/);
                    if (match) {
                        const productKey = match[1];
                        const imageIndex = parseInt(match[2]) - 1;
                        let savedUrl = this.contentData[key];

                        // Adjust path based on current location
                        if (this.basePath === '../' && !savedUrl.startsWith('../')) {
                            savedUrl = '../' + savedUrl;
                        }

                        if (productImages[productKey] && productImages[productKey][imageIndex] !== undefined) {
                            productImages[productKey][imageIndex] = savedUrl;
                            console.log('Initialized productImages from saved data:', productKey, imageIndex, savedUrl);
                        }
                    }
                }
            });
        }
    }

    applyContent() {
        // Apply text content
        const editables = document.querySelectorAll('[data-editable]');
        editables.forEach(element => {
            const sectionId = element.getAttribute('data-section-id');
            const editableId = element.getAttribute('data-editable');
            const key = `${sectionId}_${editableId}`;

            if (this.contentData[key]) {
                element.innerHTML = this.contentData[key];

                // Remove any CMS elements that might have been accidentally saved
                const indicator = element.querySelector('.cms-edit-indicator');
                if (indicator) {
                    indicator.remove();
                }
                const resetBtn = element.querySelector('.cms-block-reset-btn');
                if (resetBtn) {
                    resetBtn.remove();
                }
            }
        });

        // Apply image content
        const editableImages = document.querySelectorAll('[data-editable-image]');
        editableImages.forEach(img => {
            const imageId = img.getAttribute('data-editable-image');
            const key = `image_${imageId}`;

            if (this.contentData[key]) {
                // Adjust path based on current location
                let imagePath = this.contentData[key];
                if (this.basePath === '../' && !imagePath.startsWith('../')) {
                    // We're in a subfolder, prepend ../
                    imagePath = '../' + imagePath;
                }
                img.src = imagePath;
            }
        });
    }

    toggleEditMode() {
        // Only allow edit mode if logged in
        if (!this.isLoggedIn) {
            this.showNotification('Необходима авторизация', 'error');
            return;
        }

        this.isEditMode = !this.isEditMode;
        const toggleBtn = document.getElementById('cms-toggle-edit');

        if (this.isEditMode) {
            document.body.classList.add('cms-edit-mode');
            toggleBtn.innerHTML = '<span class="cms-menu-icon">👁️</span><span class="cms-menu-text">Просмотр</span>';
            this.enableEditing();
            this.addSectionControls();
        } else {
            document.body.classList.remove('cms-edit-mode');
            toggleBtn.innerHTML = '<span class="cms-menu-icon">✏️</span><span class="cms-menu-text">Редактирование</span>';
            this.disableEditing();
            this.removeSectionControls();
        }
    }

    enableEditing() {
        const editables = document.querySelectorAll('[data-editable]');
        editables.forEach(element => {
            element.classList.add('cms-editable');
            element.contentEditable = 'true';

            // Fix for empty contenteditable bug: ensure element can receive focus
            // If element is completely empty, add a placeholder <br> to maintain editability
            if (element.textContent.trim() === '' && element.innerHTML.trim() === '') {
                element.innerHTML = '<br>';
            }

            // Add input event listener to handle typing in empty fields
            element.addEventListener('input', (e) => {
                // If field becomes empty, add <br> to keep it editable
                if (element.textContent.trim() === '' && element.innerHTML.trim() === '') {
                    element.innerHTML = '<br>';
                }
            });

            element.addEventListener('blur', (e) => {
                // Don't handle blur if clicking inside toolbar
                setTimeout(() => {
                    const activeElement = document.activeElement;
                    const toolbar = document.getElementById('cms-formatting-toolbar');
                    if (toolbar && (toolbar.contains(activeElement) || activeElement === toolbar)) {
                        return;
                    }
                    this.handleContentChange(e);
                }, 100);
            });
            element.addEventListener('focus', (e) => this.showFormattingToolbar(e));

            // Add edit indicator
            const indicator = document.createElement('span');
            indicator.className = 'cms-edit-indicator';
            indicator.textContent = '✏️';
            indicator.contentEditable = 'false'; // Prevent cursor from entering indicator
            element.style.position = 'relative';
            element.appendChild(indicator);

            // Add reset button for this block
            const resetBtn = document.createElement('button');
            resetBtn.className = 'cms-block-reset-btn';
            resetBtn.innerHTML = '🔄';
            resetBtn.title = 'Сбросить к оригиналу';
            resetBtn.contentEditable = 'false'; // Prevent button from being editable
            resetBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.resetBlock(element);
            });
            resetBtn.addEventListener('mousedown', (e) => {
                e.preventDefault();
                e.stopPropagation();
            });
            element.appendChild(resetBtn);
        });

        // Enable image editing
        this.enableImageEditing();

        // Add keyboard shortcuts for formatting
        this.addFormattingShortcuts();
    }

    enableImageEditing() {
        const editableImages = document.querySelectorAll('[data-editable-image]');
        editableImages.forEach(img => {
            img.classList.add('cms-editable-image');

            // Create image edit overlay
            const overlay = document.createElement('div');
            overlay.className = 'cms-image-overlay';
            overlay.innerHTML = `
                <button class="cms-image-edit-btn" title="Изменить изображение">
                    📷 Изменить
                </button>
            `;

            // Wrap image if not already wrapped
            if (!img.parentElement.classList.contains('cms-image-wrapper')) {
                const wrapper = document.createElement('div');
                wrapper.className = 'cms-image-wrapper';
                img.parentNode.insertBefore(wrapper, img);
                wrapper.appendChild(img);
                wrapper.appendChild(overlay);
            } else {
                img.parentElement.appendChild(overlay);
            }

            // Add click handler - stop propagation to prevent lightbox from opening
            overlay.querySelector('.cms-image-edit-btn').addEventListener('click', (e) => {
                e.stopPropagation();
                e.preventDefault();
                this.showImageUploadModal(img);
            });

            // Prevent parent click when hovering over overlay
            overlay.addEventListener('click', (e) => {
                e.stopPropagation();
                e.preventDefault();
            });
        });
    }

    disableImageEditing() {
        const editableImages = document.querySelectorAll('[data-editable-image]');
        editableImages.forEach(img => {
            img.classList.remove('cms-editable-image');
            const overlay = img.parentElement.querySelector('.cms-image-overlay');
            if (overlay) {
                overlay.remove();
            }
        });
    }

    disableEditing() {
        const editables = document.querySelectorAll('[data-editable]');
        editables.forEach(element => {
            element.classList.remove('cms-editable');
            element.contentEditable = 'false';

            // Remove all CMS UI elements
            const indicators = element.querySelectorAll('.cms-edit-indicator');
            indicators.forEach(ind => ind.remove());

            const resetBtns = element.querySelectorAll('.cms-block-reset-btn');
            resetBtns.forEach(btn => btn.remove());

            // Clone and replace element to remove all event listeners
            // This is more reliable than trying to track and remove each listener
            const newElement = element.cloneNode(true);
            element.parentNode.replaceChild(newElement, element);
        });

        // Disable image editing
        this.disableImageEditing();

        // Remove formatting toolbar if exists
        this.hideFormattingToolbar();

        // Remove any orphaned CMS elements that might be outside editable areas
        document.querySelectorAll('.cms-edit-indicator').forEach(el => el.remove());
        document.querySelectorAll('.cms-block-reset-btn').forEach(el => el.remove());
    }

    showFormattingToolbar(e) {
        const element = e.target;

        // Remove any existing toolbar
        this.hideFormattingToolbar();

        // Create compact toolbar with visual effect buttons
        const toolbar = document.createElement('div');
        toolbar.id = 'cms-formatting-toolbar';
        toolbar.className = 'cms-formatting-toolbar';
        toolbar.innerHTML = `
            <button class="cms-toolbar-close" title="Закрыть">×</button>
            <div class="cms-toolbar-buttons">
                <button class="cms-format-btn cms-format-bold" data-command="bold" title="Жирный (Ctrl+B)">
                    <b>Bold</b>
                </button>
                <button class="cms-format-btn cms-format-italic" data-command="italic" title="Курсив (Ctrl+I)">
                    <i>Italic</i>
                </button>
                <button class="cms-format-btn cms-format-accent" data-command="span-class-text-accent" title="Цвет Accent">
                    <span class="text-accent">Accent</span>
                </button>
                <button class="cms-format-btn cms-format-teal" data-command="span-class-text-teal" title="Цвет Teal">
                    <span class="text-teal">Teal</span>
                </button>
                <button class="cms-format-btn cms-format-p" data-command="insertHTML-p" title="Параграф">
                    &lt;p&gt;
                </button>
                <select class="cms-font-size-select" title="Размер шрифта">
                    <option value="">Размер</option>
                    <option value="0.75rem">0.75rem</option>
                    <option value="0.875rem">0.875rem</option>
                    <option value="1rem">1rem</option>
                    <option value="1.125rem">1.125rem</option>
                    <option value="1.25rem">1.25rem</option>
                    <option value="1.5rem">1.5rem</option>
                    <option value="1.875rem">1.875rem</option>
                    <option value="2rem">2rem</option>
                    <option value="2.25rem">2.25rem</option>
                    <option value="3rem">3rem</option>
                </select>
            </div>
        `;

        // Add to body and position
        document.body.appendChild(toolbar);
        this.positionToolbar(toolbar, element);

        // Add close button handler
        const closeBtn = toolbar.querySelector('.cms-toolbar-close');
        closeBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            this.hideFormattingToolbar();
        });

        // Add font size select handler
        const fontSizeSelect = toolbar.querySelector('.cms-font-size-select');

        // Pre-select current font size if there's a selection
        const currentFontSize = this.getCurrentFontSize();
        if (currentFontSize) {
            fontSizeSelect.value = currentFontSize;
        }

        fontSizeSelect.addEventListener('mousedown', (e) => {
            e.stopPropagation();
        });
        fontSizeSelect.addEventListener('change', (e) => {
            const size = e.target.value;
            if (size) {
                this.applyFontSize(size, element);
                e.target.value = ''; // Reset select
            }
        });

        // Add event listeners for format buttons
        toolbar.querySelectorAll('.cms-format-btn').forEach(btn => {
            btn.addEventListener('mousedown', (e) => {
                e.preventDefault();
                const command = btn.getAttribute('data-command');
                this.applyFormatting(command, element);
            });
        });

        // Store reference for cleanup
        this.currentToolbar = toolbar;
        this.currentEditableElement = element;

        // Reposition on window resize or scroll
        this.toolbarRepositionHandler = () => this.positionToolbar(toolbar, element);
        window.addEventListener('scroll', this.toolbarRepositionHandler, true);
        window.addEventListener('resize', this.toolbarRepositionHandler);
    }

    positionToolbar(toolbar, element) {
        const rect = element.getBoundingClientRect();
        const toolbarHeight = toolbar.offsetHeight;
        const toolbarWidth = toolbar.offsetWidth;
        const viewportHeight = window.innerHeight;
        const viewportWidth = window.innerWidth;

        let top, left, width;

        // Match the width of the editable element
        width = rect.width;

        // Position ABOVE the element (attached to top edge, but outside)
        top = rect.top - toolbarHeight;
        left = rect.left;

        // Ensure minimum width for toolbar
        if (width < 500) {
            width = Math.min(500, viewportWidth - 40);
        }

        // If toolbar goes off right edge, adjust left position
        if (left + width > viewportWidth - 20) {
            left = Math.max(20, viewportWidth - width - 20);
        }

        // If toolbar goes off left edge, align to left edge of viewport
        if (left < 20) {
            left = 20;
            width = Math.min(width, viewportWidth - 40);
        }

        // If not enough space above, position below the element instead
        if (top < 20) {
            top = rect.bottom;
        }

        toolbar.style.position = 'fixed';
        toolbar.style.left = left + 'px';
        toolbar.style.top = top + 'px';
        toolbar.style.width = width + 'px';
        toolbar.style.zIndex = '10001';
    }

    hideFormattingToolbar() {
        const toolbar = document.getElementById('cms-formatting-toolbar');
        if (toolbar) {
            toolbar.classList.add('cms-toolbar-closing');
            setTimeout(() => toolbar.remove(), 200);
        }
        this.currentToolbar = null;

        // Clean up event listeners
        if (this.toolbarRepositionHandler) {
            window.removeEventListener('scroll', this.toolbarRepositionHandler, true);
            window.removeEventListener('resize', this.toolbarRepositionHandler);
            this.toolbarRepositionHandler = null;
        }
    }

    applyFormatting(command, element) {
        if (command.startsWith('span-class-')) {
            // Handle span with custom class
            const className = command.replace('span-class-', '');
            const selection = window.getSelection();

            if (selection.rangeCount > 0) {
                const range = selection.getRangeAt(0);
                const selectedText = range.toString();

                if (selectedText) {
                    const wrapper = document.createElement('span');
                    wrapper.className = className;
                    wrapper.textContent = selectedText;
                    range.deleteContents();
                    range.insertNode(wrapper);

                    // Move cursor after inserted element
                    range.setStartAfter(wrapper);
                    range.collapse(true);
                    selection.removeAllRanges();
                    selection.addRange(range);
                }
            }
        } else if (command.startsWith('insertHTML-')) {
            const tag = command.split('-')[1];
            const selection = window.getSelection();

            if (selection.rangeCount > 0) {
                const range = selection.getRangeAt(0);
                const selectedText = range.toString();

                if (selectedText) {
                    const wrapper = document.createElement(tag);
                    wrapper.textContent = selectedText;
                    range.deleteContents();
                    range.insertNode(wrapper);

                    // Move cursor after inserted element
                    range.setStartAfter(wrapper);
                    range.collapse(true);
                    selection.removeAllRanges();
                    selection.addRange(range);
                }
            }
        } else {
            // Standard commands like bold, italic
            document.execCommand(command, false, null);
        }

        // Keep focus on element
        element.focus();
    }

    applyFontSize(size, element) {
        const selection = window.getSelection();

        if (selection.rangeCount > 0) {
            const range = selection.getRangeAt(0);
            const selectedText = range.toString();

            if (selectedText) {
                const wrapper = document.createElement('span');
                wrapper.style.fontSize = size;
                wrapper.textContent = selectedText;
                range.deleteContents();
                range.insertNode(wrapper);

                // Move cursor after inserted element
                range.setStartAfter(wrapper);
                range.collapse(true);
                selection.removeAllRanges();
                selection.addRange(range);
            }
        }

        // Keep focus on element
        element.focus();
    }

    getCurrentFontSize() {
        const selection = window.getSelection();
        if (selection.rangeCount === 0) return null;

        const range = selection.getRangeAt(0);

        // Get the parent element of the selection
        let container = range.commonAncestorContainer;

        // If it's a text node, get its parent element
        if (container.nodeType === Node.TEXT_NODE) {
            container = container.parentElement;
        }

        // Get computed style
        const computedStyle = window.getComputedStyle(container);
        const fontSize = computedStyle.fontSize;

        // Convert px to rem (assuming 16px = 1rem base)
        if (fontSize && fontSize.endsWith('px')) {
            const pxValue = parseFloat(fontSize);
            const remValue = pxValue / 16;

            // Round to common rem values
            const commonSizes = [0.75, 0.875, 1, 1.125, 1.25, 1.5, 1.875, 2, 2.25, 3];
            const closest = commonSizes.reduce((prev, curr) => {
                return Math.abs(curr - remValue) < Math.abs(prev - remValue) ? curr : prev;
            });

            return `${closest}rem`;
        }

        return fontSize;
    }

    addFormattingShortcuts() {
        // Remove old listener if exists
        if (this.formattingShortcutHandler) {
            document.removeEventListener('keydown', this.formattingShortcutHandler);
        }

        this.formattingShortcutHandler = (e) => {
            // Only apply in edit mode
            if (!this.isEditMode) return;

            // Check if we're in an editable element
            const target = e.target;
            if (!target.hasAttribute('data-editable')) return;

            // Ctrl/Cmd + B for bold
            if ((e.ctrlKey || e.metaKey) && e.key === 'b') {
                e.preventDefault();
                document.execCommand('bold', false, null);
            }

            // Ctrl/Cmd + I for italic
            if ((e.ctrlKey || e.metaKey) && e.key === 'i') {
                e.preventDefault();
                document.execCommand('italic', false, null);
            }
        };

        document.addEventListener('keydown', this.formattingShortcutHandler);
    }

    async handleContentChange(e) {
        const element = e.target;
        const sectionId = element.getAttribute('data-section-id');
        const editableId = element.getAttribute('data-editable');
        const key = `${sectionId}_${editableId}`;

        // Close the formatting toolbar when editing is done
        this.hideFormattingToolbar();

        // Clone element and remove edit indicator before saving
        const clone = element.cloneNode(true);
        const indicator = clone.querySelector('.cms-edit-indicator');
        if (indicator) {
            indicator.remove();
        }
        const resetBtn = clone.querySelector('.cms-block-reset-btn');
        if (resetBtn) {
            resetBtn.remove();
        }

        let content = clone.innerHTML;

        // Remove placeholder content if it's the only content
        if (content === '&#8203;' || content === '\u200B' || content === '<br>' || content.trim() === '<br>') {
            content = '';
        }

        const formData = new FormData();
        formData.append('action', 'save_content');
        formData.append('section_id', key);
        formData.append('content', content);

        try {
            const response = await fetch(this.basePath + 'api.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();

            if (data.success) {
                this.showNotification('Сохранено!', 'success');
                this.contentData[key] = content;
            }
        } catch (error) {
            console.error('Save failed:', error);
            this.showNotification('Ошибка сохранения', 'error');
        }
    }

    async saveImagePath(imageId, imagePath) {
        const key = `image_${imageId}`;

        const formData = new FormData();
        formData.append('action', 'save_content');
        formData.append('section_id', key);
        formData.append('content', imagePath);

        try {
            const response = await fetch(this.basePath + 'api.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();

            if (data.success) {
                this.contentData[key] = imagePath;
                console.log('Image path saved:', key, imagePath);
            }
        } catch (error) {
            console.error('Failed to save image path:', error);
        }
    }

    addSectionControls() {
        const sections = document.querySelectorAll('[data-duplicable="true"]');
        sections.forEach(section => {
            const sectionId = section.getAttribute('data-section-id');

            // Check if this is a cloned section (contains _clone_ in the ID)
            const isCloned = sectionId && sectionId.includes('_clone_');

            const controls = document.createElement('div');
            controls.className = 'cms-section-controls';
            controls.contentEditable = 'false';

            // Only show duplicate button for original sections, not cloned ones
            controls.innerHTML = `
                ${!isCloned ? '<button class="cms-btn-icon cms-duplicate-btn" title="Дублировать секцию" contenteditable="false">📋</button>' : ''}
                <button class="cms-btn-icon cms-reset-btn" title="Сбросить к оригиналу" contenteditable="false">🔄</button>
                <button class="cms-btn-icon cms-delete-btn" title="Удалить секцию" contenteditable="false">🗑️</button>
            `;

            section.style.position = 'relative';
            section.insertBefore(controls, section.firstChild);

            // Only add duplicate button handler for original sections
            if (!isCloned) {
                const duplicateBtn = controls.querySelector('.cms-duplicate-btn');
                if (duplicateBtn) {
                    duplicateBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                        this.duplicateSection(section);
                    });
                    duplicateBtn.addEventListener('mousedown', (e) => {
                        e.preventDefault();
                        e.stopPropagation();
                    });
                }
            }

            const resetBtn = controls.querySelector('.cms-reset-btn');
            resetBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                this.resetSection(section);
            });
            resetBtn.addEventListener('mousedown', (e) => {
                e.preventDefault();
                e.stopPropagation();
            });

            const deleteBtn = controls.querySelector('.cms-delete-btn');
            deleteBtn.addEventListener('click', (e) => {
                console.log('Delete button clicked for section:', section);
                e.preventDefault();
                e.stopPropagation();
                this.deleteSection(section);
            });
            deleteBtn.addEventListener('mousedown', (e) => {
                e.preventDefault();
                e.stopPropagation();
            });
        });
    }

    removeSectionControls() {
        const controls = document.querySelectorAll('.cms-section-controls');
        controls.forEach(control => control.remove());
    }

    async duplicateSection(section) {
        const sectionId = section.getAttribute('data-section-id');

        // Clone section and remove CMS-specific elements before saving
        const clone = section.cloneNode(true);
        const controls = clone.querySelector('.cms-section-controls');
        if (controls) controls.remove();
        const indicators = clone.querySelectorAll('.cms-edit-indicator');
        indicators.forEach(ind => ind.remove());
        const imageOverlays = clone.querySelectorAll('.cms-image-overlay');
        imageOverlays.forEach(overlay => overlay.remove());

        // Generate unique ID for the cloned section
        const timestamp = Date.now();
        const uniqueId = `${sectionId}_clone_${timestamp}`;
        clone.setAttribute('data-section-id', uniqueId);

        // Update all editable elements with unique IDs
        const editables = clone.querySelectorAll('[data-editable]');
        editables.forEach(element => {
            const oldEditableId = element.getAttribute('data-editable');
            const newEditableId = `${oldEditableId}_clone_${timestamp}`;
            element.setAttribute('data-editable', newEditableId);
            element.setAttribute('data-section-id', uniqueId);
        });

        // Update all editable images with unique IDs
        const editableImages = clone.querySelectorAll('[data-editable-image]');
        editableImages.forEach(img => {
            const oldImageId = img.getAttribute('data-editable-image');
            const newImageId = `${oldImageId}_clone_${timestamp}`;
            img.setAttribute('data-editable-image', newImageId);
        });

        // Remove any image wrappers that might have been cloned
        const imageWrappers = clone.querySelectorAll('.cms-image-wrapper');
        imageWrappers.forEach(wrapper => {
            const img = wrapper.querySelector('img');
            if (img) {
                wrapper.parentNode.insertBefore(img, wrapper);
            }
            wrapper.remove();
        });

        const html = clone.outerHTML;

        const formData = new FormData();
        formData.append('action', 'duplicate_section');
        formData.append('section_id', sectionId);
        formData.append('after_section_id', sectionId);
        formData.append('html', html);

        try {
            const response = await fetch(this.basePath + 'api.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();

            if (data.success) {
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = data.html;
                const newSection = tempDiv.firstChild;

                section.parentNode.insertBefore(newSection, section.nextSibling);
                this.showNotification('Секция дублирована!', 'success');

                // Re-apply controls to new section
                this.removeSectionControls();
                this.addSectionControls();
                this.enableEditing();
            }
        } catch (error) {
            console.error('Duplication failed:', error);
            this.showNotification('Ошибка дублирования', 'error');
        }
    }

    async resetBlock(element) {
        console.log('resetBlock called for element:', element);

        const sectionId = element.getAttribute('data-section-id');
        const editableId = element.getAttribute('data-editable');
        console.log('Section ID:', sectionId, 'Editable ID:', editableId);

        if (!sectionId || !editableId) {
            this.showNotification('Ошибка: не найден ID блока', 'error');
            return;
        }

        if (!confirm('Вы уверены, что хотите сбросить этот блок к оригинальному содержимому?')) {
            return;
        }

        const key = `${sectionId}_${editableId}`;
        console.log('Resetting key:', key);

        const formData = new FormData();
        formData.append('action', 'reset_section');
        formData.append('section_id', key);

        try {
            const response = await fetch(this.basePath + 'api.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();
            console.log('API response:', data);

            if (data.success) {
                this.showNotification('Блок сброшен к оригиналу!', 'success');

                // Reload page to show original content
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                this.showNotification(data.error || 'Ошибка сброса', 'error');
            }
        } catch (error) {
            console.error('Reset failed:', error);
            this.showNotification('Ошибка сброса блока', 'error');
        }
    }

    async resetSection(section) {
        if (!confirm('Вы уверены, что хотите сбросить эту секцию к оригинальному содержимому?')) {
            return;
        }

        const sectionId = section.getAttribute('data-section-id');
        const formData = new FormData();
        formData.append('action', 'reset_section');
        formData.append('section_id', sectionId);

        try {
            const response = await fetch(this.basePath + 'api.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();

            if (data.success) {
                this.showNotification('Секция сброшена к оригиналу!', 'success');

                // Reload page to show original content
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                this.showNotification(data.error || 'Ошибка сброса', 'error');
            }
        } catch (error) {
            console.error('Reset failed:', error);
            this.showNotification('Ошибка сброса секции', 'error');
        }
    }

    async deleteSection(section) {
        console.log('deleteSection called for:', section);
        const sectionId = section.getAttribute('data-section-id');
        console.log('Section ID:', sectionId);

        if (!confirm('Вы уверены, что хотите удалить эту секцию?')) {
            console.log('Delete cancelled by user');
            return;
        }

        const formData = new FormData();
        formData.append('action', 'delete_section');
        formData.append('section_id', sectionId);

        try {
            console.log('Sending delete request...');
            const response = await fetch(this.basePath + 'api.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();
            console.log('Delete response:', data);

            if (data.success) {
                section.remove();
                this.showNotification('Секция удалена! Обновите страницу.', 'success');
                console.log('Section removed from DOM');
                console.log('Server message:', data.message);

                // Optionally auto-reload after a delay
                setTimeout(() => {
                    if (confirm('Секция удалена. Обновить страницу чтобы увидеть изменения?')) {
                        location.reload();
                    }
                }, 1000);
            } else {
                this.showNotification(data.error || 'Ошибка удаления', 'error');
                console.error('Delete error:', data.error);
            }
        } catch (error) {
            console.error('Deletion failed:', error);
            this.showNotification('Ошибка удаления', 'error');
        }
    }

    showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `cms-notification cms-notification-${type}`;
        notification.textContent = message;
        document.body.appendChild(notification);

        setTimeout(() => {
            notification.classList.add('cms-notification-show');
        }, 10);

        setTimeout(() => {
            notification.classList.remove('cms-notification-show');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    showImageUploadModal(imgElement) {
        const modal = document.createElement('div');
        modal.id = 'cms-image-upload-modal';
        modal.innerHTML = `
            <div class="cms-modal-backdrop"></div>
            <div class="cms-modal-content cms-image-modal">
                <h2>📷 Изменить изображение</h2>
                <div class="cms-image-upload-area">
                    <input type="file" id="cms-image-file-input" accept="image/*" style="display: none;">
                    <button id="cms-select-image-btn" class="cms-btn cms-btn-primary cms-btn-large">
                        Выбрать файл
                    </button>
                    <p class="cms-upload-hint">или перетащите изображение сюда</p>
                    <p class="cms-upload-info">Поддерживаются: JPG, PNG, GIF, WEBP. Максимум 5MB</p>
                </div>
                <div id="cms-image-preview" class="cms-image-preview" style="display: none;">
                    <img id="cms-preview-img" src="" alt="Preview">
                    <p id="cms-preview-name"></p>
                </div>
                <div class="cms-form-actions">
                    <button id="cms-upload-image-btn" class="cms-btn cms-btn-primary" style="display: none;">
                        Загрузить и применить
                    </button>
                    <button id="cms-cancel-image-upload" class="cms-btn cms-btn-secondary">Отмена</button>
                </div>
                <div id="cms-upload-progress" class="cms-upload-progress" style="display: none;">
                    <div class="cms-progress-bar"></div>
                    <span class="cms-progress-text">Загрузка...</span>
                </div>
            </div>
        `;
        document.body.appendChild(modal);

        const fileInput = document.getElementById('cms-image-file-input');
        const selectBtn = document.getElementById('cms-select-image-btn');
        const uploadBtn = document.getElementById('cms-upload-image-btn');
        const cancelBtn = document.getElementById('cms-cancel-image-upload');
        const preview = document.getElementById('cms-image-preview');
        const previewImg = document.getElementById('cms-preview-img');
        const previewName = document.getElementById('cms-preview-name');
        const uploadProgress = document.getElementById('cms-upload-progress');
        const uploadArea = modal.querySelector('.cms-image-upload-area');

        let selectedFile = null;

        // Select file button
        selectBtn.addEventListener('click', () => fileInput.click());

        // File selection
        fileInput.addEventListener('change', (e) => {
            if (e.target.files && e.target.files[0]) {
                selectedFile = e.target.files[0];
                showPreview(selectedFile);
            }
        });

        // Drag and drop
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('cms-drag-over');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('cms-drag-over');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('cms-drag-over');
            if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                selectedFile = e.dataTransfer.files[0];
                showPreview(selectedFile);
            }
        });

        // Show preview
        function showPreview(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImg.src = e.target.result;
                previewName.textContent = file.name;
                preview.style.display = 'block';
                uploadBtn.style.display = 'inline-block';
            };
            reader.readAsDataURL(file);
        }

        // Upload button
        uploadBtn.addEventListener('click', async () => {
            if (!selectedFile) return;

            const formData = new FormData();
            formData.append('image', selectedFile);
            formData.append('image_id', imgElement.getAttribute('data-editable-image') || '');

            uploadBtn.disabled = true;
            uploadProgress.style.display = 'block';

            try {
                const response = await fetch(this.basePath + 'upload-image.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();
                console.log('Upload response:', data);

                if (data.success) {
                    // Save image path to content database (always save relative to project root)
                    const imageId = imgElement.getAttribute('data-editable-image');
                    await this.saveImagePath(imageId, data.url);

                    // Adjust URL for current page location
                    let displayUrl = data.url;
                    if (this.basePath === '../' && !displayUrl.startsWith('../')) {
                        displayUrl = '../' + displayUrl;
                    }

                    // Update image source with cache busting
                    const newUrl = displayUrl + '?t=' + Date.now();
                    console.log('Updating image src to:', newUrl);
                    imgElement.src = newUrl;

                    // Force image reload
                    imgElement.setAttribute('src', newUrl);

                    // Update productImages object if it exists (for products.html lightbox)
                    this.updateProductImages(imageId, displayUrl);

                    // Update lightbox if currently showing this image
                    this.updateLightboxImage(imgElement, displayUrl);

                    this.showNotification('Изображение обновлено!', 'success');
                    modal.remove();
                } else {
                    console.error('Upload failed:', data.error);
                    this.showNotification(data.error || 'Ошибка загрузки', 'error');
                    uploadBtn.disabled = false;
                    uploadProgress.style.display = 'none';
                }
            } catch (error) {
                console.error('Upload failed:', error);
                this.showNotification('Ошибка загрузки изображения', 'error');
                uploadBtn.disabled = false;
                uploadProgress.style.display = 'none';
            }
        });

        // Cancel button
        cancelBtn.addEventListener('click', () => modal.remove());

        // Close on backdrop click
        modal.querySelector('.cms-modal-backdrop').addEventListener('click', () => modal.remove());
    }

    updateProductImages(imageId, newUrl) {
        // Update productImages object if it exists (products.html)
        console.log('updateProductImages called with:', imageId, newUrl);

        if (typeof productImages !== 'undefined') {
            console.log('productImages exists:', productImages);

            // Parse imageId to determine which product and image index
            // Format: product1_image1, product2_image1, etc.
            const match = imageId.match(/^(product\d+)_image(\d+)$/);
            console.log('Regex match result:', match);

            if (match) {
                const productKey = match[1];
                const imageIndex = parseInt(match[2]) - 1;
                console.log('Parsed:', productKey, 'index:', imageIndex);

                if (productImages[productKey] && productImages[productKey][imageIndex] !== undefined) {
                    console.log('Old value:', productImages[productKey][imageIndex]);
                    productImages[productKey][imageIndex] = newUrl;
                    console.log('Updated productImages[' + productKey + '][' + imageIndex + '] =', newUrl);
                    console.log('New productImages:', productImages);
                } else {
                    console.warn('Product key or index not found in productImages');
                }
            } else {
                console.warn('Image ID did not match expected pattern');
            }
        } else {
            console.warn('productImages object not found - not on products.html?');
        }
    }

    updateLightboxImage(imgElement, newUrl) {
        // Update lightbox image if it's currently displaying this image
        const lightboxImg = document.getElementById('lightbox-img');
        if (lightboxImg) {
            const currentSrc = lightboxImg.src.split('?')[0]; // Remove cache busting param
            const originalSrc = imgElement.src.split('?')[0];

            // If lightbox is showing this image, update it
            if (currentSrc === originalSrc || lightboxImg.src === imgElement.src) {
                lightboxImg.src = newUrl + '?t=' + Date.now();
                console.log('Updated lightbox image');
            }
        }
    }

    async resetToOriginal() {
        if (!confirm('Вы уверены, что хотите сбросить ВСЕ изменения и вернуться к оригинальному содержимому PHP файла? Это действие нельзя отменить!')) {
            return;
        }

        try {
            const formData = new FormData();
            formData.append('action', 'reset_to_original');

            const response = await fetch(this.basePath + 'api.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                this.showNotification('Контент сброшен к оригиналу!', 'success');

                // Reload page after a short delay
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                this.showNotification(data.error || 'Ошибка сброса', 'error');
            }
        } catch (error) {
            console.error('Reset failed:', error);
            this.showNotification('Ошибка сброса к оригиналу', 'error');
        }
    }

    async showVersionHistory() {
        try {
            const response = await fetch(this.basePath + 'api.php?action=get_history');
            const history = await response.json();

            if (!history.versions || history.versions.length === 0) {
                this.showNotification('История версий пуста', 'info');
                return;
            }

            const modal = document.createElement('div');
            modal.id = 'cms-version-history-modal';
            modal.innerHTML = `
                <div class="cms-modal-backdrop" id="cms-history-backdrop"></div>
                <div class="cms-modal-content" style="max-width: 600px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <h2 style="margin: 0;">📜 История версий</h2>
                        <button class="cms-modal-close" id="cms-close-history-x" title="Закрыть">×</button>
                    </div>
                    <p style="margin-bottom: 15px; color: #666;">Сохраняются последние 20 версий. Выберите версию для восстановления.</p>
                    <div class="cms-version-list">
                        ${history.versions.reverse().map((version, index) => `
                            <div class="cms-version-item" data-timestamp="${version.timestamp}">
                                <div class="cms-version-info">
                                    <div class="cms-version-number">${index === 0 ? '🟢 Текущая' : `Версия ${history.versions.length - index}`}</div>
                                    <div class="cms-version-date">${version.date}</div>
                                    ${version.description ? `<div class="cms-version-description">${version.description}</div>` : ''}
                                </div>
                                ${index !== 0 ? `
                                    <button class="cms-btn cms-btn-small cms-revert-btn" data-timestamp="${version.timestamp}">
                                        ⏮️ Восстановить
                                    </button>
                                ` : '<span style="color: #06a68a; font-weight: 600;">Активная</span>'}
                            </div>
                        `).join('')}
                    </div>
                    <div class="cms-form-actions" style="margin-top: 20px;">
                        <button type="button" id="cms-close-history" class="cms-btn cms-btn-secondary">Закрыть</button>
                    </div>
                </div>
            `;
            document.body.appendChild(modal);

            // Attach revert button handlers
            modal.querySelectorAll('.cms-revert-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const timestamp = parseInt(btn.getAttribute('data-timestamp'));
                    this.revertToVersion(timestamp, modal);
                });
            });

            // Close button handlers
            document.getElementById('cms-close-history').addEventListener('click', () => {
                modal.remove();
            });

            document.getElementById('cms-close-history-x').addEventListener('click', () => {
                modal.remove();
            });

            // Close on backdrop click
            document.getElementById('cms-history-backdrop').addEventListener('click', () => {
                modal.remove();
            });
        } catch (error) {
            console.error('Error loading version history:', error);
            this.showNotification('Ошибка загрузки истории версий', 'error');
        }
    }

    async revertToVersion(timestamp, modal) {
        if (!confirm('Вы уверены, что хотите восстановить эту версию? Текущее состояние будет сохранено в историю.')) {
            return;
        }

        try {
            const formData = new FormData();
            formData.append('action', 'revert_version');
            formData.append('timestamp', timestamp);

            const response = await fetch(this.basePath + 'api.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                this.showNotification('Версия успешно восстановлена!', 'success');
                modal.remove();

                // Reload page to show reverted content
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                this.showNotification(data.error || 'Ошибка восстановления', 'error');
            }
        } catch (error) {
            console.error('Error reverting version:', error);
            this.showNotification('Ошибка восстановления версии', 'error');
        }
    }
}

// Initialize CMS Editor when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        window.cmsEditor = new CMSEditor();
    });
} else {
    window.cmsEditor = new CMSEditor();
}
