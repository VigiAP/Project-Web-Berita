<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{

    protected $table = 'article';
    protected $primaryKey = 'id_article';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_article', 'id_user', 'title', 'content', 'image','publication_date', 'view','aproved'];
    protected $builder;
    
    public function __construct()
    {
        $db = \Config\Database::connect();
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

    public function saveData($data)
    {
        return $this->builder->insert($data);
    }

     public function updateData($data, $id)
    {
        return $this->builder->where('id_article', $id)->update($data);
    }

    // public function updateData($data, $id)
    // {
    //     return $this->builder->where('id_user', $id)->update($data);
    // }

    public function deleteData($id)
    {
        return ($this->builder->delete(['id_article' => $id])) ? 1 : 0;
    }

    // public function editData($data, $id)
    // {
    //     return $this->builder->where('id_user', $id)->update($data);
    // }


   
}
