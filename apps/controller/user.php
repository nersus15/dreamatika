<?php
class user extends controller
{
    public function index()
    {
        // Mengecek apakah user sudah login atau belum
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }
        if ($_SESSION['user_data']['role_id'] != 3) {
            header('Location: ' . BASEURL . '/admin');
        }
        if ($_SESSION['user_data']['role_id'] == 3) {
            header('Location: ' . BASEURL . '/peserta');
        }
    }
    public function new_account($data)
    {
        $data['inputan'] = $_POST;
        $data['akun'] = $this->model('User_model')->akun($data['inputan']['Email']);
        if ($this->helper('user_registration')->newAccount($data) == false) {
            header('location:' . BASEURL . '/admin/new_account');
        } else {
            $this->model('User_model')->register($data['inputan']);
            $_SESSION['log'] = [
                'aksi' => 'Create Akun Baru',
                'user' => $_SESSION['user_data']['nama']
            ];
            $this->model('User_model')->addlog();
        }
        header('location:' . BASEURL . '/admin/new_account');
    }

    public function profile()
    {
        // Mengecek apakah user sudah login atau belum
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/akun');
        }
        $this->DB = new database();
        $query = "SELECT * FROM user_role WHERE id =:id";
        $this->DB->query($query);
        $this->DB->bind('id', $_SESSION['user_data']['role_id']);
        $role = $this->DB->single();
        $data['role'] = $role['role'];


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
                    <td><?= date('H:i:s', $log['time']); ?></td>
                    <td><?= $log['aksi']; ?></td>
                    <td><?= $log['user']; ?></td>
                </tr>
            <?php endforeach ?>
        </table>
<?php
    }
}
