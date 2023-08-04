<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;

class Pengaduan extends BaseController
{
    protected $pm;
    private  $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new PengaduanModel();

        $this->menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif' => '',
            ],
            'pengaduan' => [
                'title' => 'Pengaduan',
                'link' => base_url() . "/pengaduan",
                'icon' => 'fa-solid fa-building-columns',
                'aktif' => 'active',
            ],
            'pelapor' => [
                'title' => 'Pelapor',
                'link' => base_url() . "/pelapor",
                'icon' => 'fa-solid fa-building-columns',
                'aktif' => 'active',
            ],
            'petugas' => [
                'title' => 'Petugas',
                'link' => base_url() . "/petugas",
                'icon' => 'fa-solid fa-list',
                'aktif' => '',
            ],
            'skpd' => [
                'title' => 'Skpd',
                'link' => base_url() . "/skpd",
                'icon' => 'fa-solid fa-users',
                'aktif' => '',
            ],
            'kategori' => [
                'title' => 'Kategori',
                'link' => base_url() . "/kategori",
                'icon' => 'fa-solid fa-users',
                'aktif' => '',
            ],
            'tanggapan' => [
                'title' => 'Tanggapan',
                'link' => base_url() . "/tanggapan",
                'icon' => 'fa-solid fa-users',
                'aktif' => '',
            ],
        ];

        $this->rules = [
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kategori tidak boleh kosong',
                ]
            ],
            'tgl' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal tidak boleh kosong',
                ]
            ],
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nik tidak boleh kosong',
                ]
            ],
            'nama_pengadu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Pengadu tidak boleh kosong',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'alamat tidak boleh kosong',
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Telp tidak boleh kosong',
                ]
            ],
            'nama_skpd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Skpd tidak boleh kosong',
                ]
            ],
            'kronologi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kronologi tidak boleh kosong',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Status tidak boleh kosong',
                ]
            ],
        ];
    }
    public function index()
    {

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Pengaduan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item active">Pengaduan</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Data Pengaduan";

        $query = $this->pm->find();
        $data['data_pengaduan'] = $query;
        return view('pengaduan/content', $data);
    }
    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Pengaduan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '/pengaduan">Pengaduan</a></li>
                                <li class="breadcrumb-item active">Tambah Pengaduan</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Pengaduan';
        $data['action'] = base_url() . '/pengaduan/simpan';
        return view('pengaduan/input', $data);
    }
    public function simpan()
    {

        if (strtolower($this->request->getMethod()) !== 'post') {

            return redirect()->back()->withInput();
        }

        if (!$this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }
        $dt = $this->request->getPost();
        try {
            $simpan = $this->pm->insert($dt);
            return redirect()->to('pengaduan')->with('success', 'Data berhasil disimpan');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
    public function hapus($id)
    {
        if (empty($id)) {
            return redirect()->back()->with('error', 'Hapus data gagal dilakukan prameter tidak valid');
        }

        try {
            $this->pm->delete($id);
            return redirect()->to('pengaduan')->with('success', 'Data pengaduan dengan kode ' . $id . 'berhasil dihapus');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('pengaduan')->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Pengaduan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '/pengaduan">Pengaduan</a></li>
                                <li class="breadcrumb-item active">Tambah Pengaduan</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Pengaduan';
        $data['action'] = base_url() . '/pengaduan/update';

        $data['edit_data'] = $this->pm->find($id);
        return view('pengaduan/input', $data);
    }

    public function update()
    {
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);
        unset($this->rules['password']);

        if (!$this->validate($this->rules)) {

            return redirect()->back()->withInput();
        }

        if (empty($dtEdit['password'])) {
            unset($dtEdit['password']);
        }

        try {
            $this->pm->update($param, $dtEdit);
            return redirect()->to('pengaduan')->with('success','Data berhasil diupdate');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
