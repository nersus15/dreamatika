<?php

class Matkul_model
{
    private $DB;
    public function __construct()
    {
        $this->DB = new database;
    }

    public function getMatkul()
    {
        $query = "SELECT * FROM tbl_matkul";
        $this->DB->query($query);
        return $this->DB->resultSet();
    }
    public function getSingleMatkul()
    {
        $query = "SELECT * FROM tbl_matkul order by id desc";
        $this->DB->query($query);
        return  [
            "matkul" => $this->DB->single(),
            "rowCount" => $this->DB->rowCount(),
        ];
    }
    public function addMatkul($data)
    {
        $query = "INSERT into tbl_matkul(`id`,`nama_matkul`,`semester`,`jurusan`)VALUES(:id, :nama_matkul, :semester,:jurusan)";
        $this->DB->query($query);
        $this->DB->bind('id', $data['id']);
        $this->DB->bind('nama_matkul', $data['namaMatkul']);
        $this->DB->bind('semester', $data['semester']);
        $this->DB->bind('jurusan', $data['jurusan']);
        $this->DB->execute();
        header('Location:' . BASEURL . '/user/settings');
    }
    public function deleteAll()
    {
        $query = "delete from tbl_matkul";
        $this->DB->query($query);
        $this->DB->execute();
        header('Location:' . BASEURL . '/user/settings');
    }
    public function deleteById($id)
    {
        $query = "delete from tbl_matkul where id =:id";
        $this->DB->query($query);
        $this->DB->bind('id', $id[0]);
        $this->DB->execute();
        header('Location:' . BASEURL . '/user/settings');
    }
}
