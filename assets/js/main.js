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

        startAuto();
    }
    // ──────────────────────────────────────────────────────────────
});
