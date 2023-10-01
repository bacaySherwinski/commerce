<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    
    public function index()
    {
        helper(['form']);
        $data=[];
        echo view('signup', $data);
    }

    public function register()
{
    helper(['form']);
    $rules = [
        'username' => 'required|min_length[4] |max_length[100][valid_emaillis_unique[users.email]',
        'password' => 'required|min_length[4] max_length[50]',
         'confirmpassword' => 'matches[password]'
    ];

    if ($this->validate($rules)) {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];

        $userModel->save($data);

        return redirect()->to('/signin');
    } else {
        $data['validation'] = $this->validator;

        return view('signup', $data);
    }
}
   public function Login()
{
    helper(['form']);
    echo view("signin");
}

public function LoginAuth()
{
    $session = session();
    $SuserModel = new UserModel();
    $Susername = $this->request->getVar('username');
    $Spassword = $this->request->getVar('password');

    $data = $SuserModel->where('username', $Susername)->first();
    if ($data) {
        $Spass = $data['password'];
        $SauthenticatePassword = password_verify($Spassword, $Spass);

        if ($SauthenticatePassword) {
            $ses_data = [
                'id' => $data['id'],
                'username' => $data['username'],
                'IsLoggedIn' => TRUE
            ];
            $session->set($ses_data);

            return redirect()->to("/profile");
        } else {
            $session->setFlashdata('msg', 'Password is incorrect.');
            return redirect()->to('/signin');
        }
    } else {
        $session->setFlashdata('msg', 'Email does not exist.');
        return redirect()->to('/signin');
    }
}


}
