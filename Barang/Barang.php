<?php

class Barang
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

    public function createBarang($nama_barang, $keterangan, $satuan, $id_pengguna)
    {
        $sql = "INSERT INTO barang (nama_barang, keterangan, satuan, id_pengguna) VALUES ('$nama_barang', '$keterangan', '$satuan', '$id_pengguna')";
        $this->db->query($sql);
    }

    public function updateBarang($id_barang, $nama_barang, $keterangan, $satuan, $id_pengguna)
    {
        $sql = "UPDATE barang SET nama_barang='$nama_barang', keterangan='$keterangan', satuan='$satuan', id_pengguna='$id_pengguna' WHERE id_barang=$id_barang";
        $this->db->query($sql);
    }

    public function deleteBarang($id_barang)
    {
        $sql = "DELETE FROM barang WHERE id_barang=$id_barang";
        $this->db->query($sql);
    }

    public function getAllBarang()
    {
        $sql = "SELECT * FROM barang";
        $result = $this->db->query($sql);

        $barangList = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $barangList[] = $row;
            }
        }

        return $barangList;
    }
}

?>
