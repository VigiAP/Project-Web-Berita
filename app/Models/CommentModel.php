<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{

    protected $table = 'comments';
    protected $primaryKey = 'id_comment';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_comment', 'id_user', 'id_article', 'comment', 'comment_date'];
    protected $builder;
    protected $db;
    
    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    public function getDataCommentsByArticleId($id_article)
    {
        $this->builder->select('comments.id_comment, comments.id_user, comments.id_article, comments.comment, comments.comment_date, tbl_users.name');
        $this->builder->join('tbl_users', 'tbl_users.id_user = comments.id_user');
        return $this->builder->orderBy('comments.id_comment', 'DESC')->where('comments.id_article', $id_article)->get()->getResultArray();
    }

    public function saveData($data)
    {
        return $this->builder->insert($data);
    }

    public function getDataViewArticleById($id) {
        return $this->builder->where('id_article', $id)->countAllResults();
    
    }
      
    public function deleteDataCommentById($id)
    {
        return ($this->builder->delete(['id_comment' => $id])) ? 1 : 0;
    }

    public function CountCommentByDate() {
       return $this->db->query("SELECT MONTH(comment_date) AS MONTH, COUNT(*) AS total_comment FROM comments GROUP BY DATE_FORMAT(comment_date, '%m')")->getResultArray();
    }
}
