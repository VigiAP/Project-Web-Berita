<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\UserModel;
class Editor extends BaseController
{
    
    protected $articleModel;
    protected $userModel;
    protected $session;
    protected $validation;

    public function __construct()
    {   
        $this->userModel = new UserModel();
        $this->articleModel = new ArticleModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
    }

    public function index(){
        $data = [
            'title' => 'Dashboard | Pojok Berita',
        ];
        return view('Dashboard/Admin/index', $data);
    }

    public function preview(){
        $data = [
            'title' => 'Preview | Pojok Berita',
            'articles' => $this->articleModel->getDataArticles()
        ];
        return view('Dashboard/Editor/preview', $data);
    }

    public function profile(){
        $data = [
            'title' => 'Profile | Pojok Berita',
        ];
        return view('Dashboard/Editor/profile', $data);
    }

    public function edit_profile(){
        $data = [
            'title' => 'Edit Profile | Pojok Berita',
        ];
        return view('Dashboard/Editor/edit_profile', $data);
    }
}