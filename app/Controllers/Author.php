<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ArticleModel;

class Author extends BaseController
{
    protected $categoryModel;
     protected $articleModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
         $this->articleModel = new ArticleModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $data = [
            'title' => 'Author | Pojok Berita',
        ];

        echo view('/Dashboard/Author/index', $data);
    }
    
    // article method
    public function article()
    {
        $data = [
            'title' => 'Article | Pojok Berita',
            'articles' => $this->articleModel->getDataArticles(),
        ];

        echo view('/Dashboard/Author/articles/article', $data);
    }
    
    public function tambah_article()
    {
        $data = [
            'title' => 'Tambah Article | Pojok Berita',
            'categories' => $this->categoryModel->getDataCategories(),
        ];

        echo view('/Dashboard/Author/articles/tambah_article', $data);
    }

    public function save_article()
    {
        if ($this->request->getMethod() === 'post') {
            // Validate the input data
            $rules = [
                'title' => 'required',
                'content' => 'required',
                'category' => 'required',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('validation', $this->validation);
            }

            // Get the input data
            $title = $this->request->getVar('title');
            $content = $this->request->getVar('content');
            $category = $this->request->getVar('category');

            $data = [
                'title' => $title,
                'content' => $content,
                'category' => $category,
            ];

            $this->articleModel->saveData($data);

            return redirect()->to('Author/article')->with('success', 'User data saved successfully.');
        }
    }
    
    public function delete_article()
    {
        $id = $this->request->getUri()->getSegment(3);
        if ($this->articleModel->deleteData($id)) {
            return redirect()->back()->with('success', 'Article deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete Article.');
        }
    }
    // end ofarticle method

    // comments method
    public function comments()
    {
        $data = [
            'title' => 'Comments | Pojok Berita',
        ];

        echo view('/Dashboard/Author/articles/comments', $data);
    }
    // end of comments method

    // category method
    public function category()
    {
        $data = [
            'title' => 'Categories | Pojok Berita',
            'categories' => $this->categoryModel->getDataCategories(),
        ];

        echo view('/Dashboard/Author/categories/category', $data);
    }

    public function add_category()
    {
        $data = [
            'title' => 'Tambah Categoriy| Pojok Berita',
            'categories' => $this->categoryModel->getDataCategories(),
        ];

        echo view('/Dashboard/Author/categories/add_category', $data);
    }

    public function save_category()
    {
        if ($this->request->getMethod() === 'post') {
            // Validate the input data
            $rules = [
                'name' => 'required|is_unique[categories.name]',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('validation', $this->validation);
            }

            // Get the input data
            $name = $this->request->getVar('name');

            $data = [
                'name' => $name,
            ];

            $this->categoryModel->saveData($data);

             return redirect()->to('Author/category')->with('success', 'User data saved successfully.');
        }
    }

    public function edit_category()
    {
        $data = [
            'title' => 'Edit Category | Pojok Berita',
           'category' => $this->categoryModel->getDataCategoryById($this->request->getUri()->getSegment(3)),
        ];

        echo view('/Dashboard/Author/categories/edit_category', $data);
    }

    public function update_category()
    {
       if ($this->request->getMethod() === 'post') {
            // Validate the input data
            $rules = [
                'name' => 'required|is_unique[categories.name]',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('validation', $this->validation);
            }

            // Get the input data
            $id = $this->request->getVar('id');
            $name = $this->request->getVar('name');

            // Update the user data in the database
            $data = [
                'name' => $name,
            ];

            if ($this->categoryModel->updateData($data, $id)) {
                return redirect()->to('Author/category')->with('success', 'User data updated successfully.');
            } else {
                return redirect()->to('Author/edit_category/<?=$id?>')->with('error', 'Failed to update user data.');
            }
        }
    }

    public function delete_category()
    {
        $id = $this->request->getUri()->getSegment(3);
        if ($this->categoryModel->deleteData($id)) {
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete user.');
        }
    }
    // end of category method

}
