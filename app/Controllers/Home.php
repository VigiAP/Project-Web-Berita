<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if(!session()->get('logged_in')) {
            return redirect()->to('/Home/homePage');
        }

        if(session()->get('jenisLog') == 'visitor') {
            $data = [
            'title' => 'Home | Pojok Berita',
            ];
            echo view('/Home/index', $data);
        } else {
            $data = [
            'title' => 'Home | Pojok Berita',
            ];
            echo view('/Dashboard/Home/index', $data);
        }
    }

    public function homePage()
    {
        $data = [
            'title' => 'Home | Pojok Berita',
        ];

        echo view('/Home/homePage', $data);
    }

    public function post()
    {
        $data = [
            'title' => 'Post | Pojok Berita',
        ];

        echo view('/Home/post', $data);
    }

    public function category()
    {
        $data = [
            'title' => 'Category | Pojok Berita',
        ];

        echo view('/Home/category', $data);
    }

    public function listCategory()
    {
        $data = [
            'title' => 'List Category | Pojok Berita',
        ];

        echo view('/Home/listCategory', $data);
    }
}
