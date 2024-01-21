<?php

class Akses
{
    private $db;

    public function __construct()
    {
        // Gantilah ini dengan konfigurasi database sesuai kebutuhan Anda
        $host = 'localhost';
        $username = 'username';
        $password = 'password';
        $database = 'database';

        $this->db = new mysqli($host, $username, $password, $database);

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function createAkses($nama_akses, $keterangan)
    {
        $nama_akses = $this->db->real_escape_string($nama_akses);
        $keterangan = $this->db->real_escape_string($keterangan);

        $sql = "INSERT INTO akses (nama_akses, keterangan) VALUES ('$nama_akses', '$keterangan')";
        $this->db->query($sql);
    }

    public function updateAkses($id_akses, $nama_akses, $keterangan)
    {
        $id_akses = $this->db->real_escape_string($id_akses);
        $nama_akses = $this->db->real_escape_string($nama_akses);
        $keterangan = $this->db->real_escape_string($keterangan);

        $sql = "UPDATE akses SET nama_akses='$nama_akses', keterangan='$keterangan' WHERE id_akses=$id_akses";
        $this->db->query($sql);
    }

    public function deleteAkses($id_akses)
    {
        $id_akses = $this->db->real_escape_string($id_akses);

        $sql = "DELETE FROM akses WHERE id_akses=$id_akses";
        $this->db->query($sql);
    }

    public function getAllAkses()
    {
        $sql = "SELECT * FROM akses";
        $result = $this->db->query($sql);

        $aksesList = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $aksesList[] = $row;
            }
        }

        return $aksesList;
    }
}

?>
