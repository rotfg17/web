/* CODIGO DE PAGINA DE ARTICULOS */

// Manejo de la cantidad de productos
const inputQuantity = document.querySelector('.input-quantity'); // Input para la cantidad de productos
const btnIncrement = document.querySelector('#increment'); // Botón para incrementar la cantidad
const btnDecrement = document.querySelector('#decrement'); // Botón para decrementar la cantidad
let valueByDefault = parseInt(inputQuantity.value); // Valor inicial de la cantidad

// Funciones para incrementar y decrementar la cantidad
btnIncrement.addEventListener('click', () => {
    valueByDefault += 1;
    inputQuantity.value = valueByDefault;
});

btnDecrement.addEventListener('click', () => {
    if (valueByDefault === 1) {
        return; // Evita que la cantidad sea menor que 1
    }
    valueByDefault -= 1;
    inputQuantity.value = valueByDefault;
});

// Alternar visibilidad de secciones
// Constantes para los títulos que se pueden alternar
const toggleDescription = document.querySelector('.title-description');
const toggleAdditionalInformation = document.querySelector('.title-additional-information');
const toggleReviews = document.querySelector('.title-reviews');

// Constantes para el contenido de texto que se puede alternar
const contentDescription = document.querySelector('.text-description');
const contentAdditionalInformation = document.querySelector('.text-additional-information');
const contentReviews = document.querySelector('.text-reviews');

// Funciones para alternar la visibilidad del contenido de texto
toggleDescription.addEventListener('click', () => {
    contentDescription.classList.toggle('hidden'); // Alterna la clase CSS 'hidden' para mostrar/ocultar la descripción
});

toggleAdditionalInformation.addEventListener('click', () => {
    contentAdditionalInformation.classList.toggle('hidden'); // Alterna la clase CSS 'hidden' para mostrar/ocultar información adicional
});

toggleReviews.addEventListener('click', () => {
    contentReviews.classList.toggle('hidden'); // Alterna la clase CSS 'hidden' para mostrar/ocultar reseñas
});

// Agregar productos al carrito
// Agregar productos al carrito
function addProducto(id, cantidad, token) {
    let url = 'clases/carrito.php'; // URL del script para agregar productos al carrito
    let formData = new FormData();
    formData.append('id', id); // Agrega el ID del producto
    formData.append('cantidad', cantidad); // Agrega la cantidad de productos
    formData.append('token', token); // Agrega un token (posiblemente para seguridad)
    fetch(url, {
        method: "POST",
        body: formData,
        mode: 'cors'
    }).then(response => response.json())
        .then(data => {
            if (data.ok) {
                let elemento = document.getElementById("num_cart");
                elemento.innerHTML = data.numero; // Actualiza el número de productos en el carrito
                // Muestra un mensaje de aviso cuando se agrega el producto al carrito
                Swal.fire(
                    'Aviso',
                    'Producto agregado al carrito correctamente',
                    'success'
                );
            } else {
                Swal.fire(
                    'Aviso',
                    'No hay suficientes productos en stock',
                    'warning'
                );
            }
        });
}


//codigo para hacer la compra del producto.
function addandbuy(id, cantidad, token){
    addProducto(id, cantidad, token);

    window.location = "checkout.php";
}

async function addProductToWishList(id, token) {
    let url = 'clases/wishlist.php'; // URL del script para agregar productos a la lista de deseos
    let formData = new FormData();
    formData.append('id', id); // Agrega el ID del producto
    formData.append('token', token); // Agrega un token (posiblemente para seguridad)

    try {
        const response = await fetch(url, {
            method: "POST",
            body: formData,
            mode: 'cors'
        });

        const data = await response.json();

        if (data.ok) {
            let elemento = document.getElementById("num_whislist");
            elemento.innerHTML = data.numero; // Actualiza el número de productos en la lista de deseos

            // Verifica si el producto ya está en la lista de deseos
            if (data.exists) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Producto existente',
                    text: 'El producto ya está en tu lista de deseos.',
                });
            } else {
                // Muestra un mensaje de éxito si se agrega el producto a la lista de deseos
                Swal.fire({
                    icon: 'success',
                    title: 'Agregado a la lista de deseos',
                    text: 'El producto ha sido agregado a tu lista de deseos.',
                });
            }
        }
    } catch (error) {
        console.error('Error:', error);
    }
}


