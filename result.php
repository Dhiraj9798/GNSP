<?php require_once 'includes/header.php'; ?>

<section class="section result-page" style="margin-top: 80px;" aria-label="Student Results">
    <div class="container">
        <!-- Hero Pattern -->
        <div class="section-header text-center result-page-header">
            <h2 class="section-title index-unified-title">Academic Results</h2>
            <div class="quick-links-divider index-unified-divider" aria-hidden="true"><span>★</span></div>
            <p class="result-page-lead">Check your examination results and academic performance for A.N.M, G.N.M, and B.Sc Nursing programs.</p>
        </div>

        <div class="result-portal-single" style="max-width: 650px; margin: 40px auto; background: #ffffff; padding: 40px; border-radius: 16px; box-shadow: 0 14px 40px rgba(0,0,0,0.08); border-top: 5px solid var(--secondary-color);">
            <h3 style="color: var(--primary-color); margin-bottom: 10px; font-size: 1.8rem; text-align: center; font-family: 'Playfair Display', serif;">Check Your Result</h3>
            <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 30px; text-align: center;">Select your program and enter your details to view your academic performance.</p>
            
            <form action="#" method="GET" class="result-form" style="display: flex; flex-direction: column; gap: 20px;">
                
                <!-- Course Selection (Filter) -->
                <div class="form-group">
                    <label style="font-weight: 600; color: var(--primary-color); margin-bottom: 8px; display: block;" for="courseSelect">Select Program <span style="color:red">*</span></label>
                    <select id="courseSelect" name="course" required style="width: 100%; padding: 14px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; background: #f9fbff; font-size: 1rem; color: #333; cursor: pointer; outline: none; transition: border-color 0.3s;">
                        <option value="">-- Choose Your Course --</option>
                        <option value="anm">A.N.M (Auxiliary Nursing Midwifery)</option>
                        <option value="gnm">G.N.M (General Nursing and Midwifery)</option>
                        <option value="bsc">B.Sc Nursing</option>
                    </select>
                </div>

                <!-- Year / Semester Selection (Dynamic) -->
                <div class="form-group">
                    <label style="font-weight: 600; color: var(--primary-color); margin-bottom: 8px; display: block;" for="yearSelect">Year / Semester <span style="color:red">*</span></label>
                    <select id="yearSelect" name="year_sem" required style="width: 100%; padding: 14px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; background: #f9fbff; font-size: 1rem; color: #333; cursor: pointer; outline: none; transition: border-color 0.3s;" disabled>
                        <option value="">-- First Select Program --</option>
                    </select>
                </div>
                
                <!-- Registration / Roll Number -->
                <div class="form-group">
                    <label style="font-weight: 600; color: var(--primary-color); margin-bottom: 8px; display: block;" for="rollNumber">Registration / Roll Number <span style="color:red">*</span></label>
                    <input type="text" id="rollNumber" name="roll_number" placeholder="e.g. GNPS/2026/001" required style="width: 100%; padding: 14px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; font-size: 1rem; background: #f9fbff; outline: none; transition: border-color 0.3s;">
                </div>

                <!-- Date of Birth -->
                <div class="form-group">
                    <label style="font-weight: 600; color: var(--primary-color); margin-bottom: 8px; display: block;" for="dob">Date of Birth <span style="color:red">*</span></label>
                    <input type="date" id="dob" name="dob" required style="width: 100%; padding: 14px 15px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit; font-size: 1rem; background: #f9fbff; color: #555; outline: none; transition: border-color 0.3s;">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-primary" style="padding: 16px; border: none; border-radius: 8px; background: linear-gradient(135deg, var(--secondary-color), #005eb3); color: white; font-weight: 700; font-size: 1.1rem; cursor: pointer; transition: 0.3s; margin-top: 15px; width: 100%; box-shadow: 0 8px 20px rgba(0, 118, 214, 0.28);">View Result</button>
            </form>
        </div>
        
        <div class="result-notice" style="max-width: 650px; margin: 30px auto 50px; padding: 20px; background: rgba(0, 118, 214, 0.05); border-left: 4px solid var(--secondary-color); border-radius: 0 8px 8px 0;">
            <h4 style="color: var(--primary-color); margin-bottom: 10px;">Important Notice</h4>
            <ul style="list-style-type: disc; margin-left: 20px; color: var(--text-muted); font-size: 0.95rem;">
                <li>Results published online are provisional and subject to final verification by the university/board.</li>
                <li>In case of any discrepancy in the result, please contact the examination cell within 7 working days.</li>
            </ul>
        </div>
    </div>
</section>

<!-- Dynamic Form Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const courseSelect = document.getElementById('courseSelect');
    const yearSelect = document.getElementById('yearSelect');
    
    // Define the semester/year mapping for each program
    const optionsMap = {
        'anm': [
            { value: '1', text: '1st Year' },
            { value: '2', text: '2nd Year' }
        ],
        'gnm': [
            { value: '1', text: '1st Year' },
            { value: '2', text: '2nd Year' },
            { value: '3', text: '3rd Year' }
        ],
        'bsc': [
            { value: '1', text: '1st Year (Sem 1 & 2)' },
            { value: '2', text: '2nd Year (Sem 3 & 4)' },
            { value: '3', text: '3rd Year (Sem 5 & 6)' },
            { value: '4', text: '4th Year (Sem 7 & 8)' }
        ]
    };
    
    courseSelect.addEventListener('change', function() {
        const selectedCourse = this.value;
        
        // Reset and disable year select if no course is selected
        if(!selectedCourse || !optionsMap[selectedCourse]) {
            yearSelect.innerHTML = '<option value="">-- First Select Program --</option>';
            yearSelect.disabled = true;
            yearSelect.style.background = '#f9fbff';
            return;
        }
        
        // Populate options based on selected course
        yearSelect.disabled = false;
        yearSelect.style.background = '#ffffff';
        yearSelect.innerHTML = '<option value="">-- Select Year / Semester --</option>';
        
        optionsMap[selectedCourse].forEach(opt => {
            const newOption = document.createElement('option');
            newOption.value = opt.value;
            newOption.textContent = opt.text;
            yearSelect.appendChild(newOption);
        });
    });
});
</script>

<?php require_once 'includes/footer.php'; ?>
