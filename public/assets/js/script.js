/**Dropdown */

let arrow = document.querySelectorAll(".sidebar .nav-links li .category-menu .link_name");
for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;
        arrowParent.classList.toggle("showMenu");
    });
}

let arrow2 = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow2.length; i++) {
    arrow2[i].addEventListener("click", (e) => {
        let arrowParent2 = e.target.parentElement.parentElement;
        arrowParent2.classList.toggle("showMenu");
    });
}

/**Sidebar Collapse */
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});
