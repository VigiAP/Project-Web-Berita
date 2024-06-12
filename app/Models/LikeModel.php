<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{

    protected $table = 'likes';
    protected $primaryKey = 'id_like';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_like', 'id_user', 'id_article', 'like_date'];
    protected $builder;
     protected $db;
    
    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    public function getDataLikeArticleByArticledAndUserId($id_user, $id_article) {
        return $this->builder->where('id_article', $id_article)->where('id_user', $id_user)->countAllResults();
    }

    public function deleteDataLikeArticleByArticledAndUserId($id_user, $id_article) {
        return $this->builder->where('id_article', $id_article)->where('id_user', $id_user)->delete();
    }

    public function CountLikeByDate() {
       return $this->db->query("SELECT MONTH(like_date) AS MONTH, COUNT(*) AS total_likes FROM likes`likes` GROUP BY DATE_FORMAT(like_date, '%m')")->getResultArray();
    }

    public function saveData($data)
    {
        return $this->builder->insert($data);
    }

    public function getDataArticleLikesById($id) {
        return $this->builder->where('id_article', $id)->countAllResults();
    
    }
    
}
