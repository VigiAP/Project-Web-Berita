<?php

namespace App\Controllers;
use App\Models\ArticleModel;
use App\Models\DetailCategoryeModel;
use App\Models\CategoryModel;

class Home extends BaseController
{   
    protected $articleModel;
    protected $detailCategoryModel;
    protected $categoryModel;

    public function __construct() {
        
        $this->articleModel = new ArticleModel();
        $this->detailCategoryModel = new DetailCategoryeModel();
        $this->categoryModel = new CategoryModel();
    }

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
            'articles' => $this->articleModel->getDataSomeArticles(),
            'artilcesSelectedByCategory' => $this->detailCategoryModel->getDataSomeArticlesByCategory('Politik', 8),
            'artilcesSelectedByCategory2' => $this->detailCategoryModel->getDataSomeArticlesByCategory('Olahraga', 8),
            'artilcesSelectedByCategory3' => $this->detailCategoryModel->getDataSomeArticlesByCategory('Teknologi', 8),
        ];

        echo view('/Home/homePage', $data);
    }

    public function singlePost()
    {
        $id_article = $this->request->getUri()->getSegment(3);
        $data = [
            'title' => 'Post | Pojok Berita',
            'article' => $this->articleModel->getDataArticleById2($id_article),
            'randomArticleTitle' => $this->articleModel->getRandomArticleTitle(),
        ];
        $viewArticle = $this->articleModel->getDataViewArticle( $id_article);
        $NewviewArticle = $viewArticle[0]['view'] + 1;

        $data2 = [
            'view' => $NewviewArticle,
        ];

        $this->articleModel->updateData($data2, $id_article);

        echo view('/Home/singlePost', $data);
    }

    public function likeArticle() {
        $id_user = $this->request->getVar('id_user');
        $id_article = $this->request->getVar('id_article');

        $data = [
            'id_user' => $id_user,
            'id_article' => $id_article,
            'like' => '1',
        ];
        echo $id_article;
    }

    public function category()
    {
        $data = [
            'title' => 'Category | Pojok Berita',
            'articles' => $this->detailCategoryModel->getDataSomeArticlesByCategory(ucfirst($this->request->getUri()->getSegment(3)), 100),
            'category' => ucfirst($this->request->getUri()->getSegment(3)),
        ];

        echo view('/Home/category', $data);
    }

    public function listCategories()
    {
        $data = [
            'title' => 'List Categories | Pojok Berita',
            'categories' => $this->categoryModel->getDataCategories()
        ];

        echo view('/Home/listCategories', $data);
    }
}
