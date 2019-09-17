<?php
class admin extends controller
{
    public function index()
    {
        // Mengecek apakah user sudah login atau belum
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }
        $this->helper('menu')->getSidebarMenu();
        $data['account'] = $_SESSION['user_data'];
        $data['pageTitle'] = 'User | Dashboard';
        $this->view('header/user_panel', $data);
        $this->view('navigasi/userpanel', $data);
        $this->view('user/dashboard');
        $this->view('footer/user');
    }
    public function new_account()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }

        $data['account'] = $_SESSION['user_data'];
        $data['role'] = $this->model('User_model')->getRole();
        $data['pageTitle'] = 'Admin | Create New Account';
        $this->view('header/user_panel', $data);
        $this->view('navigasi/userpanel', $data);
        $this->view('admin/newAccount', $data);
        $this->view('footer/user');
    }
    public function settings($params)
    {
        // Mengecek apakah user sudah login atau belum
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }

        $data['jadwal'] = $this->model('Angkatan_model')->cekJadwal();
        $data['rule'] = $this->model('Angkatan_model')->getRule();
        $data['account'] = $_SESSION['user_data'];
        $data['pageTitle'] = 'User | Dashboard';

        $data['script'] = ' $(".a ").prop("disabled", true);';
        $data['script2'] = ' $(".on ").prop("disabled", false);';

        $this->view('header/user_panel', $data);
        $this->view('navigasi/userpanel', $data);
        $this->view('navigasi/setting_topbar');
        if ($data['jadwal']['count'] > 0) {
            $this->view('footer/user', $data);
        } else {
            $this->view('footer/user');
        };
    }
    public function changeSetting($params)
    {
        // Mengecek apakah user sudah login atau belum
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }

        $data['account'] = $_SESSION['user_data'];
        $data['jadwal'] = $this->model('Angkatan_model')->cekJadwal();
        $data['rule'] = $this->model('Angkatan_model')->getRule();
        $data['script'] = ' $(".a ").prop("disabled", true);';
        $data['script2'] = ' $(".on ").prop("disabled", false);';
        $data['matkul'] = $this->model('Matkul_model')->getMatkul();

        if ($params[0] === 'matkul') {
            $this->view('admin/input_matkul', $data);
        } else if ($params[0] === 'pendaftaran') {
            if ($data['jadwal']['count'] > 0) {
                $this->view('admin/pendaftaran_peserta', $data);
            } else {
                $this->view('admin/pendaftaran_peserta');
            };
        }
    }
    public function setJadwal($data)
    {
        // Mengecek apakah user sudah login atau belum
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }
        $this->DB = new database;
        $data = $_POST;
        $start = strtotime($data['start_day']);
        $now = strtotime(date('d-m-Y', time()));
        if ($start >= $now) {
            if ($this->model('Angkatan_model')->setJadwal($data) > 0) {
                flasher::setFlash('Berhasil', 'success');
                // Update tbl_rule id=1 (day/ Gelombang)
                $query = "UPDATE tbl_rule set `value`=:dpg where id=1";
                $this->DB->query($query);
                $this->DB->bind('dpg', $data['day_in_gelombang']);
                $this->DB->execute();
                // Update tbl_rule id=2 (jeda/ Gelombang)
                $query = "UPDATE tbl_rule set `value`=:jpg where id=2";
                $this->DB->query($query);
                $this->DB->bind('jpg', $data['jeda']);
                $this->DB->execute();
                $_SESSION['log'] = [
                    'aksi' => 'Set jadwal pendaftaran',
                    'user' => $_SESSION['user_data']['nama']
                ];
                $this->model('User_model')->addlog();
                $matkulCount = $this->model('Matkul_model')->getMatkul();
                $paramsforUpdate = ["key" => 'total_matkul', "value" => count($matkulCount)];
                $this->model('Angkatan_model')->update($paramsforUpdate);
                header('location:' . BASEURL . '/user/settings');
            }
        } else {
            flasher::setFlash('Gagal, Start day harus sama atau lebih besar dari hari ini', 'danger');
            header('location:' . BASEURL . '/user/settings');
        }
    }
    public function deletejadwal()
    {
        // Mengecek apakah user sudah login atau belum
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }
        $this->model('Angkatan_model')->deleteJadwal();
        $_SESSION['log'] = [
            'aksi' => 'hapus jadwal pendaftaran',
            'user' => $_SESSION['user_data']['nama']
        ];
        $this->model('User_model')->addlog();
        header('location:' . BASEURL . '/user/settings');
    }
    public function addMatkul($data)
    {
        $data = $_POST;
        $dataMatkul = $this->model('Matkul_model')->getSingleMatkul();
        $matkul['id'] = '';
        $id = '';
        if ($dataMatkul['rowCount'] == 0) {
            $id = "MK1";
        } else {
            $matkul['id'] = explode('MK', $dataMatkul['matkul']['id']);
            $curentId = (int) $matkul['id'][1];
            $curentId += 1;
            $curentId = (string) $curentId;
            $id = "MK";
            $id .= $curentId;
        }
        $data['newMatkul'] = [
            "id" => $id,
            "namaMatkul" => $data['matkul'],
            "semester" => $data['semester'],
            "jurusan" => $data['jurusan'],

        ];
        $this->model('Matkul_model')->addMatkul($data['newMatkul']);
        $_SESSION['log'] = [
            'aksi' => 'Menambah Matkul Baru dengan Id: ' . $id,
            'user' => $_SESSION['user_data']['nama']
        ];
        $this->model('User_model')->addlog();
        $matkulCount = $this->model('Matkul_model')->getMatkul();
        $paramsforUpdate = ["key" => 'total_matkul', "value" => count($matkulCount)];
        $this->model('Angkatan_model')->update($paramsforUpdate);
        header('Location:' . BASEURL . '/admin/settings');
    }
    public function deleteMatkul($matkul)
    {

        if (count($matkul) == 0) {
            $this->model('Matkul_model')->deleteAll();
            $_SESSION['log'] = [
                'aksi' => 'Menghapus Semua Matkul',
                'user' => $_SESSION['user_data']['nama']
            ];
            $this->model('User_model')->addlog();
            $matkulCount = $this->model('Matkul_model')->getMatkul();
            $paramsforUpdate = ["key" => 'total_matkul', "value" => count($matkulCount)];
            $this->model('Angkatan_model')->update($paramsforUpdate);
        } else {
            $this->model('Matkul_model')->deleteById($matkul);
            $_SESSION['log'] = [
                'aksi' => 'Menghapus Matkul dengan id:' . $matkul[0],
                'user' => $_SESSION['user_data']['nama']
            ];
            $this->model('User_model')->addlog();
            $matkulCount = $this->model('Matkul_model')->getMatkul();
            $paramsforUpdate = ["key" => 'total_matkul', "value" => count($matkulCount)];
            $this->model('Angkatan_model')->update($paramsforUpdate);
        }
        header('Location:' . BASEURL . '/admin/settings');
    }
}
