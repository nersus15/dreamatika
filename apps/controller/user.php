<?php
class user extends controller
{
    public function index()
    {
        // Mengecek apakah user sudah login atau belum
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }

        $data['account'] = $_SESSION['user_data'];
        $data['user_menu'] = $this->model('User_model')->getUserMenu();
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
        $data['user_menu'] = $this->model('User_model')->getUserMenu();
        $data['pageTitle'] = 'Admin | Create New Account';
        $this->view('header/user_panel', $data);
        $this->view('navigasi/userpanel', $data);
        $this->view('user/neAccount', $data);
        $this->view('footer/user');
    }
    public function register($data)
    {
        $akun = $this->model('User_model')->Akun($_SESSION['user_data']['email']);
        $data = $_POST;
        if ($data['Email'] == $akun['email']) {
            flasher::setFlash('Gagal, Email sudah terdaftar', 'danger');
            header('location:' . BASEURL . '/user/new_account');
        } else if ($data['FullName'] == $akun['nama']) {
            flasher::setFlash('Gagal, Username sudah digunakan', 'danger');
            header('location:' . BASEURL . '/user/new_account');
        } elseif (strlen($data['Password']) < 8) {
            flasher::setFlash('Gagal, Karakter Password kurang dari 8', 'danger');
            header('location:' . BASEURL . '/user/new_account');
        } elseif ($data['Password'] != $data['Password2']) {
            flasher::setFlash('Gagal, Password tidak cocok', 'danger');
            header('location:' . BASEURL . '/user/new_account');
        } else {
            $this->model('User_model')->register($data);
            $_SESSION['log'] = [
                'aksi' => 'Create Akun Baru',
                'user' => $_SESSION['user_data']['nama']
            ];
            $this->model('User_model')->addlog();
            flasher::setFlash('Akun Baru Berhasil ditambahkan', 'success');
            header('location:' . BASEURL . '/user/new_account');
        }
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
        $data['user_menu'] = $this->model('User_model')->getUserMenu();
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
    public function profile()
    {
        // Mengecek apakah user sudah login atau belum
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }

        $data['user_menu'] = $this->model('User_model')->getUserMenu();
        $data['account'] = $_SESSION['user_data'];
        $data['isRead'] = true;
        $data['pageTitle'] = 'User | My Profile';
        $this->view('header/user_panel', $data);
        $this->view('navigasi/userpanel', $data);
        $this->view('user/profile', $data);
        $this->view('footer/user', $data);
    }
    public function editprofile()
    {
        // Mengecek apakah user sudah login atau belum
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }

        $data['user_menu'] = $this->model('User_model')->getUserMenu();
        $data['account'] = $_SESSION['user_data'];
        $data['isRead'] = false;
        $data['pageTitle'] = 'User | My Profile';
        $this->view('header/user_panel', $data);
        $this->view('navigasi/userpanel', $data);
        $this->view('user/profile', $data);
        $this->view('footer/user', $data);
    }
    public function applychange($data)
    {
        // Mengecek apakah user sudah login atau belum
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }
        $data = $_POST;
        if ($data['password'] != $data['password2']) {
            flasher::setFlash('Gagal, Password berbeda', 'danger');
            header('location: ' . BASEURL . '/user/editprofile');
        } else {

            $this->model('User_model')->editprofile($data);
        }
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

        if ($params[0] === 'matkul') {
            $this->view('user/input_matkul');
        } else if ($params[0] === 'pendaftaran') {
            if ($data['jadwal']['count'] > 0) {
                $this->view('user/pendaftaran_peserta', $data);
            } else {
                $this->view('user/pendaftaran_peserta');
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
    public function log()
    {
        // Mengecek apakah user sudah login atau belum
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }
        if ($_SESSION['user_data']['role_id'] == 1) {
            $data['log'] = $this->model('User_model')->getAllLog();
        } else {
            $data['log'] = $this->model('User_model')->getLogById($_SESSION['user_data']['id']);
        }
        $data['account'] = $_SESSION['user_data'];
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/user');
        }
        $data['user_menu'] = $this->model('User_model')->getUserMenu();
        $data['pageTitle'] = 'User | Log';
        $this->view('header/user_panel', $data);
        $this->view('navigasi/userpanel', $data);
        $this->view('user/log', $data);
        $this->view('footer/user');
    }
    public function filterLog($params)
    {
        // Mengecek apakah user sudah login atau belum
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }
        // Mengambil Data Log berdasarakan 2 parameter
        $data['log'] = $this->model('User_model')->filterLog($params[0], $params[1]);
        ?>
        <!-- ... -->

        <!-- Menampilkan Data Log hasil Filter -->
        <table style="margin-left: 3%;" class="table-hover table-default" cellpadding="5" cellspacing="0">
            <tr class="bg-light  text-center">
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Aksi</th>
                <th>Username</th>
            </tr>
            <?php
                    foreach ($data['log'] as $log) : ?>
                <tr>
                    <td><?= $log['tgl']; ?></td>
                    <td><?= date('h:i:s', $log['time']); ?></td>
                    <td><?= $log['aksi']; ?></td>
                    <td><?= $log['user']; ?></td>
                </tr>
            <?php endforeach ?>
        </table>
<?php
    }
    public function addMatkul($data)
    {
        $data = $_POST;
        $dataMatkul = $this->model('Matkul_model')->getMatkul();
        $matkul['id'] = '';
        $id = '';
        if ($dataMatkul['rowCount'] == 0) {
            $id = "MK001";
        } else {
            $matkul['id'] = explode('MTK', $dataMatkul['id']);
            $id = "MK";
            var_dump($matkul);
            die;
        }
        $data['newMatkul'] = [
            "id" => $id,
            "namaMatkul" => $data['matkul'],
            "semester" => $data['semester'],
            "jurusan" => $data['jurusan'],

        ];
        $this->model('Matkul_model')->addMatkul($data['newMatkul']);
    }
}
