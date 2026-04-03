<?php
if (!isset($comingSoonPageTitle) || trim($comingSoonPageTitle) === '') {
    $comingSoonPageTitle = 'This Page';
}

if (!isset($comingSoonLead) || trim($comingSoonLead) === '') {
    $comingSoonLead = 'This page is currently under construction and will be available shortly.';
}

require_once __DIR__ . '/header.php';
?>

<section class="coming-soon-page section">
    <div class="container">
        <div class="coming-soon-card">
            <p class="coming-soon-kicker">Gurudeo Nursing and Paramedical Science</p>
            <h1>Coming Soon</h1>
            <h2><?php echo htmlspecialchars($comingSoonPageTitle, ENT_QUOTES, 'UTF-8'); ?></h2>
            <p><?php echo htmlspecialchars($comingSoonLead, ENT_QUOTES, 'UTF-8'); ?></p>
            <div class="coming-soon-actions">
                <a href="index.php" class="btn-primary">Back to Home</a>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/footer.php'; ?>
