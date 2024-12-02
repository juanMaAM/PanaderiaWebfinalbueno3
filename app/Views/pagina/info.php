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
            align-items: center;
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
            padding: 20px;
            background-color: white;
          
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
            right: -250px; 
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
        }

        nav a {
            position: relative;
            text-decoration: none;
            color: black;
            font-weight: bold;
            font-size: 16px;
            padding: 5px 10px;
            text-align: center;
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

        nav a:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }

        .content-section {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 1300px;
            gap: 20px;
            margin-top: 20px;
            padding: 0 15px;
            box-sizing: border-box;
        }

        .left-column, .right-column {
            display: flex;
            flex-direction: column;
            gap: 20px;
            flex: 1;
            padding: 0 40px;
        }

        .left-column img, .right-column img {
            width: 100%;
            height: 200px; 
            object-fit: cover; 
            border-radius: 5px;
        }

        .content {
            flex: 1;
            max-width: 600px;
            text-align: center;
            padding: 0 20px;
        }

        .content h1 {
            font-size: 36px;
            margin: 10px 0;
            color: #0056b3;
        }

        .content p {
            font-size: 14px;
            color: #666;
            margin: 10px auto;
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
        }

        .horizontal-divider {
            width: 40%;
            height: 2px;
            background-color: #0056b3;
            margin: 5px auto;
        }

        footer {
            background-color: #0056b3;
            color: white;
            padding: 20px 0;
            width: 100%;
            box-sizing: border-box;
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
            width: 100%;
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

    <div class="content-section">
        <div class="left-column">
            <img src="/imagenes/imagen1.jpg" alt="Imagen 1">
            <img src="/imagenes/imagen2.webp" alt="Imagen 2">
            <img src="/imagenes/imagen3.jpg" alt="Imagen 3">
        </div>
        
        <div class="content">
            <h1>SOBRE PANADERÍA Dulce Pan</h1>
            <p>Fundada en 1927 e inicialmente llamada Ideal Bakery, Pastelería Ideal inicia su décima década ininterrumpida de operaciones en la Ciudad de México. Lo que empezó como un modesto expendio de pan en plena época de la Guerra Cristera, es hoy una empresa consolidada y bien posicionada en la mente de los habitantes de la Ciudad de México.</p>
            
            <div class="horizontal-divider"></div>
            <div class="horizontal-divider"></div>

            <h1>NUESTROS PRODUCTOS</h1>
            <p>Contamos con una serie de productos de panadería tradicional, pan dulce, hojaldre, pan danés, pan vienés, pan rústico, así como pastelería de vitrina individual, mousses, pasteles, gelatinas, tartas, pays, galletas de pasta seca y bocadillos.</p>
        </div>
        
        <div class="right-column">
            <img src="/imagenes/imagen1.jpg" alt="Imagen 4">
            <img src="/imagenes/imagen4.jpg" alt="Imagen 5">
            <img src="/imagenes/imagen5.jpg" alt="Imagen 6">
        </div>
    </div>

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














