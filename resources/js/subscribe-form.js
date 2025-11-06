// resources/js/subscribe-form.js
export function initSubscribeForm() {
    const subscribeForm = document.getElementById('subscribe-form');
    
    // Exit if subscribe form doesn't exist
    if (!subscribeForm) return;

    const messageDiv = document.getElementById('subscribe-message');
    const submitRoute = subscribeForm.dataset.submitRoute;
    const successMessage = subscribeForm.dataset.successMessage;
    const errorMessage = subscribeForm.dataset.errorMessage;

    subscribeForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);

        fetch(submitRoute, { 
            method: 'POST', 
            body: formData 
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                messageDiv.innerHTML = `<p class="text-success">${data.success || successMessage}</p>`;
                subscribeForm.reset();
            } else if (data.errors) {
                messageDiv.innerHTML = `<p class="text-danger">${data.errors.email || errorMessage}</p>`;
            }
        })
        .catch(err => {
            console.error(err);
            messageDiv.innerHTML = `<p class="text-danger">${errorMessage}</p>`;
        });
    });
}
