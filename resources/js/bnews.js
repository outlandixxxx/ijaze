document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll(".card-item");
    const showMoreBtn = document.getElementById("showMoreBtn");
    let visibleCount = 0;
    const step = 4; // how many cards to show per click

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

    // show initial cards
    showCards();
  });
