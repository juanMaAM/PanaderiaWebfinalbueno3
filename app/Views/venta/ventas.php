<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Ventas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Lista de Ventas</h1>

        <div class="shadow-sm">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID Venta</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ventas as $venta): ?>
                            <tr>
                                <td><?= $venta->idVenta ?></td>
                                <td><?= $venta->fecha ?></td>
                                <td>$<?= number_format($venta->total, 2) ?></td>
                                <td><?= $venta->usuario->nombre ?> <?= $venta->usuario->apellidoPaterno ?> <?= $venta->usuario->apellidoMaterno ?></td>
                                <td>
                                    <a href="<?= base_url('venta/detalle/' . $venta->idVenta) ?>" class="btn btn-info btn-sm">Ver productos</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>

</html>
