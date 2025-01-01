let navbar_icons_img = document.querySelector("#navbar-icons-img");
let account = document.querySelector("#account");

navbar_icons_img.addEventListener("click", () => {
    account.classList.toggle("account1");
});

let filter_btn = document.querySelector("#filter-btn");
let filter_menu = document.querySelector(".filter-menu");

filter_btn.addEventListener("click", function () {
    filter_menu.classList.toggle("filter-menu-1");
    document.querySelector(".bi-chevron-right").classList.toggle("rotate");
});
