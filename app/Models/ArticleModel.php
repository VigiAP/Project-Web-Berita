<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{

    protected $table = 'article';
    protected $primaryKey = 'id_article';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_article', 'id_user', 'title', 'content', 'image','publication_date','aproved'];
    protected $builder;
    protected $db;
    
    public function __construct()
    {
         $db = \Config\Database::connect();
        $this->db = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    public function getDataArticles()
    {
        return $this->builder->orderBy('id_article', 'DESC')->get()->getResultArray();   
    }

    public function getDataArticleById($id)
    {
        return $this->builder->where('id_article', $id)->get()->getResultArray();
    }

    public function getDataArticleById2($id)
    {
        $this->builder->select('article.id_article, article.title, article.image, article.content, article.publication_date, tbl_users.name, tbl_users.image as user_image');
        $this->builder->join('tbl_users', 'tbl_users.id_user = article.id_user');
        $this->builder->where('article.approved', '1');
        return $this->builder->where('article.id_article', $id)->get()->getResultArray();
    }

    public function getDataSomeArticles() {
        $this->builder->limit(8);
        $this->builder->where('approved', '1');
        return $this->builder->orderBy('id_article', 'DESC')->get()->getResultArray();
    }

    public function getRandomArticleTitle()
    {
        $this->builder->select('title');
        return $this->builder->get()->getResultArray();
    }
    
    public function getDataArticleByApproval()
    {
        return $this->db->query("SELECT article.id_article, article.id_user, article.title, article.image, article.content, tbl_users.name
        FROM article
        JOIN tbl_users
        ON tbl_users.id_user = article.id_user
        WHERE article.approved = '0' ORDER BY id_article DESC")->getResultArray();
    }

    public function saveData($data)
    {
    
        return $this->builder->insert($data);
    }

    public function updateData($data, $id)
    {
        return $this->builder->where('id_article', $id)->update($data);
    }

    public function deleteData($id)
    {
        return ($this->builder->delete(['id_article' => $id])) ? 1 : 0;
    } 

    public function CountArticleByDate() {
       return $this->db->query("SELECT MONTH(publication_date) AS MONTH, COUNT(*) AS total_article FROM article GROUP BY DATE_FORMAT(publication_date, '%m')")->getResultArray();
    }
    
}
