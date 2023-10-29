/*CODIGO PARA HACER QUE LOS PRODUCTOS SE PONGAN ALEATORIOS AL ACTUALIZAR LA PAGINA*/
window.addEventListener("load", function() {
    const container = document.getElementById("product-container");
    const cards = container.querySelectorAll(".product-card");
  
    // Convertimos la lista de nodos a un arreglo
    const cardsArray = Array.from(cards);
  
    // Reorganizamos el arreglo de manera aleatoria
    const shuffledCards = cardsArray.sort(() => Math.random() - 0.5);
  
    // Removemos los elementos existentes del contenedor
    cards.forEach(card => card.remove());
  
    // Agregamos los elementos reorganizados de nuevo al contenedor
    shuffledCards.forEach(card => container.appendChild(card));
  });
  