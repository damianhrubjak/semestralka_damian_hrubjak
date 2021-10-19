const hamburgerBtn = document.querySelector("#hamburger-btn");
const navWrapper = document.querySelector("#nav-wrapper-id");
const menuItems = document.querySelector(".nav-items");

window.addEventListener("DOMContentLoaded", () => {
    document.body.style.setProperty(
        "--menu-height",
        navWrapper.offsetHeight + menuItems.offsetHeight + 10 + "px"
    );
});

hamburgerBtn.addEventListener("click", () => {
    navWrapper.classList.toggle("expand");
});
