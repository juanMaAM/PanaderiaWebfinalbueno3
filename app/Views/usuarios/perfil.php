<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Usuario</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container Styles */
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        strong {
            color: #333;
        }

        /* Style for the profile picture (optional) */
        .profile-image {
            display: block;
            width: 100px;
            height: 100px;
            margin: 0 auto;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Button Styles */
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .button {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .button:focus {
            outline: none;
        }

        .logout-button {
    text-align: left; /* Centrar horizontalmente */
    margin: 50px 0; /* Espaciado vertical */
}

.logout-button .btn-danger {
    background-color: #dc3545;
    color: white;
    font-weight: bold;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    border: none;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.logout-button .btn-danger:hover {
    background-color: #c82333; /* Color más oscuro al pasar el mouse */
    transform: translateY(-2px); /* Efecto de desplazamiento hacia arriba */
}

.logout-button .btn-danger:focus {
    outline: none;
    box-shadow: 0 0 10px rgba(220, 53, 69, 0.5); /* Sombra al enfocar */
}

    </style>
</head>
<body>

    

    <div class="container">
        <h1>Perfil del Usuario</h1>
        <img src="/imagenes/dulcepan.png" alt="Foto de Perfil" class="profile-image">
        <p><strong>Nombre:</strong> <?= $usuario->nombre . ' ' . $usuario->apellidoPaterno . ' ' . $usuario->apellidoMaterno ?></p>
        <p><strong>Correo:</strong> <?= $usuario->correo ?></p>
        <p><strong>Teléfono:</strong> <?= $usuario->telefono ?></p>
        <p><strong>Fecha de Nacimiento:</strong> <?= $usuario->fecha_nacimiento ?></p>

        <h3>Dirección</h3>
        <?php if ($direccion): ?>
            <p><strong>Calle:</strong> <?= $direccion->calle ?></p>
            <p><strong>Número Exterior:</strong> <?= $direccion->numero_exterior ?></p>
            <p><strong>Número Interior:</strong> <?= $direccion->numero_interior ?></p>
            <p><strong>Colonia:</strong> <?= $direccion->colonia ?></p>
            <p><strong>Ciudad:</strong> <?= $direccion->ciudad ?></p>
            <p><strong>Estado:</strong> <?= $direccion->estado ?></p>
            <p><strong>Código Postal:</strong> <?= $direccion->codigo_postal ?></p>
        <?php else: ?>
            <p>No se ha registrado ninguna dirección.</p>
        <?php endif; ?>
        

        <div class="button-container">
            <a href="inicio" class="button">Regresar</a>
            
            <a href="direccion/add" class="button">Agregar Dirección</a>
        </div>
        <div class="logout-button">
        
            <a href="salir"><button type="submit" class="btn btn-danger">Cerrar Sesión</button></a>
        
    </div>
    </div>
</body>

</html>
