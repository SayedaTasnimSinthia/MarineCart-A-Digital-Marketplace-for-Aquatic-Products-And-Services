document.addEventListener('DOMContentLoaded', () => {
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    const loginForm = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const clientError = document.getElementById('clientError');

    window.addEventListener('pageshow', () => {
        if (loginForm) {
            loginForm.reset();
        }
    });

    if (loginForm) {
        loginForm.reset();
    }

    if (!loginForm) return;

    loginForm.addEventListener('submit', (e) => {
        const emailVal = emailInput.value.trim();
        const passVal = passwordInput.value;

        if (clientError) {
            clientError.style.display = 'none';
            clientError.innerHTML = '';
        }

        const serverError = document.getElementById('serverErrorMsg');
        if (serverError) {
            serverError.style.display = 'none';
        }

        if (emailVal === '' || passVal === '') {
            e.preventDefault();
            if (clientError) {
                clientError.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Email and password are required.';
                clientError.style.display = 'flex';
            }
            return;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailVal)) {
            e.preventDefault();
            if (clientError) {
                clientError.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Please enter a valid email address.';
                clientError.style.display = 'flex';
            }
        }
    });
});