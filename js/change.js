/*ESTE CODIGO JS ES PARA EL ARTICULO DE ALICATES CUERVO*/
document.addEventListener("DOMContentLoaded", function () {
    const sizeSelect = document.getElementById("size");
    const precioValor = document.getElementById("price-value");

    // Precios por tamaño
    const precios = {
        small: 208.45,
        medium: 304.51,
    };

    // Impuesto ITBIS (18%)
    const itbis = 0.0;

    // Función para calcular y actualizar el precio
    function actualizarPrecio() {
        const selectedSize = sizeSelect.value;
        const precio = precios[selectedSize];
        const precioConITBIS = precio * (1 + itbis);
        precioValor.textContent = precioConITBIS.toFixed(2);
    }

    // Evento para actualizar el precio cuando se cambie el tamaño
    sizeSelect.addEventListener("change", actualizarPrecio);

    // Llamar a la función inicialmente para mostrar el precio inicial
    actualizarPrecio();
});

/*ESTE CODIGO JS ES PARA EL ARTICULO DE ADAPTADOR TALADRO*/
document.addEventListener("DOMContentLoaded", function () {
    const sizeSelect = document.getElementById("sizeataladro");
    const precioValor = document.getElementById("price-value");

    // Precios por tamaño
    const precios = {
        small: 146.25,
        medium: 105.30,
    };

    // Impuesto ITBIS (18%)
    const itbis = 0.0;

    // Función para calcular y actualizar el precio
    function actualizarPrecio() {
        const selectedSize = sizeSelect.value;
        const precio = precios[selectedSize];
        const precioConITBIS = precio * (1 + itbis);
        precioValor.textContent = precioConITBIS.toFixed(2);
    }

    // Evento para actualizar el precio cuando se cambie el tamaño
    sizeSelect.addEventListener("change", actualizarPrecio);

    // Llamar a la función inicialmente para mostrar el precio inicial
    actualizarPrecio();
});

/*ESTE CODIGO JS ES PARA EL ARTICULO DE ADAPTADOR UNIVERSAL*/
document.addEventListener("DOMContentLoaded", function () {
    const sizeSelect = document.getElementById("sizeuniversal");
    const precioValor = document.getElementById("price-value");

    // Precios por tamaño
    const precios = {
        small: 92.43,
        medium: 179.98,
    };

    // Impuesto ITBIS (18%)
    const itbis = 0.0;

    // Función para calcular y actualizar el precio
    function actualizarPrecio() {
        const selectedSize = sizeSelect.value;
        const precio = precios[selectedSize];
        const precioConITBIS = precio * (1 + itbis);
        precioValor.textContent = precioConITBIS.toFixed(2);
    }

    // Evento para actualizar el precio cuando se cambie el tamaño
    sizeSelect.addEventListener("change", actualizarPrecio);

    // Llamar a la función inicialmente para mostrar el precio inicial
    actualizarPrecio();
});

/*ESTE CODIGO JS ES PARA EL ARTICULO DE ALICATE DE PRESION VIKINGO CURVO*/
document.addEventListener("DOMContentLoaded", function () {
    const sizeSelect = document.getElementById("sizevikingo");
    const precioValor = document.getElementById("price-value");

    // Precios por tamaño
    const precios = {
        small: 218.11,
        medium:  241.22,
        large: 293.22
    };

    // Impuesto ITBIS (18%)
    const itbis = 0.0;

    // Función para calcular y actualizar el precio
    function actualizarPrecio() {
        const selectedSize = sizeSelect.value;
        const precio = precios[selectedSize];
        const precioConITBIS = precio * (1 + itbis);
        precioValor.textContent = precioConITBIS.toFixed(2);
    }

    // Evento para actualizar el precio cuando se cambie el tamaño
    sizeSelect.addEventListener("change", actualizarPrecio);

    // Llamar a la función inicialmente para mostrar el precio inicial
    actualizarPrecio();
});


/*ESTE CODIGO JS ES PARA EL ARTICULO DE PINZA ELECTRICA TRUPER*/
document.addEventListener("DOMContentLoaded", function () {
    const sizeSelect = document.getElementById("sizelect");
    const precioValor = document.getElementById("price-value");

    // Precios por tamaño
    const precios = {
        small: 339.68,
        medium:  345.79,
        
    };

    // Impuesto ITBIS (18%)
    const itbis = 0.0;

    // Función para calcular y actualizar el precio
    function actualizarPrecio() {
        const selectedSize = sizeSelect.value;
        const precio = precios[selectedSize];
        const precioConITBIS = precio * (1 + itbis);
        precioValor.textContent = precioConITBIS.toFixed(2);
    }

    // Evento para actualizar el precio cuando se cambie el tamaño
    sizeSelect.addEventListener("change", actualizarPrecio);

    // Llamar a la función inicialmente para mostrar el precio inicial
    actualizarPrecio();
});


/*ESTE CODIGO JS ES PARA EL ARTICULO DE PINZA ELECTRICA TRUPER CONFORT*/
document.addEventListener("DOMContentLoaded", function () {
    const sizeSelect = document.getElementById("sizeconfort");
    const precioValor = document.getElementById("price-value");

    // Precios por tamaño
    const precios = {
        small: 457.60,
        medium:  572.00,
        large: 383.50
        
    };

    // Impuesto ITBIS (18%)
    const itbis = 0.0;

    // Función para calcular y actualizar el precio
    function actualizarPrecio() {
        const selectedSize = sizeSelect.value;
        const precio = precios[selectedSize];
        const precioConITBIS = precio * (1 + itbis);
        precioValor.textContent = precioConITBIS.toFixed(2);
    }

    // Evento para actualizar el precio cuando se cambie el tamaño
    sizeSelect.addEventListener("change", actualizarPrecio);

    // Llamar a la función inicialmente para mostrar el precio inicial
    actualizarPrecio();
});


/**ESTE CODIGO ES PARA LOS CALENTADORES */
document.addEventListener("DOMContentLoaded", function () {
    const sizeSelect = document.getElementById("calentador");
    const precioValor = document.getElementById("price-value");

    // Precios por tamaño
    const precios = {
        small: 4680.00,
        medium:  5199.99,
        large: 6000.00,
        xlarge: 6800.00
        
    };

    // Impuesto ITBIS (18%)
    const itbis = 0.0;

    // Función para calcular y actualizar el precio
    function actualizarPrecio() {
        const selectedSize = sizeSelect.value;
        const precio = precios[selectedSize];
        const precioConITBIS = precio * (1 + itbis);
        precioValor.textContent = precioConITBIS.toFixed(2);
    }

    // Evento para actualizar el precio cuando se cambie el tamaño
    sizeSelect.addEventListener("change", actualizarPrecio);

    // Llamar a la función inicialmente para mostrar el precio inicial
    actualizarPrecio();
});

/**ESTE CODIGO ES PARA LOS CALENTADORES fibra de vidrio */
document.addEventListener("DOMContentLoaded", function () {
    const sizeSelect = document.getElementById("calentador1");
    const precioValor = document.getElementById("price-value");

    // Precios por tamaño
    const precios = {
        small: 6544.20,
        medium:  7225.40,
        
        
    };

    // Impuesto ITBIS (18%)
    const itbis = 0.0;

    // Función para calcular y actualizar el precio
    function actualizarPrecio() {
        const selectedSize = sizeSelect.value;
        const precio = precios[selectedSize];
        const precioConITBIS = precio * (1 + itbis);
        precioValor.textContent = precioConITBIS.toFixed(2);
    }

    // Evento para actualizar el precio cuando se cambie el tamaño
    sizeSelect.addEventListener("change", actualizarPrecio);

    // Llamar a la función inicialmente para mostrar el precio inicial
    actualizarPrecio();
});

/**ESTE CODIGO ES PARA LOS CALENTADORES GAS LINEA BEST */
document.addEventListener("DOMContentLoaded", function () {
    const sizeSelect = document.getElementById("calentador2");
    const precioValor = document.getElementById("price-value");

    // Precios por tamaño
    const precios = {
        small: 5159.38,
        medium:  9413.31,
        large:  9805.19,
        
        
    };

    // Impuesto ITBIS (18%)
    const itbis = 0.0;

    // Función para calcular y actualizar el precio
    function actualizarPrecio() {
        const selectedSize = sizeSelect.value;
        const precio = precios[selectedSize];
        const precioConITBIS = precio * (1 + itbis);
        precioValor.textContent = precioConITBIS.toFixed(2);
    }

    // Evento para actualizar el precio cuando se cambie el tamaño
    sizeSelect.addEventListener("change", actualizarPrecio);

    // Llamar a la función inicialmente para mostrar el precio inicial
    actualizarPrecio();
});