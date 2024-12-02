<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Venta</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Detalles de la Venta</h1>

        <!-- Información de la Venta -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h2 class="card-title">Información de la Venta</h2>
                <p><strong>Fecha:</strong> <?= $venta->fecha ?></p>
                <p><strong>Total:</strong> $<?= number_format($venta->total, 2) ?></p>
            </div>
        </div>

        <!-- Información del Usuario -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h2 class="card-title">Información del Usuario</h2>
                <p><strong>Nombre:</strong> <?= $usuario->nombre ?> <?= $usuario->apellidoPaterno ?> <?= $usuario->apellidoMaterno ?></p>
                <p><strong>Correo:</strong> <?= $usuario->correo ?></p>
                <p><strong>Teléfono:</strong> <?= $usuario->telefono ?></p>
                <p><strong>Dirección:</strong> <?= $direccion->calle ?>, <?= $direccion->colonia ?>, <?= $direccion->ciudad ?>, <?= $direccion->estado ?>, <?= $direccion->codigo_postal ?></p>
            </div>
        </div>

        <!-- Productos de la Venta -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h2 class="card-title">Productos de la Venta</h2>
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td><?= $producto->nombreProducto ?></td>
                                <td><?= $producto->cantidad ?></td>
                                <td>$<?= number_format($producto->precio, 2) ?></td>
                                <td>$<?= number_format($producto->subtotal, 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Botón de Regresar -->
        <div class="text-center">
            <a href="<?= base_url('ventas') ?>" class="btn btn-secondary">Regresar a la Lista de Ventas</a>
        </div>

    </div>

</body>
</html>
