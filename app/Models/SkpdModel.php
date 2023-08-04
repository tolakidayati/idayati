<?php

namespace App\Models;

use CodeIgniter\Model;

class SkpdModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'skpd';
    protected $primaryKey       = 'nama_skpd';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['nama_skpd'];


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
