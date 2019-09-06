<?php
class Register_model
{

    public function __construct()
    {
        $this->DB = new database;
    }
    public function getRegister()
    {
        $query = "SELECT * FROM tbl_register";
        $this->DB->query($query);
        return $this->DB->resultSet();
    }
    public function getRegisterByNIM($nim)
    {
        $query = "SELECT * FROM tbl_register WHERE nim =:nim";
        $this->DB->query($query);
        $this->DB->bind('nim', $nim);
        return $this->DB->single();
    }
    public function register($data)
    {
        // persiapan
        $tgl = time();
        $dataRegister = $this->getRegister();
        $id;
        $matkul2 = "tidak memilih";

        if (count($dataRegister) === 0) {
            $id = "REG1";
        } else {
            $newId = count($dataRegister) + 1;
            $newId = (string) $newId;
            $id = "REG";
            $id .= $newId;
        }
        if ($data['matkul2'] != 'Mata Kuliah') {
            $matkul2 = $data['matkul2'];
        }
        // query DB
        $query = "INSERT into tbl_register VALUES(:id,:nim,:nama,:jk,:tgl,:semester, :jurusan, :kontak, :email, :matkul1, :matkul2, 'default.jpg')";
        $this->DB->query($query);
        $this->DB->bind('nama', $data['nama']);
        $this->DB->bind('email', $data['email']);
        $this->DB->bind('nim', $data['nim']);
        $this->DB->bind('tgl', $tgl);
        $this->DB->bind('jk', $data['jenis_kelamin']);
        $this->DB->bind('semester', $data['semester']);
        $this->DB->bind('jurusan', $data['jurusan']);
        $this->DB->bind('kontak', $data['kontak']);
        $this->DB->bind('matkul1', $data['matkul1']);
        $this->DB->bind('matkul2', $matkul2);
        $this->DB->bind('id', $id);
        $this->DB->execute();
        flasher::setFlash("Registrasi anda berhasil kilik <a href='http://localhost/dreamatika/akun'>disini</a> untuk Login", 'success');
        // header('Location:' . BASEURL . '/peserta');
    }
}
