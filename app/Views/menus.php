<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Lateral Animado</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
            overflow-x: hidden; /* Para evitar el desplazamiento horizontal cuando se abre el panel */
            flex-direction: column; /* Para que el logo y el contenido se apilen */
        }

        /* Estilo del logo centrado en la parte superior */
        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px 0;
            background-color: #f8f8f8; /* Fondo claro */
            position: relative;
        }

        .logo img {
            width: 120px;
            height: 120px;
        }

        /* Estilo del panel lateral */
        .sidebar {
            width: 250px;
            background-color: #0056b3;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            position: fixed;
            top: 0;
            left: -250px; /* Comienza fuera de la pantalla */
            height: 100%;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar.open {
            transform: translateX(250px); /* Panel se mueve hacia la derecha */
        }

        .sidebar h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
            display: block;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #003d80;
        }

        /* Botón de abrir/cerrar integrado al panel */
        .toggle-btn {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            position: absolute;
            top: 20px;
            right: -45px; /* Posicionado fuera del panel */
            transition: transform 0.3s ease-in-out;
        }

        .sidebar.open .toggle-btn {
            transform: rotate(180deg); /* El botón rota cuando el panel se abre */
            right: -45px; /* Se mantiene en la misma posición */
        }

        /* Estilo del contenido principal */
        .main-content {
            margin-left: 20px;
            padding: 20px;
            flex: 1;
            transition: margin-left 0.3s ease-in-out;
            margin-top: 20px; /* Para separar del logo */
        }

        .main-content.open {
            margin-left: 270px;
        }

        /* Estilos para hacer el diseño responsivo */
        @media (max-width: 768px) {
            /* Cambiar el panel lateral para pantallas más pequeñas */
            .sidebar {
                width: 200px;
                left: -200px; /* Panel comienza fuera de la pantalla en dispositivos móviles */
            }

            .sidebar.open {
                transform: translateX(200px);
            }

            .sidebar a {
                font-size: 14px; /* Reducir el tamaño de fuente en pantallas pequeñas */
            }

            .toggle-btn {
                right: -40px; /* Ajustar la posición del botón */
                top: 15px;
            }

            /* Hacer que el contenido principal ocupe el espacio completo */
            .main-content {
                margin-left: 0;
            }

            .main-content.open {
                margin-left: 200px; /* Espacio para el menú lateral */
            }
        }

        @media (max-width: 480px) {
            /* Reducir aún más el tamaño para pantallas más pequeñas */
            .sidebar {
                width: 180px;
                left: -180px;
            }

            .sidebar.open {
                transform: translateX(180px);
            }

            .sidebar a {
                font-size: 12px; /* Reducir aún más el tamaño de fuente en pantallas extra pequeñas */
            }

            .toggle-btn {
                right: -35px;
                top: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Logo centrado en la parte superior -->
    <div class="logo">
        <img src="/imagenes/dulcepan.png" alt="logo">
    </div>

    <!-- Panel lateral -->
    <div class="sidebar" id="sidebar">
        <button class="toggle-btn" id="toggle-btn">☰</button>
        <h2>Menú</h2>
        <a href="<?= base_url('inicioAdmin') ?>">inicio</a>
        <a href="<?= base_url('ventas') ?>">pedidos</a>
        <a href="<?= base_url('locales') ?>">Locales</a>
        <a href="<?= base_url('categorias') ?>">Categorías</a>
        <a href="<?= base_url('productos') ?>">Productos</a>
        <a href="<?= base_url('contacto/show_contactos') ?>">mensajes</a>
        <br>
        <br>
        <br>
        <a href="<?= base_url('salir') ?>">Cerrar sesión</a>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggle-btn');
        const mainContent = document.getElementById('main-content');

        // Abrir/cerrar el panel con el botón
        toggleBtn.addEventListener('click', (e) => {
            e.stopPropagation(); // Evita que el clic en el botón cierre el panel
            sidebar.classList.toggle('open');
            mainContent.classList.toggle('open');
        });

        // Cerrar el panel al hacer clic en cualquier parte fuera del panel
        document.addEventListener('click', (e) => {
            if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                sidebar.classList.remove('open');
                mainContent.classList.remove('open');
            }
        });

        // Evitar que el panel se cierre si se hace clic dentro de él
        sidebar.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    </script>

</body>
</html>
