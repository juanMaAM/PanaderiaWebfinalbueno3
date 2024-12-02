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

        
        .image-section {
            display: flex;
            width: 100%; 
            overflow: hidden; 
            margin: 20px 0; 
        }

        .image-gallery {
            display: flex;
            width: 600%; 
            height: 430px;
        }

        .image-gallery img {
            width: 0; 
            flex-grow: 1; 
            object-fit: cover; 
            opacity: .8; 
            transition: .5s ease; 
            
        }

        .image-gallery img:hover {
            cursor: crosshair; 
            width: 300px; 
            opacity: 1; 
            filter: contrast(120%); 
        }

        
        .content {
            flex: 1;
            text-align: center;
            padding: 20px;
        }

        .content h1 {
            font-size: 36px;
            margin-top: 20px;
            color: #333;
        }

        .content p {
            font-size: 14px;
            color: #666;
            margin: 20px 0;
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
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
                <img src="https://img.icons8.com/material-outlined/24/000000/appointment-reminders.png" alt="notificaciones">
                <img src="https://img.icons8.com/material-outlined/24/000000/shopping-cart--v1.png" alt="carrito">
                <img src="https://img.icons8.com/material-outlined/24/000000/user.png" alt="perfil">
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


    <div style="margin: 20px; font-family: Arial, sans-serif; color: #333;"> 
    <div style="text-align: center; margin-bottom: 20px;">
        <h1 style="color: #2c3e50;">Locales asociados</h1>
    </div>
    <div style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;">
        <?php foreach ($locales as $key) : ?>
            <div style="border: 1px solid #e0e0e0; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); width: 320px; overflow: hidden; background-color: white; transition: transform 0.3s, box-shadow 0.3s;">
                <div style="padding: 20px;">
                    <h2 style="margin: 0 0 10px; font-size: 22px; color: #34495e; font-weight: bold;"><?= esc($key->nombreLocal); ?></h2>
                    <h4 style="margin: 0 0 10px; font-size: 16px; color: #7f8c8d;"><?= esc($key->aliasLocal); ?></h4>
                    <p style="margin: 0 0 15px; font-size: 14px; color: #555; line-height: 1.5;">
                        <strong>Dirección:</strong> <?= esc($key->direccionLocal); ?><br>
                        <strong>Horario:</strong> <?= esc($key->horario); ?>
                    </p>
                </div>
                
                
            </div>
        <?php endforeach; ?>
    </div>
</div>















