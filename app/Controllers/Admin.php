<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard | Pojok Berita',
        ];

        echo view('/Dashboard/Admin/index', $data);
    }

    public function users()
    {
        $data = [
            'title' => 'Users | Pojok Berita',
        ];

        echo view('/Dashboard/Admin/users', $data);
    }

    public function tambah_users()
    {
        $data = [
            'title' => 'Tambah Users | Pojok Berita',
        ];

        echo view('/Dashboard/Admin/tambah_users', $data);
    }
}
