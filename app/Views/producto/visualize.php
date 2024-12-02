<div class="container">
    <div class="row">
        <div class="col">
            <h1>Lista de Productos</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Producto</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($producto)) : ?>
                        <?php foreach ($producto as $key) : ?>
                            <tr>
                                <td><?= $key->idProducto ?></td>
                                <td><?= $key->nombreProducto ?></td>
                                <td><?= $key->descripcion ?></td>
                                <td><?= $key->precioProducto ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center">No hay productos disponibles.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
