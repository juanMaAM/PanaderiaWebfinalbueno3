<div class="container mt-5">
    <h2 class="text-center mb-4">Lista de Contactos</h2>
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Mensaje</th>
                <th>Fecha</th>
                <th>Acciones</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto): ?>
                <tr>
                   
                    <td><?= $contacto->idContacto ?></td>
                    <td><?= $contacto->nombre ?></td>
                    <td><?= $contacto->email ?></td>
                    <td><?= $contacto->telefono ?></td>
                    <td><?= $contacto->mensaje ?></td>
                    <td><?= $contacto->fecha ?></td>
                    <td>
                        
                        <a href="<?= site_url('contacto/delete/' . $contacto->idContacto) ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>




