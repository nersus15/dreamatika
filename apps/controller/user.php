<?php

class user extends  controller
{
    public function index()
    {
        $data['pageTitle'] = 'Login';
        $this->view('header/login_user', $data);
        $this->view('user/login_user');
        $this->view('footer/login_user');
    }
    public function register()
    {
        $data['pageTitle'] = 'Peserta | Register';
        $this->view('header/login_user', $data);
        $this->view('user/register_peserta');
        $this->view('footer/login_user');
    }
}
