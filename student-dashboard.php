<?php require_once 'includes/header.php'; ?>

<section class="student-dashboard-page" aria-label="Student dashboard">
    <div class="container">
        <div class="dashboard-shell">

            <!-- Premium Welcome Header -->
            <div class="dash-welcome-header">
                <div class="dash-welcome-left">
                    <div class="dash-avatar" id="headerInitials">S</div>
                    <div>
                        <span class="dash-badge">● Online</span>
                        <h1 class="dash-student-name">Welcome, <span id="headerName">Student</span></h1>
                        <p class="dash-meta">
                            <span id="headerIDContainer" style="display:none;">Application ID: <strong id="headerID">#PENDING</strong> &nbsp;|&nbsp;</span>
                            Course: <strong id="headerCourse">Not Selected</strong> &nbsp;|&nbsp; 
                            Session: <strong id="headerSession">N/A</strong>
                        </p>
                    </div>
                </div>
                <div class="dash-welcome-right">
                    <a href="login.php" class="dash-logout-btn">Logout <span>🚪</span></a>
                </div>
            </div>

            <!-- Step Progress Bar -->
            <div class="step-progress-bar">
                <div class="step-item active" data-step="1">
                    <div class="step-circle">1</div>
                    <p class="step-label">Personal Details</p>
                </div>
                <div class="step-line"></div>
                <div class="step-item" data-step="2">
                    <div class="step-circle">2</div>
                    <p class="step-label">Education & Documents</p>
                </div>
                <div class="step-line"></div>
                <div class="step-item" data-step="3">
                    <div class="step-circle">3</div>
                    <p class="step-label">Declaration & Submit</p>
                </div>
            </div>

            <!-- ==================== STEP 1: Personal Details ==================== -->
            <div class="step-panel active" id="step-1">
                <div class="panel-header">
                    <h2>📋 Personal Information</h2>
                    <p>Please fill in your personal details accurately. Fields marked with <em>*</em> are mandatory.</p>
                </div>

                <div class="dash-form-grid">
                    <label class="dash-field">
                        <span>Full Name <em>*</em></span>
                        <input type="text" name="student_name" placeholder="Enter your full name">
                    </label>
                    <label class="dash-field">
                        <span>Father's Name <em>*</em></span>
                        <input type="text" name="father_name" placeholder="Enter father's name">
                    </label>
                    <label class="dash-field">
                        <span>Mother's Name <em>*</em></span>
                        <input type="text" name="mother_name" placeholder="Enter mother's name">
                    </label>
                    <label class="dash-field">
                        <span>Date of Birth <em>*</em></span>
                        <input type="date" name="dob">
                    </label>
                    <label class="dash-field">
                        <span>Gender <em>*</em></span>
                        <select name="gender">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </label>
                    <label class="dash-field">
                        <span>Religion <em>*</em></span>
                        <select name="religion">
                            <option value="">Select Religion</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Muslim">Muslim</option>
                            <option value="Sikh">Sikh</option>
                            <option value="Christian">Christian</option>
                            <option value="Other">Other</option>
                        </select>
                    </label>
                    <label class="dash-field">
                        <span>Category <em>*</em></span>
                        <select name="category">
                            <option value="">Select Category</option>
                            <option value="General">General</option>
                            <option value="OBC">OBC</option>
                            <option value="SC">SC</option>
                            <option value="ST">ST</option>
                            <option value="EWS">EWS</option>
                        </select>
                    </label>
                    <label class="dash-field">
                        <span>Caste</span>
                        <input type="text" name="caste" placeholder="Enter caste (optional)">
                    </label>
                    <label class="dash-field">
                        <span>Nationality <em>*</em></span>
                        <select name="nationality">
                            <option value="">Select</option>
                            <option value="Indian" selected>Indian</option>
                        </select>
                    </label>
                    <label class="dash-field">
                        <span>Rural / Urban <em>*</em></span>
                        <select name="rural_urban">
                            <option value="">Select Area Type</option>
                            <option value="Rural">Rural</option>
                            <option value="Urban">Urban</option>
                        </select>
                    </label>
                    <label class="dash-field">
                        <span>Physically Handicapped? <em>*</em></span>
                        <select name="is_physical_handicap">
                            <option value="">Select</option>
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                        </select>
                    </label>
                    <label class="dash-field">
                        <span>Aadhaar Number <em>*</em></span>
                        <input type="text" name="aadhar_number" placeholder="12-digit Aadhaar number">
                    </label>
                    <label class="dash-field">
                        <span>Contact Number <em>*</em></span>
                        <input type="tel" name="contact_number" placeholder="10-digit mobile number">
                    </label>
                    <label class="dash-field">
                        <span>Parent's Contact <em>*</em></span>
                        <input type="tel" name="parent_contact_number" placeholder="Parent/Guardian mobile">
                    </label>
                    <label class="dash-field full-width">
                        <span>Permanent Address <em>*</em></span>
                        <textarea name="permanent_address" rows="3" placeholder="Enter full address"></textarea>
                    </label>
                    <label class="dash-field">
                        <span>State <em>*</em></span>
                        <input type="text" name="state" placeholder="e.g. Bihar">
                    </label>
                    <label class="dash-field">
                        <span>City <em>*</em></span>
                        <input type="text" name="city" placeholder="e.g. Patna">
                    </label>
                    <label class="dash-field">
                        <span>Pin Code <em>*</em></span>
                        <input type="text" name="pin_code" placeholder="6-digit pin code">
                    </label>
                </div>

                <div class="step-actions">
                    <div></div>
                    <button type="button" class="step-btn next-btn" onclick="goToStep(2)">Save & Continue →</button>
                </div>
            </div>

            <!-- ==================== STEP 2: Education & Documents ==================== -->
            <div class="step-panel" id="step-2">
                <div class="panel-header">
                    <h2>🎓 Educational Details & Documents</h2>
                    <p>Provide your academic records and upload required documents.</p>
                </div>

                <!-- Course & Migration -->
                <div class="panel-sub-section">
                    <h3>Course & Session Details</h3>
                    <div class="dash-form-grid">
                        <label class="dash-field">
                            <span>Course Applied <em>*</em></span>
                            <select name="course_applied">
                                <option value="">Select Course</option>
                                <option value="ANM">A.N.M</option>
                                <option value="GNM">G.N.M</option>
                                <option value="BSc Nursing">B.Sc Nursing</option>
                            </select>
                        </label>
                        <label class="dash-field">
                            <span>Admission Year <em>*</em></span>
                            <input type="text" name="admission_year" placeholder="e.g. 2026">
                        </label>
                        <label class="dash-field">
                            <span>Session <em>*</em></span>
                            <input type="text" name="session" placeholder="e.g. 2026-2027">
                        </label>
                        <label class="dash-field">
                            <span>College Roll No <em>*</em></span>
                            <input type="text" name="college_roll_number" placeholder="Assigned by college">
                        </label>
                        <label class="dash-field">
                            <span>Migration Date <em>*</em></span>
                            <input type="date" name="migration_date">
                        </label>
                        <label class="dash-field">
                            <span>Migration Certificate No. <em>*</em></span>
                            <input type="text" name="migration_certificate_number">
                        </label>
                    </div>
                </div>

                <!-- Academic Marks Table -->
                <div class="panel-sub-section">
                    <h3>Academic Marks Record</h3>
                    <div class="dash-table-wrap">
                        <table class="dash-edu-table">
                            <thead>
                                <tr>
                                    <th>Exam</th>
                                    <th>Subject</th>
                                    <th>Passing Year</th>
                                    <th>Percentage</th>
                                    <th>Board</th>
                                    <th>Total Marks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Exam"><input type="text" name="qualification_1" placeholder="e.g. 10th"></td>
                                    <td data-label="Subject"><input type="text" name="subject_1"></td>
                                    <td data-label="Year"><input type="text" name="passing_year_1"></td>
                                    <td data-label="%"><input type="text" name="percentage_1"></td>
                                    <td data-label="Board"><input type="text" name="board_1"></td>
                                    <td data-label="Total"><input type="text" name="total_1"></td>
                                </tr>
                                <tr>
                                    <td data-label="Exam"><input type="text" name="qualification_2" placeholder="e.g. 12th"></td>
                                    <td data-label="Subject"><input type="text" name="subject_2"></td>
                                    <td data-label="Year"><input type="text" name="passing_year_2"></td>
                                    <td data-label="%"><input type="text" name="percentage_2"></td>
                                    <td data-label="Board"><input type="text" name="board_2"></td>
                                    <td data-label="Total"><input type="text" name="total_2"></td>
                                </tr>
                                <tr>
                                    <td data-label="Exam"><input type="text" name="qualification_3" placeholder="e.g. Graduation"></td>
                                    <td data-label="Subject"><input type="text" name="subject_3"></td>
                                    <td data-label="Year"><input type="text" name="passing_year_3"></td>
                                    <td data-label="%"><input type="text" name="percentage_3"></td>
                                    <td data-label="Board"><input type="text" name="board_3"></td>
                                    <td data-label="Total"><input type="text" name="total_3"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Document Uploads -->
                <div class="panel-sub-section">
                    <h3>Upload Documents</h3>
                    <p class="upload-note">Only image files (JPG, PNG) accepted. Max 2MB per file.</p>
                    <div class="dash-upload-grid">
                        <div class="upload-card">
                            <span class="upload-icon">📄</span>
                            <p>10th Marksheet <em>*</em></p>
                            <input type="file" name="doc_10th_marksheet" accept="image/*">
                        </div>
                        <div class="upload-card">
                            <span class="upload-icon">📄</span>
                            <p>12th Marksheet <em>*</em></p>
                            <input type="file" name="doc_12th_marksheet" accept="image/*">
                        </div>
                        <div class="upload-card">
                            <span class="upload-icon">📄</span>
                            <p>12th Certificate <em>*</em></p>
                            <input type="file" name="doc_12th_certificate" accept="image/*">
                        </div>
                        <div class="upload-card">
                            <span class="upload-icon">📄</span>
                            <p>Migration Certificate <em>*</em></p>
                            <input type="file" name="doc_migration_intermediate" accept="image/*">
                        </div>
                        <div class="upload-card">
                            <span class="upload-icon">📄</span>
                            <p>Caste Certificate <em>*</em></p>
                            <input type="file" name="doc_caste_certificate" accept="image/*">
                        </div>
                        <div class="upload-card">
                            <span class="upload-icon">📸</span>
                            <p>Passport Photo <em>*</em></p>
                            <input type="file" name="doc_photo" accept="image/*">
                        </div>
                        <div class="upload-card">
                            <span class="upload-icon">✍️</span>
                            <p>Signature <em>*</em></p>
                            <input type="file" name="doc_signature" accept="image/*">
                        </div>
                        <div class="upload-card">
                            <span class="upload-icon">♿</span>
                            <p>PH Certificate</p>
                            <input type="file" name="doc_handicap_certificate" accept="image/*">
                        </div>
                    </div>
                </div>

                <div class="step-actions">
                    <button type="button" class="step-btn prev-btn" onclick="goToStep(1)">← Back</button>
                    <button type="button" class="step-btn next-btn" onclick="goToStep(3)">Save & Continue →</button>
                </div>
            </div>

            <!-- ==================== STEP 3: Declaration & Submit ==================== -->
            <div class="step-panel" id="step-3">
                <div class="panel-header">
                    <h2>✅ Declaration & Final Submission</h2>
                    <p>Review the declaration carefully and submit your application.</p>
                </div>

                <!-- Application Summary -->
                <div class="panel-sub-section summary-box">
                    <h3>📊 Application Summary</h3>
                    <div class="summary-grid">
                        <div class="summary-item">
                            <span class="summary-label">Application ID</span>
                            <span class="summary-value">#GNPS-2026-X89</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Course Applied</span>
                            <span class="summary-value">B.Sc Nursing</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Session</span>
                            <span class="summary-value">2026-2027</span>
                        </div>
                        <div class="summary-item">
                            <span class="summary-label">Status</span>
                            <span class="summary-value status-pending">⏳ Pending Verification</span>
                        </div>
                    </div>
                </div>

                <!-- Declaration -->
                <div class="panel-sub-section declaration-box">
                    <h3>📜 Student Declaration</h3>
                    <ol class="declaration-list">
                        <li>I shall obey the Rules & Regulations of the Institute and the Institute Mess.</li>
                        <li>I shall not take part in any subversive activities including ragging in any form in the Institute Campus or the Institute Mess or anywhere at Durgapur or outside anytime during my stay at the Institute.</li>
                        <li>If I involve myself in any type of subversive activities, the Institute Authority alone or in consultation with local Administration may take any type of disciplinary action as per prevailing Rules & Regulations of the College.</li>
                        <li>I also agree to pay College Installment / Hostel fees in time. If I fail to pay the Hostel fees / Installment for consistently two months / two Installments I shall be liable to be struck off from the College roll.</li>
                        <li>All the information furnished here are true to the best of my knowledge and belief.</li>
                    </ol>

                    <label class="agree-checkbox">
                        <input type="checkbox" name="agree_terms" id="agreeTerms">
                        <span>I agree with all the above terms & conditions. <em>*</em></span>
                    </label>
                </div>

                <!-- Captcha -->
                <div class="panel-sub-section captcha-wrapper">
                    <h3>🔒 Security Verification</h3>
                    <div class="dash-captcha-row">
                        <div class="captcha-question-box">
                            <span class="captcha-question">Solve: 5 + 3 = ?</span>
                            <span class="captcha-refresh" title="Refresh Captcha">🔄</span>
                        </div>
                        <input type="hidden" class="captcha-expected" name="captcha_expected" value="8">
                        <input type="number" class="captcha-input" name="captcha_answer" placeholder="Your answer">
                    </div>
                </div>

                <div class="step-actions">
                    <button type="button" class="step-btn prev-btn" onclick="goToStep(2)">← Back</button>
                    <button type="submit" class="step-btn submit-btn" id="finalSubmitBtn" disabled>🎓 Submit Application</button>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Dashboard Step Navigation + Dynamic Header Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {

    // ========== DYNAMIC HEADER LOGIC ==========
    const nameInput = document.querySelector('input[name="student_name"]');
    const headerName = document.getElementById('headerName');
    const headerInitials = document.getElementById('headerInitials');
    
    const courseSelect = document.querySelector('select[name="course_applied"]');
    const headerCourse = document.getElementById('headerCourse');
    
    const sessionInput = document.querySelector('input[name="session"]');
    const headerSession = document.getElementById('headerSession');

    const headerIDContainer = document.getElementById('headerIDContainer');
    const headerID = document.getElementById('headerID');

    // Update Name & Initials
    nameInput.addEventListener('input', function() {
        const val = this.value.trim();
        headerName.textContent = val !== "" ? val : "Student";
        
        if(val !== "") {
            const parts = val.split(' ');
            let initials = parts[0].substring(0,1).toUpperCase();
            if(parts.length > 1) initials += parts[parts.length - 1].substring(0,1).toUpperCase();
            headerInitials.textContent = initials;
        } else {
            headerInitials.textContent = "S";
        }
    });

    // Update Course
    courseSelect.addEventListener('change', function() {
        headerCourse.textContent = this.value !== "" ? this.options[this.selectedIndex].text : "Not Selected";
    });

    // Update Session
    sessionInput.addEventListener('input', function() {
        headerSession.textContent = this.value.trim() !== "" ? this.value : "N/A";
    });

    // ========== STEP NAVIGATION ==========
    window.goToStep = function(stepNum) {
        // Validation check for Step 1 removed for Demo
        if (stepNum === 2) {
            // "Generate" ID if not already shown
            if (headerID.textContent === "#PENDING") {
                headerID.textContent = "#GNPS-" + (new Date().getFullYear()) + "-X" + Math.floor(1000 + Math.random() * 9000);
                headerIDContainer.style.display = 'inline-block';
            }
        }

        // Hide all panels
        document.querySelectorAll('.step-panel').forEach(p => p.classList.remove('active'));
        // Show target
        document.getElementById('step-' + stepNum).classList.add('active');

        // Update progress bar
        document.querySelectorAll('.step-item').forEach(item => {
            let s = parseInt(item.dataset.step);
            item.classList.remove('active', 'completed');
            if (s < stepNum) item.classList.add('completed');
            if (s === stepNum) item.classList.add('active');
        });

        // Update step lines
        document.querySelectorAll('.step-line').forEach((line, idx) => {
            line.classList.toggle('completed', idx < stepNum - 1);
        });

        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    // ========== CAPTCHA ==========
    function refreshCaptcha(wrapper) {
        let n1 = Math.floor(Math.random() * 10) + 1;
        let n2 = Math.floor(Math.random() * 10) + 1;
        wrapper.querySelector('.captcha-question').textContent = `Solve: ${n1} + ${n2} = ?`;
        wrapper.querySelector('.captcha-expected').value = n1 + n2;
        wrapper.querySelector('.captcha-input').value = '';
    }

    document.querySelectorAll('.captcha-refresh').forEach(btn => {
        let wrapper = btn.closest('.captcha-wrapper');
        refreshCaptcha(wrapper);

        btn.addEventListener('click', function() {
            refreshCaptcha(wrapper);
            this.style.transform = 'rotate(180deg)';
            this.style.transition = 'transform 0.3s';
            setTimeout(() => { this.style.transform = 'none'; this.style.transition = 'none'; }, 300);
        });
    });

    // ========== DECLARATION CHECKBOX → ENABLE SUBMIT ==========
    document.getElementById('agreeTerms').addEventListener('change', function() {
        document.getElementById('finalSubmitBtn').disabled = !this.checked;
    });

    // ========== FINAL SUBMIT ==========
    document.getElementById('finalSubmitBtn').addEventListener('click', function(e) {
        let wrapper = document.querySelector('#step-3 .captcha-wrapper');
        let expected = parseInt(wrapper.querySelector('.captcha-expected').value);
        let given = parseInt(wrapper.querySelector('.captcha-input').value);

        if (expected !== given) {
            alert('❌ Incorrect captcha answer. Please try again.');
            refreshCaptcha(wrapper);
            return;
        }

        this.textContent = '⏳ Submitting...';
        this.style.opacity = '0.7';

        setTimeout(() => {
            alert('🎉 Congratulations!\n\nYour admission application has been submitted successfully.\n\nApplication ID: #GNPS-2026-X89\nStatus: Pending College Verification\n\nYou will receive an update via SMS/Email.');
            this.textContent = '✅ Submitted Successfully';
            this.style.background = '#28a745';
        }, 1500);
    });
});
</script>

<?php require_once 'includes/footer.php'; ?>
