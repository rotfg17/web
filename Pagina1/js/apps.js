/*Este codigo es para el sidebar*/
// Obtén referencias a los elementos relevantes
const sidebar = document.querySelector(".sidebar");
const cross = document.querySelector(".fa-xmark");
const black = document.querySelector(".black");
const sidebtn = document.querySelector(".second-1");

sidebtn.addEventListener("click", () => {
    sidebar.classList.add("active");
    cross.classList.add("active");
    black.classList.add("active");
    document.body.classList.add("stop-scroll");
});
    
cross.addEventListener("click", () => {
    sidebar.classList.remove("active");
    cross.classList.remove("active");
    black.classList.remove("active");
});

const sign = document.querySelector(".ac");
const tri = document.querySelector(".triangle");
const signin = document.querySelector(".hdn-sign");
const close = document.querySelector(".fa-xmark");

sign.addEventListener("click", ()=>{
    black.classList.toggle("active-1");
    signin.classList.toggle("active");
    tri.classList.toggle("active");
    document.body.classList.add("stop-scroll");
    close.classList.remove("active");

})


