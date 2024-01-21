<?php

class Pembelian
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

    public function createPembelian($jumlah_pembelian, $harga_beli, $id_pengguna)
    {
        $jumlah_pembelian = $this->db->real_escape_string($jumlah_pembelian);
        $harga_beli = $this->db->real_escape_string($harga_beli);
        $id_pengguna = $this->db->real_escape_string($id_pengguna);

        $sql = "INSERT INTO pembelian (jumlah_pembelian, harga_beli, id_pengguna) VALUES ('$jumlah_pembelian', '$harga_beli', '$id_pengguna')";
        $this->db->query($sql);
    }

    public function updatePembelian($id_pembelian, $jumlah_pembelian, $harga_beli, $id_pengguna)
    {
        $id_pembelian = $this->db->real_escape_string($id_pembelian);
        $jumlah_pembelian = $this->db->real_escape_string($jumlah_pembelian);
        $harga_beli = $this->db->real_escape_string($harga_beli);
        $id_pengguna = $this->db->real_escape_string($id_pengguna);

        $sql = "UPDATE pembelian SET jumlah_pembelian='$jumlah_pembelian', harga_beli='$harga_beli', id_pengguna='$id_pengguna' WHERE id_pembelian=$id_pembelian";
        $this->db->query($sql);
    }

    public function deletePembelian($id_pembelian)
    {
        $id_pembelian = $this->db->real_escape_string($id_pembelian);

        $sql = "DELETE FROM pembelian WHERE id_pembelian=$id_pembelian";
        $this->db->query($sql);
    }

    public function getAllPembelian()
    {
        $sql = "SELECT * FROM pembelian";
        $result = $this->db->query($sql);

        $pembelianList = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pembelianList[] = $row;
            }
        }

        return $pembelianList;
    }
}

?>
