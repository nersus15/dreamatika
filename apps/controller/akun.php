<?php

class akun extends  controller
{
    public function index()
    {
        if (isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/user');
        }
        $data['pageTitle'] = 'Login';
        $data['Path'] = 'login';
        $this->view('header/login_user', $data);
        $this->view('navigasi/akun_navbar', $data);
        $this->view('user/login_user');
        $this->view('footer/login_user');
    }
    public function register()
    {
        $data['pageTitle'] = 'Peserta | Register';
        $data['Path'] = 'register';
        $this->view('header/login_user', $data);
        $this->view('navigasi/akun_navbar', $data);
        $this->view('user/register_peserta');
        $this->view('footer/login_user');
    }
    public function login()
    {
        $data = $_POST;
        $this->model('User_model')->login($data);
    }
    public function logout()
    {
        $this->model('User_model')->logout();
    }
}
