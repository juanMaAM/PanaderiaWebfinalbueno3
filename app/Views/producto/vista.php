<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dulce Pan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .top-bar {
            background-color: #0056b3;
            height: 16px;
            width: 80%;
            margin: 0 auto;
        }

        header {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 50px;
            background-color: white;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-top {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 1300px;
            margin-bottom: 10px;
            position: relative;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #333;
        }

        .user-icons {
            position: absolute;
            right: 0; 
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .user-icons img {
            width: 25px;
            height: 25px;
            cursor: pointer;
        }

        nav {
            display: flex;
            gap: 40px;
            justify-content: center;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        nav a {
            position: relative;
            text-decoration: none;
            color: black;
            font-weight: bold;
            font-size: 16px;
            padding: 5px 10px;
            text-align: center;
            transition: color 0.3s ease;
        }

        nav a::before {
            content: "";
            position: absolute;
            top: -10px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #333;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        nav a:hover {
            color: #333;
        }

        nav a:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        main {
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 1300px;
            margin: 0 auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .product-card {
            width: 250px;
            text-align: center;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .product-card img {
            width: 100%;
            height: auto;
            max-height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        .category-buttons {
            margin: 20px auto;
            text-align: center;
        }

        .category-buttons button {
            margin: 5px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s, transform 0.3s;
        }

        .category-buttons button:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }

        .product-card h3 {
            font-size: 1.25rem;
            margin: 10px 0;
            color: #333;
        }

        .product-card p {
            font-size: 1rem;
            color: #777;
        }

        .product-card a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s, transform 0.3s;
        }

        .product-card a:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        footer {
            background-color: #0056b3;
            color: white;
            padding: 20px 0;
            margin-top: auto;
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 50px;
        }

        .footer-content p {
            margin: 0;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icons a img {
            width: 25px;
            height: 25px;
        }

    </style>
</head>
<body>

    <div class="top-bar"></div>

    <header>
        <div class="header-top">
            <div class="logo">
                <img src="/imagenes/dulcepan.png" alt="logo" width="120px" height="120px">
            </div>
            <div class="user-icons">
            <a href="<?= base_url('verCarro')?>"><img src="https://img.icons8.com/material-outlined/24/000000/shopping-cart--v1.png" alt="carrito"></a>
            <a href="<?= base_url('perfil')?>"><img src="https://img.icons8.com/material-outlined/24/000000/user.png" alt="perfil"></a>
            </div>
        </div>

        <nav>
            <a href="<?= base_url('inicio')?>">INICIO</a>
            <a href="<?= base_url('sobreNosotros') ?>">SOBRE NOSOTROS</a>
            <a href="<?= base_url('product') ?>">PRODUCTOS</a>
            <a href="<?= base_url('local/show') ?>">SUCURSALES</a>
            <a href="<?= base_url('contactanos') ?>">CONTÁCTANOS</a>
        </nav>
    </header>

    <main>
        <h1>Productos</h1>

        <?php if (!$localSeleccionado): ?>
            <p style="text-align: center;">No hay un local seleccionado.</p>
            <div style="text-align: center; margin-top: 50px;">
                <form action="/local/show" method="get">
                    <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Seleccionar un local</button>
                </form>
            </div>
        <?php else: ?>
            <?php if (empty($productos)): ?>
                <p style="text-align: center;">No hay productos disponibles para este local.</p>
            <?php else: ?>
                <div class="category-buttons">
                    <form method="get" action="<?= base_url('producto/show') ?>">
                        <button type="submit" name="categoria" value="todos">Todos</button>

                        <?php 
                        // Obtener las categorías disponibles para el local seleccionado
                        $categorias = array_unique(array_map(function($producto) {
                            return $producto->categoria;
                        }, $productos));

                        // Mostrar un botón para cada categoría
                        foreach ($categorias as $categoria): ?>
                            <button type="submit" name="categoria" value="<?= $categoria ?>"><?= $categoria ?></button>
                        <?php endforeach; ?>
                    </form>
                </div>

                <div class="product-container">
                    <?php foreach ($productos as $producto): ?>
                        <div class="product-card">
                            <img src="<?= base_url('imagenes') . '/' . $producto->imagen ?>" alt="<?= $producto->nombreProducto ?>">
                            <h3><?= $producto->nombreProducto ?></h3>
                            <p><?= $producto->descripcion ?></p>
                            <a href="<?= base_url('producto/detalle/' . $producto->idProducto) ?>">Ver más</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </main>

    <footer>
        <div class="footer-content">
        
            <div class="social-icons">
            <a href="#"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/instagram-new.png" alt="Instagram"></a>
                <a href="#"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/twitter--v1.png" alt="Twitter"></a>
        </div>
    </footer>

</body>
</html>



