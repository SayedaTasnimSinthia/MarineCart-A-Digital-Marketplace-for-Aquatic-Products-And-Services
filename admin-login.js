document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('adminLoginForm');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const clientError = document.getElementById('clientError');

    if (!loginForm) return;

    loginForm.addEventListener('submit', (e) => {
        const usernameVal = usernameInput.value.trim();
        const passwordVal = passwordInput.value.trim();

        if (clientError) {
            clientError.style.display = 'none';
            clientError.innerHTML = '';
        }

        if (usernameVal === '' || passwordVal === '') {
            e.preventDefault();
            if (clientError) {
                clientError.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Both username and password are required.';
                clientError.style.display = 'flex';
            }
            return;
        }

        if (usernameVal !== 'admin' || passwordVal !== '123456789') {
            e.preventDefault();
            if (clientError) {
                clientError.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Invalid credentials entered. Please try again.';
                clientError.style.display = 'flex';
            }
        }
    });
});