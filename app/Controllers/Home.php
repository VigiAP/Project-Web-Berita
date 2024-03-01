<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Home | Pojok Berita',
        ];

        echo view('/Home/index', $data);
    }
}
