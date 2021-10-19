const hamburgerBtn = document.querySelector("#hamburger-btn");
const navWrapper = document.querySelector("#nav-wrapper-id");
const menuItems = document.querySelector(".nav-items");

window.addEventListener("DOMContentLoaded", () => {
    if (window.screen.width <= 640) {
        document.body.style.setProperty(
            "--menu-height",
            navWrapper.offsetHeight + menuItems.offsetHeight + 10 + "px"
        );
    }
});
window.addEventListener("resize", () => {
    if (window.screen.width <= 640) {
        document.body.style.setProperty(
            "--menu-height",
            navWrapper.offsetHeight + menuItems.offsetHeight + 10 + "px"
        );
    }
});
window.addEventListener("scroll", () => {
    navWrapper.classList.remove("expand");
});

hamburgerBtn.addEventListener("click", () => {
    navWrapper.classList.toggle("expand");
});
