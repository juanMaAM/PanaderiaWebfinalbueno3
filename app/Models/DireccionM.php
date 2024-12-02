<?php

namespace App\Models;

use CodeIgniter\Model;

class DireccionM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'direccion_usuario';
    protected $primaryKey       = 'iddireccion';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idusuario', 'calle', 'numero_exterior', 'numero_interior', 'colonia', 'ciudad', 'estado', 'codigo_postal', 'pais'];

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


public function getDireccionByUsuario($idUsuario)
{
    return $this->asObject()->where('idusuario', $idUsuario)->first();  
}

}
