<?php

namespace App\Controllers;
use App\Models\ArticleModel;
use App\Models\DetailCategoryeModel;
use App\Models\CategoryModel;
use App\Models\LikeModel;
use App\Models\ViewModel;
use App\Models\CommentModel;
use App\Models\UserModel;

class Home extends BaseController
{   
    protected $articleModel;
    protected $detailCategoryModel;
    protected $categoryModel;
    protected $likeModel;
    protected $viewModel;
    protected $commentModel;
    protected $userModel;

    public function __construct() {
        
        $this->articleModel = new ArticleModel();
        $this->detailCategoryModel = new DetailCategoryeModel();
        $this->categoryModel = new CategoryModel();
        $this->likeModel = new LikeModel();
        $this->viewModel = new ViewModel();
        $this->commentModel = new CommentModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if(!session()->get('logged_in')) {
            return redirect()->to('/Home/homePage');
        }

        if(session()->get('jenisLog') == 'visitor') {
            return redirect()->to('/Home/homePage');
        } else {

            $DataStatistic = [];
            foreach($this->viewModel->CountViewArticleByDate() as $data) {
                array_push($DataStatistic, $data);
            }

            foreach($this->articleModel->CountArticleByDate() as $data) {
                array_push($DataStatistic, $data);
            }

            foreach($this->commentModel->CountCommentByDate() as $data) {
                array_push($DataStatistic, $data);
            }

            foreach($this->likeModel->CountLikeByDate() as $data) {
                array_push($DataStatistic, $data);
            }        
            
            $newArray = array();

            foreach ($DataStatistic as $entry) {
                $month = $entry["MONTH"];
                if (!isset($newArray[$month])) {
                    $newArray[$month] = array(
                        "month" => $month,
                        "views" => 0,
                        "total_article" => 0,
                        "total_likes" => 0,
                        "total_comment" => 0
                    );
                }

                if (isset($entry["views"])) {
                    $newArray[$month]["views"] += $entry["views"];
                }
                if (isset($entry["total_article"])) {
                    $newArray[$month]["total_article"] += $entry["total_article"];
                }
                if (isset($entry["total_likes"])) {
                    $newArray[$month]["total_likes"] += $entry["total_likes"];
                }
                if (isset($entry["total_comment"])) {
                    $newArray[$month]["total_comment"] += $entry["total_comment"];
                }
            }

            $finalArray = array();

            foreach ($newArray as $monthData) {
                $finalArray[] = array(
                    "month" => $monthData["month"],
                    "views" => $monthData["views"],
                    "total_article" => $monthData["total_article"],
                    "total_likes" => $monthData["total_likes"],
                    "total_comment" => $monthData["total_comment"]
                );
            }

            $DataStatisticEditor = [];
            foreach($this->articleModel->CountApproveArticleByDate(0, 'not_yet_approved') as $data1) {
                array_push($DataStatisticEditor, $data1);
            }
            foreach($this->articleModel->CountApproveArticleByDate(1, 'approved') as $data2) {
                array_push($DataStatisticEditor, $data2);
            }
            foreach($this->articleModel->CountApproveArticleByDate(2, 'not_approved') as $data3) {
                array_push($DataStatisticEditor, $data3);
            }

            $newArray2 = array();
            
            foreach ($DataStatisticEditor as $entry2) {
                $month = $entry2["MONTH"];
                if (!isset($newArray2[$month])) {
                    $newArray2[$month] = array(
                        "month" => $month,
                        "approved" => 0,
                        "not_yet_approved" => 0,
                        "not_approved" => 0,
                    );
                }

                if (isset($entry2["not_approved"])) {
                    $newArray2[$month]["not_approved"] += $entry2["not_approved"];
                }
                if (isset($entry2["not_yet_approved"])) {
                    $newArray2[$month]["not_yet_approved"] += $entry2["not_yet_approved"];
                }
                if (isset($entry2["approved"])) {
                    $newArray2[$month]["approved"] += $entry2["approved"];
                }
            }

            
           
            $finalArray2 = array();
             
            foreach ($newArray2 as $monthData2) {
                $finalArray2[] = array(
                    "month" => $monthData2["month"],
                    "approved" => $monthData2["approved"],
                    "not_yet_approved" => $monthData2["not_yet_approved"],
                    "not_approved" => $monthData2["not_approved"],
                );
            }
            // fungsi untuk mengurutkan array dari yang terkecil
            usort($finalArray2, function($a, $b) {
                return $a['month'] - $b['month'];
            });
            
            $data = [
            'title' => 'Home | Pojok Berita',
            'CountUserByRole' => $this->userModel->CountUserByRole(),
            'CountViewArticleByDate' => $this->viewModel->CountViewArticleByDate(), 
            'CountArticleByDate' => $this->articleModel->CountArticleByDate(),
            'CountCommentByDate' => $this->commentModel->CountCommentByDate(),
            'CountLikeByDate' => $this->likeModel->CountLikeByDate(),
            'DataStatistic' => $finalArray,
            'DataStatisticEditor' => $finalArray2,
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
                    'view_date' => date('Y-m-d H:i:s')
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
                'like_date' => date('Y-m-d H:i:s')
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

    public function comment()
    {
        date_default_timezone_set("Asia/Bangkok");
        $data = [
            'id_user' => $this->request->getVar('id_user'),
            'id_article' => $this->request->getVar('id_article'),
            'comment' => $this->request->getVar('comment'),
            'comment_date' => date('Y-m-d H:i:s'),
        ];

        echo json_encode($this->commentModel->saveData($data));
    }

    public function getComments() {
        $id_article = $this->request->getVar('id_article');
        echo json_encode($this->commentModel->getDataCommentsByArticleId($id_article));
    }

    public function deleteComment() {
        $id_comment = $this->request->getVar('id_comment');
        echo json_encode($this->commentModel->deleteDataCommentById($id_comment));
    }

    
    public function search(){
       
        $query = $this->request->getVar('search');

        if ($query) {
            $articles = $this->articleModel->searchArticles($query);
        } else {
            $articles = [];
        }

        $data = [
            'title' => 'Search | Pojok Berita',
            'query' => $query,
            'articles' => $articles
        ];

        echo view('/Home/hasil_search', $data);
    }
}
