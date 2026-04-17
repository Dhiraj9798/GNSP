<?php require_once 'includes/header.php'; ?>

<section class="section enquiry-page" style="margin-top: 80px;" aria-label="Enquiry Form">
    <div class="container">
        <!-- Hero Pattern -->
        <div class="section-header text-center enquiry-header">
            <h2 class="section-title index-unified-title">Admission Enquiry</h2>
            <div class="quick-links-divider index-unified-divider" aria-hidden="true"><span>★</span></div>
            <p class="enquiry-lead">Have questions? We are here to help you with your admission process.</p>
        </div>

        <div class="enquiry-split-layout" style="display: flex; flex-wrap: wrap; gap: 40px; max-width: 1000px; margin: 40px auto 0; background: #ffffff; padding: 40px; border-radius: 16px; box-shadow: 0 14px 40px rgba(0,0,0,0.06);">
            
            <!-- Left: Contact Details -->
            <div class="enquiry-info" style="flex: 1; min-width: 300px; padding-right: 20px; border-right: 2px solid #f0f4f8;">
                <h3 style="color: var(--primary-color); font-family: 'Playfair Display', serif; font-size: 1.6rem; margin-bottom: 20px;">Contact Information</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 30px;">Reach out to our admission counselors for prompt assistance regarding eligibility, fee structures, or campus tours.</p>
                
                <div style="display: flex; align-items: flex-start; gap: 15px; margin-bottom: 25px;">
                    <div style="font-size: 1.5rem; background: rgba(0, 118, 214, 0.1); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">📍</div>
                    <div>
                        <h4 style="color: var(--primary-color); font-size: 1rem; margin-bottom: 5px;">Campus Address</h4>
                        <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5;">GNPS Campus, Sector 5, <br>Patna, Bihar 800001</p>
                    </div>
                </div>

                <div style="display: flex; align-items: flex-start; gap: 15px; margin-bottom: 25px;">
                    <div style="font-size: 1.5rem; background: rgba(0, 118, 214, 0.1); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">📞</div>
                    <div>
                        <h4 style="color: var(--primary-color); font-size: 1rem; margin-bottom: 5px;">Phone Number</h4>
                        <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5;">+91 98765 43210 <br>+91 98765 43211</p>
                    </div>
                </div>

                <div style="display: flex; align-items: flex-start; gap: 15px; margin-bottom: 25px;">
                    <div style="font-size: 1.5rem; background: rgba(0, 118, 214, 0.1); width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; border-radius: 50%;">✉️</div>
                    <div>
                        <h4 style="color: var(--primary-color); font-size: 1rem; margin-bottom: 5px;">Email Address</h4>
                        <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5;">admissions@gnps.edu.in</p>
                    </div>
                </div>
            </div>

            <!-- Right: Enquiry Form -->
            <div class="enquiry-form-container" style="flex: 2; min-width: 320px;">
                <h3 style="color: var(--primary-color); font-family: 'Playfair Display', serif; font-size: 1.6rem; margin-bottom: 20px;">Send a Message</h3>
                
                <form action="#" method="POST" class="enquiry-form" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <!-- Full Name -->
                    <div style="grid-column: 1 / -1; display: flex; flex-direction: column; gap: 8px;">
                        <label style="font-weight: 600; color: var(--primary-color); font-size: 0.9rem;">Full Name <span style="color:red">*</span></label>
                        <input type="text" name="full_name" placeholder="Enter your full name" required style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; font-size: 0.95rem; background: #f9fbff; outline: none;">
                    </div>

                    <!-- Contact Number -->
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <label style="font-weight: 600; color: var(--primary-color); font-size: 0.9rem;">Contact Number <span style="color:red">*</span></label>
                        <input type="tel" name="contact_number" placeholder="10-digit mobile number" required style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; font-size: 0.95rem; background: #f9fbff; outline: none;">
                    </div>

                    <!-- Email -->
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <label style="font-weight: 600; color: var(--primary-color); font-size: 0.9rem;">Email Address <span style="color:red">*</span></label>
                        <input type="email" name="email" placeholder="Your email address" required style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; font-size: 0.95rem; background: #f9fbff; outline: none;">
                    </div>

                    <!-- Subject -->
                    <div style="grid-column: 1 / -1; display: flex; flex-direction: column; gap: 8px;">
                        <label style="font-weight: 600; color: var(--primary-color); font-size: 0.9rem;">Subject <span style="color:red">*</span></label>
                        <select name="subject" required style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; font-size: 0.95rem; background: #f9fbff; outline: none; cursor: pointer;">
                            <option value="">Select Enquiry Type</option>
                            <option value="Admission Process">Admission Process</option>
                            <option value="Fee Structure">Fee Structure</option>
                            <option value="Campus Tour">Campus Tour</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- Message -->
                    <div style="grid-column: 1 / -1; display: flex; flex-direction: column; gap: 8px;">
                        <label style="font-weight: 600; color: var(--primary-color); font-size: 0.9rem;">Message <span style="color:red">*</span></label>
                        <textarea name="message" rows="4" placeholder="How can we assist you?" required style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; font-size: 0.95rem; background: #f9fbff; outline: none; resize: vertical;"></textarea>
                    </div>

                    <!-- Captcha & Submit -->
                    <div style="grid-column: 1 / -1; display: flex; align-items: flex-end; gap: 20px; flex-wrap: wrap;" class="captcha-wrapper">
                        <div style="flex: 1; min-width: 200px; display: flex; flex-direction: column; gap: 8px;">
                            <label style="font-weight: 600; color: var(--primary-color); font-size: 0.9rem; display: flex; align-items: center; justify-content: space-between;">
                                <span><span class="captcha-question">Solve Captcha: 5 + 7 = ?</span> <span style="color:red">*</span></span>
                                <span class="captcha-refresh" style="cursor: pointer; color: var(--secondary-color); font-size: 1.1rem; padding: 0 5px;" title="Refresh Captcha">🔄</span>
                            </label>
                            <input type="hidden" class="captcha-expected" name="captcha_expected" value="12">
                            <input type="number" class="captcha-input" name="captcha" placeholder="Enter answer" required style="width: 100%; padding: 12px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; font-size: 0.95rem; background: #f9fbff; outline: none;">
                        </div>
                        <div style="flex: 1; min-width: 200px;">
                            <button type="submit" class="btn-primary" style="padding: 14px 25px; border: none; border-radius: 8px; background: linear-gradient(135deg, var(--secondary-color), #005eb3); color: white; font-weight: 700; font-size: 1rem; cursor: pointer; transition: 0.3s; width: 100%; box-shadow: 0 4px 15px rgba(0, 118, 214, 0.28);">Send Enquiry</button>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>

<!-- Dynamic Captcha Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    function refreshCaptcha(wrapper) {
        let num1 = Math.floor(Math.random() * 10) + 1;
        let num2 = Math.floor(Math.random() * 10) + 1;
        wrapper.querySelector('.captcha-question').textContent = `Solve Captcha: ${num1} + ${num2} = ?`;
        wrapper.querySelector('.captcha-expected').value = num1 + num2;
        wrapper.querySelector('.captcha-input').value = "";
    }
    
    document.querySelectorAll('.captcha-refresh').forEach(btn => {
        let wrapper = btn.closest('.captcha-wrapper');
        refreshCaptcha(wrapper); // Auto initialize on load
        
        btn.addEventListener('click', function() {
            refreshCaptcha(wrapper);
            // small animation
            this.style.transform = "rotate(180deg)";
            this.style.transition = "transform 0.3s";
            setTimeout(() => {
                this.style.transform = "none";
                this.style.transition = "none";
            }, 300);
        });
    });

    // Simple validation before form submit
    document.querySelector('.enquiry-form').addEventListener('submit', function(e) {
        let wrapper = this.querySelector('.captcha-wrapper');
        let expected = parseInt(wrapper.querySelector('.captcha-expected').value);
        let given = parseInt(wrapper.querySelector('.captcha-input').value);
        if(expected !== given) {
            e.preventDefault();
            alert("Incorrect Captcha Answer. Please try again.");
            refreshCaptcha(wrapper);
        }
    });
});
</script>

<?php require_once 'includes/footer.php'; ?>
