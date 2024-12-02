<div class="container">
    <div class="row">
        <div class="col">
            <?php print_r($usuario); ?>
            <h2>Actualizar Usuario</h2>
            <form action="<?= base_url('usuarios/update/' . $usuario[0]->idUsuario); ?>" method="POST">

                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input name="nombre" type="text" required value="<?=$usuario[0]->nombre; ?>"
                        class="form-control" id="nombre" placeholder="Nombre">
                    <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
                    <input name="apellidoPaterno" type="text" required value="<?=$usuario[0]->apellidoPaterno; ?>"
                        class="form-control" id="apellidoPaterno" placeholder="Apellido Paterno">
                    <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                    <input name="apellidoMaterno" type="text" required value="<?=$usuario[0]->apellidoMaterno; ?>"
                        class="form-control" id="apellidoMaterno" placeholder="Apellido Materno">
                    <label for="password" class="form-label">Contraseña</label>
                    <input name="password" type="password" required value="<?=$usuario[0]->password; ?>"
                        class="form-control" id="password" placeholder="Contraseña">
                    <label for="tipoUsuario" class="form-label">Tipo de Usuario</label>
                    <input name="tipoUsuario" type="text" required value="<?=$usuario[0]->tipoUsuario; ?>"
                        class="form-control" id="tipoUsuario" placeholder="Tipo de Usuario">
                    <label for="correo" class="form-label">Correo</label>
                    <input name="correo" type="email" required value="<?=$usuario[0]->correo; ?>"
                        class="form-control" id="correo" placeholder="Correo">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input name="telefono" type="text" required value="<?=$usuario[0]->telefono; ?>"
                        class="form-control" id="telefono" placeholder="Teléfono">
                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input name="fechaNacimiento" type="date" required value="<?=$usuario[0]->fechaNacimiento; ?>"
                        class="form-control" id="fechaNacimiento" placeholder="Fecha de Nacimiento">
                    <input type="hidden" name="idUsuario" value="<?=$usuario[0]->idUsuario;?>" >
                </div>
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>
        </div>
    </div>
</div>
