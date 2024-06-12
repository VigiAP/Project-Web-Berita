<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = 'tbl_users';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = ['id_user', 'username', 'nama', 'password', 'role', 'image', 'status', 'phone_no'];
    protected $builder;
    
    public function __construct()
    {
        $db      = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    public function getDataUsers($username = false)
    {
        if ($username === false) {
            return $this->builder->orderBy('id_user', 'DESC')->get()->getResultArray();
        }
        return $this->builder->where('username', $username)->get()->getResultArray();
    }

    public function CountUserByRole()
    {
        $this->builder->select('role, COUNT(role) as total');
        $this->builder->groupBy('role');
        return $this->builder->get()->getResultArray();
    }

    public function getDataUserById($id)
    {
        return $this->builder->where('id_user', $id)->get()->getResultArray();
    }

    public function saveData($data)
    {
        return $this->builder->insert($data);
    }

    public function updateData($data, $id)
    {
        return $this->builder->where('id_user', $id)->update($data);
    }

    public function deleteData($id)
    {
        return ($this->builder->delete(['id_user' => $id])) ? 1 : 0;
    }

    public function editData($data, $id)
    {
        return $this->builder->where('id_user', $id)->update($data);
    }

    public function updateOTP($otp, $username)
    {
        $this->builder->set('otp', $otp)->where('username', $username)->update();
    }

    public function updatePassUser($password, $username)
    {
        return $this->builder->set('password', $password)->where('username', $username)->update();
    }
}
