
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


/*CODIGO PARA LOS BOTONES DE PRODUCTOS*/
const productContainers = [...document.querySelectorAll('.product-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

productContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})


/*ESTE CODIGO ES PARA LAS IMAGENES DE LOS PRODUCTOS */

const product_image1 = document.querySelector('.product_image1');
const thumbnails = document.querySelectorAll('.thumbnail');

thumbnails.forEach(thumb => {
    thumb.addEventListener('click', function() {
        const active = document.querySelector('.active');
        active.classList.remove('active');
        thumb.classList.add('active');
        product_image1.src = this.src;
    });
});


