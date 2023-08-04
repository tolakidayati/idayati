<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengaduan';
    protected $primaryKey       = 'id_pengaduan';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['id_pengaduan','nama_kategori','tgl','nik', 'nama_pengadu', 'alamat', 'no_telp', 'nama_skpd','kronologi','status'];


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
