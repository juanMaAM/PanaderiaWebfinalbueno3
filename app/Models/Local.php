<?php

namespace App\Models;

use CodeIgniter\Model;

class Local extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'local';
    protected $primaryKey       = 'idLocal';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['idLocal','nombreLocal','aliasLocal','direccionLocal', 'horario'];

    // Dates
    protected $useTimestamps = false; 
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = ['nombreLocal' => 'required',
        'aliasLocal' => 'required',
        'direccionLocal' => 'required',
        'horario' => 'required'];
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
}
