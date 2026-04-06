document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.auth-container');
    if (!container) return;

    const registerBtn = container.querySelector('.register-btn');
    const loginBtn = container.querySelector('.login-btn');

    if (registerBtn) {
        registerBtn.addEventListener('click', (event) => {
            event.preventDefault();
            container.classList.add('active');
            window.setTimeout(() => {
                window.location.href = 'registration.php';
            }, 420);
        });
    }

    if (loginBtn) {
        loginBtn.addEventListener('click', (event) => {
            event.preventDefault();
            container.classList.remove('active');
            window.setTimeout(() => {
                window.location.href = 'login.php';
            }, 420);
        });
    }
});
