/**
 * Main JavaScript for НЕО-ФРУТ website
 * Handles mobile menu, smooth scrolling, navbar effects, and product lightbox
 */

// ============================================================================
// MOBILE MENU
// ============================================================================

/**
 * Initialize mobile menu functionality
 */
function initMobileMenu() {
  const menuToggle = document.getElementById("menuToggle");
  const closeDrawer = document.getElementById("closeDrawer");
  const mobileDrawer = document.getElementById("mobileDrawer");
  const drawerOverlay = document.getElementById("drawerOverlay");

  if (!menuToggle || !closeDrawer || !mobileDrawer || !drawerOverlay) {
    return; // Elements not found, skip initialization
  }

  function openDrawer() {
    mobileDrawer.classList.add("open");
    drawerOverlay.classList.remove("hidden");
    document.body.style.overflow = "hidden";
  }

  function closeDrawerFn() {
    mobileDrawer.classList.remove("open");
    drawerOverlay.classList.add("hidden");
    document.body.style.overflow = "auto";
  }

  menuToggle.addEventListener("click", openDrawer);
  closeDrawer.addEventListener("click", closeDrawerFn);
  drawerOverlay.addEventListener("click", closeDrawerFn);

  // Close on link click
  const drawerLinks = mobileDrawer.querySelectorAll("a");
  drawerLinks.forEach((link) => {
    link.addEventListener("click", closeDrawerFn);
  });
}

// ============================================================================
// SMOOTH SCROLLING
// ============================================================================

/**
 * Initialize smooth scrolling for anchor links
 */
function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        const offset = 80;
        const targetPosition =
          target.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({
          top: targetPosition,
          behavior: "smooth",
        });
      }
    });
  });
}

// ============================================================================
// NAVBAR SCROLL EFFECT
// ============================================================================

/**
 * Initialize navbar scroll effects
 */
function initNavbarScroll() {
  const nav = document.querySelector(".top-nav");
  if (!nav) return;

  let lastScroll = 0;

  window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;

    if (currentScroll > 50) {
      nav.style.boxShadow = "0 4px 20px rgba(0, 0, 0, 0.1)";
    } else {
      nav.style.boxShadow = "0 2px 10px rgba(0, 0, 0, 0.05)";
    }

    lastScroll = currentScroll;
  });
}

// ============================================================================
// PRODUCT LIGHTBOX (Products page only)
// ============================================================================

// Product images data
// Paths are relative to the page location
const productImages = {
  product1: [
    "../images/products/1 Абрикосовая с фундуком.jpg",
    "../images/products/1 Абрикос.jpg",
  ],
  product2: [
    "../images/products/2 Абриосово-сливовая с фундуко.jpg",
    "../images/products/2 Абрикосово-сливовая.jpg",
  ],
  product3: [
    "../images/products/3 Чернослив с орехами.jpg",
    "../images/products/3 Чернослив-с-орехом.jpg",
  ],
};

let currentProduct = "";
let currentImageIndex = 0;
let currentProductSection = null; // Store reference to the current product section

/**
 * Open lightbox with product image
 * @param {string} product - Product identifier (e.g., 'product1')
 * @param {number} index - Image index
 * @param {Event} event - Click event (optional)
 */
function openLightbox(product, index, event) {
  currentProduct = product;
  currentImageIndex = index;
  const lightbox = document.getElementById("lightbox");
  const img = document.getElementById("lightbox-img");

  if (!lightbox || !img) return;

  // If event is provided, find the image element and store the product section
  if (event) {
    let targetImg = null;
    let clickedElement = event.currentTarget || event.target;

    // Find the parent product section
    currentProductSection = clickedElement.closest('[data-section-id^="product"]');

    // Check if target is the img itself
    if (event.target && event.target.tagName === 'IMG') {
      targetImg = event.target;
    }
    // Otherwise, look for img within the clicked element
    else if (event.currentTarget) {
      targetImg = event.currentTarget.querySelector('img');
    }

    // Use the found image's src
    if (targetImg && targetImg.src) {
      img.src = targetImg.src;
      lightbox.classList.add("active");
      document.body.style.overflow = "hidden";
      return;
    }
  }

  // Fallback to productImages lookup
  currentProductSection = null;
  if (productImages[product] && productImages[product][index]) {
    img.src = productImages[product][index];
  }

  lightbox.classList.add("active");
  document.body.style.overflow = "hidden";
}

/**
 * Close lightbox
 * @param {Event} event - Click event
 */
function closeLightbox(event) {
  if (
    event.target.id === "lightbox" ||
    event.target.classList.contains("lightbox-close")
  ) {
    const lightbox = document.getElementById("lightbox");
    if (!lightbox) return;

    lightbox.classList.remove("active");
    document.body.style.overflow = "auto";
    event.stopPropagation();
  }
}

/**
 * Navigate lightbox images
 * @param {number} direction - Direction to navigate (-1 for previous, 1 for next)
 * @param {Event} event - Click event
 */
function navigateLightbox(direction, event) {
  event.stopPropagation();
  const img = document.getElementById("lightbox-img");
  if (!img) return;

  // If we have a reference to the actual product section (for cloned products)
  if (currentProductSection) {
    // Find all product images within this specific section
    const imageElements = currentProductSection.querySelectorAll('[data-editable-image]');

    if (imageElements.length > 0) {
      // Update the index
      currentImageIndex =
        (currentImageIndex + direction + imageElements.length) % imageElements.length;

      // Get the image src from the actual DOM element
      img.src = imageElements[currentImageIndex].src;
      return;
    }
  }

  // Fallback to productImages array for non-cloned products
  const images = productImages[currentProduct];
  if (images) {
    currentImageIndex =
      (currentImageIndex + direction + images.length) % images.length;
    img.src = images[currentImageIndex];
  }
}

/**
 * Initialize lightbox keyboard navigation
 */
function initLightboxKeyboard() {
  document.addEventListener("keydown", function (e) {
    const lightbox = document.getElementById("lightbox");
    if (!lightbox) return;

    if (lightbox.classList.contains("active")) {
      if (e.key === "Escape") {
        lightbox.classList.remove("active");
        document.body.style.overflow = "auto";
      } else if (e.key === "ArrowLeft") {
        navigateLightbox(-1, e);
      } else if (e.key === "ArrowRight") {
        navigateLightbox(1, e);
      }
    }
  });
}

// ============================================================================
// ACTIVE NAVIGATION HIGHLIGHT
// ============================================================================

/**
 * Highlight active navigation link based on current page
 */
function initActiveNavigation() {
  const currentPath = window.location.pathname;

  // Get all navigation links
  const navLinks = document.querySelectorAll(
    '.top-nav a[href*="/cms/"], #mobileDrawer a[href*="/cms/"]',
  );

  navLinks.forEach((link) => {
    const href = link.getAttribute("href");

    // Check if current path matches the link
    if (
      href === "/cms/" &&
      (currentPath === "/cms/" || currentPath === "/cms/index.php")
    ) {
      // Homepage link - only highlight on exact match
      link.classList.add("text-teal");
      link.classList.remove("text-gray-700");
    } else if (href === "/cms/company/" && currentPath.includes("/company")) {
      // Company page
      link.classList.add("text-teal");
      link.classList.remove("text-gray-700");
    } else if (href === "/cms/products/" && currentPath.includes("/products")) {
      // Products page
      link.classList.add("text-teal");
      link.classList.remove("text-gray-700");
    }
  });
}

// ============================================================================
// INITIALIZATION
// ============================================================================

/**
 * Initialize all functionality when DOM is ready
 */
function init() {
  // Common functionality for all pages
  initMobileMenu();
  initSmoothScroll();
  initNavbarScroll();
  initActiveNavigation();

  // Products page specific
  if (document.getElementById("lightbox")) {
    initLightboxKeyboard();
  }
}

// Run initialization when DOM is fully loaded
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", init);
} else {
  // DOM is already loaded
  init();
}
