<div class="container">
    <div class="row">
        <div class="col">
            <h1>Locales</h1>
            <a href="<?= base_url('locales/add/'); ?>" class="btn btn-success">Agregar</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID Local</th>
                        <th>Nombre</th>
                        <th>Alias</th>
                        <th>Dirección</th>
                        <th>Horario</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($locales as $key) : ?>
                        <tr>
                            <td><?= $key->idLocal ?></td>
                            <td><?= $key->nombreLocal ?></td>
                            <td><?= $key->aliasLocal ?></td>
                            <td><?= $key->direccionLocal ?></td>
                            <td><?= $key->horario ?></td>
                            <td>
                                <img src="<?= !empty($key->imagen) ? base_url('imagenes/' . $key->imagen) : base_url('imagenes/no-image.png') ?>"
                                     style="width: 50px; height: auto; border-radius: 8px; margin-top: 10px;">
                            </td>
                            <td>
                                <a href="<?= base_url('locales/edit/'.$key->idLocal); ?>" class="btn btn-warning me-2">Modificar</a>
                                <a href="<?= base_url('locales/delete/'.$key->idLocal); ?>" class="btn btn-danger" 
                                onclick="return confirm('¿Estás seguro de que deseas eliminar este local?')"> 
                                <i class="fas fa-trash"></i>Borrar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

