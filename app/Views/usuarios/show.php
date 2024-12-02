<div class="container">

    <div class="row">
        <div class="col">
            <h1>Usuarios</h1>
            <a href="<?=base_url('usuarios/add/');?> " class="btn btn-success">Agregar</a>
        </div>
    </div>

    <?php echo "aqui"; print_r($usuarios); ?>
    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>ID usuario</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Tipo de Usuario</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $key) : ?>
                        <tr>
                        <td><?=$key->idUsuario ?></td>
                        <td><?=$key->nombre ?></td>
                        <td><?=$key->apellidoPaterno ?></td>
                        <td><?=$key->apellidoMaterno ?></td>
                        <td><?=$key->tipoUsuario ?></td>
                        <td><?=$key->correo ?></td>
                        <td><?=$key->telefono ?></td>
                        <td><?=$key->fechaNacimiento ?></td>
                        <td>
                            <a href="<?=base_url('usuarios/delete/'.$key->idUsuario);?> " class="btn btn-danger">Borrar</a>
                            <a href="<?=base_url('usuarios/edit/'.$key->idUsuario);?> " class="btn btn-warning">Modificar</a>
                            
                        </td> 
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>





