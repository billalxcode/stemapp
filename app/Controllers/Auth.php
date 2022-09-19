<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;

class Auth extends BaseController
{
    protected $session;
    protected $usersModel;

    function __construct()
    {
        $this->session = Services::session();
        $this->usersModel = new \App\Models\UsersModel();
    }
    
    public function login() {
        helper('form');
        
        $method = $this->request->getMethod();
        if ($method == 'post') {
            $email      = $this->request->getPost('email');
            $password   = $this->request->getPost('password');

            $userData = $this->usersModel->getuser_by_email($email, true);
            if ($userData) {
                if ($userData['role'] == 'admin' && password_verify($password, $userData['password'])) {
                    $token = $this->usersModel->set_refreshtoken($userData['id']);
                    $this->session->setFlashdata('success', 'Welcome back ' . $userData['username'] . ' anda seorang ' . $userData['role']);

                    $this->session->set('logged', true);
                    $this->session->set("token", $token);
                    return redirect()->to('admin');
                } else {
                    $this->session->setFlashdata('error', 'Login gagal, silahkan coba lagi');
                }
            } else {
                $this->session->setFlashdata('error', 'Login gagal, silahkan coba lagi');
            }

            return redirect()->back()->withInput();
        } else {
            return $this->renderOnce('auth/login');
        }
    }
}
