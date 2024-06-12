<?php

namespace App\Models;

use CodeIgniter\Model;

class ViewModel extends Model
{

    protected $table = 'views';
    protected $primaryKey = 'id_view';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_view', 'id_user', 'id_article', 'view_date'];
    protected $builder;
    protected $db;
    
    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->db = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }
    
    public function CountViewArticleByDate() {
       return $this->db->query("SELECT MONTH(view_date) AS MONTH, COUNT(*) AS views FROM views GROUP BY DATE_FORMAT(view_date, '%m')")->getResultArray();
    }

    public function saveData($data)
    {
        return $this->builder->insert($data);
    }

    public function getDataViewArticleById($id) {
        return $this->builder->where('id_article', $id)->countAllResults();
    
    }

}
