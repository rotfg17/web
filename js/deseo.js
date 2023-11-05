// Selecciona elementos del DOM usando clases e ID
const btnAddDeseo = document.querySelectorAll('.btnAddDeseo'); // Botones para agregar productos a la lista de deseos
const btnCantidadDeseo = document.querySelector('#btnCantidadDeseo'); // Elemento que muestra la cantidad de productos en la lista de deseos
let listaDeseo = []; // Arreglo que almacena la lista de deseos

// Evento que se ejecuta cuando el contenido del DOM ha sido cargado
document.addEventListener('DOMContentLoaded', function () {
    // Verifica si hay una lista de deseos en el almacenamiento local (localStorage)
    if (localStorage.getItem('listaDeseo') != null) {
        listaDeseo = JSON.parse(localStorage.getItem('listaDeseo')); // Recupera la lista de deseos desde el almacenamiento local
    }
    cantidadDeseo(); // Actualiza la cantidad de productos en la lista de deseos en el elemento del DOM
    for (let i = 0; i < btnAddDeseo.length; i++) {
        // Agrega un evento de clic a cada botón "Agregar a lista de deseos"
        btnAddDeseo[i].addEventListener('click', function () {
            let idProducto = btnAddDeseo[i].getAttribute('prod');
            agregarDeseo(idProducto); // Llama a la función para agregar un producto a la lista de deseos
        });
    }
});

// Función para agregar un producto a la lista de deseos
function agregarDeseo(idProducto) {
    // Verifica si el producto ya está en la lista de deseos
    if (listaDeseo.length > 0) {
        for (let i = 0; i < listaDeseo.length; i++) {
            if (listaDeseo[i]['idProducto'] === idProducto) {
                // Muestra un mensaje de aviso si el producto ya está en la lista de deseos
                Swal.fire(
                    'Aviso',
                    'El producto ya está en tu lista de deseos',
                    'warning'
                );
                return;
            }
        }
    }
    // Agrega el producto a la lista de deseos y lo guarda en el almacenamiento local
    listaDeseo.push({
        "idProducto": idProducto,
        "cantidad": 1
    });
    localStorage.setItem('listaDeseo', JSON.stringify(listaDeseo)); // Guarda la lista de deseos en el almacenamiento local
    // Muestra un mensaje de aviso cuando se agrega el producto a la lista de deseos
    Swal.fire(
        'Aviso',
        'Producto agregado al carrito correctamente',
        'success'
    );
    cantidadDeseo(); // Actualiza la cantidad de productos en la lista de deseos en el elemento del DOM
}

// Función para mostrar la cantidad de productos en la lista de deseos en el elemento del DOM
function cantidadDeseo() {
    let listas = JSON.parse(localStorage.getItem('listaDeseo'));
    if (listas !== null) {
        btnCantidadDeseo.textContent = listas.length; // Actualiza el contenido del elemento en el DOM
    } else {
        btnCantidadDeseo.textContent = 0; // Establece la cantidad en 0 si no hay productos en la lista de deseos
    }
}
