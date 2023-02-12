<?php 

class Mahasiswa_model{

    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('select * from ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id){
        $this->db->query('select * from ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data){
        $query = "INSERT INTO mahasiswa VALUES ('', :nama, :band, :rol, :sekolah)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('band', $data['band']);
        $this->db->bind('rol', $data['role']);
        $this->db->bind('sekolah', $data['sekolah']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}