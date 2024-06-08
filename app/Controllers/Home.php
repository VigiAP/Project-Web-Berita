<?php

namespace App\Controllers;
use App\Models\ArticleModel;
use App\Models\DetailCategoryeModel;
use App\Models\CategoryModel;
use App\Models\LikeModel;
use App\Models\ViewModel;

class Home extends BaseController
{   
    protected $articleModel;
    protected $detailCategoryModel;
    protected $categoryModel;
    protected $likeModel;
    protected $viewModel;

    public function __construct() {
        
        $this->articleModel = new ArticleModel();
        $this->detailCategoryModel = new DetailCategoryeModel();
        $this->categoryModel = new CategoryModel();
        $this->likeModel = new LikeModel();
        $this->viewModel = new ViewModel();
    }

    public function index()
    {
        if(!session()->get('logged_in')) {
            return redirect()->to('/Home/homePage');
        }

        if(session()->get('jenisLog') == 'visitor') {
            return redirect()->to('/Home/homePage');
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
        if($this->request->getVar('id_article')) {
            $id_article = $this->request->getVar('id_article');
            $id_user = session()->get('logged_in') ? session()->get('id') : '45';
            echo json_encode($this->likeModel->getDataLikeArticleByArticledAndUserId($id_user, $id_article));
            $data = [
                'title' => 'Post | Pojok Berita',
                'article' => $this->articleModel->getDataArticleById2($id_article),
                'randomArticleTitle' => $this->articleModel->getRandomArticleTitle(),
                'getArticleLikesById' => $this->likeModel->getDataArticleLikesById($this->request->getUri()->getSegment(3)),
                'getViewArticleById' => $this->viewModel->getDataViewArticleById($this->request->getUri()->getSegment(3)),
            ];

            $cookieName = "article_view_$id_article"."_"."$id_user";

            if (!isset($_COOKIE[$cookieName])) {
            
                $data2 = [
                    'id_user' => $id_user,
                    'id_article' => $id_article,
                ];

                $this->viewModel->saveData($data2);
                // Set a cookie to expire in 24 hours
                setcookie($cookieName, 'true', time() + (24 * 60 * 60), "/");
            }
        } else {
            $id_article = $this->request->getUri()->getSegment(3);
            $id_user = session()->get('logged_in') ? session()->get('id') : '45';
            $data = [
                'title' => 'Post | Pojok Berita',
                'article' => $this->articleModel->getDataArticleById2($id_article),
                'randomArticleTitle' => $this->articleModel->getRandomArticleTitle(),
                'getArticleLikesById' => $this->likeModel->getDataArticleLikesById($this->request->getUri()->getSegment(3)),
                'getViewArticleById' => $this->viewModel->getDataViewArticleById($this->request->getUri()->getSegment(3)),
            ];

            $cookieName = "article_view_$id_article"."_"."$id_user";

            if (!isset($_COOKIE[$cookieName])) {
            
                $data2 = [
                    'id_user' => $id_user,
                    'id_article' => $id_article,
                ];

                $this->viewModel->saveData($data2);
                // Set a cookie to expire in 24 hours
                setcookie($cookieName, 'true', time() + (24 * 60 * 60), "/");
            }
            echo view('/Home/singlePost', $data);
            }
    }

    public function likeArticle() {
        $id_user = $this->request->getVar('id_user');
        $id_article = $this->request->getVar('id_article');

        
        if($this->likeModel->getDataLikeArticleByArticledAndUserId($id_user, $id_article)) {
            echo json_encode($this->likeModel->deleteDataLikeArticleByArticledAndUserId($id_user, $id_article));
        } else{
            $data = [
                'id_user' => $id_user,
                'id_article' => $id_article,
            ];
            echo json_encode($this->likeModel->saveData($data));
        }
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
