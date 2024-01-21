<?php

class SupplierModel
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

    public function createSupplier($nama_supplier, $alamat, $produk_supplier, $id_barang)
    {
        $nama_supplier = $this->db->real_escape_string($nama_supplier);
        $alamat = $this->db->real_escape_string($alamat);
        $produk_supplier = $this->db->real_escape_string($produk_supplier);
        $id_barang = $this->db->real_escape_string($id_barang);

        $sql = "INSERT INTO supplier (nama_supplier, alamat, produk_supplier, id_barang) 
                VALUES ('$nama_supplier', '$alamat', '$produk_supplier', '$id_barang')";
        $this->db->query($sql);
    }

    public function updateSupplier($id_supplier, $nama_supplier, $alamat, $produk_supplier, $id_barang)
    {
        $id_supplier = $this->db->real_escape_string($id_supplier);
        $nama_supplier = $this->db->real_escape_string($nama_supplier);
        $alamat = $this->db->real_escape_string($alamat);
        $produk_supplier = $this->db->real_escape_string($produk_supplier);
        $id_barang = $this->db->real_escape_string($id_barang);

        $sql = "UPDATE supplier 
                SET nama_supplier='$nama_supplier', alamat='$alamat', produk_supplier='$produk_supplier', id_barang='$id_barang' 
                WHERE id_supplier=$id_supplier";
        $this->db->query($sql);
    }

    public function deleteSupplier($id_supplier)
    {
        $id_supplier = $this->db->real_escape_string($id_supplier);

        $sql = "DELETE FROM supplier WHERE id_supplier=$id_supplier";
        $this->db->query($sql);
    }

    public function getAllSuppliers()
    {
        $sql = "SELECT * FROM supplier";
        $result = $this->db->query($sql);

        $supplierList = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $supplierList[] = $row;
            }
        }

        return $supplierList;
    }
}

?>
