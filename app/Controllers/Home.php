<?php

namespace App\Controllers;
use App\Models\ArticleModel;
use App\Models\DetailCategoryeModel;

class Home extends BaseController
{   
    protected $articleModel;
    protected $detailCategoryModel;

    public function __construct() {
        
        $this->articleModel = new ArticleModel();
        $this->detailCategoryModel = new DetailCategoryeModel();
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
            'artilcesSelectedByCategory' => $this->detailCategoryModel->getDataSomeArticlesByCategory('Politik'),
            'artilcesSelectedByCategory2' => $this->detailCategoryModel->getDataSomeArticlesByCategory('Olahraga'),
            'artilcesSelectedByCategory3' => $this->detailCategoryModel->getDataSomeArticlesByCategory('Teknologi'),
        ];

        echo view('/Home/homePage', $data);
    }

    public function singlePost()
    {
        $data = [
            'title' => 'Post | Pojok Berita',
            'article' => $this->articleModel->getDataArticleById2($this->request->getUri()->getSegment(3)),
            'randomArticleTitle' => $this->articleModel->getRandomArticleTitle(),
        ];

        echo view('/Home/singlePost', $data);
    }
}
