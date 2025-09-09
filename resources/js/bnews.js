document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".card-item");
    const showMoreBtn = document.getElementById("showMoreBtn");

    if (!cards.length || !showMoreBtn) return; // 👈 nothing to do if elements don’t exist

    let visibleCount = 0;
    const step = 15; // how many cards to show initially / per click

    function showCards() {
        for (let i = visibleCount; i < visibleCount + step && i < cards.length; i++) {
            cards[i].classList.remove("d-none");
        }
        visibleCount += step;

        if (visibleCount >= cards.length) {
            showMoreBtn.style.display = "none"; // hide button when all are shown
        }
    }

    showMoreBtn.addEventListener("click", showCards);

    // show initial batch
    showCards();
});



  document.addEventListener("DOMContentLoaded", function () {
    const showMoreButtons = document.querySelectorAll(".show-more-btn");

    showMoreButtons.forEach(button => {
        let currentIndex = 0;
        const newsItems = button.closest(".card-body").querySelectorAll(".news-item");

        // Show first 10 on load
        for (let i = 0; i < 10 && i < newsItems.length; i++) {
            newsItems[i].classList.remove("d-none");
        }
        currentIndex = 10;

        // On button click
        button.addEventListener("click", function () {
            let nextIndex = currentIndex + 5;
            for (let i = currentIndex; i < nextIndex && i < newsItems.length; i++) {
                newsItems[i].classList.remove("d-none");
            }
            currentIndex = nextIndex;

            // Hide button if no more items
            if (currentIndex >= newsItems.length) {
                button.style.display = "none";
            }
        });
    });
});

//trending video page

document.addEventListener('DOMContentLoaded', function () {
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

            // Replace the thumbnail with the video
            this.innerHTML = '';
            this.appendChild(videoEl);
        });
    });
});


//ai video js

document.addEventListener("DOMContentLoaded", function () {
    const showMoreBtn = document.getElementById("showMoreBtn");
    const newsItems = document.querySelectorAll(".card-item");
    let currentIndex = 0;

    // Show first 10 videos
    for (let i = 0; i < 10 && i < newsItems.length; i++) {
        newsItems[i].classList.remove("d-none");
    }
    currentIndex = 10;

    // Show more button
    showMoreBtn.addEventListener("click", function () {
        let nextIndex = currentIndex + 10;
        for (let i = currentIndex; i < nextIndex && i < newsItems.length; i++) {
            newsItems[i].classList.remove("d-none");
        }
        currentIndex = nextIndex;
        if (currentIndex >= newsItems.length) showMoreBtn.style.display = "none";
    });

    // Featured video
    const featured = document.getElementById("featuredVideo");
    const videoCards = document.querySelectorAll(".small-video");

    function setFeatured(card) {
        const videoSrc = card.dataset.video;
        const title = card.dataset.title;

        featured.innerHTML = `
            <video controls autoplay>
                <source src="${videoSrc}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <h5 style="color:white; margin-top:10px;">${title}</h5>
        `;
    }

    videoCards.forEach(card => {
        card.addEventListener("click", function () {
            setFeatured(card);
            featured.scrollIntoView({ behavior: "smooth" });
        });
    });

    // Automatically set the first video as featured
    if (videoCards.length > 0) {
        setFeatured(videoCards[0]);
    }
});


