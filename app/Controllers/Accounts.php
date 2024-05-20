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
            session()->setFlashdata('message', 'infoMessage');
            return redirect()->to('Accounts');
        }
        foreach ($user as $result) :
            $passdb = $result["password"];
            if (password_verify($password, $passdb) &&  $result["status"] == 1) {
                foreach ($user as $result) :
                    $data = [
                        'id'  => $result["id_user"],
                        'jenisLog' => $result["role"],
                        'username' => $result["username"],
                        'name' => $result["name"],
                        'logged_in' => true
                    ];
                    $this->session->set($data);
                    return redirect()->to('/');
                endforeach;
            } else {
                session()->setFlashdata('message', 'infoMessage');
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
                  session()->setFlashdata('message', 'registerFailde');
                   return redirect()->to('Accounts/register');
                   $error_msg = curl_error($curl);
                }
                curl_close($curl);
                session()->setFlashdata('message', 'registerSuccess');
                return redirect()->to('Accounts');
            } else {
                session()->setFlashdata('message', 'registerFailde');
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

    public function forgetPassPost()
    {
        $username = $this->request->getVar('username');
        $noHp = $this->request->getVar('phone_no');

        $data = $this->userModel->getDataUsers($username);
        if (!$data) {
            session()->setFlashdata('message', 'infoMessageForgetPass');
            return redirect()->to('Accounts/forget');
        }
        $random = rand(10000, 99999);
        foreach ($data as $user) {
            if ($user["username"] == $username && $user["phone_no"] == $noHp) {

                $this->userModel->updateOTP($random, $username);
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
                        'target' => $noHp,
                        'message' => "Kode OTP: ".$random." ",
                    ),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: X6xx6zCLy9d!fL@dKpBC'
                    ),
                ));

                $response = curl_exec($curl);
                if (curl_errno($curl)) {
                    $error_msg = curl_error($curl);
                }
                curl_close($curl);
                
                    $data = [
                            'title' => 'Forget Password | Pojok Berita',
                        ];

                    echo view('/accounts/forgetToken', $data);
            } else {
                session()->setFlashdata('message', 'infoMessageForgetPass');
                return redirect()->to('Accounts/forget');
            }
        }
    }

    public function updatePassword()
    {
        $username = $this->request->getVar('username');
        $otp = $this->request->getVar('token');

        $newPassword = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        $data = $this->userModel->getDataUsers($username);
        if ($data) {
            foreach ($data as $user) {
                if ($otp == $user['otp']) {
                    if ($this->userModel->updatePassUser($newPassword, $username)) {
                          session()->setFlashdata('message', 'infoMessageForgetPass3');
                        return redirect()->to('Accounts');
                    }
                } else {
                        session()->setFlashdata('message', 'infoMessageForgetPass2');
                        return redirect()->to('Accounts/forgetToken');
                }
            }
        } else {
            session()->setFlashdata('message', 'infoMessageForgetPass2');
            return redirect()->to('Pages/forgetPass');
        }
    }

    public function changePassword()
    {
        $old_password = $this->request->getVar('old_password');
        $new_password = $this->request->getVar('new_password');
        $repeat_password = $this->request->getVar('repeat_password');
        $id = $this->request->getVar('id');

        $password = password_hash($new_password, PASSWORD_DEFAULT);

        $data = $this->userModel->getDataUserById($id);
        
            foreach ($data as $user) {
                if (password_verify($old_password,$user['password'])) {
                    if ($new_password == $repeat_password) {
                        $this->userModel->updatePassUser($password, $user['username']);
                        session()->setFlashdata('message', 'passwordChanged');
                        return redirect()->to('/Accounts/profile');
                    } else {
                        session()->setFlashdata('message', 'passwordNotSame');
                        return redirect()->to('Accounts/change_password');
                    }
                } else {
                    session()->setFlashdata('message', 'passwordNotSame');
                    return redirect()->to('Accounts/change_password');
                }
            }
        
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

    public function change_password()
    {
        $data = [
            'title' => 'Ubah Password | Pojok Berita',
            'user' => $this->userModel->getDataUsers(session()->get('username'))
        ];

        echo view('/Accounts/change_password', $data);
    }

   
}
