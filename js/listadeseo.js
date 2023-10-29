document.addEventListener('DOMContentLoaded', function(){
    // Maneja el clic en el botón "Agregar a favorito"
    document.querySelectorAll('.btn-add-deseo').forEach(function(button) {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const productName = ""; // Obtén el nombre del producto según sea necesario
            const productPrice = ""; // Obtén el precio del producto según sea necesario

            // Crea un objeto que represente el producto
            const product = {
                id: productId,
                name: productName,
                price: productPrice
            };

            // Agrega el producto a la lista de deseos
            addToWishlist(product);
        });
    });

    // Función para agregar un producto a la lista de deseos
    function addToWishlist(product) {
        // Puedes implementar el código para enviar el producto al servidor aquí.
        // Por ejemplo, usando AJAX o Fetch.

        // Luego, puedes mostrar el producto en la lista de deseos en la página.
        const listaDeseos = document.getElementById('listaDeseos');
        const productCard = document.createElement('div');
        productCard.innerHTML = `<p>${product.name} - RD$${product.price}</p>`;
        listaDeseos.appendChild(productCard);
    }
});
