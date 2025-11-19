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
        const projectFolder = '/cms/';

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
        } catch (error) {
            console.error('Auth check failed:', error);
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

    attachPanelEvents() {
        const loginBtn = document.getElementById('cms-login-btn');
        const logoutBtn = document.getElementById('cms-logout');
        const toggleEditBtn = document.getElementById('cms-toggle-edit');

        if (loginBtn) {
            loginBtn.addEventListener('click', () => this.showLoginModal());
        }

        if (logoutBtn) {
            logoutBtn.addEventListener('click', () => this.logout());
        }

        if (toggleEditBtn) {
            toggleEditBtn.addEventListener('click', () => this.toggleEditMode());
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

                // Remove any edit indicators that might be in saved content
                const indicator = element.querySelector('.cms-edit-indicator');
                if (indicator) {
                    indicator.remove();
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
            element.addEventListener('blur', (e) => this.handleContentChange(e));

            // Add edit indicator
            const indicator = document.createElement('span');
            indicator.className = 'cms-edit-indicator';
            indicator.textContent = '✏️';
            element.style.position = 'relative';
            element.appendChild(indicator);
        });

        // Enable image editing
        this.enableImageEditing();
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

            // Remove edit indicator
            const indicator = element.querySelector('.cms-edit-indicator');
            if (indicator) {
                indicator.remove();
            }
        });

        // Disable image editing
        this.disableImageEditing();
    }

    async handleContentChange(e) {
        const element = e.target;
        const sectionId = element.getAttribute('data-section-id');
        const editableId = element.getAttribute('data-editable');
        const key = `${sectionId}_${editableId}`;

        // Clone element and remove edit indicator before saving
        const clone = element.cloneNode(true);
        const indicator = clone.querySelector('.cms-edit-indicator');
        if (indicator) {
            indicator.remove();
        }
        const content = clone.innerHTML;

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
            const controls = document.createElement('div');
            controls.className = 'cms-section-controls';
            controls.innerHTML = `
                <button class="cms-btn-icon cms-duplicate-btn" title="Дублировать секцию">📋</button>
                <button class="cms-btn-icon cms-delete-btn" title="Удалить секцию">🗑️</button>
            `;

            section.style.position = 'relative';
            section.insertBefore(controls, section.firstChild);

            controls.querySelector('.cms-duplicate-btn').addEventListener('click', () => {
                this.duplicateSection(section);
            });

            controls.querySelector('.cms-delete-btn').addEventListener('click', () => {
                this.deleteSection(section);
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

    async deleteSection(section) {
        if (!confirm('Вы уверены, что хотите удалить эту секцию?')) {
            return;
        }

        const sectionId = section.getAttribute('data-section-id');
        const formData = new FormData();
        formData.append('action', 'delete_section');
        formData.append('section_id', sectionId);

        try {
            const response = await fetch(this.basePath + 'api.php', {
                method: 'POST',
                body: formData
            });
            const data = await response.json();

            if (data.success) {
                section.remove();
                this.showNotification('Секция удалена!', 'success');
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
}

// Initialize CMS Editor when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        window.cmsEditor = new CMSEditor();
    });
} else {
    window.cmsEditor = new CMSEditor();
}
