<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetugasModel;

class Petugas extends BaseController
{
    protected $pm;
    private  $menu;
    private $rules;
    public function __construct()
    {
        $this->pm = new PetugasModel();

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
            'nama_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Petugas tidak boleh kosong',
                ]
            ],
            'username_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Petugas tidak boleh kosong',
                ]
            ],
            'password_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Petugas tidak boleh kosong',
                ]
            ],
            'telp_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Telepon Petugas tidak boleh kosong',
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jabatan tidak boleh kosong',
                ]
            ],
        ];
    }
    public function index()
    {

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Petugas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item active">Petugas</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Data Petugas";

        $query = $this->pm->find();
        $data['data_petugas'] = $query;
        return view('petugas/content', $data);
    }
    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Petugas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '/petugas">Petugas</a></li>
                                <li class="breadcrumb-item active">Tambah Petugas</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Petugas';
        $data['action'] = base_url() . '/petugas/simpan';
        return view('petugas/input', $data);
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
            return redirect()->to('petugas')->with('success', 'Data berhasil disimpan');
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
            return redirect()->to('petugas')->with('success', 'Data petugas dengan kode ' . $id . 'berhasil dihapus');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            return redirect()->to('petugas')->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Petugas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '/petugas">Petugas</a></li>
                                <li class="breadcrumb-item active">Tambah Petugas</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Petugas';
        $data['action'] = base_url() . '/petugas/update';

        $data['edit_data'] = $this->pm->find($id);
        return view('petugas/input', $data);
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
            return redirect()->to('petugas')->with('success','Data berhasil diupdate');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
