<?php

namespace App\Controllers;

class Accounts extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Login | Pojok Berita',
        ];

        echo view('/accounts/index', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register | Pojok Berita',
        ];

        echo view('/accounts/register', $data);
    }

    public function forget()
    {
        $data = [
            'title' => 'Forget Password | Pojok Berita',
        ];

        echo view('/accounts/forget', $data);
    }

    public function forgetToken()
    {
        $data = [
            'title' => 'Forget Password | Pojok Berita',
        ];

        echo view('/accounts/forgetToken', $data);
    }
}
