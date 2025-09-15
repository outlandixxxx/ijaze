document.addEventListener("DOMContentLoaded", function () {

    /* ===============================
       UNIVERSAL SHOW MORE (all pages)
    =============================== */
    const showMoreButtons = document.querySelectorAll(".show-more-btn");

    showMoreButtons.forEach(button => {
        let currentIndex = 0;

        // Find items only inside the relevant container
        const container = button.closest(".card-container, .card-body, .container-fluid, .row");
        if (!container) return;

        const items = container.querySelectorAll(
            ".news-item, .card-item, .video-item, .list-item"
        );

        const stepInitial = 12; // number of items to show initially
        const stepClick = 6;    // number of items to show per click

        // Show initial batch
        for (let i = 0; i < stepInitial && i < items.length; i++) {
            items[i].classList.remove("d-none");
        }
        currentIndex = stepInitial;

        // On button click
        button.addEventListener("click", function () {
            let nextIndex = currentIndex + stepClick;
            for (let i = currentIndex; i < nextIndex && i < items.length; i++) {
                items[i].classList.remove("d-none");
            }
            currentIndex = nextIndex;

            // Hide button if all items are visible
            if (currentIndex >= items.length) {
                button.style.display = "none";
            }
        });
    });

    /* ===============================
       FEATURED VIDEO PLAYER
    =============================== */
    const featured = document.getElementById("featuredVideo");
    if (featured) {
        const videoCards = document.querySelectorAll(".small-video.featured");

        function setFeatured(card) {
            const videoSrc = card.dataset.video;
            const title = card.dataset.title;

            featured.innerHTML = `
                <video controls autoplay style="width:100%; max-width:600px; display:block; margin:auto; border-radius:10px;">
                    <source src="${videoSrc}" type="video/mp4">
                    متصفحك لا يدعم تشغيل الفيديو.
                </video>
                <h5 style="color:white; margin-top:10px; text-align:center;">${title}</h5>
            `;
        }

        if (videoCards.length > 0) {
            // Set first video initially
            setFeatured(videoCards[0]);

            // Change featured video on click
            videoCards.forEach(card => {
                card.addEventListener("click", function () {
                    setFeatured(card);
                    featured.scrollIntoView({ behavior: "smooth" });
                });
            });
        }
    }

    /* ===============================
       INLINE VIDEO PLAY (inside card)
    =============================== */
    const videos = document.querySelectorAll('.small-video');

videos.forEach(videoDiv => {
    videoDiv.addEventListener('click', function () {
        const videoSrc = this.dataset.video;

        // Create video element
        const videoEl = document.createElement('video');
        videoEl.src = videoSrc;
        videoEl.controls = true;
        videoEl.autoplay = true;
        videoEl.style.width = '100%';
        videoEl.style.height = '100%';
        videoEl.style.objectFit = 'cover';
        videoEl.style.borderRadius = '0.5rem';

        // Replace thumbnail with video
        this.innerHTML = '';
        this.appendChild(videoEl);
    });
});


    /* ===============================
       COPY PAGE LINK
    =============================== */
    window.copyPageLink = function () {
        navigator.clipboard.writeText(window.location.href)
            .then(() => alert("✅ تم نسخ الرابط!"))
            .catch(() => alert("❌ لم يتم نسخ الرابط، جرب مرة أخرى."));
    };

});
