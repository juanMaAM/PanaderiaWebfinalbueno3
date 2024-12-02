<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Producto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Agregar Producto</h2>
                <?= validation_list_errors() ?>
                <form action="<?= base_url('productos/insert'); ?>" method="POST" enctype="multipart/form-data"> <!-- Cambié a multipart/form-data -->
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

                    <div class="mb-3">
                        <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                        <input name="nombreProducto" type="text" class="form-control" id="nombreProducto" required placeholder="Nombre del producto" value="<?= set_value('nombreProducto') ?>">

                        <label for="descripcion" class="form-label">Descripción</label>
                        <input name="descripcion" type="text" class="form-control" id="descripcion" required placeholder="Descripción del producto" value="<?= set_value('descripcion') ?>">

                        <label for="precioProducto" class="form-label">Precio</label>
                        <input name="precioProducto" type="text" class="form-control" id="precioProducto" required placeholder="Precio" value="<?= set_value('precioProducto') ?>">

                        <label for="stock" class="form-label">stock</label>
                        <input name="stock" type="number" class="form-control" id="stock" required placeholder="stock" value="<?= set_value('stock') ?>">

                        <label for="idCategoria" class="form-label">Categoría</label>
                        <select name="idCategoria" class="form-select" id="idCategoria" required>
                            <?php foreach($categorias as $categoria): ?>
                                <option value="<?= $categoria->idCategoria; ?>"><?= $categoria->nombreCategoria; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="idLocal" class="form-label">Local</label>
                        <select name="idLocal" class="form-select" id="idLocal" required>
                            <?php foreach($locales as $local): ?>
                                <option value="<?= $local->idLocal; ?>"><?= $local->nombreLocal; ?></option>
                            <?php endforeach; ?>
                        </select>

                        <label for="imagen" class="form-label">Imagen del Producto</label>
                        <input name="imagen" type="file" class="form-control" id="imagen" accept="image/*">
                    </div>

                    <button type="submit" class="btn btn-success">Agregar Producto</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka2p7qk...QpggV3!" crossorigin="anonymous"></script>
  </body>
</html>















