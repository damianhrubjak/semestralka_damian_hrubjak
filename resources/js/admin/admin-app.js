import "../bootstrap";
import "../react/ProductCategories";

const button = document.querySelector("#floating-menu-button");
const sideMenu = document.querySelector("#side-menu-id");

button.addEventListener("click", () => {
    sideMenu.classList.toggle("expanded");
});

document.addEventListener("click", (e) => {
    console.log(e.target);
    if (e.target === button) {
        return;
    }
    if (!sideMenu.contains(e.target)) {
        sideMenu.classList.remove("expanded");
    }
});
document.addEventListener("scroll", () => {
    sideMenu.classList.remove("expanded");
});
