<?php
class Angkatan_model
{
    private $DB;
    public function __construct()
    {
        $this->DB = new database;
    }
    public function setJadwal($data)
    {
        $date = explode('-', $data['start_day']);
        $month = (int) ($date[1]);
        if ($month <= 6) {
            $semester = "Genap";
        } else {
            $semester = "Ganjil";
        }
        $query = "INSERT into tbl_angkatan(`tahun`,`start_date`,`semester`)VALUES(:tahun, :startDate, :semester)";
        $this->DB->query($query);
        $this->DB->bind('tahun', $date[0]);
        $this->DB->bind('startDate', $data['start_day']);
        $this->DB->bind('semester', $semester);
        $this->DB->execute();
        return $this->DB->rowCount();
    }
    public function cekJadwal()
    {
        $query = "SELECT * FROM tbl_angkatan";
        $this->DB->query($query);
        $this->DB->execute();
        return [
            "jadwal" => $this->DB->single(),
            "count" => $this->DB->rowCount()
        ];
    }
    public function deleteJadwal()
    {
        $query = "DELETE FROM `tbl_angkatan`";
        $this->DB->query($query);
        $this->DB->execute();
    }
    public function getRule()
    {
        $query = "SELECT * FROM tbl_rule";
        $this->DB->query($query);
        $this->DB->execute();
        return $this->DB->resultSet();
    }
    public function update($params)
    {
        $this->cekJadwal();
        $query = "Update tbl_angkatan set " . $params['key'] . "=:value";
        $this->DB->query($query);
        $this->DB->bind('value', $params['value']);;
        $this->DB->execute();
    }
}
