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
            bottom: -5px;
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
        }

        h1 {
            font-size: 36px;
            color: #333;
            margin-bottom: 20px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background-color: #f4f4f4;
            border-radius: 10px;
            padding: 20px;
            width: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #0056b3;
        }

        .card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
        }

        .card button {
            padding: 10px 20px;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card button:hover {
            background-color: #004494;
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
    </header>
    
    <nav>
            <a href="<?= base_url('inicio')?>">INICIO</a>
            <a href="<?= base_url('sobreNosotros') ?>">SOBRE NOSOTROS</a>
            <a href="<?= base_url('product') ?>">PRODUCTOS</a>
            <a href="<?= base_url('local/show') ?>">SUCURSALES</a>
            <a href="<?= base_url('contactanos') ?>">CONTÁCTANOS</a>
        </nav>

    <main>
        <h1>Lista de Locales</h1>

        <?php if ($selected): ?>
            <div class="card">
            <h2>Local Seleccionado</h2>
            <p><strong>Nombre:</strong> <?= $locales[0]->nombreLocal ?></p>
            <p><strong>Dirección:</strong> <?= $locales[0]->direccionLocal ?></p>
            <p><strong>Alias:</strong> <?= $locales[0]->aliasLocal ?></p>
            
            <img src="<?= !empty($locales[0]->imagen) ? base_url('imagenes/' . $locales[0]->imagen) : base_url('imagenes/no-image.png') ?>" alt="Imagen del local <?= $locales[0]->nombreLocal ?>" style="width: 100%; height: auto; border-radius: 8px; margin-top: 20px;">
            <form action="/local/reset" method="post">
                <button type="submit">Seleccionar otro local</button>
                </div>
            </form>
        <?php else: ?>
            <div class="card-container">
                <?php foreach ($locales as $local): ?>
                    <div class="card">
                        <h3><?= $local->nombreLocal ?></h3>
                        <p><strong>Dirección:</strong> <?= $local->direccionLocal ?></p>
                        <p><strong>Alias:</strong> <?= $local->aliasLocal ?></p>
                        <form action="/local/select/<?= $local->idLocal ?>" method="post">
                            <button type="submit">Seleccionar este local</button>
                            
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <footer>
        <div class="footer-content">
            <div class="social-icons">
                <a href="#"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/facebook.png" alt="Facebook"></a>
                <a href="#"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/instagram-new.png" alt="Instagram"></a>
                <a href="#"><img src="https://img.icons8.com/ios-glyphs/30/ffffff/twitter--v1.png" alt="Twitter"></a>
            </div>
        </div>
    </footer>

</body>
</html>





