<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ArticleModel;
use App\Models\DetailCategoryeModel;

class Author extends BaseController
{
    protected $detailCategoryModel;
    protected $categoryModel;
    protected $articleModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        $this->detailCategoryModel = new DetailCategoryeModel();
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

            $file = $this->request->getFile('image');
            $tempfile = $file->getTempName();
            $newName = $file->getRandomName();

            // Get the input data
            $title = $this->request->getVar('title');
            $content = $this->request->getVar('content');
            if($file->getName()) {
                $data = [
                    'title' => $title,
                    'id_user' => session()->get('id'),
                    'content' => $content,
                    'image' => $newName,
                    'publication_date' => date("Y-m-d"),
                    'approved_date' => date("Y-m-d")
                ];
            } else {
                $data = [
                    'title' => $title,
                    'id_user' => session()->get('id'),
                    'content' => $content,
                    'publication_date' => date("Y-m-d"),
                     'approved_date' => date("Y-m-d")
                ];
            }
            

            if($lastInsertID = $this->articleModel->insert($data)) {
                move_uploaded_file($tempfile, '../public/'. 'img/' . $newName);

                $category = $this->request->getVar('category');

                foreach ($category as $dataCategory) {
                    $additionalData = [
                        'id_article' => $lastInsertID,
                        'id_category' => $dataCategory
                    ];
                    $this->detailCategoryModel->saveData($additionalData);
                }
                session()->setFlashdata('message', 'success');
                return redirect()->to('Author/article');
            }
        }
    }

    public function edit_article()
    {
        $data = [
            'title' => 'Edit Article | Pojok Berita',
            'article' => $this->articleModel->getDataArticleById($this->request->getUri()->getSegment(3)),
            'category' => $this->detailCategoryModel->getDataDetailCategoryByIdArticle($this->request->getUri()->getSegment(3)),  
            'categories' => $this->categoryModel->getDataCategories(),
            'selectedCategory' => $this->detailCategoryModel->findCategoryByIdArtikel($this->request->getUri()->getSegment(3))
        ];

        echo view('/Dashboard/Author/articles/edit_article', $data);
    }
    
    public function update_article()
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

            $file = $this->request->getFile('new_image');
            $tempfile = $file->getTempName();
            $newName = $file->getRandomName();

            // Get the input data
            $id = $this->request->getVar('id');
            $id_user = $this->request->getVar('id_user');
            $title = $this->request->getVar('title');
            $content = $this->request->getVar('content');
            $old_image = $this->request->getVar('old_image');

            $data = [
                'title' => $title,
                'content' => $content,
                'image' => $newName,
                'id_user' => $id_user
            ];

            if($file->isValid()) {
                $data['image'] = $newName;
                move_uploaded_file($tempfile, '../public/'. 'img/' . $newName);
                unlink('../public/img/' . $old_image);
            } else {
                $data['image'] = $old_image;
            }

            if ($this->articleModel->updateData($data, $id)) {
                $this->detailCategoryModel->deleteData($id);
                $category = $this->request->getVar('category');

                foreach ($category as $dataCategory) {
                    $additionalData = [
                        'id_article' => $id,
                        'id_category' => $dataCategory
                    ];
                    // harusnya update data dan belum pull
                    $this->detailCategoryModel->saveData($additionalData);
                }
                session()->setFlashdata('message', 'success');
                return redirect()->to('Author/article');
            } else {
                session()->setFlashdata('message', 'gagal');
                return redirect()->to('Author/edit_article/<?=$id?>');
            }
        }
    }

    public function delete_article()
    {
        $id = $this->request->getUri()->getSegment(3);
        $this->detailCategoryModel->deleteData($id);
        if ($this->articleModel->deleteData($id)) {
            session()->setFlashdata('message', 'successHapus');
            return redirect()->to('Author/article');
        } else {
            session()->setFlashdata('message', 'gagalHapus');
            return redirect()->to('Author/article');
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

            session()->setFlashdata('message', 'success');
            return redirect()->to('Author/category');
        } else {
            session()->setFlashdata('message', 'success');
            return redirect()->to('Author/add_category');
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
                'name' => 'required',
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
               session()->setFlashdata('message', 'success');
                return redirect()->to('Author/category');
            } else {
                session()->setFlashdata('message', 'gagal');
                return redirect()->to('Author/edit_category/<?=$id?>');
            }
        }
    }

    public function delete_category()
    {
        $id = $this->request->getUri()->getSegment(3);
        if ($this->categoryModel->deleteData($id)) {
            session()->setFlashdata('message', 'successHapus');
            return redirect()->to('Author/category');
        } else {
            session()->setFlashdata('message', 'gagalHapus');
            return redirect()->to('Author/category');
        }
    }
    // end of category method

}
