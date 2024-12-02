<div class="container">
    <div class="row">
        <div class="col">
            <h2>Actualizar Local</h2>
            <form action="<?= base_url('locales/update/'); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="mb-3">
                    <label for="local" class="form-label">Nombre del Local</label>
                    <input name="local" type="text" required value="<?= $locales->nombreLocal; ?>" class="form-control" id="local" placeholder="Nombre del Local">

                    <label for="alias" class="form-label">Alias del Local</label>
                    <input name="alias" type="text" required value="<?= $locales->aliasLocal; ?>" class="form-control" id="alias" placeholder="Alias del Local">

                    <label for="direccion" class="form-label">Dirección del Local</label>
                    <input name="direccion" type="text" required value="<?= $locales->direccionLocal; ?>" class="form-control" id="direccion" placeholder="Dirección del Local">

                    <label for="horario" class="form-label">Horario</label>
                    <input name="horario" type="text" required value="<?= $locales->horario; ?>" class="form-control" id="horario" placeholder="Horario del Local">

                    <input type="hidden" name="idLocal" value="<?= $locales->idLocal; ?>">
                </div>
                <input type="submit" class="btn btn-success" name="Modificar" value="Modificar">
            </form>
        </div>
    </div>
</div>