// resources/js/contact-form.js
export function initContactForm() {
    const contactForm = document.getElementById('contactForm');
    const contactAlert = document.getElementById('contactAlert');

    // Exit if contact form doesn't exist
    if (!contactForm || !contactAlert) return;

    // Get reCAPTCHA key from data attribute
    const recaptchaKey = contactForm.dataset.recaptchaKey;
    const submitRoute = contactForm.dataset.submitRoute;
    const errorMessage = contactForm.dataset.errorMessage;
    const connectionError = contactForm.dataset.connectionError;

    contactForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        contactAlert.classList.add('d-none');

        try {
            await grecaptcha.ready(async function() {
                const token = await grecaptcha.execute(recaptchaKey, {action: 'contact'});
                
                document.getElementById('contact_recaptcha_token').value = token;

                const formData = new FormData(contactForm);

                const response = await fetch(submitRoute, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });

                const data = await response.json();

                if (data.status === 'success') {
                    contactAlert.className = 'alert alert-success mt-3 text-center';
                    contactAlert.textContent = data.message;
                    contactForm.reset();
                } else {
                    contactAlert.className = 'alert alert-danger mt-3 text-center';
                    contactAlert.textContent = data.message || errorMessage;
                }

                contactAlert.classList.remove('d-none');
            });
        } catch (error) {
            console.error('Error:', error);
            contactAlert.className = 'alert alert-danger mt-3 text-center';
            contactAlert.textContent = connectionError;
            contactAlert.classList.remove('d-none');
        }
    });
}
