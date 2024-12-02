<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuario';
    protected $primaryKey       = 'idUsuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['nombre','apellidoPaterno','apellidoMaterno', 'password', 'tipoUsuario', 'correo', 'telefono', 'fecha_nacimiento'];

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


    public function valida($password, $correo){
        $db = db_connect();
        $sql ="select idusuario, nombre, tipoUsuario, apellidoPaterno, apellidoMaterno
        from usuario 
        where password ='". $password."' and correo ='". $correo."'";
        
        $query= $db->query($sql);
        
        return $query->getResult();
    }


    public function getUsuarioById($idUsuario)
    {
        return $this->asObject()->where('idusuario', $idUsuario)->first();
    }


}
