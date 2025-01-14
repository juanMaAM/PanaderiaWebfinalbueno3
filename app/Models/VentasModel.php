<?php

namespace App\Models;

use CodeIgniter\Model;

class VentasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'venta';
    protected $primaryKey       = 'idVenta';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idCliente','fecha','total'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getVentaDetalles($idVenta)
    {
        $venta = $this->asObject()->where('idVenta', $idVenta)->first();

        $ventaProductosModel = model('CarritoModel');
        $productos = $ventaProductosModel->getProductosByVenta($idVenta);

        $usuarioModel = model('Usuario');
        $usuario = $usuarioModel->getUsuarioById($venta->idCliente);

        $direccionModel = model('DireccionM');
        $direccion = $direccionModel->getDireccionByUsuario($venta->idCliente); 

        return [
            'venta' => $venta,
            'productos' => $productos,
            'usuario' => $usuario,
            'direccion' => $direccion
        ];
    }
}
