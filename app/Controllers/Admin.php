<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;
    protected $session;
    protected $validation;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard | Pojok Berita',
        ];

        echo view('/Dashboard/Admin/index', $data);
    }

    public function users()
    {
        $data = [
            'title' => 'Users | Pojok Berita',
            'users' => $this->userModel->getDataUsers(),
        ];

        echo view('/Dashboard/Admin/users', $data);
    }

    public function tambah_users()
    {
        $data = [
            'title' => 'Tambah Users | Pojok Berita',
        ];

        echo view('/Dashboard/Admin/tambah_users', $data);
    }

    public function save_user()
    {
        if ($this->request->getMethod() === 'post') {
            // Validate the input data
            $rules = [
                'name' => 'required',
                'username' => 'required|is_unique[tbl_users.username]',
                'password' => 'required',
                'phone_no' => 'required',
                'role' => 'required',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('validation', $this->validation);
            }

            // Get the input data
            $name = $this->request->getVar('name');
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $phone_no = $this->request->getVar('phone_no');
            $role = $this->request->getVar('role');

            // Save the user data to the database
            $data = [
                'name' => $name,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'phone_no' => $phone_no,
                'role' => $role,
            ];

            if($this->userModel->saveData($data)) {
                return redirect()->back()->with('success', 'User data saved successfully.');
            } else {
                return redirect()->back()->with('error', 'User data failed to save.');
            
            }
        }
    }

    public function edit_user()
    {
        $data = [
            'title' => 'Edit Users | Pojok Berita',
            'user' => $this->userModel->getDataUserById($this->request->getUri()->getSegment(3)),
        ];

        echo view('/Dashboard/Admin/edit_users', $data);
    }

    public function update_user()
    {
        if ($this->request->getMethod() === 'post') {
            // Validate the input data
            $rules = [
                'name' => 'required',
                'username' => 'required',
                'phone_no' => 'required',
                'role' => 'required',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('validation', $this->validation);
            }

            // Get the input data
            $id = $this->request->getVar('id');
            $name = $this->request->getVar('name');
            $username = $this->request->getVar('username');
            $phone_no = $this->request->getVar('phone_no');
            $role = $this->request->getVar('role');

            // Update the user data in the database
            $data = [
                'name' => $name,
                'username' => $username,
                'phone_no' => $phone_no,
                'role' => $role,
            ];

            if ($this->userModel->updateData($data, $id)) {
                return redirect()->to('Admin/users')->with('success', 'User data updated successfully.');
            } else {
                return redirect()->to('Admin/edit_user/<?=$id?>')->with('error', 'Failed to update user data.');
            }
        }
    }

    public function delete_user()
    {
        $idUser = $this->request->getUri()->getSegment(3);
        if ($this->userModel->deleteData($idUser)) {
            return redirect()->back()->with('success', 'User deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete user.');
        }
    }
}
