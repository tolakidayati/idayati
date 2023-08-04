<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif' => 'active',
            ],
            'pengaduan' => [
                'title' => 'Upload Pengaduan',
                'link' => base_url() . "/pengaduan",
                'icon' => 'fa-solid fa-building-columns',
                'aktif' => '',
            ],
            'pelapor' => [
                'title' => 'Pelapor',
                'link' => base_url() . "/pelapor",
                'icon' => 'fa-solid fa-building-columns',
                'aktif' => '',
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

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Beranda</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Beranda</li>
                            </ol>
                        </div>';
        $data['menu'] = $menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = "Welcome to my site";
        $data['selamat_datang'] = "Selamat datang di aplikasi sederhana";
        return view('template/content', $data);
    }
}
