<?php

namespace App\Controllers;

use App\Models\UserModel;

class Editor extends BaseController
{

    public function index(){
        $data = [
            'title' => 'Dashboard | Pojok Berita',
        ];
        return view('Dashboard/Admin/index', $data);
    }

    public function preview(){
        $data = [
            'title' => 'Preview | Pojok Berita',
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

    public function preview_article(){
        $data = [
            'title' => 'Preview Article | Pojok Berita',
        ];
        return view('Dashboard/Editor/preview_article', $data);
    }
}