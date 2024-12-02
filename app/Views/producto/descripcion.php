<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $producto->nombreProducto ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 120px;
            max-height: 120px;
            border-radius: 50%;
        }

        .card {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            width: 90%;
            max-width: 800px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        .detalle-producto {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            align-items: center;
        }

        .detalle-producto img {
            max-width: 300px;
            max-height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }

        .info-producto {
            flex: 1;
        }

        .info-producto h1 {
            margin-top: 0;
            color: #333;
        }

        .btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            font-size: 14px;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #218838;
        }

        .card-footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    
    <div class="logo">
        <img src="/imagenes/dulcepan.png" alt="logo">
    </div>

    
    <div class="card">
        <div class="card-header">
            <h2><?= $producto->nombreProducto ?></h2>
        </div>
        <div class="card-body">
            <div class="detalle-producto">
                <img src="<?= base_url('imagenes/' . $producto->imagen) ?>" alt="<?= $producto->nombreProducto ?>">
                <div class="info-producto">
                    <h1><?= $producto->nombreProducto ?></h1>
                    <p><strong>Precio:</strong> $<?= number_format($producto->precioProducto, 2) ?></p>
                    <p><strong>Stock disponible:</strong> <?= $producto->stock ?></p>
                    <p><strong>Descripción:</strong> <?= $producto->descripcion ?></p>
                    <form action="<?= base_url('insertarCarro'); ?>" method="POST">
                        <div class="form">
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" min="1" max="<?= $producto->stock; ?>" name="cantidad" class="form-control">
                        </div>
                        <br>
                        <input type="hidden" value="<?= $producto->idProducto; ?>" name="idProducto">
                        <input type="hidden" value="<?= $producto->precioProducto; ?>" name="costo">
                        <input type="hidden" value="<?= $producto->nombreProducto; ?>" name="nombre">
                        <button type="submit" class="btn">Agregar al carrito</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <p>Su pedido</p>
        </div>
    </div>
    <button class="btn btn-secondary" onclick="history.back()">Regresar</button>
</body>
</html>


