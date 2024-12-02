<div class="container mt-4">
    <!-- Mensaje si no se ha seleccionado un local -->
    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-warning text-center">
            <?= esc($mensaje) ?>
            <a href="<?= base_url('/productos-por-local/' . $local['idLocal']) ?>">Ver productos</a>
        </div>
    <?php endif; ?>

    <!-- Mostrar los productos si hay un local seleccionado -->
    <?php if (empty($mensaje)): ?>
        <h2 class="text-center mb-4">Productos de <?= esc(session()->get('localSeleccionado')['nombreLocal']) ?></h2>

        <!-- Categorías -->
        <div class="mb-4">
            <h4>Categorías:</h4>
            <?php if (!empty($categorias)): ?>
                <ul>
                    <?php foreach ($categorias as $categoria): ?>
                        <li><?= esc($categoria['nombre']) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No hay categorías disponibles para este local.</p>
            <?php endif; ?>
        </div>

        <!-- Productos -->
        <div class="row">
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $producto): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($producto['nombreProducto']) ?></h5>
                                <p class="card-text">Descripción: <?= esc($producto['descripcion']) ?></p>
                                <p class="card-text">Precio: $<?= esc($producto['precioProducto']) ?></p>
                                <p class="card-text">Categoría: <?= esc($producto['categoria']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center">No hay productos disponibles para este local.</p>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
