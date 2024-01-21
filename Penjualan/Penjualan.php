<?php

class Penjualan
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

    public function createPenjualan($jumlah_penjualan, $harga_jual, $id_pengguna)
    {
        $jumlah_penjualan = $this->db->real_escape_string($jumlah_penjualan);
        $harga_jual = $this->db->real_escape_string($harga_jual);
        $id_pengguna = $this->db->real_escape_string($id_pengguna);

        $sql = "INSERT INTO penjualan (jumlah_penjualan, harga_jual, id_pengguna) 
                VALUES ('$jumlah_penjualan', '$harga_jual', '$id_pengguna')";
        $this->db->query($sql);
    }

    public function updatePenjualan($id_pembelian, $jumlah_penjualan, $harga_jual, $id_pengguna)
    {
        $id_pembelian = $this->db->real_escape_string($id_pembelian);
        $jumlah_penjualan = $this->db->real_escape_string($jumlah_penjualan);
        $harga_jual = $this->db->real_escape_string($harga_jual);
        $id_pengguna = $this->db->real_escape_string($id_pengguna);

        $sql = "UPDATE penjualan 
                SET jumlah_penjualan='$jumlah_penjualan', harga_jual='$harga_jual', id_pengguna='$id_pengguna' 
                WHERE id_pembelian=$id_pembelian";
        $this->db->query($sql);
    }

    public function deletePenjualan($id_pembelian)
    {
        $id_pembelian = $this->db->real_escape_string($id_pembelian);

        $sql = "DELETE FROM penjualan WHERE id_pembelian=$id_pembelian";
        $this->db->query($sql);
    }

    public function getAllPenjualan()
    {
        $sql = "SELECT * FROM penjualan";
        $result = $this->db->query($sql);

        $penjualanList = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $penjualanList[] = $row;
            }
        }

        return $penjualanList;
    }
}

?>
