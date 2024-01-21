<?php

class Pengguna
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

    public function createPengguna($nama_pengguna, $password, $nama_depan, $nama_belakang, $no_hp, $alamat, $id_akses)
    {
        $nama_pengguna = $this->db->real_escape_string($nama_pengguna);
        $password = $this->db->real_escape_string($password);
        $nama_depan = $this->db->real_escape_string($nama_depan);
        $nama_belakang = $this->db->real_escape_string($nama_belakang);
        $no_hp = $this->db->real_escape_string($no_hp);
        $alamat = $this->db->real_escape_string($alamat);
        $id_akses = $this->db->real_escape_string($id_akses);

        $sql = "INSERT INTO pengguna (nama_pengguna, password, nama_depan, nama_belakang, no_hp, alamat, id_akses) 
                VALUES ('$nama_pengguna', '$password', '$nama_depan', '$nama_belakang', '$no_hp', '$alamat', '$id_akses')";
        $this->db->query($sql);
    }

    public function updatePengguna($id_pengguna, $nama_pengguna, $password, $nama_depan, $nama_belakang, $no_hp, $alamat, $id_akses)
    {
        $id_pengguna = $this->db->real_escape_string($id_pengguna);
        $nama_pengguna = $this->db->real_escape_string($nama_pengguna);
        $password = $this->db->real_escape_string($password);
        $nama_depan = $this->db->real_escape_string($nama_depan);
        $nama_belakang = $this->db->real_escape_string($nama_belakang);
        $no_hp = $this->db->real_escape_string($no_hp);
        $alamat = $this->db->real_escape_string($alamat);
        $id_akses = $this->db->real_escape_string($id_akses);

        $sql = "UPDATE pengguna 
                SET nama_pengguna='$nama_pengguna', password='$password', nama_depan='$nama_depan', 
                    nama_belakang='$nama_belakang', no_hp='$no_hp', alamat='$alamat', id_akses='$id_akses' 
                WHERE id_pengguna=$id_pengguna";
        $this->db->query($sql);
    }

    public function deletePengguna($id_pengguna)
    {
        $id_pengguna = $this->db->real_escape_string($id_pengguna);

        $sql = "DELETE FROM pengguna WHERE id_pengguna=$id_pengguna";
        $this->db->query($sql);
    }

    public function getAllPengguna()
    {
        $sql = "SELECT * FROM pengguna";
        $result = $this->db->query($sql);

        $penggunaList = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $penggunaList[] = $row;
            }
        }

        return $penggunaList;
    }
}

?>
