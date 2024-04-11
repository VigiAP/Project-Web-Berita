<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{

    protected $table = 'categories';
    protected $primaryKey = 'id_category';
    protected $useAutoIncrement = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ['id_user', 'name'];
    protected $builder;
    
    public function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    public function getDataCategories($id_category = false)
    {
        if ($id_category === false) {
            return $this->builder->orderBy('id_category', 'DESC')->get()->getResultArray();
        }
        return $this->builder->where('id_category', $id_category)->get()->getResultArray();
    }

    public function getDataCategoryById($id)
    {
        return $this->builder->where('id_category', $id)->get()->getResultArray();
    }

    public function saveData($data)
    {
        return $this->builder->insert($data);
    }

     public function updateData($data, $id)
    {
        return $this->builder->where('id_category', $id)->update($data);
    }

    public function deleteData($id)
    {
        return ($this->builder->delete(['id_category' => $id])) ? 1 : 0;
    }
}
