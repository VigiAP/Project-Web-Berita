<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if(!session()->get('logged_in')) {
            return redirect()->to('/Home/homePage');
        }
        $data = [
            'title' => 'Home | Pojok Berita',
        ];
        echo view('/Home/index', $data);
    }

    public function homePage()
    {
        $data = [
            'title' => 'Home | Pojok Berita',
        ];

        echo view('/Home/homePage', $data);
    }
}
