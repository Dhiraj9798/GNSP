<?php require_once 'includes/header.php'; ?>

<section class="section admission-proc-page" style="margin-top: 80px;" aria-label="Admission Procedure">
    <div class="container">
        <!-- Hero Pattern -->
        <div class="section-header text-center admission-proc-header">
            <h2 class="section-title index-unified-title">Admission Procedure</h2>
            <div class="quick-links-divider index-unified-divider" aria-hidden="true"><span>★</span></div>
            <p class="admission-proc-lead">List of Documents Required at the Time of Admission</p>
        </div>

        <div class="proc-intro-box" style="background: rgba(0, 118, 214, 0.05); border-left: 4px solid var(--secondary-color); padding: 20px 25px; border-radius: 0 8px 8px 0; max-width: 800px; margin: 0 auto 40px;">
            <p style="color: var(--primary-color); font-weight: 500; margin: 0; font-size: 1.05rem;">The applicants shall be required to produce following documents in <strong style="color: var(--secondary-color);">Original</strong> along with <strong style="color: var(--secondary-color);">one set of self-attested photocopies</strong> at the time of admission:</p>
        </div>

        <div class="proc-checklist-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 20px; max-width: 900px; margin: 0 auto;">
            
            <?php 
            $documents = [
                "Class X Board Examinations Certificate (Self-Attested Photocopy)",
                "Class X Marks-sheet (Self-Attested Photocopy)",
                "Class XII Marks-sheet (Self-Attested Photocopy)",
                "Class XII Provisional Certificate (Self-Attested Photocopy) & Original Certificate",
                "Character Certificate (recent)",
                "SC/ST/PWD/ Certificate (in the name of the candidate) issued by the competent authority (also show original certificate).",
                "OBC (Non-Creamy Layer) Certificate (in the name of the Candidate) issued by competent authority.",
                "Transfer Certificate from school/College as well as Migration Certificate from Board/University is required from those students who have passed senior secondary exams.",
                "At least Five passport size photographs.",
                "Photocopy of Address proof like Aadhar Card, also show original at the name of student seeking admission."
            ];

            foreach ($documents as $index => $doc) {
                echo '<div class="checklist-item" style="display: flex; gap: 15px; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); align-items: flex-start; border-bottom: 2px solid transparent; transition: border-color 0.3s;" onmouseover="this.style.borderColor=\'var(--secondary-color)\'" onmouseout="this.style.borderColor=\'transparent\'">';
                echo '    <div style="flex-shrink: 0; background: var(--secondary-color); color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 0.9rem;">'.($index+1).'</div>';
                echo '    <p style="color: var(--text-main); font-size: 0.95rem; margin: 0; line-height: 1.5; font-weight: 500;">'.$doc.'</p>';
                echo '</div>';
            }
            ?>

        </div>
        
        <div class="text-center" style="margin-top: 50px; text-align: center;">
            <a href="apply-online.php" class="btn-primary" style="padding: 14px 35px; border-radius: 8px; background: linear-gradient(135deg, var(--secondary-color), #005eb3); color: white; font-weight: 700; text-decoration: none; box-shadow: 0 8px 20px rgba(0, 118, 214, 0.28); display: inline-block; font-size: 1.05rem; transition: transform 0.3s;" onmouseover="this.style.transform=\'translateY(-2px)\'" onmouseout="this.style.transform=\'translateY(0)\'">Proceed to Apply Online</a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
