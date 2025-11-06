// resources/js/recaptcha-login.js
export function initRecaptchaLogin() {
    const form = document.getElementById('login-form');
    
    if (!form) return;

    // Get reCAPTCHA site key from data attribute
    const recaptchaKey = form.dataset.recaptchaKey;

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        grecaptcha.ready(function() {
            grecaptcha.execute(recaptchaKey, {action: 'login'})
            .then(function(token) {
                document.getElementById('recaptcha_token').value = token;
                form.submit();
            })
            .catch(function(err) {
                console.error("⚠️ reCAPTCHA execution failed:", err);
                alert("Google reCAPTCHA could not run. Please reload and try again.");
            });
        });
    });
}
