<?php require_once 'includes/header.php'; ?>

<section class="section contact-page" style="margin-top: 80px;">
    <div class="container">
        <div class="section-header text-center contact-page-header">
            <h2 class="section-title index-unified-title">Get In Touch</h2>
            <div class="quick-links-divider index-unified-divider" aria-hidden="true"><span>★</span></div>
            <p class="contact-page-lead">Share your query and our admissions team will connect with you shortly.</p>
        </div>

        <div class="contact-grid">
            <article class="contact-form-card">
                <h3>Send Us A Message</h3>
                <p>Fill this quick form for admission guidance, fee details, or campus visit support.</p>

                <form class="contact-form" action="#" method="post">
                    <div class="contact-form-row">
                        <div class="contact-field">
                            <label for="contactName">Full Name</label>
                            <input id="contactName" name="name" type="text" placeholder="Enter your full name" required>
                        </div>
                        <div class="contact-field">
                            <label for="contactPhone">Phone Number</label>
                            <input id="contactPhone" name="phone" type="tel" placeholder="Enter phone number" required>
                        </div>
                    </div>

                    <div class="contact-form-row">
                        <div class="contact-field">
                            <label for="contactEmail">Email Address</label>
                            <input id="contactEmail" name="email" type="email" placeholder="Enter email address" required>
                        </div>
                        <div class="contact-field">
                            <label for="contactSubject">Subject</label>
                            <input id="contactSubject" name="subject" type="text" placeholder="Admission / Course / Other" required>
                        </div>
                    </div>

                    <div class="contact-field">
                        <label for="contactMessage">Your Message</label>
                        <textarea id="contactMessage" name="message" rows="5" placeholder="Write your message" required></textarea>
                    </div>

                    <button type="submit" class="contact-submit-btn">Submit Enquiry</button>
                </form>
            </article>

            <aside class="contact-side-card">
                <h3>Why Contact GNPS?</h3>
                <ul>
                    <li>Course counseling with eligibility clarification.</li>
                    <li>Fast response for admission and document support.</li>
                    <li>Campus visit assistance and faculty interaction slots.</li>
                </ul>

                <div class="contact-side-meta">
                    <h4>Support Hours</h4>
                    <p>Monday - Saturday</p>
                    <strong>09:00 AM - 05:00 PM</strong>
                </div>
            </aside>
        </div>

        <div class="contact-mini-cards">
            <article class="contact-mini-card">
                <span>📍</span>
                <h4>Address</h4>
                <p>
                    Sandalpur (Bazar Samiti),<br>
                    P.O.- Mahendru, P.S. - Bahadurpur,<br>
                    Patna - 800006 (Bihar)
                </p>
            </article>
            <article class="contact-mini-card">
                <span>📞</span>
                <h4>Call Us</h4>
                <p><a href="tel:+919999999999">+91 99999 99999</a></p>
            </article>
            <article class="contact-mini-card">
                <span>✉️</span>
                <h4>Email</h4>
                <p><a href="mailto:gurudeocollegeofnursing@gmail.com">gurudeocollegeofnursing@gmail.com</a></p>
            </article>
        </div>

        <article class="contact-map-card">
            <div class="contact-map-head">
                <h3>Find Us On Map</h3>
                <p>Visit our campus location for direct counselling and admission assistance.</p>
            </div>
            <div class="contact-map-wrap">
                <iframe
                    title="GNPS Campus Location"
                    src="https://www.google.com/maps?q=Sandalpur+Bazar+Samiti+Mahendru+Bahadurpur+Patna+800006+Bihar&output=embed"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe>
            </div>
        </article>

        <div class="contact-trust-strip">
            <p>Trusted by aspiring healthcare professionals with practical training, mentorship, and placement-focused guidance.</p>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
