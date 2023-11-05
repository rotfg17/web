/*Este codigo es para el sidebar*/
// Obtén referencias a los elementos relevantes
// Selecciona elementos del DOM usando clases y etiquetas
const sidebar = document.querySelector(".sidebar"); // Elemento de la barra lateral
const cross = document.querySelector(".fa-xmark"); // Elemento para cerrar la barra lateral
const black = document.querySelector(".black"); // Fondo oscuro detrás de la barra lateral
const sidebtn = document.querySelector(".second-1"); // Botón para abrir la barra lateral

// Agrega un evento de clic al botón "sidebtn" para abrir la barra lateral
sidebtn.addEventListener("click", () => {
    openSidebar();
});

// Agrega eventos de clic para cerrar la barra lateral al hacer clic en la "X" o el fondo oscuro
cross.addEventListener("click", () => {
    closeSidebar();
});

black.addEventListener("click", () => {
    closeSidebar();
});

// Selecciona más elementos del DOM
const sign = document.querySelector(".ac"); // Elemento de "ac"
const tri = document.querySelector(".triangle"); // Elemento de "triangle"
const signin = document.querySelector(".hdn-sign"); // Elemento para iniciar sesión
const close = document.querySelector(".fa-xmark"); // Elemento para cerrar el cuadro de inicio de sesión

// Función para abrir la barra lateral
function openSidebar() {
    sidebar.classList.add("active"); // Agrega la clase "active" para mostrar la barra lateral
    cross.classList.add("active"); // Agrega la clase "active" para mostrar el botón de cerrar
    black.classList.add("active"); // Agrega la clase "active" para mostrar el fondo oscuro
    document.body.classList.add("stop-scroll"); // Agrega una clase para evitar el desplazamiento del cuerpo
}

// Función para cerrar la barra lateral
function closeSidebar() {
    sidebar.classList.remove("active"); // Quita la clase "active" para ocultar la barra lateral
    cross.classList.remove("active"); // Quita la clase "active" para ocultar el botón de cerrar
    black.classList.remove("active"); // Quita la clase "active" para ocultar el fondo oscuro
    document.body.classList.remove("stop-scroll"); // Quita la clase para permitir el desplazamiento del cuerpo
}


