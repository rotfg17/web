const btnAddDeseo = document.querySelectorAll('.btnAddDeseo');
const btnCantidadDeseo = document.querySelector('#btnCantidadDeseo');
let listaDeseo = [];

document.addEventListener('DOMContentLoaded', function(){
    if (localStorage.getItem('listaDeseo') != null) {
        listaDeseo = JSON.parse(localStorage.getItem('listaDeseo'));
    }
    cantidadDeseo();
    for (let i = 0; i < btnAddDeseo.length; i++) {
        btnAddDeseo[i].addEventListener('click', function(){
            let idProducto = btnAddDeseo[i].getAttribute('prod');
            agregarDeseo(idProducto);
        });
    }
});

function agregarDeseo(idProducto) {
    if (listaDeseo.length > 0) {
        for (let i = 0; i < listaDeseo.length; i++) {
            if (listaDeseo[i]['idProducto'] === idProducto) {
                Swal.fire(
                    'Aviso',
                    'El producto ya está en tu lista de deseos',
                    'warning'
                );
                return;
            }
        }
    }
    listaDeseo.push({
        "idProducto": idProducto,
        "cantidad": 1
    });
    localStorage.setItem('listaDeseo', JSON.stringify(listaDeseo));
    Swal.fire(
        'Aviso',
        'Producto agregado a la lista de deseos correctamente',
        'success'
    );
    cantidadDeseo();
}

function cantidadDeseo() {
    let listas = JSON.parse(localStorage.getItem('listaDeseo'));
    if (listas !== null) {
        btnCantidadDeseo.textContent = listas.length;
    } else {
        btnCantidadDeseo.textContent = 0;
    }
}
