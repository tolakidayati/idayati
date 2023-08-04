<?php

namespace App\Models;

use CodeIgniter\Model;

class PelaporModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pelapor';
    protected $primaryKey       = 'nik';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['nik', 'nama', 'username', 'password', 'telp'];


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
