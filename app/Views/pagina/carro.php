<?php if ($session->get('carrito') && count($session->get('carrito')) > 0): ?>
    <div class="header-top">
        <div class="logo">
            <img src="/imagenes/dulcepan.png" alt="logo" width="120px" height="120px">
        </div>
    </div>

    <div class="cart-container">
        <h2>Carrito de Compras</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Producto</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Costo Unitario</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($session->get('carrito') as $item): ?>
                    <?php $total += $item['costo'] * $item['cantidad']; ?>
                    <tr>
                        <td><?= $item['idProducto']; ?></td>
                        <td><?= $item['nombre']; ?></td>
                        <td><?= $item['cantidad']; ?></td>
                        <td><?= number_format($item['costo'], 2); ?> $</td>
                        <td><?= number_format($item['subtotal'], 2); ?> $</td>
                        <td>
                            <a href="<?= base_url('borrar/' . $item['idProducto']); ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="cart-summary">
            <h3>Total: <?= number_format($total, 2); ?> $</h3>
            <form action="<?= base_url('pagar'); ?>" method="POST">
                <input type="hidden" name="total" value="<?= $total; ?>">
                <input type="hidden" name="costo" value="<?= $item['costo']; ?>">
                <input type="submit" class="btn btn-success" value="Pagar">
            </form>
        </div>
    </div>
    <a href="inicio" class="btn-regresar">Regresar</a>

<?php else: ?>
    <div class="alert alert-info" role="alert">
        Tu carrito está vacío. <a href="<?= base_url('/producto/show'); ?>">Explora nuestros productos</a>.
    </div>
<?php endif; ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap');

body, h1, h2, h3, p, table {
    font-family: 'Roboto', sans-serif;
}

.cart-container .btn-secondary {
    background-color: #6c757d;
    color: white;
    font-weight: 500;
    padding: 12px 25px;
    font-size: 18px;
    border-radius: 5px;
    border: none;
    margin-top: 20px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.cart-container .btn-secondary:hover {
    background-color: #5a6268;
    transform: translateY(-2px);
}

.cart-container .btn-secondary:focus {
    outline: none;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
}

.cart-container {
    padding: 30px;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin: 30px auto;
    max-width: 900px;
    border: 1px solid #ddd;
}

.cart-container h2 {
    text-align: center;
    color: #333;
    font-size: 2em;
    margin-bottom: 20px;
    font-weight: 700;
}

.cart-container table {
    width: 100%;
    margin-bottom: 20px;
    border-collapse: collapse;
}

.cart-container table th,
.cart-container table td {
    padding: 12px;
    text-align: center;
    border: 1px solid #ddd;
    font-size: 1em;
}

.cart-container table th {
    background-color: #007bff;
    color: white;
    font-size: 1.1em;
    font-weight: 500;
}

.cart-container .cart-summary {
    text-align: center;
    margin-top: 30px;
    border-top: 2px solid #ddd;
    padding-top: 20px;
}

.cart-container .cart-summary h3 {
    font-size: 1.8em;
    color: #333;
    font-weight: 600;
}

.cart-container .btn {
    padding: 12px 25px;
    font-size: 18px;
    border-radius: 5px;
    border: none;
}

.cart-container .btn-danger {
    background-color: #dc3545;
    color: white;
    font-weight: 500;
}

.cart-container .btn-danger:hover {
    background-color: #c82333;
}

.cart-container .btn-success {
    background-color: #28a745;
    color: white;
    font-weight: 500;
}

.cart-container .btn-success:hover {
    background-color: #218838;
}

.cart-container .alert {
    text-align: center;
    font-size: 20em;
    font-family: 'Open Sans', sans-serif;
    font-weight: 600;
    padding: 30px 15px;
    margin-top: 30px;
    border-radius: 10px;
    background-color: #f8d7da;
    color: #721c24;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.header-top .logo {
    text-align: center;
    margin-bottom: 30px;
}

.header-top .logo img {
    display: block;
    margin: 0 auto;
}


.btn-regresar {
        display: inline-block;
        background-color: #007bff;
        color: white;
        font-weight: 600;
        font-size: 18px;
        padding: 12px 25px;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
        margin-top: 20px;
    }

    .btn-regresar:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .btn-regresar:focus {
        outline: none;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
    }
</style>
