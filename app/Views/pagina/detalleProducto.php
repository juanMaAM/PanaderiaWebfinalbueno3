<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle producto</title>
</head>
<body>
    <h1>Detalle del producto</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <h2><?=$producto->nombreProducto; ?></h2>
                <div class="imgPrincipal"></div>
                
                <p>Categoría: <?=$producto->nombreCategoria; ?></p>
            </div>
            <div class="col-3">
                <div class="imgSecundaria"></div>
                <div class="imgSecundaria"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <h3><?=$producto->descripcion;?></h3>  
                <h2 class="text-right"><?=$producto->precioProducto;?></h2>  
                <form action="">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" min="1" max="<?=$producto->stock;?>" name="cantidad" class="form-control">
                    </div>
                    <br>
                    <input type="hidden" value="<?=$producto->idProducto;?>" name="idProducto">
                    <input type="hidden" value="<?=$producto->precioProducto;?>" name="costo">
                    <input type="submit" class="btn btn-large btn-success" value="Agregar al carrito">
                </form>
            </div>
        </div>
    </div>
</body>
</html>





