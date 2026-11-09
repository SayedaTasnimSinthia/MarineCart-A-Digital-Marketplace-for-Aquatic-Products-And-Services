document.addEventListener('DOMContentLoaded', () => {
function updateTimers() {
        const timers = document.querySelectorAll('.countdown-timer');
        const now = Math.floor(Date.now() / 1000);

        timers.forEach(timer => {
            const endTime = parseInt(timer.getAttribute('data-end'), 10);
            const diff = endTime - now;
            if (diff <= 0) {
                timer.innerHTML = '<i class="fa-solid fa-lock"></i> Auction Closed';
                timer.classList.add('is-closed');
            } else {
                const hours = Math.floor(diff / 3600);
                const minutes = Math.floor((diff % 3600) / 60);
                const seconds = diff % 60;

                timer.innerHTML = `<i class="fa-regular fa-clock"></i> ${hours}h ${minutes}m ${seconds}s left`;
                timer.classList.remove('is-closed');
            }
        });
    }

    setInterval(updateTimers, 1000);
    updateTimers();

    const newsletterForm = document.getElementById('newsletter-form');
    const newsletterMsg = document.getElementById('newsletter-message');

    function showNewsletterMessage(text, typeClass) {
        if (!newsletterMsg) return;
        newsletterMsg.textContent = text;
        newsletterMsg.className = 'newsletter-msg ' + typeClass;
    }

    if (newsletterForm) {
        newsletterForm.addEventListener('submit', async (e) => {
            e.preventDefault(); // Stop page from refreshing

            const emailInput = document.getElementById('newsletter-email');
            if (!emailInput || !emailInput.value.trim()) return;
            const formData = new FormData();
            formData.append('action', 'subscribe');
            formData.append('email', emailInput.value.trim());
            showNewsletterMessage('Saving to database...', 'msg-info');

            try {
                const response = await fetch('index.php', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const result = await response.json();

                if (result.status === 'success') {
                    showNewsletterMessage(result.message, 'msg-success');
                    emailInput.value = '';
                } else if (result.status === 'duplicate') {
                    showNewsletterMessage(result.message, 'msg-duplicate');
                } else {
                    showNewsletterMessage(result.message || 'An error occurred. Please try again.', 'msg-error');
                }
            } catch (err) {
                showNewsletterMessage('Request failed: ' + err.message, 'msg-error');
            }
        });
    }
});