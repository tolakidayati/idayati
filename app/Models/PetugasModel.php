<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'petugas';
    protected $primaryKey       = 'id_petugas';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_petugas','nama_petugas', 'username_petugas', 'password_petugas', 'telp_petugas', 'level'];


    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];
    
    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }
}
