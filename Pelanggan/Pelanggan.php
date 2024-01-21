<?php

class PelangganModel
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

    public function createPelanggan($nama_pelanggan, $alamat, $no_hp, $id_barang)
    {
        $nama_pelanggan = $this->db->real_escape_string($nama_pelanggan);
        $alamat = $this->db->real_escape_string($alamat);
        $no_hp = $this->db->real_escape_string($no_hp);
        $id_barang = $this->db->real_escape_string($id_barang);

        $sql = "INSERT INTO pelanggan (nama_pelanggan, alamat, no_hp, id_barang) 
                VALUES ('$nama_pelanggan', '$alamat', '$no_hp', '$id_barang')";
        $this->db->query($sql);
    }

    public function updatePelanggan($id_pelanggan, $nama_pelanggan, $alamat, $no_hp, $id_barang)
    {
        $id_pelanggan = $this->db->real_escape_string($id_pelanggan);
        $nama_pelanggan = $this->db->real_escape_string($nama_pelanggan);
        $alamat = $this->db->real_escape_string($alamat);
        $no_hp = $this->db->real_escape_string($no_hp);
        $id_barang = $this->db->real_escape_string($id_barang);

        $sql = "UPDATE pelanggan 
                SET nama_pelanggan='$nama_pelanggan', alamat='$alamat', no_hp='$no_hp', id_barang='$id_barang' 
                WHERE id_pelanggan=$id_pelanggan";
        $this->db->query($sql);
    }

    public function deletePelanggan($id_pelanggan)
    {
        $id_pelanggan = $this->db->real_escape_string($id_pelanggan);

        $sql = "DELETE FROM pelanggan WHERE id_pelanggan=$id_pelanggan";
        $this->db->query($sql);
    }

    public function getAllPelanggan()
    {
        $sql = "SELECT * FROM pelanggan";
        $result = $this->db->query($sql);

        $pelangganList = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pelangganList[] = $row;
            }
        }

        return $pelangganList;
    }
}

?>
