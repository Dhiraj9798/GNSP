<?php require_once 'includes/header.php'; ?>

<!-- Hero Section with Image Slider -->
<section class="hero-section" id="hero">

    <!-- Image Slider Background -->
    <div class="hero-slider" id="heroSlider">
        <div class="hero-slide active" style="background-image: url('assets/images/hero1.jpeg');"></div>
        <div class="hero-slide" style="background-image: url('assets/images/hero2.jpeg');"></div>
        <div class="hero-slide" style="background-image: url('assets/images/hero3.jpeg');"></div>

        <!-- Dark Overlay for text readability -->
        <div class="hero-overlay"></div>

        <!-- Prev / Next Arrows -->
        <button class="slider-arrow slider-prev" id="sliderPrev" aria-label="Previous slide">&#10094;</button>
        <button class="slider-arrow slider-next" id="sliderNext" aria-label="Next slide">&#10095;</button>

        <!-- Dot Indicators -->
        <div class="slider-dots" id="sliderDots">
            <span class="slider-dot active" data-index="0"></span>
            <span class="slider-dot" data-index="1"></span>
            <span class="slider-dot" data-index="2"></span>
        </div>
    </div>

    <!-- Hero Text Content (above slider) -->
    <div class="hero-content container">
        <div class="hero-text">
            <h1 class="gsap-hero-title">
                <span class="light-text">Empowering</span> <br>
                <span class="highlight-text">Future Healers</span>
            </h1>
            <p class="gsap-hero-desc">Discover world-class nursing and paramedical education at Gurudeo Nursing and Paramedical Science. We transform passion into expertise.</p>
            <div class="hero-actions gsap-hero-btns">
                <a href="about.php" class="btn-secondary">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- About Snippet Section -->
<section class="section about-home bg-light py-5">
    <div class="container about-grid">
        <div class="about-content gsap-scroll-fade">
            <h4 class="section-subtitle">Who We Are</h4>
            <h2 class="section-title">A Legacy of Medical Excellence</h2>
            <p>Welcome to Gurudeo Nursing and Paramedical Science (GNPS). Based in Patna, Bihar, we are committed to providing top-tier medical and nursing education. Our modern facilities and expert faculty ensure you are prepared for the rapidly evolving healthcare sector.</p>
            <ul class="feature-list">
                <li><i class="icon-check"></i> Experienced Faculty & Medical Professionals</li>
                <li><i class="icon-check"></i> Advanced Practical Labs & Equipment</li>
                <li><i class="icon-check"></i> Focus on Career & Placement Assistance</li>
            </ul>
            <a href="about.php" class="btn-primary mt-3">Read Our Story</a>
        </div>
        <div class="about-image-wrapper gsap-scroll-img">
            <div class="glass-image-card">
                <!-- Fallback to a styled div representing the image -->
                <div class="img-placeholder" style="background: var(--primary-color); height: 400px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); display: flex; align-items: center; justify-content: center; color: white;">
                    [ College Image ]
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Courses Section -->
<section class="section courses-home py-5">
    <div class="container">
        <div class="section-header text-center gsap-scroll-fade">
            <h4 class="section-subtitle">Our Academic Programs</h4>
            <h2 class="section-title">Explore Our Top Courses</h2>
            <p>We offer specialized diploma and degree programs to jumpstart your career.</p>
        </div>
        
        <div class="course-grid">
            <!-- ANM Course Card -->
            <div class="course-card glass-card gsap-scroll-up">
                <div class="course-icon">💊</div>
                <h3>A.N.M</h3>
                <p>Auxiliary Nurse Midwifery. A comprehensive diploma program designed to train individuals for primary healthcare.</p>
                <a href="anm.php" class="course-link">Course Details &rarr;</a>
            </div>

            <!-- GNM Course Card -->
            <div class="course-card glass-card gsap-scroll-up" style="animation-delay: 0.2s;">
                <div class="course-icon">🩺</div>
                <h3>G.N.M</h3>
                <p>General Nursing and Midwifery. Prepare yourself to care for patients effectively in varying settings.</p>
                <a href="gnm.php" class="course-link">Course Details &rarr;</a>
            </div>

            <!-- B.Sc Nursing Course Card -->
            <div class="course-card glass-card gsap-scroll-up" style="animation-delay: 0.4s;">
                <div class="course-icon">🏥</div>
                <h3>B.Sc Nursing</h3>
                <p>A 4-year undergraduate degree program offering deep insights and clinical practice in modern nursing.</p>
                <a href="bsc_nursing.php" class="course-link">Course Details &rarr;</a>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
