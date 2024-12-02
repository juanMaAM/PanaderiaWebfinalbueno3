$(document).ready(function () {
    $('.btn-categoria').on('click', function () {
        const idCategoria = $(this).data('id');
        const url = `http://localhost/tu_proyecto/categoriaBoton/productos/${idCategoria}`;

        // Realizamos la petición AJAX
        $.get(url, function (productos) {
            const productosContainer = $('#productos-container');
            productosContainer.empty(); // Limpia los productos previos

            if (productos.length > 0) {
                productos.forEach(producto => {
                    const productoCard = `
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h5 class="card-title">${producto.nombreProducto}</h5>
                                    <p>${producto.descripcion}</p>
                                    <p class="text-success">Precio: $${producto.precioProducto}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    productosContainer.append(productoCard);
                });
            } else {
                productosContainer.html('<p class="text-center">No hay productos para esta categoría.</p>');
            }
        });
    });
});


