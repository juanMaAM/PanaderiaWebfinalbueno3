<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Local</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<div class="container mt-4">
    
    <div class="row mb-4">
        <div class="col-md-4">
            <select id="localSelector" class="form-select">
                <option value="todos">Todos</option>
                <?php 
                $localesUnicos = array();
                foreach ($producto as $prod) {
                    if (!in_array($prod->nombreLocal, $localesUnicos) && $prod->nombreLocal !== null) {
                        $localesUnicos[] = $prod->nombreLocal;
                        echo "<option value='" . $prod->nombreLocal . "'>" . $prod->nombreLocal . "</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>

    
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>stock</th>
                    <th>Categoría</th>
                    <th>Local</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($producto as $prod): ?>
                <tr class="producto-row" data-local="<?= $prod->nombreLocal ?>">
                    <td><?= $prod->idProducto ?></td>
                    <td><?= $prod->nombreProducto ?></td>
                    <td><?= $prod->descripcion ?></td>
                    <td>$<?= number_format($prod->precioProducto, 2) ?></td>
                    <td><?= $prod->stock ?></td>
                    <td><?= $prod->nombreCategoria ?></td>
                    <td><?= $prod->nombreLocal ?></td>
                    <td>
                        <a href="<?= base_url('productos/edit/' . $prod->idProducto) ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="<?= base_url('productos/delete/' . $prod->idProducto) ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                            <i class="fas fa-trash"></i> Eliminar
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


    
    <div class="mt-3">
        <a href="<?= base_url('productos/add') ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Agregar Nuevo Producto
        </a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js"></script>

<script>
document.getElementById('localSelector').addEventListener('change', function() {
    const selectedLocal = this.value;
    const rows = document.querySelectorAll('.producto-row');
    
    rows.forEach(row => {
        if (selectedLocal === 'todos') {
            row.style.display = '';
        } else {
            if (row.getAttribute('data-local') === selectedLocal) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
});
</script>

</body>
</html>















