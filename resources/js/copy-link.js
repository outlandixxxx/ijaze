// resources/js/copy-link.js
export function initCopyLink() {
    // Make copyPageLink function globally available
    window.copyPageLink = function() {
        navigator.clipboard.writeText(window.location.href)
            .then(() => {
                // Get the translated message from the page if available
                const message = document.querySelector('[data-copy-success-message]')?.dataset.copySuccessMessage || 'Link copied!';
                alert(message);
            })
            .catch((err) => {
                console.error('Failed to copy link:', err);
                alert('Failed to copy link');
            });
    };
}
