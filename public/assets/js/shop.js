/**
 * Store front-end: cart + favorites powered by localStorage, no page reloads.
 * Exposes window.Shop for use by inline page scripts (cart page, checkout page).
 */
(function (window, document) {
    'use strict';

    var CART_KEY = 'shop_cart_v1';
    var FAV_KEY = 'shop_favorites_v1';
    var ROUTES = { cart: '/carrito', checkout: '/finalizar-compra' };

    function readJSON(key, fallback) {
        try {
            var raw = localStorage.getItem(key);
            return raw ? JSON.parse(raw) : fallback;
        } catch (e) {
            return fallback;
        }
    }

    function writeJSON(key, value) {
        try {
            localStorage.setItem(key, JSON.stringify(value));
        } catch (e) {
            /* storage unavailable (private mode, quota, ...): fail silently */
        }
    }

    function readCart() {
        var items = readJSON(CART_KEY, []);
        return Array.isArray(items) ? items : [];
    }

    function writeCart(items) {
        writeJSON(CART_KEY, items);
        document.dispatchEvent(new CustomEvent('cart:updated', { detail: { items: items } }));
    }

    function findItem(items, id) {
        for (var i = 0; i < items.length; i++) {
            if (items[i].id === id) {
                return items[i];
            }
        }
        return null;
    }

    function addToCart(product, qty) {
        qty = parseInt(qty, 10) || 1;
        var items = readCart();
        var existing = findItem(items, product.id);

        if (existing) {
            existing.qty += qty;
        } else {
            items.push({
                id: product.id,
                name: product.name,
                slug: product.slug,
                image: product.image || '',
                price: parseFloat(product.price) || 0,
                sku: product.sku || '',
                qty: qty,
            });
        }

        writeCart(items);

        return items;
    }

    function updateQuantity(id, qty) {
        var items = readCart();
        qty = parseInt(qty, 10) || 0;

        if (qty <= 0) {
            items = items.filter(function (item) {
                return item.id !== id;
            });
        } else {
            var item = findItem(items, id);
            if (item) {
                item.qty = qty;
            }
        }

        writeCart(items);

        return items;
    }

    function removeFromCart(id) {
        return updateQuantity(id, 0);
    }

    function clearCart() {
        writeCart([]);
    }

    function totals(items) {
        items = items || readCart();
        var count = 0;
        var subtotal = 0;

        items.forEach(function (item) {
            count += item.qty;
            subtotal += item.price * item.qty;
        });

        subtotal = Math.round(subtotal * 100) / 100;

        return {
            count: count,
            subtotal: subtotal,
            shipping: 0,
            total: subtotal,
        };
    }

    function readFavorites() {
        var favs = readJSON(FAV_KEY, []);
        return Array.isArray(favs) ? favs : [];
    }

    function isFavorite(id) {
        return readFavorites().indexOf(id) !== -1;
    }

    function toggleFavorite(id) {
        var favs = readFavorites();
        var index = favs.indexOf(id);
        var active;

        if (index === -1) {
            favs.push(id);
            active = true;
        } else {
            favs.splice(index, 1);
            active = false;
        }

        writeJSON(FAV_KEY, favs);
        document.dispatchEvent(new CustomEvent('favorites:updated', { detail: { favorites: favs, id: id, active: active } }));

        return active;
    }

    function formatPrice(amount) {
        var n = parseFloat(amount) || 0;

        return n.toLocaleString('es-ES', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function escapeHtml(value) {
        var div = document.createElement('div');
        div.textContent = value == null ? '' : String(value);

        return div.innerHTML;
    }

    /* ---------------------------------------------------------------------
     * Off-canvas mini-cart rendering (sidebar + header/footer badges)
     * ------------------------------------------------------------------- */

    function miniCartItemHtml(item) {
        var lineTotal = formatPrice(item.price * item.qty);

        return (
            '<li class="woocommerce-mini-cart-item mini_cart_item">' +
            '<a href="#" class="remove remove_from_cart_button js-mini-cart-remove" data-product_id="' + item.id + '" aria-label="Eliminar">&times;</a>' +
            '<a href="' + escapeHtml(item.slug) + '">' +
            (item.image ? '<img src="' + escapeHtml(item.image) + '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="' + escapeHtml(item.name) + '">' : '') +
            escapeHtml(item.name) +
            '</a>' +
            '<span class="quantity">' + item.qty + ' &times; <span class="woocommerce-Price-amount amount">' +
            '<span class="woocommerce-Price-currencySymbol">&euro;</span>' + formatPrice(item.price) + '</span></span>' +
            '</li>'
        );
    }

    function renderMiniCart() {
        var container = document.querySelector('.widget_shopping_cart_content');

        if (!container) {
            return;
        }

        var items = readCart();
        var t = totals(items);

        if (!items.length) {
            container.innerHTML = '<p class="wd-empty-mini-cart">Tu carrito está vacío.</p>';
        } else {
            var html = '<div class="shopping-cart-widget-body"><div class="wd-scroll-content">';
            html += '<ul class="woocommerce-mini-cart cart_list product_list_widget">';
            items.forEach(function (item) {
                html += miniCartItemHtml(item);
            });
            html += '</ul></div></div>';
            html += '<div class="shopping-cart-widget-footer">';
            html += '<p class="woocommerce-mini-cart__total total"><strong>Subtotal:</strong> <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">&euro;</span>' + formatPrice(t.subtotal) + '</span></p>';
            html += '<p class="woocommerce-mini-cart__buttons buttons"><a href="' + ROUTES.cart + '" class="button wc-forward">Ver carrito</a> <a href="' + ROUTES.checkout + '" class="button checkout wc-forward">Finalizar compra</a></p>';
            html += '</div>';
            container.innerHTML = html;
        }

        container.querySelectorAll('.js-mini-cart-remove').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                removeFromCart(parseInt(btn.getAttribute('data-product_id'), 10));
            });
        });
    }

    function updateCartBadges() {
        var t = totals();

        document.querySelectorAll('.wd-cart-number.wd-tools-count').forEach(function (el) {
            var label = el.querySelector('span');
            el.childNodes[0].nodeValue = t.count + ' ';
            if (!label) {
                el.insertAdjacentHTML('beforeend', '<span>artículos</span>');
            }
        });

        document.querySelectorAll('.wd-cart-subtotal .woocommerce-Price-amount bdi, .wd-cart-subtotal .amount bdi').forEach(function (el) {
            var symbol = el.querySelector('.woocommerce-Price-currencySymbol');
            el.innerHTML = (symbol ? symbol.outerHTML : '&euro;') + formatPrice(t.subtotal);
        });
    }

    function closeCartSidebar() {
        var sidebar = document.querySelector('.cart-widget-side');
        if (!sidebar) {
            return;
        }

        sidebar.classList.remove('wd-opened');
        document.querySelectorAll('.wd-close-side').forEach(function (el) {
            el.classList.remove('wd-close-side-opened');
        });
    }

    document.addEventListener('cart:updated', function () {
        renderMiniCart();
        updateCartBadges();
    });

    /* ---------------------------------------------------------------------
     * Toast feedback
     * ------------------------------------------------------------------- */

    function showToast(message) {
        var toast = document.getElementById('mm-toast');

        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'mm-toast';
            document.body.appendChild(toast);
        }

        toast.textContent = message;
        toast.classList.add('mm-toast-visible');

        window.clearTimeout(toast._hideTimer);
        toast._hideTimer = window.setTimeout(function () {
            toast.classList.remove('mm-toast-visible');
        }, 2600);
    }

    /* ---------------------------------------------------------------------
     * Delegated DOM bindings: works for any card rendered now or later.
     * ------------------------------------------------------------------- */

    function productFromButton(btn) {
        return {
            id: parseInt(btn.getAttribute('data-product_id'), 10),
            name: btn.getAttribute('data-product_name') || '',
            slug: btn.getAttribute('data-product_slug') || '#',
            image: btn.getAttribute('data-product_image') || '',
            price: btn.getAttribute('data-product_price') || 0,
            sku: btn.getAttribute('data-product_sku') || '',
        };
    }

    document.addEventListener('click', function (e) {
        var addBtn = e.target.closest('.js-add-to-cart');
        if (addBtn) {
            e.preventDefault();
            var product = productFromButton(addBtn);
            if (!product.id) {
                return;
            }
            var qtyInput = addBtn.closest('form, .wd-add-btn, .product-grid-item, .single-product-page');
            var qty = 1;
            if (qtyInput) {
                var qtyField = qtyInput.querySelector('input.qty');
                if (qtyField) {
                    qty = parseInt(qtyField.value, 10) || 1;
                }
            }
            addToCart(product, qty);
            showToast(addBtn.getAttribute('data-success_message') || 'Producto añadido a tu carrito');
            return;
        }

        var favBtn = e.target.closest('.js-favorite-btn');
        if (favBtn) {
            e.preventDefault();
            var id = parseInt(favBtn.getAttribute('data-product_id'), 10);
            var active = toggleFavorite(id);
            document.querySelectorAll('.js-favorite-btn[data-product_id="' + id + '"]').forEach(function (btn) {
                btn.classList.toggle('is-active', active);
            });
            showToast(active ? 'Añadido a tus favoritos' : 'Eliminado de tus favoritos');
            return;
        }

        if (e.target.closest('.close-side-widget, .wd-close-side')) {
            e.preventDefault();
            closeCartSidebar();
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.js-favorite-btn').forEach(function (btn) {
            var id = parseInt(btn.getAttribute('data-product_id'), 10);
            if (isFavorite(id)) {
                btn.classList.add('is-active');
            }
        });

        renderMiniCart();
        updateCartBadges();
    });

    /* ---------------------------------------------------------------------
     * Shared delivery-estimate badge (cart + checkout). The scraped markup
     * had this as a literal, hardcoded date string ("viernes 9 de octubre")
     * that goes stale and even reads as a date in the past within days —
     * computed fresh on every render instead, in the visitor's locale.
     * ------------------------------------------------------------------- */

    function formatDeliveryDate(date) {
        var locale = (document.documentElement.lang || 'es').replace('_', '-');
        try {
            return new Intl.DateTimeFormat(locale, { weekday: 'long', day: 'numeric', month: 'long' }).format(date);
        } catch (e) {
            return date.toLocaleDateString();
        }
    }

    function deliveryEstimateHtml(modifierClass) {
        var labels = window.mmDeliveryLabels || {
            shipping: '✅ Envío gratuito a toda España',
            estimate: '📦 Entrega estimada: entre el',
            and: 'y el',
        };

        var minDate = new Date();
        minDate.setDate(minDate.getDate() + 5);
        var maxDate = new Date();
        maxDate.setDate(maxDate.getDate() + 9);

        return (
            '<div class="pellets-delivery-badge' + (modifierClass ? ' ' + modifierClass : '') + '">' +
            '<div class="pellets-del-shipping">' + escapeHtml(labels.shipping) + '</div>' +
            '<div class="pellets-del-dates">' + escapeHtml(labels.estimate) + ' ' +
            '<strong>' + escapeHtml(formatDeliveryDate(minDate)) + '</strong> ' + escapeHtml(labels.and) + ' ' +
            '<strong>' + escapeHtml(formatDeliveryDate(maxDate)) + '</strong></div>' +
            '</div>'
        );
    }

    window.Shop = {
        routes: ROUTES,
        readCart: readCart,
        writeCart: writeCart,
        addToCart: addToCart,
        updateQuantity: updateQuantity,
        removeFromCart: removeFromCart,
        clearCart: clearCart,
        totals: totals,
        readFavorites: readFavorites,
        isFavorite: isFavorite,
        toggleFavorite: toggleFavorite,
        formatPrice: formatPrice,
        escapeHtml: escapeHtml,
        showToast: showToast,
        renderMiniCart: renderMiniCart,
        updateCartBadges: updateCartBadges,
        deliveryEstimateHtml: deliveryEstimateHtml,
    };

    /* ---------------------------------------------------------------------
     * UI interactions: dropdowns, off-canvas panels, accordions, toggles.
     *
     * The theme's CSS already defines open/closed states via the classes
     * below (.wd-opened, .wd-active, .wd-close-side-opened) but the legacy
     * jQuery that was meant to wire them never initializes in this app, so
     * every one of these controls used a bare `href="#"`. Combined with the
     * <base href> tag in the layout, an unhandled `href="#"` click resolves
     * to the site root and silently bounces the visitor back to the home
     * page. This controller wires the real behavior and, as a safety net,
     * prevents navigation on any `href="#"` control nobody has claimed yet.
     * ------------------------------------------------------------------- */

    function closeAllDropdowns(except) {
        document.querySelectorAll('.wd-dropdown.wd-opened').forEach(function (dropdown) {
            if (dropdown !== except) {
                dropdown.classList.remove('wd-opened');
            }
        });
    }

    function openSidePanel(panel) {
        if (!panel) {
            return;
        }
        panel.classList.add('wd-opened');
        document.querySelectorAll('.wd-close-side').forEach(function (el) {
            el.classList.add('wd-close-side-opened');
        });
    }

    function closeSidePanels() {
        document.querySelectorAll('.wd-side-hidden.wd-opened').forEach(function (panel) {
            panel.classList.remove('wd-opened');
        });
        document.querySelectorAll('.wd-close-side').forEach(function (el) {
            el.classList.remove('wd-close-side-opened');
        });
    }

    function toggleAccordionItem(title) {
        var index = title.getAttribute('data-accordion-index');
        var item = title.closest('.wd-accordion-item');
        var content = item ? item.querySelector('.wd-accordion-content[data-accordion-index="' + index + '"]') : null;
        var nowOpen = !title.classList.contains('wd-active');

        title.classList.toggle('wd-active', nowOpen);
        if (content) {
            content.classList.toggle('wd-active', nowOpen);
        }
    }

    function toggleElToggle(head) {
        var wrapper = head.closest('.wd-el-toggle');
        if (!wrapper) {
            return;
        }
        var nowOpen = !wrapper.classList.contains('wd-active-sm');
        ['wd-active-lg', 'wd-active-md-sm', 'wd-active-sm'].forEach(function (cls) {
            wrapper.classList.toggle(cls, nowOpen);
        });
    }

    function setShopViewColumns(container, columns) {
        container.style.setProperty('--wd-col-lg', columns);
        container.classList.remove('grid-columns-3', 'grid-columns-4');
        container.classList.add('grid-columns-' + columns);

        try {
            localStorage.setItem('shop_view_columns', String(columns));
        } catch (e) {
            /* storage unavailable: ignore */
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        try {
            var savedColumns = localStorage.getItem('shop_view_columns');
            var grid = document.querySelector('.wd-shop-product .products.wd-products');
            if (savedColumns && grid) {
                setShopViewColumns(grid, savedColumns);
            }
        } catch (e) {
            /* storage unavailable: ignore */
        }
    });

    document.addEventListener('click', function (e) {
        // Buy now: add the current product to the cart, then jump straight to checkout.
        var buyNowBtn = e.target.closest('.js-buy-now');
        if (buyNowBtn) {
            e.preventDefault();
            var buyProduct = productFromButton(buyNowBtn);
            if (!buyProduct.id) {
                return;
            }
            var buyForm = buyNowBtn.closest('form');
            var buyQty = 1;
            if (buyForm) {
                var buyQtyField = buyForm.querySelector('input.qty');
                if (buyQtyField) {
                    buyQty = parseInt(buyQtyField.value, 10) || 1;
                }
            }
            addToCart(buyProduct, buyQty);
            window.location.href = ROUTES.checkout;
            return;
        }

        // Quantity steppers (product page + cart page).
        var step = e.target.closest('.quantity .minus, .quantity .plus');
        if (step) {
            e.preventDefault();
            var qtyField = step.closest('.quantity').querySelector('input.qty');
            if (qtyField) {
                var min = parseInt(qtyField.getAttribute('min'), 10) || 1;
                var current = parseInt(qtyField.value, 10) || min;
                var next = step.classList.contains('plus') ? current + 1 : Math.max(min, current - 1);
                qtyField.value = next;
                qtyField.dispatchEvent(new Event('change', { bubbles: true }));
            }
            return;
        }

        // Product accordion (e.g. "Garantía de calidad" on the product page).
        var accordionTitle = e.target.closest('.wd-accordion-title');
        if (accordionTitle) {
            e.preventDefault();
            toggleAccordionItem(accordionTitle);
            return;
        }

        // Collapsible footer columns on mobile ("Atención al Cliente", "Información Legal").
        var toggleHead = e.target.closest('.wd-el-toggle-head');
        if (toggleHead) {
            e.preventDefault();
            toggleElToggle(toggleHead);
            return;
        }

        // Language switcher + account dropdowns.
        var langTrigger = e.target.closest('.mm-lang-switcher > a');
        if (langTrigger) {
            e.preventDefault();
            var langDropdown = langTrigger.nextElementSibling;
            var willOpen = langDropdown && !langDropdown.classList.contains('wd-opened');
            closeAllDropdowns();
            if (willOpen) {
                langDropdown.classList.add('wd-opened');
            }
            return;
        }

        // Search overlay.
        if (e.target.closest('.wd-header-search > a')) {
            e.preventDefault();
            var searchPanel = document.querySelector('.wd-search-full-screen');
            if (searchPanel) {
                searchPanel.classList.add('wd-opened');
                var searchInput = searchPanel.querySelector('input.s');
                if (searchInput) {
                    window.setTimeout(function () { searchInput.focus(); }, 50);
                }
            }
            return;
        }
        if (e.target.closest('.wd-close-search a, .wd-search-full-screen .wd-close-search')) {
            e.preventDefault();
            var openSearch = document.querySelector('.wd-search-full-screen.wd-opened');
            if (openSearch) {
                openSearch.classList.remove('wd-opened');
            }
            return;
        }

        // Cart side panel (header + mobile toolbar cart icons).
        if (e.target.closest('.cart-widget-opener')) {
            e.preventDefault();
            openSidePanel(document.querySelector('.cart-widget-side'));
            return;
        }

        // Mobile navigation off-canvas menu.
        if (e.target.closest('.wd-header-mobile-nav > a')) {
            e.preventDefault();
            openSidePanel(document.querySelector('.mobile-nav'));
            return;
        }

        // Shared backdrop / explicit close controls for off-canvas panels.
        if (e.target.closest('.close-side-widget, .wd-close-side')) {
            e.preventDefault();
            closeSidePanels();
            return;
        }

        // Shop sidebar off-canvas toggle ("Mostrar barra lateral" on mobile/tablet).
        // The theme's own CSS hides this column entirely below 1024px unless it
        // also carries .wd-side-hidden (the class that turns it into a fixed
        // slide-in panel) — .wd-opened alone does nothing without it, which is
        // why the button looked clickable but never actually revealed anything.
        var sidebarBtn = e.target.closest('.wd-off-canvas-btn a');
        if (sidebarBtn) {
            e.preventDefault();
            var sidebarCol = document.querySelector('.wd-col-offcanvas-sm, .wd-col-offcanvas-md-sm');
            if (sidebarCol) {
                sidebarCol.classList.add('wd-side-hidden', 'wd-left');
                if (sidebarCol.classList.contains('wd-opened')) {
                    closeSidePanels();
                } else {
                    openSidePanel(sidebarCol);
                }
            }
            return;
        }

        // Results-per-page selector on the shop/category listing.
        var perPageBtn = e.target.closest('.per-page-variation');
        if (perPageBtn) {
            e.preventDefault();
            var perPageValue = perPageBtn.textContent.trim();
            var perPageUrl = new URL(window.location.href);
            perPageUrl.searchParams.set('per_page', perPageValue);
            perPageUrl.searchParams.delete('page');
            window.location.href = perPageUrl.toString();
            return;
        }

        // Grid view toggle (3 vs 4 columns) on the shop/category listing.
        var viewBtn = e.target.closest('.shop-view');
        if (viewBtn) {
            e.preventDefault();
            var grid = document.querySelector('.wd-shop-product .products.wd-products');
            if (grid) {
                var columns = viewBtn.classList.contains('per-row-3') ? 3 : 4;
                setShopViewColumns(grid, columns);
                document.querySelectorAll('.wd-products-shop-view .shop-view').forEach(function (btn) {
                    btn.classList.remove('wd-active');
                });
                viewBtn.classList.add('wd-active');
            }
            return;
        }

        // Shipping address form toggle on the cart page.
        var shippingToggle = e.target.closest('.shipping-calculator-button');
        if (shippingToggle) {
            e.preventDefault();
            var shippingForm = document.getElementById('shipping-calculator-form');
            if (shippingForm) {
                var isHidden = shippingForm.style.display === 'none' || !shippingForm.style.display;
                shippingForm.style.display = isHidden ? 'block' : 'none';
                shippingToggle.setAttribute('aria-expanded', isHidden ? 'true' : 'false');
            }
            return;
        }

        // Scroll back to top.
        if (e.target.closest('.scrollToTop')) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
            return;
        }

        // Safety net: any other unclaimed `href="#"` control must not navigate.
        // Combined with <base href> in the layout, an unhandled "#" link would
        // otherwise silently redirect the visitor back to the home page.
        var deadLink = e.target.closest('a[href="#"]');
        if (deadLink) {
            e.preventDefault();
        }
    });

    // Close dropdowns/panels when clicking outside of them, or on Escape.
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.wd-dropdown, .mm-lang-switcher, .wd-header-my-account')) {
            closeAllDropdowns();
        }
    });

    document.addEventListener('keyup', function (e) {
        if (e.key === 'Escape') {
            closeAllDropdowns();
            closeSidePanels();
            var openSearch = document.querySelector('.wd-search-full-screen.wd-opened');
            if (openSearch) {
                openSearch.classList.remove('wd-opened');
            }
        }
    });

    /* ---------------------------------------------------------------------
     * Product gallery lightbox: the theme's own gallery viewer (PhotoSwipe +
     * jQuery zoom plugin) never initializes correctly here, so this is a
     * small dependency-free replacement wired to the same gallery markup
     * and image URLs already in the page.
     * ------------------------------------------------------------------- */

    var lightboxImages = [];
    var lightboxIndex = 0;

    function buildLightbox() {
        var existing = document.getElementById('mm-lightbox');
        if (existing) {
            return existing;
        }

        var el = document.createElement('div');
        el.id = 'mm-lightbox';
        el.className = 'mm-lightbox';
        el.innerHTML =
            '<div class="mm-lightbox-counter"></div>' +
            '<div class="mm-lightbox-actions">' +
            '<button type="button" class="mm-lightbox-btn mm-lightbox-fullscreen" aria-label="' + ariaLabel('fullscreen') + '">' +
            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 9V4h5M15 4h5v5M20 15v5h-5M9 20H4v-5"/></svg>' +
            '</button>' +
            '<button type="button" class="mm-lightbox-btn mm-lightbox-share" aria-label="' + ariaLabel('share') + '">' +
            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="2.5"/><circle cx="6" cy="12" r="2.5"/><circle cx="18" cy="19" r="2.5"/><line x1="8.3" y1="10.7" x2="15.7" y2="6.3"/><line x1="8.3" y1="13.3" x2="15.7" y2="17.7"/></svg>' +
            '</button>' +
            '<button type="button" class="mm-lightbox-btn mm-lightbox-close" aria-label="' + ariaLabel('close') + '">' +
            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="5" x2="19" y2="19"/><line x1="19" y1="5" x2="5" y2="19"/></svg>' +
            '</button>' +
            '</div>' +
            '<button type="button" class="mm-lightbox-btn mm-lightbox-prev" aria-label="' + ariaLabel('prev') + '">' +
            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg>' +
            '</button>' +
            '<div class="mm-lightbox-stage"><img class="mm-lightbox-img" src="" alt=""></div>' +
            '<button type="button" class="mm-lightbox-btn mm-lightbox-next" aria-label="' + ariaLabel('next') + '">' +
            '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>' +
            '</button>';
        document.body.appendChild(el);
        return el;
    }

    function ariaLabel(key) {
        var labels = window.mmLightboxLabels || {};
        var fallback = {
            fullscreen: 'Pantalla completa',
            share: 'Compartir',
            close: 'Cerrar',
            prev: 'Imagen anterior',
            next: 'Imagen siguiente',
            linkCopied: 'Enlace copiado',
        };
        return labels[key] || fallback[key];
    }

    function renderLightboxImage() {
        var el = document.getElementById('mm-lightbox');
        if (!el || !lightboxImages.length) {
            return;
        }
        el.querySelector('.mm-lightbox-img').src = lightboxImages[lightboxIndex];
        el.querySelector('.mm-lightbox-counter').textContent = (lightboxIndex + 1) + ' / ' + lightboxImages.length;

        var hasMultiple = lightboxImages.length > 1;
        el.querySelector('.mm-lightbox-prev').style.display = hasMultiple ? '' : 'none';
        el.querySelector('.mm-lightbox-next').style.display = hasMultiple ? '' : 'none';
    }

    function openLightbox(images, startIndex) {
        if (!images.length) {
            return;
        }
        lightboxImages = images;
        lightboxIndex = startIndex;
        var el = buildLightbox();
        renderLightboxImage();
        el.classList.add('mm-lightbox-open');
        document.documentElement.classList.add('mm-lightbox-locked');
    }

    function closeLightbox() {
        var el = document.getElementById('mm-lightbox');
        if (el) {
            el.classList.remove('mm-lightbox-open');
        }
        document.documentElement.classList.remove('mm-lightbox-locked');
        if (document.fullscreenElement) {
            document.exitFullscreen();
        }
    }

    function stepLightbox(delta) {
        if (lightboxImages.length < 2) {
            return;
        }
        lightboxIndex = (lightboxIndex + delta + lightboxImages.length) % lightboxImages.length;
        renderLightboxImage();
    }

    function galleryImagesFor(trigger) {
        var gallery = trigger.closest('.woocommerce-product-gallery');
        if (!gallery) {
            return { images: [], index: 0 };
        }
        var links = Array.prototype.slice.call(gallery.querySelectorAll('.woocommerce-product-gallery__image > a'));
        var images = links.map(function (a) { return a.getAttribute('href'); });
        var clickedFigure = trigger.closest('.woocommerce-product-gallery__image');
        var index = clickedFigure ? links.findIndex(function (a) { return a.closest('.woocommerce-product-gallery__image') === clickedFigure; }) : 0;

        return { images: images, index: index === -1 ? 0 : index };
    }

    /* ---------------------------------------------------------------------
     * Inline gallery prev/next arrows (the small carousel on the product
     * page, separate from the lightbox). The theme's swiper never
     * initializes, so the grid/flex layout underneath is unpredictable —
     * this takes explicit control instead: exactly one image shown at a
     * time via inline display, cycled by the existing prev/next buttons.
     * ------------------------------------------------------------------- */

    function initInlineGalleries() {
        document.querySelectorAll('.woocommerce-product-gallery').forEach(function (gallery) {
            var items = gallery.querySelectorAll('.wd-carousel-item');
            if (items.length < 2) {
                return;
            }
            gallery.mmGalleryIndex = 0;
            items.forEach(function (item, i) {
                item.style.display = i === 0 ? '' : 'none';
            });
        });
    }

    function stepInlineGallery(gallery, delta) {
        var items = gallery.querySelectorAll('.wd-carousel-item');
        if (items.length < 2) {
            return;
        }
        var current = gallery.mmGalleryIndex || 0;
        items[current].style.display = 'none';
        current = (current + delta + items.length) % items.length;
        items[current].style.display = '';
        gallery.mmGalleryIndex = current;
    }

    document.addEventListener('DOMContentLoaded', initInlineGalleries);

    document.addEventListener('click', function (e) {
        var inlineGalleryNav = e.target.closest('.wd-nav-arrows .wd-prev, .wd-nav-arrows .wd-next');
        if (inlineGalleryNav) {
            e.preventDefault();
            var direction = inlineGalleryNav.classList.contains('wd-next') ? 1 : -1;
            var navGallery = inlineGalleryNav.closest('.woocommerce-product-gallery');
            var navCarousel = inlineGalleryNav.closest('.wd-carousel-container');
            if (navGallery) {
                stepInlineGallery(navGallery, direction);
            } else if (navCarousel) {
                var scrollWrap = navCarousel.querySelector('.wd-carousel-wrap');
                if (scrollWrap) {
                    scrollWrap.scrollBy({ left: direction * scrollWrap.clientWidth * 0.9, behavior: 'smooth' });
                }
            }
            return;
        }

        var galleryTrigger = e.target.closest('.woocommerce-product-gallery__image > a, .woodmart-show-product-gallery');
        if (galleryTrigger) {
            e.preventDefault();
            var data = galleryImagesFor(galleryTrigger);
            openLightbox(data.images, data.index);
            return;
        }

        if (e.target.closest('.mm-lightbox-close') || e.target.classList.contains('mm-lightbox-stage')) {
            closeLightbox();
            return;
        }

        if (e.target.closest('.mm-lightbox-prev')) {
            stepLightbox(-1);
            return;
        }

        if (e.target.closest('.mm-lightbox-next')) {
            stepLightbox(1);
            return;
        }

        if (e.target.closest('.mm-lightbox-fullscreen')) {
            var lightboxEl = document.getElementById('mm-lightbox');
            if (lightboxEl) {
                if (document.fullscreenElement) {
                    document.exitFullscreen();
                } else if (lightboxEl.requestFullscreen) {
                    lightboxEl.requestFullscreen();
                }
            }
            return;
        }

        if (e.target.closest('.mm-lightbox-share')) {
            var current = lightboxImages[lightboxIndex];
            if (current && navigator.share) {
                navigator.share({ url: current }).catch(function () { /* user cancelled: ignore */ });
            } else if (current && navigator.clipboard) {
                navigator.clipboard.writeText(current).then(function () {
                    showToast(ariaLabel('linkCopied'));
                }).catch(function () { /* clipboard unavailable: ignore */ });
            }
        }
    });

    document.addEventListener('keyup', function (e) {
        var lightboxEl = document.getElementById('mm-lightbox');
        if (!lightboxEl || !lightboxEl.classList.contains('mm-lightbox-open')) {
            return;
        }
        if (e.key === 'Escape') {
            closeLightbox();
        } else if (e.key === 'ArrowLeft') {
            stepLightbox(-1);
        } else if (e.key === 'ArrowRight') {
            stepLightbox(1);
        }
    });

    // Shop/category sort dropdown: a plain <select> inside a GET form does
    // nothing on its own without a submit trigger, so picking an option
    // visually changed but never actually re-sorted the list.
    document.addEventListener('change', function (e) {
        var orderBy = e.target.closest('select[name="orderby"]');
        if (orderBy) {
            var form = orderBy.closest('form');
            if (form) {
                form.submit();
            }
        }
    });

})(window, document);
