<?php

namespace App\Controllers;

class Author extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Author | Pojok Berita',
        ];

        echo view('/Dashboard/Author/index', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile | Pojok Berita',
        ];

        echo view('/Dashboard/Author/profile', $data);
    }
    
    public function edit_profile()
    {
        $data = [
            'title' => 'Edit Profile | Pojok Berita',
        ];

        echo view('/Dashboard/Author/edit_profile', $data);
    }

    public function comments()
    {
        $data = [
            'title' => 'Comments | Pojok Berita',
        ];

        echo view('/Dashboard/Author/comments', $data);
    }

    public function article()
    {
        $data = [
            'title' => 'Article | Pojok Berita',
        ];

        echo view('/Dashboard/Author/article', $data);
    }
    
    public function tambah_article()
    {
        $data = [
            'title' => 'Tambah Article | Pojok Berita',
        ];

        echo view('/Dashboard/Author/tambah_article', $data);
    }

}
