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

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data){
        $query = "UPDATE mahasiswa SET nama = :nama, band = :band, rol = :rol, sekolah = :sekolah WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('band', $data['band']);
        $this->db->bind('rol', $data['role']);
        $this->db->bind('sekolah', $data['sekolah']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();

    }
}