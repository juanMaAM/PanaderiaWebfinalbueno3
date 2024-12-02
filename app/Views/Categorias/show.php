<div class="container">

<div class="row">
    <div class="col">
        <h1>Categorias</h1>
        <a href="<?=base_url('categorias/add/');?> " class="btn btn-success">Agregar</a>
    </div>
</div>


    <div class="row">
        <div class="col">
            <table class="table table-striped table-bordered">
                <thead>
                    <th>ID categoria</th>
                    <th>categoria</th>
                    <th>descripción</th>
                </thead>
                <tbody>
                    <?php foreach($categorias as $key) : ?>
                        <tr>
                        <td><?=$key->idCategoria ?></td>
                        <td><?=$key->nombreCategoria ?></td>
                        <td><?=$key->descripcionCategoria ?></td>
                        <td>
                            <a href="<?=base_url('categorias/edit/'.$key->idCategoria);?> " class="btn btn-warning">Modificar</a>
                            <a href="<?=base_url('categorias/delete/'.$key->idCategoria);?> " class="btn btn-danger">Borrar</a>
                        </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


