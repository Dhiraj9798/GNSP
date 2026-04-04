<footer class="footer">
    <div class="custom-shape-divider-top">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0 C300,120 900,120 1200,0 V120 H0 V0 Z" class="shape-fill"></path>
        </svg>
    </div>
    <div class="container footer-grid">
        <div class="footer-brand">
            <div class="footer-brand-top">
                <a href="index.php" class="footer-logo-link" aria-label="GNPS Home">
                    <img src="assets/images/logo.png" alt="GNPS Logo" class="footer-logo">
                </a>
                <h3>Gurudeo Nursing and<br>Paramedical Science</h3>
            </div>
            <p>Elevating healthcare through premier education. Join us to build a brighter future in nursing and paramedical sciences.</p>
        </div>
        
        <div class="footer-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
        
        <div class="footer-courses">
            <h4>Our Courses</h4>
            <ul>
                <li><a href="anm.php">A.N.M</a></li>
                <li><a href="gnm.php">G.N.M</a></li>
                <li><a href="bsc_nursing.php">B.Sc Nursing</a></li>
            </ul>
        </div>

        <div class="footer-contact">
            <h4>Contact Info</h4>
            <div class="contact-item">
                <strong>Address:</strong>
                <p>Sandalpur (Bazar Samiti),<br>P.O.- Mahendru, P.S. - Bahadurpur,<br>Patna - 800006 (Bihar)</p>
            </div>
            <div class="contact-item">
                <strong>Email:</strong>
                <p><a href="mailto:gurudeocollegeofnursing@gmail.com">gurudeocollegeofnursing@gmail.com</a></p>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom" style="display: flex; justify-content: space-between; flex-wrap: wrap; align-items: center; padding: 10px 20px;">
        <p style="margin:0;">&copy; <?php echo date('Y'); ?> Gurudeo Nursing and Paramedical Science. All Rights Reserved.</p>
        <p style="margin:0; font-size: 0.9rem;">Developed by <a href="https://bnintelhub.com/" target="_blank" rel="noopener noreferrer" style="color: var(--accent-color); font-weight: bold;">BNIntelHub</a></p>
    </div>

    <!-- Fixed Bottom Marquee Notification -->
</footer>

<!-- External Libraries (GSAP, Three.js) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<!-- Custom Scripts -->
<script src="assets/js/main.js"></script>
<?php if (basename($_SERVER['PHP_SELF']) === 'index.php'): ?>
<script src="assets/js/chatbot.js"></script>
<?php endif; ?>
<script src="assets/js/webgl.js"></script>
<script src="assets/js/animations.js"></script>

</body>
</html>
