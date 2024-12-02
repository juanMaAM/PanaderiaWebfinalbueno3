<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Local</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Agregar Local</h2>
                <?= validation_list_errors() ?>
                <form action="<?= base_url('locales/insert'); ?>" method="POST" enctype="multipart/form-data"> <!-- Cambié a multipart/form-data -->
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                    <div class="mb-3">
                        <label for="local" class="form-label">Nombre del Local</label>
                        <input name="local" type="text" class="form-control" id="local" required placeholder="Nombre del Local" value="<?= set_value('nombreLocal') ?>">

                        <label for="alias" class="form-label">Alias del Local</label>
                        <input name="alias" type="text" class="form-control" id="alias" required placeholder="Alias del Local" value="<?= set_value('aliasLocal') ?>">

                        <label for="direccion" class="form-label">Dirección del Local</label>
                        <input name="direccion" type="text" class="form-control" id="direccion" required placeholder="Dirección del Local" value="<?= set_value('direccionLocal') ?>">

                        <label for="horario" class="form-label">Horario</label>
                        <input name="horario" type="text" class="form-control" id="horario" required placeholder="Horario del Local" value="<?= set_value('horario') ?>">

                        <!-- Agregar campo para la imagen -->
                        <label for="imagen" class="form-label">Imagen del Local</label>
                        <input name="imagen" type="file" class="form-control" id="imagen" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-success">Agregar Local</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka2p7qk...QpggV3!" crossorigin="anonymous"></script>
  </body>
</html>

