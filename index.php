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

<!-- Welcome Section (Reference-inspired) -->
<section class="welcome-section section">
    <div class="container welcome-grid-wrap">
        <div class="welcome-main">
            <h2 class="section-title index-unified-title">Welcome to Gurudeo Nursing and Paramedical Science</h2>
            <div class="quick-links-divider index-unified-divider" aria-hidden="true"><span>★</span></div>
            <p>
                Gurudeo Nursing and Paramedical Science, Patna, is dedicated to preparing skilled and compassionate healthcare professionals through quality nursing and paramedical education. With structured academics, practical clinical exposure, experienced faculty and student-first mentoring, GNPS helps learners build strong careers while serving society with confidence and care.
            </p>
            <a href="about.php" class="welcome-btn">Read More</a>
        </div>

        <aside class="welcome-leadership" aria-label="Leadership">
            <article class="leader-card">
                <div class="leader-avatar">
                    <img src="assets/images/hero2.jpeg" alt="Leadership">
                </div>
            </article>
        </aside>
    </div>
</section>

<!-- Notice Board Section (Reference-style) -->
<section class="notice-board-section section" aria-label="GNPS Notice Board">
    <div class="container">
        <div class="section-header text-center notice-board-headline-wrap">
            <h2 class="section-title index-unified-title">Notice Board</h2>
            <div class="quick-links-divider index-unified-divider" aria-hidden="true"><span>★</span></div>
        </div>

    <div class="notice-board-grid">
        <article class="notice-panel" data-loop-speed="0.34">
            <header class="notice-panel-head">Notice for Students</header>
            <div class="notice-scroller" data-notice-loop>
                <ul class="notice-list">
                    <li class="notice-item">
                        <div class="notice-date"><span>01</span><small>APR</small><em>2026</em></div>
                        <a href="admission.php">Admission open for A.N.M, G.N.M and B.Sc Nursing (Session 2026-27).</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>30</span><small>MAR</small><em>2026</em></div>
                        <a href="exam.php">Annual and backlog exam schedule updated for nursing programs.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>24</span><small>MAR</small><em>2026</em></div>
                        <a href="result.php">Semester result publishing cycle announced for enrolled students.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>19</span><small>MAR</small><em>2026</em></div>
                        <a href="scholarship.php">Scholarship support and eligibility verification window is active.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>12</span><small>MAR</small><em>2026</em></div>
                        <a href="apply-online.php">Online application helpdesk timings revised for new applicants.</a>
                    </li>
                </ul>
            </div>
            <a class="notice-view-all" href="admission.php">View All</a>
        </article>

        <article class="notice-panel" data-loop-speed="0.3">
            <header class="notice-panel-head">Notice for Officials</header>
            <div class="notice-scroller" data-notice-loop>
                <ul class="notice-list">
                    <li class="notice-item">
                        <div class="notice-date"><span>21</span><small>FEB</small><em>2026</em></div>
                        <a href="faculty.php">Updated faculty duty roster released for the upcoming exam cycle.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>12</span><small>FEB</small><em>2026</em></div>
                        <a href="training.php">Clinical training partner hospital allocation approved for this term.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>03</span><small>FEB</small><em>2026</em></div>
                        <a href="academic.php">Academic audit and compliance documentation submission circular.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>27</span><small>JAN</small><em>2026</em></div>
                        <a href="affiliation.php">Affiliation standards review meeting notice for administration team.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>18</span><small>JAN</small><em>2026</em></div>
                        <a href="placement.php">Placement readiness meeting and industry coordination update.</a>
                    </li>
                </ul>
            </div>
            <a class="notice-view-all" href="academic.php">View All</a>
        </article>

        <article class="notice-panel has-filters" data-loop-speed="0.26">
            <header class="notice-panel-head">Academic Events</header>
            <div class="notice-filter-row" aria-label="Event filters">
                <button type="button" class="notice-filter-btn active" data-target="concluded">Concluded</button>
                <button type="button" class="notice-filter-btn" data-target="upcoming">Upcoming</button>
            </div>
            <div class="notice-scroller" data-notice-loop>
                <ul class="notice-list" data-list="concluded">
                    <li class="notice-item">
                        <div class="notice-date"><span>11</span><small>OCT</small><em>2025</em></div>
                        <a href="training.php">National workshop on public healthcare leadership and policy exposure.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>09</span><small>OCT</small><em>2025</em></div>
                        <a href="training.php">World Mental Health Day outreach and awareness activity by GNPS.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>12</span><small>APR</small><em>2025</em></div>
                        <a href="academic.php">Workshop on curriculum and competency-based nursing education.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>07</span><small>MAR</small><em>2025</em></div>
                        <a href="placement.php">Career guidance summit with healthcare recruiters and alumni.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>23</span><small>FEB</small><em>2025</em></div>
                        <a href="campus-facilities.php">Open campus demonstration for labs and practical training units.</a>
                    </li>
                </ul>

                <ul class="notice-list is-hidden" data-list="upcoming">
                    <li class="notice-item">
                        <div class="notice-date"><span>08</span><small>MAY</small><em>2026</em></div>
                        <a href="training.php">Advanced Clinical Skills Workshop for final-year nursing students.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>15</span><small>MAY</small><em>2026</em></div>
                        <a href="placement.php">Healthcare Placement Orientation with partner hospitals and recruiters.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>24</span><small>MAY</small><em>2026</em></div>
                        <a href="academic.php">Curriculum Enhancement Seminar on competency-based nursing education.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>06</span><small>JUN</small><em>2026</em></div>
                        <a href="campus-facilities.php">Open Campus Lab Demonstration and parent orientation session.</a>
                    </li>
                    <li class="notice-item">
                        <div class="notice-date"><span>18</span><small>JUN</small><em>2026</em></div>
                        <a href="training.php">Community Health Camp and field training activity by GNPS teams.</a>
                    </li>
                </ul>
            </div>
            <a class="notice-view-all" href="training.php">View All</a>
        </article>
    </div>
    </div>
</section>

<!-- Quick Links Section -->
<section class="quick-links-section section" aria-label="Quick Links">
    <div class="container">
        <h2 class="quick-links-title">Quick Links</h2>
        <div class="quick-links-divider" aria-hidden="true"><span>★</span></div>

        <div class="quick-links-grid">
            <a href="about.php" class="quick-link-card" style="--delay: 0ms;">
                <span class="quick-link-icon">🏥</span>
                <span class="quick-link-label">About Us</span>
            </a>
            <a href="anm.php" class="quick-link-card" style="--delay: 60ms;">
                <span class="quick-link-icon">🩺</span>
                <span class="quick-link-label">A.N.M Course</span>
            </a>
            <a href="gnm.php" class="quick-link-card" style="--delay: 120ms;">
                <span class="quick-link-icon">💉</span>
                <span class="quick-link-label">G.N.M Course</span>
            </a>
            <a href="bsc_nursing.php" class="quick-link-card" style="--delay: 180ms;">
                <span class="quick-link-icon">🎓</span>
                <span class="quick-link-label">B.Sc Nursing</span>
            </a>
            <a href="admission-form.php" class="quick-link-card" style="--delay: 240ms;">
                <span class="quick-link-icon">📝</span>
                <span class="quick-link-label">Admission Form</span>
            </a>
            <a href="apply-online.php" class="quick-link-card" style="--delay: 300ms;">
                <span class="quick-link-icon">🌐</span>
                <span class="quick-link-label">Apply Online</span>
            </a>

            <a href="faculty.php" class="quick-link-card" style="--delay: 360ms;">
                <span class="quick-link-icon">👩‍⚕️</span>
                <span class="quick-link-label">Faculty List</span>
            </a>
            <a href="result.php" class="quick-link-card" style="--delay: 420ms;">
                <span class="quick-link-icon">📊</span>
                <span class="quick-link-label">Examination Result</span>
            </a>
            <a href="exam.php" class="quick-link-card" style="--delay: 480ms;">
                <span class="quick-link-icon">📋</span>
                <span class="quick-link-label">Examination Portal</span>
            </a>
            <a href="training.php" class="quick-link-card" style="--delay: 540ms;">
                <span class="quick-link-icon">🧪</span>
                <span class="quick-link-label">Training Programs</span>
            </a>
            <a href="placement.php" class="quick-link-card" style="--delay: 600ms;">
                <span class="quick-link-icon">💼</span>
                <span class="quick-link-label">Placement Cell</span>
            </a>
            <a href="campus-facilities.php" class="quick-link-card" style="--delay: 660ms;">
                <span class="quick-link-icon">🏛️</span>
                <span class="quick-link-label">Campus Facilities</span>
            </a>
        </div>
    </div>
</section>



<!-- Featured Courses Section -->
<section class="section courses-home py-5">
    <div class="container">
        <div class="section-header text-center gsap-scroll-fade">
            <h4 class="section-subtitle">Our Academic Programs</h4>
            <h2 class="section-title index-unified-title">Explore Our Top Courses</h2>
            <div class="quick-links-divider index-unified-divider" aria-hidden="true"><span>★</span></div>
            <p>We offer specialized diploma and degree programs to jumpstart your career.</p>
        </div>
        
        <div class="course-grid">
            <!-- ANM Course Card -->
            <div class="course-card glass-card gsap-scroll-up">
                <div class="course-icon">💊</div>
                <h3>A.N.M</h3>
                <p>Career-focused entry-level nursing program for foundational patient care and community health practice.</p>
                <ul class="course-meta">
                    <li><strong>Full Name:</strong> Auxiliary Nurse Midwife</li>
                    <li><strong>Course Duration:</strong> 2 Years</li>
                    <li><strong>Eligibility:</strong> Passed 10+2 with a minimum of 50% aggregate marks (any stream)</li>
                </ul>
                <a href="anm.php" class="course-link">Course Details &rarr;</a>
            </div>

            <!-- GNM Course Card -->
            <div class="course-card glass-card gsap-scroll-up" style="animation-delay: 0.2s;">
                <div class="course-icon">🩺</div>
                <h3>G.N.M</h3>
                <p>Professional nursing diploma with stronger clinical exposure for hospital and community healthcare roles.</p>
                <ul class="course-meta">
                    <li><strong>Full Name:</strong> General Nursing and Midwifery</li>
                    <li><strong>Course Duration:</strong> 3 Years</li>
                    <li><strong>Eligibility:</strong> Passed 10+2 with a minimum of 50% aggregate marks (any stream)</li>
                </ul>
                <a href="gnm.php" class="course-link">Course Details &rarr;</a>
            </div>

            <!-- B.Sc Nursing Course Card -->
            <div class="course-card glass-card gsap-scroll-up" style="animation-delay: 0.4s;">
                <div class="course-icon">🏥</div>
                <h3>B.Sc Nursing</h3>
                <p>Advanced undergraduate nursing degree with deep theory, labs, and structured clinical skill development.</p>
                <ul class="course-meta">
                    <li><strong>Full Name:</strong> Bachelor of Science in Nursing</li>
                    <li><strong>Level:</strong> Undergraduate</li>
                    <li><strong>Course Duration:</strong> 4 Years</li>
                    <li><strong>Eligibility:</strong> 12th passed (10+2) with Biology, minimum 50% aggregate marks</li>
                    <li><strong>Admission Basis:</strong> Entrance-Based / Merit Based</li>
                </ul>
                <a href="bsc_nursing.php" class="course-link">Course Details &rarr;</a>
            </div>
        </div>
    </div>
</section>

<!-- College Facilities Section -->
<section class="section college-facilities-section" aria-label="College Facilities">
    <div class="container">
        <div class="section-header text-center">
            <h4 class="section-subtitle">Student Support Infrastructure</h4>
            <h2 class="section-title index-unified-title">College Facilities</h2>
            <div class="quick-links-divider index-unified-divider" aria-hidden="true"><span>★</span></div>
            <p>Everything students need for safe learning, practical training, and confident nursing careers.</p>
        </div>

        <div class="facility-grid">
            <article class="facility-card" style="--card-delay: 0ms;">
                <div class="facility-icon" aria-hidden="true">🏫</div>
                <h3>Smart Classrooms</h3>
                <p>Clean classrooms with projectors and daily interactive teaching support.</p>
            </article>

            <article class="facility-card" style="--card-delay: 80ms;">
                <div class="facility-icon" aria-hidden="true">🧪</div>
                <h3>Nursing Skill Labs</h3>
                <p>Hands-on practice labs for basic to advanced nursing procedures.</p>
            </article>

            <article class="facility-card" style="--card-delay: 160ms;">
                <div class="facility-icon" aria-hidden="true">🫀</div>
                <h3>Anatomy & Physiology Lab</h3>
                <p>Model-based learning to understand body systems clearly and quickly.</p>
            </article>

            <article class="facility-card" style="--card-delay: 240ms;">
                <div class="facility-icon" aria-hidden="true">👶</div>
                <h3>MCH & Midwifery Lab</h3>
                <p>Special practice setup for maternal and child healthcare training.</p>
            </article>

            <article class="facility-card" style="--card-delay: 320ms;">
                <div class="facility-icon" aria-hidden="true">🏥</div>
                <h3>Clinical Hospital Training</h3>
                <p>Regular clinical exposure in partner hospitals under expert supervision.</p>
            </article>

            <article class="facility-card" style="--card-delay: 400ms;">
                <div class="facility-icon" aria-hidden="true">📚</div>
                <h3>Library & Reading Zone</h3>
                <p>Subject books, journals, and a quiet study environment for students.</p>
            </article>

            <article class="facility-card" style="--card-delay: 480ms;">
                <div class="facility-icon" aria-hidden="true">💻</div>
                <h3>Computer & Internet Lab</h3>
                <p>Digital learning support for assignments, exam forms, and online resources.</p>
            </article>

            <article class="facility-card" style="--card-delay: 560ms;">
                <div class="facility-icon" aria-hidden="true">🛏️</div>
                <h3>Hostel Facility</h3>
                <p>Safe and comfortable hostel with discipline, hygiene, and study support.</p>
            </article>
        </div>
    </div>
</section>

<!-- Why Choose GNPS Section -->
<section class="section why-choose-section" aria-label="Why Choose GNPS">
    <div class="container why-choose-grid">
        <div class="why-choose-left">
            <h2 class="section-title index-unified-title why-title">Why Choose GNPS?</h2>
            <div class="quick-links-divider index-unified-divider why-divider" aria-hidden="true"><span>★</span></div>
            <p class="why-lead">We help students become confident nurses with practical training, caring teachers, and real career support.</p>

            <ul class="why-points">
                <li class="why-point" style="--line-delay: 0ms;">Experienced faculty with clear and supportive teaching.</li>
                <li class="why-point" style="--line-delay: 80ms;">Regular practical lab sessions from first semester.</li>
                <li class="why-point" style="--line-delay: 160ms;">Hospital clinical exposure under guided supervision.</li>
                <li class="why-point" style="--line-delay: 240ms;">Safe and disciplined campus with student-friendly environment.</li>
                <li class="why-point" style="--line-delay: 320ms;">Career counseling, interview preparation, and placement assistance.</li>
            </ul>
        </div>

        <div class="why-choose-right">
            <div class="why-image-card">
                <img src="assets/images/hero3.jpeg" alt="GNPS campus and student training environment">
            </div>
        </div>
    </div>
</section>

<!-- Stats Counter Section -->
<section class="section stats-counter-section" aria-label="GNPS Performance Snapshot">
    <div class="container">
        <div class="stats-counter-shell">
            <div class="stats-webgl-bg" id="statsWebglBg" aria-hidden="true"></div>
            <div class="stats-counter-grid">
                <article class="stat-item">
                    <h3 class="counter-value" data-target="3" data-suffix="+">3+</h3>
                    <p>Courses Available</p>
                </article>
                <article class="stat-item">
                    <h3 class="counter-value" data-target="2000" data-suffix="+">2000+</h3>
                    <p>Active Students</p>
                </article>
                <article class="stat-item">
                    <h3 class="counter-value" data-target="80" data-suffix="+">80+</h3>
                    <p>Expert Teachers</p>
                </article>
                <article class="stat-item">
                    <h3 class="counter-value" data-target="3" data-suffix="+">3+</h3>
                    <p>Awards Received</p>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Final Contact Showcase Card -->
<section class="section final-contact-section" aria-label="GNPS Contact Showcase">
    <div class="container">
        <div class="section-header text-center final-contact-headline-wrap">
            <h2 class="section-title index-unified-title">Touch With Us</h2>
            <div class="quick-links-divider index-unified-divider" aria-hidden="true"><span>★</span></div>
        </div>

        <article class="final-contact-card">
            <div class="final-contact-content">
                <h3>Build Your Future with GNPS</h3>
                <p class="final-contact-sub">GURUDEO NURSING AND PARAMEDICAL SCIENCE</p>

                <ul class="final-contact-points">
                    <li>Career-focused nursing programs with practical exposure.</li>
                    <li>Mentorship support for academic and professional growth.</li>
                    <li>Trusted institute environment with student-first guidance.</li>
                </ul>

                <div class="final-contact-actions">
                    <a class="final-btn final-btn-primary" href="apply-online.php">Start Your Journey</a>
                    <a class="final-btn final-btn-secondary" href="contact.php">Contact Us</a>
                </div>
            </div>

            <div class="final-contact-media">
                <img src="assets/images/cart.jpeg" alt="Gurudeo Nursing and Paramedical Science campus view">
            </div>
        </article>
    </div>
</section>

<!-- Reviews Section -->
<section class="section reviews-section" aria-label="Student and Campus Reviews">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="section-title index-unified-title">Student & Campus Reviews</h2>
            <div class="quick-links-divider index-unified-divider" aria-hidden="true"><span>★</span></div>
        </div>

        <div class="reviews-slider" data-reviews-slider data-autoplay="3000">
            <button class="reviews-nav reviews-nav-prev" type="button" aria-label="Previous review">&#10094;</button>
            <div class="reviews-viewport">
                <div class="reviews-track">
                <article class="review-card">
                    <div class="review-rating"><span class="review-stars">★★★★★</span><strong>9.4/10</strong></div>
                    <p>Clinical classes are practical and teachers explain each step clearly.</p>
                    <h4>Riya Kumari <small>ANM Student</small></h4>
                </article>
                <article class="review-card">
                    <div class="review-rating"><span class="review-stars">★★★★★</span><strong>9.1/10</strong></div>
                    <p>Lab facilities are clean and we get enough hands-on practice time.</p>
                    <h4>Neha Singh <small>GNM Student</small></h4>
                </article>
                <article class="review-card">
                    <div class="review-rating"><span class="review-stars">★★★★★</span><strong>8.9/10</strong></div>
                    <p>Faculty guidance for exams and viva is very supportive and focused.</p>
                    <h4>Shivani Das <small>B.Sc Nursing Student</small></h4>
                </article>
                <article class="review-card">
                    <div class="review-rating"><span class="review-stars">★★★★★</span><strong>9.3/10</strong></div>
                    <p>Hospital exposure is structured and builds confidence from early stages.</p>
                    <h4>Arjun Raj <small>Intern</small></h4>
                </article>
                <article class="review-card">
                    <div class="review-rating"><span class="review-stars">★★★★★</span><strong>8.8/10</strong></div>
                    <p>Library and reading area are peaceful and useful for regular study.</p>
                    <h4>Pooja Verma <small>2nd Year Student</small></h4>
                </article>
                <article class="review-card">
                    <div class="review-rating"><span class="review-stars">★★★★★</span><strong>9.0/10</strong></div>
                    <p>Campus discipline and student safety systems are managed well.</p>
                    <h4>Karan Patel <small>Parent Feedback</small></h4>
                </article>
                <article class="review-card">
                    <div class="review-rating"><span class="review-stars">★★★★★</span><strong>9.2/10</strong></div>
                    <p>Skill lab setup is updated and helps in realistic nursing simulation.</p>
                    <h4>Anjali Roy <small>Lab Coordinator</small></h4>
                </article>
                <article class="review-card">
                    <div class="review-rating"><span class="review-stars">★★★★★</span><strong>8.7/10</strong></div>
                    <p>Hostel environment is clean, quiet, and good for study routine.</p>
                    <h4>Megha Sinha <small>Hostel Resident</small></h4>
                </article>
                <article class="review-card">
                    <div class="review-rating"><span class="review-stars">★★★★★</span><strong>9.5/10</strong></div>
                    <p>Placement support team gives interview practice and career direction.</p>
                    <h4>Rahul Nandan <small>Final Year Student</small></h4>
                </article>
                <article class="review-card">
                    <div class="review-rating"><span class="review-stars">★★★★★</span><strong>9.0/10</strong></div>
                    <p>Overall college atmosphere is positive and focused on professional growth.</p>
                    <h4>Sneha Tiwari <small>Student Review</small></h4>
                </article>
                </div>
            </div>
            <button class="reviews-nav reviews-nav-next" type="button" aria-label="Next review">&#10095;</button>
        </div>
    </div>
</section>

<!-- Floating Side Contact Menu (Index Only) -->
<aside class="index-float-menu" id="indexFloatMenu" aria-label="Quick contact actions">
    <a class="index-float-link is-whatsapp" href="https://wa.me/919999999999" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
            <path d="M12.04 2a10 10 0 0 0-8.65 15.03L2 22l5.12-1.34A10 10 0 1 0 12.04 2Zm0 18.18a8.13 8.13 0 0 1-4.13-1.13l-.3-.18-3.04.8.81-2.96-.2-.31a8.15 8.15 0 1 1 6.86 3.78Zm4.46-6.03c-.24-.12-1.45-.72-1.67-.8-.22-.08-.38-.12-.54.12-.16.24-.62.8-.76.97-.14.16-.28.18-.52.06-.24-.12-1-.37-1.9-1.17-.7-.62-1.17-1.39-1.3-1.63-.14-.24-.01-.37.1-.49.1-.1.24-.26.36-.39.12-.14.16-.24.24-.4.08-.16.04-.3-.02-.42-.06-.12-.54-1.3-.74-1.78-.2-.48-.4-.4-.54-.41h-.46c-.16 0-.42.06-.64.3-.22.24-.84.82-.84 1.99s.86 2.3.98 2.46c.12.16 1.7 2.59 4.12 3.63 2.42 1.03 2.42.69 2.86.65.44-.04 1.45-.59 1.66-1.16.2-.56.2-1.04.14-1.14-.06-.1-.22-.16-.46-.28Z" />
        </svg>
    </a>
    <a class="index-float-link is-call" href="tel:+919999999999" aria-label="Call now">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
            <path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.02-.24c1.12.37 2.32.57 3.57.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.4 21 3 13.6 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.24 1.02l-2.2 2.2Z" />
        </svg>
    </a>
    <a class="index-float-link is-instagram" href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
            <path d="M7 2h10a5 5 0 0 1 5 5v10a5 5 0 0 1-5 5H7a5 5 0 0 1-5-5V7a5 5 0 0 1 5-5Zm0 2a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3H7Zm5 3.5a4.5 4.5 0 1 1 0 9 4.5 4.5 0 0 1 0-9Zm0 2a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Zm5-2.75a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5Z" />
        </svg>
    </a>
</aside>

<?php require_once 'includes/ai-chat-widget.php'; ?>

<?php require_once 'includes/footer.php'; ?>
