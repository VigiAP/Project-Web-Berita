<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Admin | Pojok Berita',
        ];
        echo view('/admin/index', $data);
    }
}
