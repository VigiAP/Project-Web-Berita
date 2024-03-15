<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = 'tbl_users';
    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ['user_id', 'username', 'nama', 'password', 'role', 'image', 'status', 'gender', 'phone_no'];
    protected $builder;
    
    public function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    public function getDataUsers($username = false)
    {
        if ($username === false) {
            return $this->builder->orderBy('user_id', 'DESC')->get()->getResultArray();
        }
        return $this->builder->where('username', $username)->get()->getResultArray();
    }

    public function saveData($data)
    {
        return $this->builder->insert($data);
    }
}
