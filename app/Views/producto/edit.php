<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<?= $menus ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Actualizar Producto</h2>
            <form action="<?= base_url('productos/update/' . $producto['idProducto']); ?>" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                
                <div class="mb-3">
                    <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                    <input name="nombreProducto" type="text" required value="<?= $producto['nombreProducto'] ?>" class="form-control" id="nombreProducto" placeholder="Nombre del producto">

                    <label for="descripcion" class="form-label">Descripción</label>
                    <input name="descripcion" type="text" required value="<?= $producto['descripcion'] ?>" class="form-control" id="descripcion" placeholder="Descripción del producto">

                    <label for="precioProducto" class="form-label">Precio</label>
                    <input name="precioProducto" type="text" required value="<?= $producto['precioProducto'] ?>" class="form-control" id="precioProducto" placeholder="Precio del producto">

                    <label for="stock" class="form-label">Stock</label>
                    <input name="stock" type="number" required value="<?= $producto['stock'] ?>" class="form-control" id="stock" placeholder="Stock disponible">

                    <label for="idCategoria" class="form-label">Categoría</label>
                    <select name="idCategoria" class="form-select" required>
                        <option value="<?= $producto['idCategoria'] ?>" selected><?= $producto['nombreCategoria'] ?></option>
                        <?php foreach ($categorias as $categoria): ?>
                            <?php if ($categoria['idCategoria'] != $producto['idCategoria']): ?>
                                <option value="<?= $categoria['idCategoria'] ?>"><?= $categoria['nombreCategoria'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>

                    <label for="idLocal" class="form-label">Local</label>
                    <select name="idLocal" class="form-select" required>
                        <option value="<?= $producto['idLocal'] ?>" selected><?= $producto['nombreLocal'] ?></option>
                        <?php foreach ($locales as $local): ?>
                            <?php if ($local['idLocal'] != $producto['idLocal']): ?>
                                <option value="<?= $local['idLocal'] ?>"><?= $local['nombreLocal'] ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>

                    <label for="imagen" class="form-label">Imagen del Producto</label>
                        <input name="imagen" type="file" class="form-control" id="imagen" accept="image/*">
                </div>

                <input type="submit" class="btn btn-success" value="Actualizar Producto">
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>



