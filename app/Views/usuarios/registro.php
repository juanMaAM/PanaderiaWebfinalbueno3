<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            width: 90%;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        .text-danger {
            color: #e74c3c;
            font-size: 12px;
        }

        .btn-success {
            display: block;
            width: 100%;
            background-color: #28a745;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrate</h2>
        <?= validation_list_errors() ?>
        <form action="<?= base_url('usuario/register'); ?>" method="POST">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" type="text" class="form-control" id="nombre" required placeholder="Nombre" value="<?= set_value('nombre') ?>">
            <?php if (isset($validation) && $validation->hasError('nombre')): ?>
                <small class="text-danger"><?= $validation->getError('nombre') ?></small>
            <?php endif; ?>

            <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
            <input name="apellidoPaterno" type="text" class="form-control" id="apellidoPaterno" required placeholder="Apellido Paterno" value="<?= set_value('apellidoPaterno') ?>">
            <?php if (isset($validation) && $validation->hasError('apellidoPaterno')): ?>
                <small class="text-danger"><?= $validation->getError('apellidoPaterno') ?></small>
            <?php endif; ?>

            <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
            <input name="apellidoMaterno" type="text" class="form-control" id="apellidoMaterno" required placeholder="Apellido Materno" value="<?= set_value('apellidoMaterno') ?>">
            <?php if (isset($validation) && $validation->hasError('apellidoMaterno')): ?>
                <small class="text-danger"><?= $validation->getError('apellidoMaterno') ?></small>
            <?php endif; ?>

            <label for="password" class="form-label">Contraseña</label>
            <input name="password" type="password" class="form-control" id="password" required placeholder="Contraseña" value="<?= set_value('password') ?>">
            <?php if (isset($validation) && $validation->hasError('password')): ?>
                <small class="text-danger"><?= $validation->getError('password') ?></small>
            <?php endif; ?>

            <label for="password_confirm" class="form-label">Confirmar Contraseña</label>
            <input name="password_confirm" type="password" class="form-control" id="password_confirm" required placeholder="Confirmar Contraseña" value="<?= set_value('password_confirm') ?>">
            <?php if (isset($validation) && $validation->hasError('password_confirm')): ?>
                <small class="text-danger"><?= $validation->getError('password_confirm') ?></small>
            <?php endif; ?>

            <label for="correo" class="form-label">Correo</label>
            <input name="correo" type="email" class="form-control" id="correo" required placeholder="Correo Electrónico" value="<?= set_value('correo') ?>">
            <?php if (isset($validation) && $validation->hasError('correo')): ?>
                <small class="text-danger"><?= $validation->getError('correo') ?></small>
            <?php endif; ?>

            <label for="telefono" class="form-label">Teléfono</label>
            <input name="telefono" type="text" class="form-control" id="telefono" required placeholder="Teléfono" value="<?= set_value('telefono') ?>">
            <?php if (isset($validation) && $validation->hasError('telefono')): ?>
                <small class="text-danger"><?= $validation->getError('telefono') ?></small>
            <?php endif; ?>

            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
            <input name="fechaNacimiento" type="date" class="form-control" id="fechaNacimiento" required value="<?= set_value('fechaNacimiento') ?>">
            <?php if (isset($validation) && $validation->hasError('fechaNacimiento')): ?>
                <small class="text-danger"><?= $validation->getError('fechaNacimiento') ?></small>
            <?php endif; ?>

            <input type="submit" class="btn btn-success" value="Agregar">
        </form>
    </div>
</body>
</html>

