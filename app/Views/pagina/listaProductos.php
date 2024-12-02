<div class="container-fluid">
    <div class="row">
    <?php foreach ($producto as $key) :?>
        <div class="col-4 producto">
            <h3><?=$key->nombreProducto; ?></h3> 
            <div class="imgPrincipal"> </div>
            <p><?=$key->descripcion;?></p>
            <a href="<?=base_url('pagina/producto/').$key->idProducto; ?>" class="btn btn-success">Ver Detalle</a>
        </div>
    <?php endforeach ?>
    </div>
</div>
</body>
</html>

