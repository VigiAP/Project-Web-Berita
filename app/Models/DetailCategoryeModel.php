<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailCategoryeModel extends Model
{

    protected $table = 'detail_categories';
    protected $primaryKey = 'id_detail_category';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_detail_category', 'id_article', 'id_category', 'description',];
    protected $builder;
    protected $db;
    
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getDataDetailCategories($id_detail_category = false)
    {
        if ($id_detail_category === false) {
            return $this->builder->orderBy('id_detail_category', 'DESC')->get()->getResultArray();
        }
        return $this->builder->where('d_detail_category', $id_detail_category)->get()->getResultArray();
    }

    public function saveData($data)
    {
        return $this->builder->insert($data);
    }
    
    public function getDataDetailCategoryByIdArticle($id)
    {
        return $this->db->query("SELECT article.id_article, categories.name, detail_categories.id_detail_category, detail_categories.id_category
        FROM article
        JOIN detail_categories
        ON article.id_article = detail_categories.id_article
        JOIN categories
        ON categories.id_category = detail_categories.id_category WHERE detail_categories.id_article = $id")->getResultArray();
    }

    public function getDataSomeArticlesByCategory() {
        $category = 'Politik';
        return $this->db->query("SELECT article.id_article, article.`image`, article.`title`, article.`content`, categories.name, detail_categories.id_detail_category, detail_categories.id_category
        FROM article
        JOIN detail_categories
        ON article.id_article = detail_categories.id_article
        JOIN categories
        ON categories.id_category = detail_categories.id_category WHERE categories.name = '$category'")
        ->getResultArray();

    }

    public function updateData($data, $id)
    {
        return $this->builder->where('d_detail_category', $id)->update($data);
    }

    public function findCategoryByIdArtikel($id_artikel) {
        return $this->builder->where('id_article', $id_artikel)->get()->getResultArray();
    }
    
    public function deleteData($id)
    {
        return ($this->builder->delete(['id_article' => $id])) ? 1 : 0;
    }
}
