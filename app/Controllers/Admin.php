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
                'phone_no' => 'required',
                'role' => 'required',
            ];

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('validation', $this->validation);
            }

            // Get the input data
            $name = $this->request->getVar('name');
            $username = $this->request->getVar('username');
            $phone_no = $this->request->getVar('phone_no');
            $role = $this->request->getVar('role');
            // $password = rand(1000, 9999);
            $password = '123';
            // Save the user data to the database
            $data = [
                'name' => $name,
                'username' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'phone_no' => $phone_no,
                'role' => $role,
                'image' => 'user-anon.jpg'
            ];

            if ($this->userModel->saveData($data)) {
                // $curl = curl_init();

                // curl_setopt_array($curl, array(
                //     CURLOPT_URL => 'https://api.fonnte.com/send',
                //     CURLOPT_RETURNTRANSFER => true,
                //     CURLOPT_ENCODING => '',
                //     CURLOPT_MAXREDIRS => 10,
                //     CURLOPT_TIMEOUT => 0,
                //     CURLOPT_FOLLOWLOCATION => true,
                //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                //     CURLOPT_CUSTOMREQUEST => 'POST',
                //     CURLOPT_POSTFIELDS => array(
                //         'target' => $phone_no,
                //         'message' => "Anda telah terdaftar di POJOK BERITA! Berikut ini informasi login Anda: Username: $username & Password: $password Harap simpan informasi ini dengan baik untuk masuk ke akun Anda. Terima kasih telah bergabung dengan kami!  
                //         ",
                //     ),
                //     CURLOPT_HTTPHEADER => array(
                //         'Authorization: X6xx6zCLy9d!fL@dKpBC'
                //     ),
                // ));
                // $response = curl_exec($curl);
                
                //  if (curl_errno($curl)) {
                //     session()->setFlashdata('message', 'gagal');
                     
                //     return redirect()->to('Admin/tambah_users');
                //    $error_msg = curl_error($curl);
 
                // }
                // curl_close($curl);
                session()->setFlashdata('message', 'success');
                return redirect()->to('Admin/users');
            }
            } else {
                 dd('error 2');
                session()->setFlashdata('message', 'gagal');
                return redirect()->to('Admin/tambah_users');
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
                session()->setFlashdata('message', 'success');
                return redirect()->to('Admin/users');
            } else {
                session()->setFlashdata('message', 'gagal');
                return redirect()->to('Admin/edit_user/<?=$id?>');
            }
        }
    }

    public function delete_user()
    {
        $idUser = $this->request->getUri()->getSegment(3);
        if ($this->userModel->deleteData($idUser)) {
            session()->setFlashdata('message', 'successHapus');
            return redirect()->to('Admin/users');
        } else {
            session()->setFlashdata('message', 'gagalHapus');
            return redirect()->to('Admin/users');
        }
    }

}
