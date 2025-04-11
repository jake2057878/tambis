// Toggle mobile navigation menu
function toggleNav() {
    $(".nav-links").toggleClass("active");
}

// Toggle "Show More/Less" for the About section
function toggleAboutContent() {
    const moreText = document.querySelector(".more-text");
    const showMoreButton = document.querySelector(".show-more-btn");

    if (moreText.style.display === "none") {
        moreText.style.display = "inline";
        showMoreButton.textContent = "Show Less";
    } else {
        moreText.style.display = "none";
        showMoreButton.textContent = "Show More";
    }
}
