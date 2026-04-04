/* 
* main.js
* Handles UI interactions like Mobile Navigation, Sticky Header 
*/

document.addEventListener('DOMContentLoaded', () => {
    
    // Standard Sticky Navbar logic (since Nav is a distinct bottom bar again)
    const navbar = document.getElementById('navbar');
    const header = document.getElementById('main-header');
    
    window.addEventListener('scroll', () => {
        // Find the exact offset where the navbar is
        const offset = header.offsetHeight - navbar.offsetHeight;
        if (window.scrollY > offset) {
            navbar.classList.add('sticky');
        } else {
            navbar.classList.remove('sticky');
        }
    });

    // Handle mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const navMenu = document.getElementById('navMenu');

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenuBtn.classList.toggle('active');
            navMenu.classList.toggle('active');
            
            // Strictly prevent background page scrolling (Mobile Safari proof)
            const isOpen = navMenu.classList.contains('active');
            document.body.classList.toggle('no-scroll', isOpen);
            document.documentElement.classList.toggle('no-scroll', isOpen); // For older iOS consistency
        });
    }

    // Robust Dropdown Accordion for Mobile Menu
    const dropdowns = document.querySelectorAll('.dropdown');

    function closeAllDropdowns() {
        dropdowns.forEach(d => {
            d.classList.remove('active');
            const parentLink = d.querySelector(':scope > a[aria-expanded]');
            if (parentLink) parentLink.setAttribute('aria-expanded', 'false');
        });
    }

    dropdowns.forEach(dropdown => {
        const link = dropdown.querySelector(':scope > a');
        const submenu = dropdown.querySelector(':scope > .dropdown-menu');

        if (!link || !submenu) return;

        link.addEventListener('click', (e) => {
            // Parent dropdown items should only open/close submenu, not navigate.
            e.preventDefault();

            const isActive = dropdown.classList.contains('active');
            closeAllDropdowns();

            if (!isActive) {
                dropdown.classList.add('active');
                link.setAttribute('aria-expanded', 'true');
            }
        });
    });

    document.addEventListener('click', (e) => {
        if (window.innerWidth <= 991) return;
        if (!e.target.closest('.dropdown')) {
            closeAllDropdowns();
        }
    });
});

// Interactive 3D Logo Multi-Directional Tilt Physics (Replaces static CSS hover)
document.addEventListener("DOMContentLoaded", () => {
    const logoLink = document.querySelector('.logo-link');
    const logoImg = document.getElementById('site-logo');

    if (logoLink && logoImg) {
        logoLink.addEventListener('mousemove', (e) => {
            const rect = logoLink.getBoundingClientRect();
            // Mouse position relative to the logo container
            const x = e.clientX - rect.left; 
            const y = e.clientY - rect.top;  
            
            // Calculate center of the logo
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            // Proportional rotation (Max 20 degrees based on mouse position from center)
            const rotateX = ((y - centerY) / centerY) * -20;
            const rotateY = ((x - centerX) / centerX) * 20;

            // Apply interactive 3D transform dynamically
            logoImg.style.transition = 'transform 0.1s ease-out, filter 0.1s ease-out';
            logoImg.style.transform = `scale(1.1) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
            
            // Move shadow opposite to rotation for realistic depth light-source (Parallax shadow)
            logoImg.style.filter = `drop-shadow(${-rotateY * 0.5}px ${rotateX * 0.5}px 15px rgba(0,0,0,0.35))`;
        });

        logoLink.addEventListener('mouseleave', () => {
            // Smoothly reset back to 0 rotation flat state when mouse leaves
            logoImg.style.transition = 'transform 0.6s cubic-bezier(0.2, 0.8, 0.2, 1), filter 0.6s ease';
            logoImg.style.transform = 'scale(1) rotateX(0deg) rotateY(0deg)';
        logoImg.style.filter = 'drop-shadow(0 4px 8px rgba(0,0,0,0.15))';
        });
    }

    // ─── Hero Image Slider ─────────────────────────────────────────
    const slides = document.querySelectorAll('.hero-slide');
    const dots   = document.querySelectorAll('.slider-dot');
    const prevBtn = document.getElementById('sliderPrev');
    const nextBtn = document.getElementById('sliderNext');
    const sliderRoot = document.getElementById('heroSlider');

    if (slides.length > 0) {
        let current = 0;
        let autoTimer;
        const hasValidDots = dots.length === slides.length;

        function goToSlide(index) {
            slides[current].classList.remove('active');
            if (hasValidDots && dots[current]) dots[current].classList.remove('active');
            current = (index + slides.length) % slides.length;
            slides[current].classList.add('active');
            if (hasValidDots && dots[current]) dots[current].classList.add('active');
        }

        function startAuto() {
            clearInterval(autoTimer);
            autoTimer = setInterval(() => goToSlide(current + 1), 4500);
        }

        function resetAuto() {
            clearInterval(autoTimer);
            startAuto();
        }

        if (prevBtn) prevBtn.addEventListener('click', () => { goToSlide(current - 1); resetAuto(); });
        if (nextBtn) nextBtn.addEventListener('click', () => { goToSlide(current + 1); resetAuto(); });

        if (hasValidDots) {
            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    goToSlide(parseInt(dot.dataset.index, 10));
                    resetAuto();
                });
            });
        }

        if (sliderRoot) {
            let touchStartX = 0;
            let touchEndX = 0;

            sliderRoot.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].clientX;
            }, { passive: true });

            sliderRoot.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].clientX;
                const distance = touchStartX - touchEndX;
                const minSwipeDistance = 40;

                if (Math.abs(distance) < minSwipeDistance) return;

                if (distance > 0) {
                    goToSlide(current + 1);
                } else {
                    goToSlide(current - 1);
                }
                resetAuto();
            }, { passive: true });
        }

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                clearInterval(autoTimer);
            } else {
                startAuto();
            }
        });

        // Mobile browsers can pause timers on tab/app switches; this revives autoplay reliably.
        window.addEventListener('pageshow', startAuto);
        window.addEventListener('focus', startAuto);

        startAuto();
    }
    // ──────────────────────────────────────────────────────────────

    // ─── Notice Board Auto Loop ─────────────────────────────────
    const noticeScrollers = document.querySelectorAll('[data-notice-loop]');
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (prefersReducedMotion) {
        return;
    }

    noticeScrollers.forEach(scroller => {
        if (scroller.dataset.loopInitialized === '1') return;
        scroller.dataset.loopInitialized = '1';

        const panel = scroller.closest('.notice-panel');
        const lists = Array.from(scroller.querySelectorAll('.notice-list'));
        if (!lists.length) return;

        const speed = parseFloat(panel?.dataset.loopSpeed || '0.3');
        const pixelsPerSecond = speed * 60;
        let maxOffset = 0;
        let offset = 0;
        let paused = false;
        let rafId = null;
        let lastTimestamp = 0;

        function getActiveTarget() {
            const activeBtn = panel?.querySelector('.notice-filter-btn.active');
            return activeBtn?.dataset.target;
        }

        function mountActiveList(targetName) {
            const activeList = lists.find(list => list.dataset.list === targetName) ||
                lists.find(list => !list.classList.contains('is-hidden')) ||
                lists[0];

            // Remove prior loop duplicates before re-mounting.
            scroller.querySelectorAll('.notice-list-duplicate').forEach(node => node.remove());

            lists.forEach(list => list.classList.add('is-hidden'));
            activeList.classList.remove('is-hidden');

            offset = 0;
            scroller.scrollTop = 0;
            maxOffset = activeList.scrollHeight;

            if (activeList.children.length > 1) {
                const duplicate = activeList.cloneNode(true);
                duplicate.classList.add('notice-list-duplicate');
                duplicate.setAttribute('aria-hidden', 'true');
                scroller.appendChild(duplicate);
            }

            // Re-measure after browser paint; avoids zero-height edge cases on slow devices.
            requestAnimationFrame(() => {
                maxOffset = activeList.scrollHeight;
            });
        }

        const filterButtons = panel ? Array.from(panel.querySelectorAll('.notice-filter-btn')) : [];
        if (filterButtons.length) {
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    mountActiveList(button.dataset.target);
                });
            });
        }

        const initialTarget = filterButtons.find(btn => btn.classList.contains('active'))?.dataset.target;
        mountActiveList(initialTarget);

        function tick(timestamp) {
            if (!lastTimestamp) lastTimestamp = timestamp;
            const delta = timestamp - lastTimestamp;
            lastTimestamp = timestamp;

            if (!paused && maxOffset > 0) {
                offset += (pixelsPerSecond * delta) / 1000;
                if (offset >= maxOffset) offset = 0;
                scroller.scrollTop = offset;
            }
            rafId = requestAnimationFrame(tick);
        }

        function ensureLoopRunning() {
            if (rafId !== null) return;
            lastTimestamp = 0;
            rafId = requestAnimationFrame(tick);
        }

        scroller.addEventListener('mouseenter', () => { paused = true; });
        scroller.addEventListener('mouseleave', () => { paused = false; });
        // Keep touch devices auto-looping; hover pause is for desktop pointers only.

        document.addEventListener('visibilitychange', () => {
            paused = document.hidden;
            if (!document.hidden) {
                lastTimestamp = 0;
                mountActiveList(getActiveTarget());
            }
        });

        window.addEventListener('resize', () => {
            mountActiveList(getActiveTarget());
        });

        window.addEventListener('orientationchange', () => {
            mountActiveList(getActiveTarget());
        });

        window.addEventListener('pageshow', () => {
            paused = false;
            mountActiveList(getActiveTarget());
            ensureLoopRunning();
        });

        ensureLoopRunning();
    });
    // ──────────────────────────────────────────────────────────────

    // ─── Quick Links Scroll Reveal ───────────────────────────────
    const quickLinkCards = document.querySelectorAll('.quick-link-card');
    if (quickLinkCards.length) {
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('in-view');
                observer.unobserve(entry.target);
            });
        }, {
            threshold: 0.12,
            rootMargin: '0px 0px -30px 0px'
        });

        quickLinkCards.forEach(card => revealObserver.observe(card));
    }

        // ─── College Facilities Scroll Reveal ─────────────────────────
        const facilityCards = document.querySelectorAll('.facility-card');
        if (facilityCards.length) {
            const facilityObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) return;
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                });
            }, {
                threshold: 0.15,
                rootMargin: '0px 0px -24px 0px'
            });

            facilityCards.forEach(card => facilityObserver.observe(card));
        }

        // ─── Why Choose Lines Scroll Reveal ──────────────────────────
        const whyPoints = document.querySelectorAll('.why-point');
        if (whyPoints.length) {
            const whyObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) return;
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                });
            }, {
                threshold: 0.2,
                rootMargin: '0px 0px -28px 0px'
            });

            whyPoints.forEach(point => whyObserver.observe(point));
        }

    // ─── Stats Counter Number Animation ──────────────────────────
    const counterSection = document.querySelector('.stats-counter-section');
    const counterValues = document.querySelectorAll('.counter-value[data-target]');
    if (counterSection && counterValues.length) {
        let hasAnimatedCounters = false;

        const runCounters = () => {
            if (hasAnimatedCounters) return;
            hasAnimatedCounters = true;

            counterValues.forEach((node, index) => {
                const target = parseInt(node.dataset.target || '0', 10);
                const suffix = node.dataset.suffix || '';
                const counterState = { value: 0 };

                gsap.to(counterState, {
                    value: target,
                    duration: 1.7,
                    delay: index * 0.1,
                    ease: 'power2.out',
                    onUpdate: () => {
                        node.textContent = `${Math.floor(counterState.value)}${suffix}`;
                    },
                    onComplete: () => {
                        node.textContent = `${target}${suffix}`;
                    }
                });
            });
        };

        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                runCounters();
                observer.unobserve(entry.target);
            });
        }, {
            threshold: 0.3,
            rootMargin: '0px 0px -40px 0px'
        });

        counterObserver.observe(counterSection);
    }

    // ─── Reviews One-By-One Slider ───────────────────────────────
    const reviewSliders = document.querySelectorAll('[data-reviews-slider]');
    reviewSliders.forEach((slider) => {
        const viewport = slider.querySelector('.reviews-viewport');
        const track = slider.querySelector('.reviews-track');
        const cards = track ? Array.from(track.children) : [];
        const prevBtn = slider.querySelector('.reviews-nav-prev');
        const nextBtn = slider.querySelector('.reviews-nav-next');
        if (!viewport || !track || cards.length < 2) return;

        let index = 0;
        let step = 0;
        let maxIndex = 0;
        let timerId = null;
        const autoplayMs = parseInt(slider.dataset.autoplay || '3000', 10);

        function updateButtons() {
            if (!prevBtn || !nextBtn) return;
            prevBtn.disabled = maxIndex === 0;
            nextBtn.disabled = maxIndex === 0;
        }

        function applyPosition(animate = true) {
            track.style.transition = animate ? 'transform 0.55s cubic-bezier(0.22, 0.61, 0.36, 1)' : 'none';
            track.style.transform = `translate3d(${-index * step}px, 0, 0)`;
        }

        function computeBounds() {
            const firstCard = cards[0];
            const gap = parseFloat(getComputedStyle(track).gap || '0');
            step = firstCard.getBoundingClientRect().width + gap;
            const visibleCards = step > 0 ? Math.max(1, Math.floor((viewport.clientWidth + gap) / step)) : 1;
            maxIndex = Math.max(0, cards.length - visibleCards);
            if (index > maxIndex) index = maxIndex;
            applyPosition(false);
            updateButtons();
        }

        function goTo(nextIndex, animate = true) {
            if (maxIndex <= 0) {
                index = 0;
                applyPosition(animate);
                return;
            }

            if (nextIndex > maxIndex) {
                index = 0;
            } else if (nextIndex < 0) {
                index = maxIndex;
            } else {
                index = nextIndex;
            }

            applyPosition(animate);
        }

        function stopAuto() {
            if (timerId) {
                clearInterval(timerId);
                timerId = null;
            }
        }

        function startAuto() {
            stopAuto();
            if (autoplayMs < 1000 || maxIndex <= 0) return;
            timerId = setInterval(() => {
                goTo(index + 1, true);
            }, autoplayMs);
        }

        function restartAuto() {
            startAuto();
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                goTo(index - 1, true);
                restartAuto();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                goTo(index + 1, true);
                restartAuto();
            });
        }

        slider.addEventListener('mouseenter', stopAuto);
        slider.addEventListener('mouseleave', startAuto);
        slider.addEventListener('touchstart', stopAuto, { passive: true });
        slider.addEventListener('touchend', startAuto, { passive: true });
        slider.addEventListener('focusin', stopAuto);
        slider.addEventListener('focusout', startAuto);

        window.addEventListener('resize', () => {
            computeBounds();
            startAuto();
        });

        window.addEventListener('orientationchange', () => {
            computeBounds();
            startAuto();
        });

        computeBounds();
        startAuto();
    });

    // ─── Index Floating Side Menu Visibility ─────────────────────
    const floatMenu = document.getElementById('indexFloatMenu');
    const heroSection = document.getElementById('hero');
    const footer = document.querySelector('.footer');

    if (floatMenu && heroSection && footer) {
        function updateFloatMenuVisibility() {
            const heroBottom = heroSection.offsetTop + heroSection.offsetHeight;
            const footerTop = footer.offsetTop;
            const scrollY = window.scrollY || window.pageYOffset;
            const viewportHeight = window.innerHeight;

            const hasPassedHero = scrollY > (heroBottom - 90);
            const beforeFooter = (scrollY + viewportHeight) < (footerTop - 50);
            const shouldShow = hasPassedHero && beforeFooter;

            if (floatMenu) floatMenu.classList.toggle('is-visible', shouldShow);
        }

        window.addEventListener('scroll', updateFloatMenuVisibility, { passive: true });
        window.addEventListener('resize', updateFloatMenuVisibility);
        window.addEventListener('orientationchange', updateFloatMenuVisibility);
        window.addEventListener('pageshow', updateFloatMenuVisibility);

        updateFloatMenuVisibility();
    }

    // ─── About Cards Touch Feedback ──────────────────────────────
    const aboutFocusCards = document.querySelectorAll('.about-focus-card');
    aboutFocusCards.forEach((card) => {
        let touchTimer = null;

        card.addEventListener('touchstart', () => {
            card.classList.add('is-touched');
        }, { passive: true });

        card.addEventListener('touchend', () => {
            clearTimeout(touchTimer);
            touchTimer = setTimeout(() => {
                card.classList.remove('is-touched');
            }, 220);
        }, { passive: true });

        card.addEventListener('touchcancel', () => {
            card.classList.remove('is-touched');
        }, { passive: true });
    });
    // ──────────────────────────────────────────────────────────────
});
