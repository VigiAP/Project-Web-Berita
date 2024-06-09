<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{

    protected $table = 'comments';
    protected $primaryKey = 'id_view';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_view', 'id_user', 'id_article', 'comment', 'comment_date'];
    protected $builder;
    
    public function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    // public function getDataCategories($id_category = false)
    // {
    //     if ($id_category === false) {
    //         return $this->builder->orderBy('id_category', 'DESC')->get()->getResultArray();
    //     }
    //     return $this->builder->where('id_category', $id_category)->get()->getResultArray();
    // }

    // public function getDataCategoryById($id)
    // {
    //     return $this->builder->where('id_category', $id)->get()->getResultArray();
    // }

    // public function updateData($data, $id)
    // {
    //     return $this->builder->where('id_category', $id)->update($data);
    // }


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
    
    // public function deleteData($id)
    // {
    //     return ($this->builder->delete(['id_category' => $id])) ? 1 : 0;
    // }
}
