<div class="container">
    <div class="row">
        <div class="col">

        <h2>Agregar Usuario</h2>
        <?= validation_list_errors() ?>

    <form action="<?=base_url('usuarios/insert'); ?>" method="POST">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input name="nombre" type="text" 
            class="form-control" id="nombre"
            required
            placeholder="nombre" value="<?= set_value('nombre') ?>" >

            <label for="apellidoPaterno" class="form-label">Apellido Paterno</label>
            <input name="apellidoPaterno" type="text" 
            class="form-control" id="apellidoPaterno"
            required
            placeholder="apellido paterno" value="<?= set_value('apellidoPaterno') ?>" >

            <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
            <input name="apellidoMaterno" type="text" 
            class="form-control" id="apellidoMaterno"
            required
            placeholder="apellido materno" value="<?= set_value('apellidoMaterno') ?>" >

            <label for="password" class="form-label">Contraseña</label>
            <input name="password" type="password" 
            class="form-control" id="password"
            required
            placeholder="contraseña" value="<?= set_value('password') ?>" >

            <label for="tipoUsuario" class="form-label">Tipo de Usuario</label>
            <input name="tipoUsuario" type="text" 
            class="form-control" id="tipoUsuario"
            required
            placeholder="tipo de usuario" value="<?= set_value('tipoUsuario') ?>" >

            <label for="correo" class="form-label">Correo</label>
            <input name="correo" type="email" 
            class="form-control" id="correo"
            required
            placeholder="correo" value="<?= set_value('correo') ?>" >

            <label for="telefono" class="form-label">Teléfono</label>
            <input name="telefono" type="text" 
            class="form-control" id="telefono"
            required
            placeholder="teléfono" value="<?= set_value('telefono') ?>" >

            <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento</label>
            <input name="fechaNacimiento" type="date" 
            class="form-control" id="fechaNacimiento"
            required
            placeholder="fecha de nacimiento" value="<?= set_value('fechaNacimiento') ?>" >
        </div>
        <input type="submit" class="btn btn-success" value="Agregar">
        </form>
    
    </div>
    </div>
</div>

