<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$isHome = $currentPage === 'index.php';
$isAbout = in_array($currentPage, ['about.php', 'director.php', 'our-story.php'], true);
$isCourses = in_array($currentPage, ['anm.php', 'gnm.php', 'bsc_nursing.php'], true);
$isAcademic = in_array($currentPage, ['academic.php', 'faculty.php', 'result.php'], true);
$isAdmission = in_array($currentPage, ['admission.php', 'admission-procedure.php', 'admission-form.php', 'enquiry-form.php', 'apply-online.php', 'eligibility.php'], true);
$isAffiliation = in_array($currentPage, ['affiliation.php', 'bnrc-affiliation.php', 'inc-affiliation.php'], true);
$isGallery = in_array($currentPage, ['gallery.php', 'photo-gallery.php', 'video-gallery.php'], true);
$isTraining = in_array($currentPage, ['training.php', 'hospital-training.php', 'clinical-training.php'], true);
$isPlacement = in_array($currentPage, ['placement.php', 'placement-cell.php', 'our-recruiters.php'], true);
$isFacilities = in_array($currentPage, ['facilities.php', 'campus-facilities.php'], true);
$isContact = $currentPage === 'contact.php';
$isLogin = $currentPage === 'login.php';
$isRegister = $currentPage === 'registration.php';
$isAuth = $isLogin || $isRegister;
$isStudentDashboard = $currentPage === 'student-dashboard.php';

$pageTitleMap = [
    'about.php' => 'About Us',
    'director.php' => 'Director Message',
    'our-story.php' => 'Our Story',
    'anm.php' => 'ANM',
    'gnm.php' => 'GNM',
    'bsc_nursing.php' => 'B.Sc Nursing',
    'academic.php' => 'Academic',
    'faculty.php' => 'Faculty List',
    'result.php' => 'Result',
    'admission.php' => 'Admission',
    'admission-procedure.php' => 'Admission Procedure',
    'admission-form.php' => 'Admission Form',
    'enquiry-form.php' => 'Enquiry Form',
    'apply-online.php' => 'Apply Online',
    'eligibility.php' => 'Eligibility',
    'affiliation.php' => 'Affiliation',
    'bnrc-affiliation.php' => 'BNRC Affiliation',
    'inc-affiliation.php' => 'INC Affiliation',
    'gallery.php' => 'Gallery',
    'photo-gallery.php' => 'Photo Gallery',
    'video-gallery.php' => 'Video Gallery',
    'training.php' => 'Training',
    'hospital-training.php' => 'Hospital Training',
    'clinical-training.php' => 'Clinical Practice',
    'placement.php' => 'Placement',
    'placement-cell.php' => 'Placement Cell',
    'our-recruiters.php' => 'Our Recruiters',
    'facilities.php' => 'Facilities',
    'campus-facilities.php' => 'Campus Facilities',
    'contact.php' => 'Contact Us',
    'exam.php' => 'Exam',
    'scholarship.php' => 'Scholarship',
    'registration.php' => 'Registration',
    'login.php' => 'Student Login',
    'student-dashboard.php' => 'Student Dashboard',
];

$pageParent = '';
if ($isAbout) {
    $pageParent = 'About';
} elseif ($isCourses) {
    $pageParent = 'Courses';
} elseif ($isAcademic) {
    $pageParent = 'Academic';
} elseif ($isAdmission) {
    $pageParent = 'Admission';
} elseif ($isAffiliation) {
    $pageParent = 'Affiliation';
} elseif ($isGallery) {
    $pageParent = 'Gallery';
} elseif ($isTraining) {
    $pageParent = 'Training';
} elseif ($isPlacement) {
    $pageParent = 'Placement';
} elseif ($isFacilities) {
    $pageParent = 'Facilities';
}

$currentPageTitle = $pageTitleMap[$currentPage] ?? ucwords(str_replace(['-', '_', '.php'], [' ', ' ', ''], $currentPage));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GNPS | Gurudeo Nursing and Paramedical Science</title>
    <link rel="icon" type="image/png" href="assets/images/logo.png">
    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/animations.css">
    <?php if ($isStudentDashboard): ?>
    <link rel="stylesheet" href="assets/css/student-dashboard.css">
    <?php endif; ?>
    <?php if ($isAuth): ?>
    <link rel="stylesheet" href="assets/css/student-auth.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <?php endif; ?>
    <?php if ($isHome): ?>
    <link rel="stylesheet" href="assets/css/chatbot.css">
    <?php endif; ?>
</head>

<body>

    <header id="main-header" class="main-header">
        <!-- Branding Area with Logo Side Cut (Full Width) -->
        <div class="brand-area">
            <div class="brand-logo-wrapper">
                <div class="logo-slant-accent"></div>
                <div class="logo-slant-bg"></div>
                <!-- Adding a mask exact same size as the cut so it hides logo on right side -->
                <div class="logo-mask">
                    <a href="index.php" class="logo-link">
                        <img src="assets/images/logo.png" alt="GNPS Logo" id="site-logo">
                    </a>
                </div>
            </div>
            
            <div class="brand-content-wrapper">
                <div class="brand-text">
                    <h1>GURUDEO NURSING & PARAMEDICAL SCIENCE</h1>
                    <p class="brand-sub">Sandalpur, Patna - Bihar's Premier Medical Education Institute</p>
                </div>
                
                <div class="brand-actions">
                    <a href="registration.php" class="top-btn btn-red">📝 Online Registration</a>
                    <a href="scholarship.php" class="top-btn btn-grey">🎓 Scholarship</a>
                    <a href="exam.php" class="top-btn btn-red">💻 Online Exam</a>
                    <a href="login.php" class="top-btn btn-red">👤 Student Login</a>
                </div>
            </div>
        </div>
        
        <!-- Scrolling Notification Ribbon (Header Extension) -->
        <div class="header-marquee-wrapper">
            <div class="marquee-content">
                <span class="marquee-text">🚨 ADMISSION OPEN FOR SESSION 2026-27 | APPLY NOW FAST FOR A.N.M, G.N.M & B.SC NURSING | LIMITED SEATS AVAILABLE! 🚨 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <span class="marquee-text">🚨 ADMISSION OPEN FOR SESSION 2026-27 | APPLY NOW FAST FOR A.N.M, G.N.M & B.SC NURSING | LIMITED SEATS AVAILABLE! 🚨 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>
        </div>

        <!-- Sticky Navigation Menu -->
        <div class="navbar-wrapper" id="navbar">
            <div class="container nav-container">
                <nav class="main-nav">
                    
                    <!-- 3D Sliding Logo (Visible only when sticky) -->
                    <div class="sticky-logo-wrapper">
                        <a href="index.php" class="sticky-logo-link" aria-label="Go to home page">
                            <img src="assets/images/logo.png" alt="GNPS Small Logo">
                        </a>
                    </div>

                    <!-- Mobile Button -->
                    <div class="mobile-menu-btn" id="mobileMenuBtn">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>

                    <ul class="nav-menu" id="navMenu">
                        <li class="<?php echo $isHome ? 'active' : ''; ?>">
                            <a href="index.php">HOME</a>
                        </li>
                        <li class="dropdown<?php echo $isAbout ? ' active' : ''; ?>">
                            <a href="#" aria-haspopup="true" aria-expanded="<?php echo $isAbout ? 'true' : 'false'; ?>">ABOUT <span class="caret">&#9662;</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="<?php echo $currentPage === 'about.php' ? 'is-active' : ''; ?>" href="about.php">About Us</a></li>
                                <li><a class="<?php echo $currentPage === 'director.php' ? 'is-active' : ''; ?>" href="director.php">Director Message</a></li>
                                <li><a class="<?php echo $currentPage === 'our-story.php' ? 'is-active' : ''; ?>" href="our-story.php">Our Story</a></li>
                            </ul>
                        </li>
                        <li class="dropdown<?php echo $isCourses ? ' active' : ''; ?>">
                            <a href="#" aria-haspopup="true" aria-expanded="<?php echo $isCourses ? 'true' : 'false'; ?>">COURSES <span class="caret">&#9662;</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="<?php echo $currentPage === 'anm.php' ? 'is-active' : ''; ?>" href="anm.php">A.N.M</a></li>
                                <li><a class="<?php echo $currentPage === 'gnm.php' ? 'is-active' : ''; ?>" href="gnm.php">G.N.M</a></li>
                                <li><a class="<?php echo $currentPage === 'bsc_nursing.php' ? 'is-active' : ''; ?>" href="bsc_nursing.php">B.Sc Nursing</a></li>
                            </ul>
                        </li>
                        <li class="dropdown<?php echo $isAcademic ? ' active' : ''; ?>">
                            <a href="#" aria-haspopup="true" aria-expanded="<?php echo $isAcademic ? 'true' : 'false'; ?>">ACADEMIC <span class="caret">&#9662;</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="<?php echo $currentPage === 'faculty.php' ? 'is-active' : ''; ?>" href="faculty.php">Faculty List</a></li>
                                <li><a class="<?php echo $currentPage === 'result.php' ? 'is-active' : ''; ?>" href="result.php">Result</a></li>
                            </ul>
                        </li>
                        <li class="dropdown<?php echo $isAdmission ? ' active' : ''; ?>">
                            <a href="#" aria-haspopup="true" aria-expanded="<?php echo $isAdmission ? 'true' : 'false'; ?>">ADMISSION <span class="caret">&#9662;</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="<?php echo $currentPage === 'admission.php' ? 'is-active' : ''; ?>" href="admission.php">Admission</a></li>
                                <li><a class="<?php echo $currentPage === 'admission-procedure.php' ? 'is-active' : ''; ?>" href="admission-procedure.php">Admission Procedure</a></li>
                                <li><a class="<?php echo $currentPage === 'admission-form.php' ? 'is-active' : ''; ?>" href="admission-form.php">Admission Form</a></li>
                                <li><a class="<?php echo $currentPage === 'enquiry-form.php' ? 'is-active' : ''; ?>" href="enquiry-form.php">Enquiry Form</a></li>
                                <li><a class="<?php echo $currentPage === 'apply-online.php' ? 'is-active' : ''; ?>" href="apply-online.php">Apply Online</a></li>
                                <li><a class="<?php echo $currentPage === 'eligibility.php' ? 'is-active' : ''; ?>" href="eligibility.php">Eligibility</a></li>
                            </ul>
                        </li>
                        <li class="dropdown<?php echo $isAffiliation ? ' active' : ''; ?>">
                            <a href="#" aria-haspopup="true" aria-expanded="<?php echo $isAffiliation ? 'true' : 'false'; ?>">AFFILIATION <span class="caret">&#9662;</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="<?php echo $currentPage === 'bnrc-affiliation.php' ? 'is-active' : ''; ?>" href="bnrc-affiliation.php">BNRC Affiliation</a></li>
                                <li><a class="<?php echo $currentPage === 'inc-affiliation.php' ? 'is-active' : ''; ?>" href="inc-affiliation.php">INC Affiliation</a></li>
                            </ul>
                        </li>
                        <li class="dropdown<?php echo $isGallery ? ' active' : ''; ?>">
                            <a href="#" aria-haspopup="true" aria-expanded="<?php echo $isGallery ? 'true' : 'false'; ?>">GALLERY <span class="caret">&#9662;</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="<?php echo $currentPage === 'photo-gallery.php' ? 'is-active' : ''; ?>" href="photo-gallery.php">Photo Gallery</a></li>
                                <li><a class="<?php echo $currentPage === 'video-gallery.php' ? 'is-active' : ''; ?>" href="video-gallery.php">Video Gallery</a></li>
                            </ul>
                        </li>
                        <li class="dropdown<?php echo $isTraining ? ' active' : ''; ?>">
                            <a href="#" aria-haspopup="true" aria-expanded="<?php echo $isTraining ? 'true' : 'false'; ?>">TRAINING <span class="caret">&#9662;</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="<?php echo $currentPage === 'hospital-training.php' ? 'is-active' : ''; ?>" href="hospital-training.php">Hospital Training</a></li>
                                <li><a class="<?php echo $currentPage === 'clinical-training.php' ? 'is-active' : ''; ?>" href="clinical-training.php">Clinical Practice</a></li>
                            </ul>
                        </li>
                        <li class="dropdown<?php echo $isPlacement ? ' active' : ''; ?>">
                            <a href="#" aria-haspopup="true" aria-expanded="<?php echo $isPlacement ? 'true' : 'false'; ?>">PLACEMENT <span class="caret">&#9662;</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="<?php echo $currentPage === 'placement-cell.php' ? 'is-active' : ''; ?>" href="placement-cell.php">Placement Cell</a></li>
                                <li><a class="<?php echo $currentPage === 'our-recruiters.php' ? 'is-active' : ''; ?>" href="our-recruiters.php">Our Recruiters</a></li>
                            </ul>
                        </li>
                        <li class="dropdown<?php echo $isFacilities ? ' active' : ''; ?>">
                            <a href="#" aria-haspopup="true" aria-expanded="<?php echo $isFacilities ? 'true' : 'false'; ?>">FACILITIES <span class="caret">&#9662;</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="<?php echo $currentPage === 'campus-facilities.php' ? 'is-active' : ''; ?>" href="campus-facilities.php">Campus Facilities</a></li>
                            </ul>
                        </li>
                        <li class="<?php echo $isContact ? 'active' : ''; ?>"><a href="contact.php">CONTACT US</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <?php if (!$isHome): ?>
    <section class="page-hero-simple" aria-label="Breadcrumb">
        <div class="container">
            <nav class="page-breadcrumb">
                <a href="index.php">Home</a>
                <?php if ($pageParent !== ''): ?>
                    <span class="sep">&gt;</span>
                    <span class="crumb-parent"><?php echo htmlspecialchars($pageParent, ENT_QUOTES, 'UTF-8'); ?></span>
                <?php endif; ?>
                <span class="sep">&gt;</span>
                <span class="crumb-current"><?php echo htmlspecialchars($currentPageTitle, ENT_QUOTES, 'UTF-8'); ?></span>
            </nav>
        </div>
    </section>
    <?php endif; ?>