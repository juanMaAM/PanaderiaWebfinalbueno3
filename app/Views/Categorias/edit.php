<div class="container">
<div class="row">
        <div class="col">
        
        <h2>Actualizar Categoria</h2>
        <form action="<?=base_url('categorias/update/'.$categoria[0]->idCategoria);?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <input name="categoria" type="text" required value="<?=$categoria[0]->nombreCategoria; ?>"
                        class="form-control" id="categoria" placeholder="Categoria">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input name="descripcion" type="text" required value="<?=$categoria[0]->descripcionCategoria; ?>"
                        class="form-control" id="descripcion" placeholder="Descripción">
                <input type="hidden" name="idcategoria" value="<?=$categoria[0]->idCategoria;?>" >
                </div>
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
        </form>
        </div>
</div>
</div>






