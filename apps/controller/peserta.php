<?php
class peserta extends controller
{

    public function index()
    {
        if (isset($_SESSION['login'])) {
            $data['account'] = $_SESSION['user_data'];
            $data['user_menu'] = $this->model('User_model')->getUserMenu();
            $data['pageTitle'] = 'User | Dashboard';
            $this->view('header/peserta', $data);
            $this->view('navigasi/peserta_navbar', $data);
            $this->view('peserta/index');
            $this->view('footer/login_user');
        } else {
            $data['pageTitle'] = 'Peserta | Register';
            $data['Path'] = 'daftar';
            $data['matkul'] = $this->model('Matkul_model')->getMatkul();
            $this->view('header/login_user', $data);
            $this->view('navigasi/akun_navbar', $data);
            $this->view('peserta/register_peserta', $data);
            $this->view('footer/login_user');
        }
    }
    public function register()
    {

        $data['inputan'] = [
            'Password' => $_POST['nim'],
            'Password2' => $_POST['nim'],
            'Email' => $_POST['email'],
            'FullName' => $_POST['nama'] . $_POST['nim'],
            'role' => (int) 3
        ];
        $data['akun'] = $this->model('User_model')->akun($_POST['email']);
        $data['register'] = $this->model('Register_model')->getRegisterByNIM($_POST['nim']);
        if ($this->helper('user_registration')->newPeserta($_POST, $data['register']) == true) {
            //    Menambahkannya ke tbl_user
            if ($this->helper('user_registration')->newAccount($data) == false) {
                header('Location:' . BASEURL . '/peserta');
            } else {
                $this->model('User_model')->register($data['inputan']);
            }
            // menambahkan ke tbl_register
            $this->model('Register_model')->register($_POST);

            // Update Tabel Angkatan
            $registerCount = $this->model('Register_model')->getRegister();
            $paramsforUpdate = ["key" => 'total_calon', "value" => count($registerCount)];
            $this->model('Angkatan_model')->update($paramsforUpdate);
        }
        header('Location:' . BASEURL . '/peserta');
    }
}
