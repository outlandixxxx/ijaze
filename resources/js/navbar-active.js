// resources/js/navbar-active.js
export function initNavbarActive() {
    const navLinks = document.querySelectorAll(".navbar-nav .btn");

    // Exit if no nav links found
    if (navLinks.length === 0) return;

    navLinks.forEach(link => {
        link.addEventListener("click", function () {
            navLinks.forEach(l => l.classList.remove("active"));
            this.classList.add("active");
        });
    });
}
