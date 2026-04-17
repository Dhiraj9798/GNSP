<?php require_once 'includes/header.php'; ?>

<section class="section admission-form-page" style="margin-top: 80px;" aria-label="Admission Form Gateway">
    <div class="container">
        <!-- Hero Pattern -->
        <div class="section-header text-center admission-form-header">
            <h2 class="section-title index-unified-title">Admission Form</h2>
            <div class="quick-links-divider index-unified-divider" aria-hidden="true"><span>★</span></div>
            <p class="admission-form-lead">Choose your preferred method to complete the admission process.</p>
        </div>

        <div class="form-gateway-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; max-width: 800px; margin: 40px auto 0;">
            
            <!-- Online Admission -->
            <article class="gateway-card" style="background: #ffffff; padding: 40px 30px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); text-align: center; border-bottom: 5px solid var(--secondary-color); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 3rem; margin-bottom: 20px;">💻</div>
                <h3 style="color: var(--primary-color); margin-bottom: 15px; font-family: 'Playfair Display', serif;">Online Admission</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 30px; min-height: 45px;">Proceed to your Student Dashboard to securely fill out your complete admission profile and upload documents.</p>
                <a href="login.php" style="display: inline-block; padding: 14px 25px; border-radius: 6px; background: var(--secondary-color); color: white; font-weight: 700; text-decoration: none; transition: 0.3s; width: 100%; box-shadow: 0 4px 15px rgba(0, 118, 214, 0.2);">Login to Portal</a>
            </article>

            <!-- Offline Admission -->
            <article class="gateway-card" style="background: #ffffff; padding: 40px 30px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); text-align: center; border-bottom: 5px solid var(--primary-color); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="font-size: 3rem; margin-bottom: 20px;">📄</div>
                <h3 style="color: var(--primary-color); margin-bottom: 15px; font-family: 'Playfair Display', serif;">Offline Admission</h3>
                <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 30px; min-height: 45px;">Download the printable admission form. Fill it manually and submit it at the campus administrative office.</p>
                <a href="assets/admission_form.pdf" target="_blank" style="display: inline-block; padding: 14px 25px; border-radius: 6px; background: var(--primary-color); color: white; font-weight: 700; text-decoration: none; transition: 0.3s; width: 100%; box-shadow: 0 4px 15px rgba(10, 37, 64, 0.2);">Download Form (PDF)</a>
            </article>

        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
