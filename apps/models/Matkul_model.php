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
        return [
            "matkul" => $this->DB->resultSet(),
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
    }
}
