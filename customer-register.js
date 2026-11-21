document.addEventListener('DOMContentLoaded', () => {
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    const registerForm = document.getElementById('registerForm');
    const fullNameInput = document.getElementById('fullName');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const clientError = document.getElementById('clientError');

    const successBanner = document.getElementById('registrationSuccessBanner');
    if (successBanner) {
        setTimeout(() => {
            window.location.href = 'customer-login.php';
        }, 2200);
        return;
    }

    window.addEventListener('pageshow', () => {
        if (registerForm) {
            registerForm.reset();
        }
    });

    if (registerForm) {
        registerForm.reset();
    }

    if (!registerForm) return;

    registerForm.addEventListener('submit', (e) => {
        const nameVal = fullNameInput.value.trim();
        const emailVal = emailInput.value.trim();
        const passVal = passwordInput.value;
        const confirmPassVal = confirmPasswordInput.value;

        if (clientError) {
            clientError.style.display = 'none';
            clientError.innerHTML = '';
        }

        const serverError = document.getElementById('serverErrorMsg');
        if (serverError) {
            serverError.style.display = 'none';
        }

        if (nameVal === '' || emailVal === '' || passVal === '' || confirmPassVal === '') {
            e.preventDefault();
            if (clientError) {
                clientError.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> All fields are required.';
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
            return;
        }

        if (passVal.length < 6) {
            e.preventDefault();
            if (clientError) {
                clientError.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Password must contain at least 6 characters.';
                clientError.style.display = 'flex';
            }
            return;
        }

        if (passVal !== confirmPassVal) {
            e.preventDefault();
            if (clientError) {
                clientError.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Passwords do not match.';
                clientError.style.display = 'flex';
            }
        }
    });
});