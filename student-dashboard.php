<?php require_once 'includes/header.php'; ?>

<section class="student-dashboard-page" aria-label="Student dashboard">
    <div class="container">
        <div class="dashboard-shell">
            <div class="dashboard-head">
                <div>
                    <p class="dashboard-subtitle">Student Admission Dashboard</p>
                    <h1>Admission Profile Form</h1>
                    <p class="dashboard-note">Please complete all required fields marked with *.</p>
                </div>
                <span class="status-pill">Student Portal</span>
            </div>

            <form class="student-profile-form" action="#" method="post" enctype="multipart/form-data">
                <div class="form-section">
                    <h2>Personal Details</h2>
                    <div class="form-grid">
                        <label class="field">
                            <span>Name <em>*</em></span>
                            <input type="text" name="student_name" required>
                        </label>
                        <label class="field">
                            <span>Father's Name <em>*</em></span>
                            <input type="text" name="father_name" required>
                        </label>
                        <label class="field">
                            <span>Nationality <em>*</em></span>
                            <select name="nationality" required>
                                <option value="">Select Nationality</option>
                                <option value="Indian">Indian</option>
                            </select>
                        </label>
                        <label class="field">
                            <span>Category <em>*</em></span>
                            <select name="category" required>
                                <option value="">Select Category</option>
                                <option value="General">General</option>
                                <option value="OBC">OBC</option>
                                <option value="SC">SC</option>
                                <option value="ST">ST</option>
                                <option value="EWS">EWS</option>
                            </select>
                        </label>
                        <label class="field">
                            <span>Caste</span>
                            <input type="text" name="caste">
                        </label>
                        <label class="field">
                            <span>Is Physically Handicapped? <em>*</em></span>
                            <select name="is_physical_handicap" required>
                                <option value="">Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </label>
                        <label class="field field-full">
                            <span>Permanent Address <em>*</em></span>
                            <textarea name="permanent_address" rows="3" required></textarea>
                        </label>
                        <label class="field">
                            <span>State <em>*</em></span>
                            <input type="text" name="state" required>
                        </label>
                        <label class="field">
                            <span>City <em>*</em></span>
                            <input type="text" name="city" required>
                        </label>
                        <label class="field">
                            <span>Pin Code <em>*</em></span>
                            <input type="text" name="pin_code" required>
                        </label>
                        <label class="field">
                            <span>Contact No. <em>*</em></span>
                            <input type="tel" name="contact_number" required>
                        </label>
                        <label class="field">
                            <span>Parent's Contact No. <em>*</em></span>
                            <input type="tel" name="parent_contact_number" required>
                        </label>
                        <label class="field">
                            <span>Aadhar No. <em>*</em></span>
                            <input type="text" name="aadhar_number" required>
                        </label>
                        <label class="field">
                            <span>Mother's Name <em>*</em></span>
                            <input type="text" name="mother_name" required>
                        </label>
                        <label class="field">
                            <span>Religion <em>*</em></span>
                            <select name="religion" required>
                                <option value="">Select Religion</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Muslim">Muslim</option>
                                <option value="Sikh">Sikh</option>
                                <option value="Christian">Christian</option>
                                <option value="Other">Other</option>
                            </select>
                        </label>
                        <label class="field">
                            <span>Gender <em>*</em></span>
                            <select name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </label>
                        <label class="field">
                            <span>D.O.B. <em>*</em></span>
                            <input type="text" name="dob" placeholder="dd-mm-yyyy" required>
                        </label>
                        <label class="field">
                            <span>Rural/Urban <em>*</em></span>
                            <select name="rural_urban" required>
                                <option value="">Select Area Type</option>
                                <option value="Rural">Rural</option>
                                <option value="Urban">Urban</option>
                            </select>
                        </label>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Educational Details</h2>
                    <div class="table-wrap">
                        <table class="edu-table">
                            <thead>
                                <tr>
                                    <th>Qualification <em>*</em></th>
                                    <th>Subject <em>*</em></th>
                                    <th>Passing Year <em>*</em></th>
                                    <th>Percentage <em>*</em></th>
                                    <th>Board <em>*</em></th>
                                    <th>Total <em>*</em></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Qualification"><input type="text" name="qualification_1" required></td>
                                    <td data-label="Subject"><input type="text" name="subject_1" required></td>
                                    <td data-label="Passing Year"><input type="text" name="passing_year_1" required></td>
                                    <td data-label="Percentage"><input type="text" name="percentage_1" required></td>
                                    <td data-label="Board"><input type="text" name="board_1" required></td>
                                    <td data-label="Total"><input type="text" name="total_1" required></td>
                                </tr>
                                <tr>
                                    <td data-label="Qualification"><input type="text" name="qualification_2" required></td>
                                    <td data-label="Subject"><input type="text" name="subject_2" required></td>
                                    <td data-label="Passing Year"><input type="text" name="passing_year_2" required></td>
                                    <td data-label="Percentage"><input type="text" name="percentage_2" required></td>
                                    <td data-label="Board"><input type="text" name="board_2" required></td>
                                    <td data-label="Total"><input type="text" name="total_2" required></td>
                                </tr>
                                <tr>
                                    <td data-label="Qualification"><input type="text" name="qualification_3" required></td>
                                    <td data-label="Subject"><input type="text" name="subject_3" required></td>
                                    <td data-label="Passing Year"><input type="text" name="passing_year_3" required></td>
                                    <td data-label="Percentage"><input type="text" name="percentage_3" required></td>
                                    <td data-label="Board"><input type="text" name="board_3" required></td>
                                    <td data-label="Total"><input type="text" name="total_3" required></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Course and Migration Details</h2>
                    <div class="form-grid">
                        <label class="field">
                            <span>Course Applied <em>*</em></span>
                            <select name="course_applied" required>
                                <option value="">Select Course</option>
                                <option value="ANM">A.N.M</option>
                                <option value="GNM">G.N.M</option>
                                <option value="BSc Nursing">B.Sc Nursing</option>
                            </select>
                        </label>
                        <label class="field">
                            <span>Admission Year <em>*</em></span>
                            <input type="text" name="admission_year" required>
                        </label>
                        <label class="field">
                            <span>Migration Date <em>*</em></span>
                            <input type="text" name="migration_date" placeholder="dd-mm-yyyy" required>
                        </label>
                        <label class="field">
                            <span>Migration Certificate Number <em>*</em></span>
                            <input type="text" name="migration_certificate_number" required>
                        </label>
                        <label class="field">
                            <span>College Roll No <em>*</em></span>
                            <input type="text" name="college_roll_number" required>
                        </label>
                        <label class="field">
                            <span>Session <em>*</em></span>
                            <input type="text" name="session" required>
                        </label>
                    </div>
                </div>

                <div class="form-section">
                    <h2>Declaration</h2>
                    <ol class="declaration-list">
                        <li>I shall obey the Rules &amp; Regulations of the Institute and the Institute Mess.</li>
                        <li>I shall not take part in any subversive activities including ragging in any form in the Institute Campus or the Institute Mess or anywhere at Durgapur or outside anytime during my stay at the Institute.</li>
                        <li>If I involve myself in any type of subversive activities, the Institute Authority alone or in consultation with local Administration may take any type of disciplinary action as per prevailing Rules &amp; Regulations of the College.</li>
                        <li>I also agree to pay College Installment / Hostel fees in time. If I fail to pay the Hostel fees / Installment for consistently two months / two Installments I shall be liable to be struck off from the College roll.</li>
                        <li>All the information furnished here are true to the best of my knowledge and belief.</li>
                    </ol>

                    <label class="agree-field">
                        <input type="checkbox" name="agree_terms" required>
                        <span>I agree with terms &amp; condition. <em>*</em> Yes</span>
                    </label>
                </div>

                <div class="form-section">
                    <h2>Documents to be Submitted (Images Only)</h2>
                    <div class="form-grid">
                        <label class="field">
                            <span>10th Mark Sheet <em>*</em></span>
                            <input type="file" name="doc_10th_marksheet" accept="image/*" required>
                        </label>
                        <label class="field">
                            <span>Migration Certificate (Intermediate) <em>*</em></span>
                            <input type="file" name="doc_migration_intermediate" accept="image/*" required>
                        </label>
                        <label class="field">
                            <span>Physically Handicap Certificate</span>
                            <input type="file" name="doc_handicap_certificate" accept="image/*">
                        </label>
                        <label class="field">
                            <span>Upload Signature Certificate <em>*</em></span>
                            <input type="file" name="doc_signature" accept="image/*" required>
                        </label>
                        <label class="field">
                            <span>12th Marksheet <em>*</em></span>
                            <input type="file" name="doc_12th_marksheet" accept="image/*" required>
                        </label>
                        <label class="field">
                            <span>12th Certificate <em>*</em></span>
                            <input type="file" name="doc_12th_certificate" accept="image/*" required>
                        </label>
                        <label class="field">
                            <span>Upload Photo <em>*</em></span>
                            <input type="file" name="doc_photo" accept="image/*" required>
                        </label>
                        <label class="field">
                            <span>Caste Certificate <em>*</em></span>
                            <input type="file" name="doc_caste_certificate" accept="image/*" required>
                        </label>
                    </div>
                </div>

                <div class="form-section captcha-section">
                    <h2>Verification</h2>
                    <div class="captcha-box">
                        <p class="captcha-text">Captcha: 8 + 5 = ?</p>
                        <label class="field">
                            <span>Enter Captcha <em>*</em></span>
                            <input type="text" name="captcha_answer" required>
                        </label>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" class="primary-btn" disabled>Submit Application</button>
                    <a href="contact.php" class="secondary-link">Need Help? Contact Support</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
