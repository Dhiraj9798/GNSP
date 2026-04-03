/*
* animations.js
* Handles GSAP text reveals and interactions
*/

// Register ScrollTrigger
gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', () => {

    // Hero Section Animations
    const tl = gsap.timeline();

    // Hero Text Reveal
    tl.fromTo(".gsap-hero-title", 
        { y: 50, opacity: 0 }, 
        { y: 0, opacity: 1, duration: 1, ease: "power3.out", delay: 0.5 }
    )
    .fromTo(".gsap-hero-desc", 
        { y: 30, opacity: 0 }, 
        { y: 0, opacity: 1, duration: 0.8, ease: "power2.out" }, 
        "-=0.6"
    )
    .fromTo(".gsap-hero-btns a", 
        { y: 20, opacity: 0 }, 
        { y: 0, opacity: 1, duration: 0.5, stagger: 0.2, ease: "power2.out" }, 
        "-=0.4"
    );

    // We will add more ScrollTriggers here as we build out other sections.
});
