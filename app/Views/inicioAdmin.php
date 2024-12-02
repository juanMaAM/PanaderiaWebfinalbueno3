<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Notificaciones</title>
    <link rel="stylesheet" href="path_to_your_css/styles.css">
    <style>
        .alertas {
            background-color: #ffcccc;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            width: 70%; /* Ajuste del ancho al 70% */
            margin-left: auto; /* Centra el contenedor */
            margin-right: auto; /* Centra el contenedor */
        }

        .alertas h2 {
            color: red;
        }

        .alertas ul {
            list-style: none;
            padding: 0;
        }

        .alertas li {
            background-color: #fff;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
        }

        .alertas li strong {
            color: #d9534f;
        }

        .btn {
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Estilos para el mensaje de bienvenida */
        .bienvenido {
            font-size: 36px; /* Tamaño de fuente grande */
            font-weight: bold;
            color: #4CAF50; /* Color verde */
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <!-- Mensaje de bienvenida -->
    <div class="bienvenido">
        Bienvenido Administrador
    </div>

    <h1>Panel de Notificaciones</h1>

    <?php if (!empty($alertas)): ?>
        <div class="alertas">
            <h2>Alertas de Bajo Stock</h2>
            <ul>
                <?php foreach ($alertas as $alerta): ?>
                    <li>
                        <strong>Producto:</strong> <?= $alerta['producto'] ?> <br>
                        <strong>Categoría:</strong> <?= $alerta['categoria'] ?> <br>
                        <strong>Stock:</strong> <?= $alerta['stock'] ?> unidades <br>
                        <strong>Local:</strong> <?= $alerta['local'] ?> <br>
                        <a href="<?= base_url('/productos/edit/' . $alerta['idproducto']) ?>" class="btn">Modificar</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else: ?>
        <p>No hay productos con bajo stock.</p>
    <?php endif; ?>
</body>
</div>
</html>
