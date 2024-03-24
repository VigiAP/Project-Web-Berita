<?php

namespace App\Controllers;

use App\Models\UserModel;

class Accounts extends BaseController
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
            'title' => 'Login | Pojok Berita',
        ];
       
        echo view('/accounts/index', $data);
    }

    public function loginPost()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->userModel->getDataUsers($username);
        if (!$user) {
            session()->setFlashdata('message', 'Username atau Password salah');
            return redirect()->to('Accounts');
        }
        foreach ($user as $result) :
            $passdb = $result["password"];
            if (password_verify($password, $passdb) &&  $result["status"] == 1) {
                foreach ($user as $result) :
                    $data = [
                        'id'  => $result["user_id"],
                        'jenisLog' => $result["role"],
                        'username' => $result["username"],
                        'name' => $result["name"],
                        'logged_in' => true
                    ];
                    $this->session->set($data);
                    return redirect()->to('/');
                endforeach;
            } else {
                session()->setFlashdata('message', 'Username atau Password salah');
                return redirect()->to('Accounts');
            }
        endforeach;
    }

    public function register()
    {
        $data = [
            'title' => 'Register | Pojok Berita',
            'validation' => $this->validation
        ];

        echo view('/accounts/register', $data);
    }

    public function registerPost() {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $phone_number = $this->request->getVar('phone_no');

        $rules = [
            [
                'username' => 'required|is_unique[tbl_users.username]',
                'phone_no' => 'required',
                'password' => 'required',
            ],
            [
                'username' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar',
                ],
                'phone_no' => [
                    'required' => 'nomor hp harus diisi',
                ],
                'password' => [
                    'required' => 'password harus diisi',
                ],
            ]
        ];

         $data = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'phone_no' => $phone_number,
        ];
        
        $this->validation->setRules($rules[0], $rules[1]);
        if ($this->validation->run($data)) {
            $validatedData = $this->validation->getValidated();
            if ($this->userModel->saveData($validatedData)) {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                        'target' => $phone_number,
                        'message' => "Anda telah terdaftar di POJOK BERITA! Berikut ini informasi login Anda: Username: $username & Password: $password Harap simpan informasi ini dengan baik untuk masuk ke akun Anda. Terima kasih telah bergabung dengan kami!  
                        ",
                    ),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: X6xx6zCLy9d!fL@dKpBC'
                    ),
                ));
                $response = curl_exec($curl);
                

                 if (curl_errno($curl)) {
                   return redirect()->back()->with('error', 'User data failed to save.');
                   return redirect()->to('Accounts/register');
                   $error_msg = curl_error($curl);
                }
                curl_close($curl);
                session()->setFlashdata('message', 'berhasil-disimpan');
                return redirect()->to('Accounts');
            } else {
                session()->setFlashdata('message', 'gagal-disimpan');
                return redirect()->to('Accounts/register');
            }
        } else {
            return redirect()->to('Accounts/register')->withInput()->with('validation', $this->validation);
        }
    }

    public function forget()
    {
        $data = [
            'title' => 'Forget Password | Pojok Berita',
        ];

        echo view('/accounts/forget', $data);
    }

    public function forgetToken()
    {
        $data = [
            'title' => 'Forget Password | Pojok Berita',
        ];

        echo view('/accounts/forgetToken', $data);
    }

    public function logout() {
        $this->session->destroy();
        return redirect()->to('/Accounts');
    }

      public function profile()
    {
        $data = [
            'title' => 'Profile | Pojok Berita',
            'user' => $this->userModel->getDataUsers(session()->get('username'))
        ];

        echo view('/Accounts/profile', $data);
    }

    public function edit_profile()
    {
        $data = [
            'title' => 'Edit Profile | Pojok Berita',
            'user' => $this->userModel->getDataUsers(session()->get('username'))
        ];

        echo view('/Accounts/edit_profile', $data);
    }

    public function update_profile()
    {
            $id = $this->request->getVar('id');
            $username = $this->request->getVar('username');
            $name = $this->request->getVar('name');
            $phone_no = $this->request->getVar('phone_no');

            $rules = [
                'name' => 'required',
                'phone_no' => 'required',
                'username' => 'required',
            ];

            $data = [
                'name' => $name,
                'username' => $username,
                'phone_no' => $phone_no,
            ];

            $this->validation->setRules($rules);
            if ($this->validation->run($data)) {
                $validatedData = $this->validation->getValidated();
                if ($this->userModel->editData($validatedData, $id)) {
                    return redirect()->to('Accounts/profile')->with('success', 'User data saved successfully.');
                } else {
                    return redirect()->back()->with('error', 'User data failed to save.');
                }
            } else {
                return redirect()->to('Accounts/edit_profile')->withInput()->with('validation', $this->validation);
            }
        
    }
}
