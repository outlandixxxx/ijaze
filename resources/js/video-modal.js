// resources/js/video-modal.js
export function initVideoModal() {
    const videoModal = document.getElementById('videoModal');
    const videoFrame = document.getElementById('videoFrame');
    
    // Exit if modal doesn't exist on this page
    if (!videoModal || !videoFrame) return;

    // Handle video card clicks
    document.querySelectorAll('.video-card').forEach(card => {
        card.addEventListener('click', () => {
            const videoUrl = card.getAttribute('data-video');
            if (videoUrl) {
                const autoplayUrl = videoUrl.includes('?') ?
                    videoUrl + '&autoplay=1' :
                    videoUrl + '?autoplay=1';
                videoFrame.src = autoplayUrl;
            }
        });
    });

    // Clear video when modal closes
    videoModal.addEventListener('hidden.bs.modal', () => {
        videoFrame.src = "";
    });
}
