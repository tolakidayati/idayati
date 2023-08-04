<?php

namespace App\Models;

use CodeIgniter\Model;

class TanggapanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tanggapan';
    protected $primaryKey       = 'tgl_tanggapan';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['tgl_tanggapan','tanggapan'];


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
