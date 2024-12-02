<div class="container">
    <div class="row">
        <div class="col">

        <h2>Agregar Categoria</h2>
        <?= validation_list_errors() ?>

    <form action="<?=base_url('categorias/insert'); ?>" method="POST">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <input name="categoria" type="text" 
            class="form-control" id="categoria"
            required
            placeholder="categoria" value="<?= set_value('nombreCategoria') ?>" >

            <input name="descripcion" type="text" 
            class="form-control" id="descripcion"
            required
            placeholder="descripcion" value="<?= set_value('descripcionCategoria') ?>" >
        </div>
        <input type="submit" class="btn btn-success" value="Agregar">
        </form>
    
    </div>
    </div>
</div>




