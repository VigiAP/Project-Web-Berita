<?php

namespace App\Models;

use CodeIgniter\Model;

class LikeModel extends Model
{

    protected $table = 'likes';
    protected $primaryKey = 'id_like';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_like', 'id_user', 'id_article'];
    protected $builder;
    
    public function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    public function getDataLikeArticleByArticledAndUserId($id_user, $id_article) {
        return $this->builder->where('id_article', $id_article)->where('id_user', $id_user)->countAllResults();
    }

    public function deleteDataLikeArticleByArticledAndUserId($id_user, $id_article) {
        return $this->builder->where('id_article', $id_article)->where('id_user', $id_user)->delete();
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

    public function saveData($data)
    {
        return $this->builder->insert($data);
    }

    public function getDataArticleLikesById($id) {
        return $this->builder->where('id_article', $id)->countAllResults();
    
    }
    
    // public function deleteData($id)
    // {
    //     return ($this->builder->delete(['id_category' => $id])) ? 1 : 0;
    // }
}
