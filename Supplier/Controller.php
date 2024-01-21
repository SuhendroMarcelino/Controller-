<?php

class SupplierController
{
    private $supplierModel;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['create'])) {
                $this->handleCreate();
            } elseif (isset($_POST['update'])) {
                $this->handleUpdate();
            }
        }

        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
            $this->handleDelete();
        }
    }

    private function handleCreate()
    {
        $nama_supplier = $_POST['nama_supplier'];
        $alamat = $_POST['alamat'];
        $produk_supplier = $_POST['produk_supplier'];
        $id_barang = $_POST['id_barang'];

        $this->supplierModel->createSupplier($nama_supplier, $alamat, $produk_supplier, $id_barang);
    }

    private function handleUpdate()
    {
        $id_supplier = $_POST['id_supplier'];
        $nama_supplier = $_POST['nama_supplier'];
        $alamat = $_POST['alamat'];
        $produk_supplier = $_POST['produk_supplier'];
        $id_barang = $_POST['id_barang'];

        $this->supplierModel->updateSupplier($id_supplier, $nama_supplier, $alamat, $produk_supplier, $id_barang);
    }

    private function handleDelete()
    {
        $id_supplier_to_delete = $_GET['id'];
        $this->supplierModel->deleteSupplier($id_supplier_to_delete);
    }

    public function getAllSuppliers()
    {
        return $this->supplierModel->getAllSuppliers();
    }
}

?>
