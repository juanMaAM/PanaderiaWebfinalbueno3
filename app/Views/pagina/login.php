<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Sign Up</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <style>
        body {
            background-color: #f7f7f7;
        }

        .login-card {
            width: 350px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border: none;
            position: relative;
        }

        .logo-img {
            position: absolute;
            left: 10%;
            transform: translateX(-10%);
            width: 500px;
            height: auto;
        }
       
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <!-- Logo flotante a la izquierda -->
        <img src="/imagenes/dulcepan.png" alt="Logo" class="logo-img">
        
        
        <!-- Tarjeta de Login -->
        <div class="card login-card">
            <h5 class="text-center mb-3">Login</h5>
            <form action="/usuario/acceder" method="POST">
                <div class="form-group">
                    <input type="email" name="correo" class="form-control" placeholder="Correo Electrónico" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                </form>
                <!-- Nuevo mensaje para crear cuenta -->
                <div class="text-center mt-3">
                    <span>¿No tienes una cuenta? </span>
                    <a href="/usuario/Registrar" class="text-muted">Crea una aquí</a>
                </div>
                <div class="text-center mt-3">
                    <span>¿continuar sin una cuenta? </span>
                    <a href="inicio" class="text-muted">Si, por favor</a>
                </div>
            
        </div>
    </div>
</body>
</html>
