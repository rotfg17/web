
/*CODIGO PARA MENU HAMBURGUESA
var menuIcon = document.getElementById("menu-icon");
    var menu = document.getElementById("menu");
    
    menuIcon.addEventListener("click", function() {
      menu.classList.toggle("active");
    });
    
    document.addEventListener("click", function(event) {
      var isClickInsideMenu = menu.contains(event.target);
      var isClickInsideIcon = menuIcon.contains(event.target);
      
      if (!isClickInsideMenu && !isClickInsideIcon) {
        menu.classList.remove("active");
      }
      $(document).ready(function () {
        $(".menu-icon").click(function (event) {
            event.stopPropagation(); // Evita que el clic se propague al documento
            $(".menu").toggle();
        });
            
    });
    
    });*/


// Control de contenedores de productos deslizantes
const productContainers = [...document.querySelectorAll('.product-container')]; // Obtiene todos los contenedores de productos
const nxtBtn = [...document.querySelectorAll('.nxt-btn')]; // Obtiene todos los botones "Siguiente"
const preBtn = [...document.querySelectorAll('.pre-btn')]; // Obtiene todos los botones "Anterior"

productContainers.forEach((item, i) => {
    // Obtiene las dimensiones del contenedor
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width; // Ancho del contenedor

    // Agrega un evento al botón "Siguiente" para desplazar hacia la derecha
    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth; // Desplaza el contenido hacia la derecha por el ancho del contenedor
    });

    // Agrega un evento al botón "Anterior" para desplazar hacia la izquierda
    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth; // Desplaza el contenido hacia la izquierda por el ancho del contenedor
    });
});

/* Código para cambiar las imágenes de los productos */

const product_image1 = document.querySelector('.product_image1'); // Obtiene el elemento de imagen principal
const thumbnails = document.querySelectorAll('.thumbnail'); // Obtiene todas las miniaturas de imagen

thumbnails.forEach(thumb => {
    thumb.addEventListener('click', function () {
        const active = document.querySelector('.active'); // Obtiene la miniatura activa
        active.classList.remove('active'); // Quita la clase 'active' de la miniatura activa
        thumb.classList.add('active'); // Agrega la clase 'active' a la miniatura seleccionada
        product_image1.src = this.src; // Cambia la imagen principal por la de la miniatura seleccionada
    });
});
