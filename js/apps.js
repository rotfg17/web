/*Este codigo es para el sidebar*/
// Obtén referencias a los elementos relevantes
const sidebar = document.querySelector(".sidebar");
const cross = document.querySelector(".fa-xmark");
const black = document.querySelector(".black");
const sidebtn = document.querySelector(".second-1");

sidebtn.addEventListener("click", () => {
    openSidebar();
});

cross.addEventListener("click", () => {
    closeSidebar();
});

black.addEventListener("click", () => {
    closeSidebar();
});

const sign = document.querySelector(".ac");
const tri = document.querySelector(".triangle");
const signin = document.querySelector(".hdn-sign");
const close = document.querySelector(".fa-xmark");

function openSidebar() {
    sidebar.classList.add("active");
    cross.classList.add("active");
    black.classList.add("active");
    document.body.classList.add("stop-scroll");
}

function closeSidebar() {
    sidebar.classList.remove("active");
    cross.classList.remove("active");
    black.classList.remove("active");
    document.body.classList.remove("stop-scroll");
}





