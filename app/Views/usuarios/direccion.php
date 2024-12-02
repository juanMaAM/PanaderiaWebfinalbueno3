<style>
    /* Global Styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    /* Container Styles */
    .container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 90%;
        max-width: 600px;
    }

    h2 {
        text-align: center;
        color: #0056b3;
        font-size: 1.8rem;
        margin-bottom: 20px;
    }

    .form-label {
        font-size: 1rem;
        color: #0056b3;
        margin-bottom: 5px;
        font-weight: bold;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-control:focus {
        border-color: #0056b3;
        box-shadow: 0 0 8px rgba(0, 86, 179, 0.3);
        outline: none;
    }

    .btn-success {
        background-color: #007BFF;
        color: white;
        padding: 10px 20px;
        font-size: 1rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-success:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .btn-success:focus {
        outline: none;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
    }
</style>

<div class="container">
    <h2>Agregar Dirección</h2>
    <?= validation_list_errors() ?>

    <form action="<?= base_url('direccion/insert'); ?>" method="POST">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

        <div class="mb-3">
            <label for="calle" class="form-label">Calle</label>
            <input name="calle" type="text" class="form-control" id="calle" required placeholder="Calle" value="<?= set_value('calle') ?>">

            <label for="numeroExterior" class="form-label">Número Exterior</label>
            <input name="numeroExterior" type="text" class="form-control" id="numeroExterior" required placeholder="Número Exterior" value="<?= set_value('numeroExterior') ?>">

            <label for="numeroInterior" class="form-label">Número Interior</label>
            <input name="numeroInterior" type="text" class="form-control" id="numeroInterior" placeholder="Número Interior" value="<?= set_value('numeroInterior') ?>">

            <label for="colonia" class="form-label">Colonia</label>
            <input name="colonia" type="text" class="form-control" id="colonia" required placeholder="Colonia" value="<?= set_value('colonia') ?>">

            <label for="ciudad" class="form-label">Ciudad</label>
            <input name="ciudad" type="text" class="form-control" id="ciudad" required placeholder="Ciudad" value="<?= set_value('ciudad') ?>">

            <label for="estado" class="form-label">Estado</label>
            <input name="estado" type="text" class="form-control" id="estado" required placeholder="Estado" value="<?= set_value('estado') ?>">

            <label for="codigoPostal" class="form-label">Código Postal</label>
            <input name="codigoPostal" type="text" class="form-control" id="codigoPostal" required placeholder="Código Postal" value="<?= set_value('codigoPostal') ?>">
        </div>

        <div class="button-container">
            <input type="submit" class="btn-success" value="Agregar Dirección">
        </div>
    </form>

    <div class="button-container">
            <a href="<?= base_url('perfil'); ?>" >Regresar</a>
    </div>
</div>
