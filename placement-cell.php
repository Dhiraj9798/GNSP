<?php require_once 'includes/header.php'; ?>

<!-- Placement Journey Section -->
<section class="placement-journey-section">
    <div class="container">
        <div class="section-header text-center">
            <h4 class="section-subtitle">The Student Journey</h4>
            <h2 class="section-title index-unified-title">From Learning to Leading</h2>
            <div class="quick-links-divider index-unified-divider" aria-hidden="true"><span>★</span></div>
            <p class="about-page-lead">We guide our students through a structured 3-phase professional development program to ensure they are ready for the healthcare industry.</p>
        </div>

        <div class="journey-container">
            <!-- Phase 1: Preparation -->
            <div class="journey-step is-visible">
                <div class="step-marker">🎓</div>
                <div class="step-content">
                    <div class="step-number">Phase 01</div>
                    <h3>Academic & Skill Foundation</h3>
                    <p>The first phase focuses on building core knowledge and practical skills through our advanced labs and classroom training.</p>
                    <ul class="step-list">
                        <li>Core Nursing Theory</li>
                        <li>Practical Lab Sessions</li>
                        <li>Clinical Skill Prep</li>
                        <li>Medical Ethics</li>
                    </ul>
                </div>
            </div>

            <!-- Phase 2: Professional Grooming -->
            <div class="journey-step is-visible" style="transition-delay: 0.1s;">
                <div class="step-marker">💡</div>
                <div class="step-content">
                    <div class="step-number">Phase 02</div>
                    <h3>Professional Grooming</h3>
                    <p>In this phase, we focus on soft skills, communication, and personality development to make students hospital-ready.</p>
                    <ul class="step-list">
                        <li>Mock Interviews</li>
                        <li>Soft Skills Workshops</li>
                        <li>Resume Building</li>
                        <li>Personality Dev.</li>
                    </ul>
                </div>
            </div>

            <!-- Phase 3: Final Placement -->
            <div class="journey-step is-visible" style="transition-delay: 0.2s;">
                <div class="step-marker">✨</div>
                <div class="step-content">
                    <div class="step-number">Phase 03</div>
                    <h3>Final Placement & Success</h3>
                    <p>The final phase involves campus interviews and placement in prestigious healthcare institutions across India.</p>
                    <ul class="step-list">
                        <li>Campus Recruitment</li>
                        <li>Job Counseling</li>
                        <li>Offer Management</li>
                        <li>Career Coaching</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Simple Script for Scroll Animation (Optional but adds premium feel) -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const steps = document.querySelectorAll('.journey-step');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, { threshold: 0.2 });

    steps.forEach(step => observer.observe(step));
});
</script>

<?php require_once 'includes/footer.php'; ?>
