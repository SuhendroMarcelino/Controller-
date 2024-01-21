<?php

class Controller
{
    private $penjualan;

    public function __construct()
    {
        $this->penjualan = new Penjualan();
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
        $jumlah_penjualan = $_POST['jumlah_penjualan'];
        $harga_jual = $_POST['harga_jual'];
        $id_pengguna = $_POST['id_pengguna'];

        $this->penjualan->createPenjualan($jumlah_penjualan, $harga_jual, $id_pengguna);
    }

    private function handleUpdate()
    {
        $id_pembelian = $_POST['id_pembelian'];
        $jumlah_penjualan = $_POST['jumlah_penjualan'];
        $harga_jual = $_POST['harga_jual'];
        $id_pengguna = $_POST['id_pengguna'];

        $this->penjualan->updatePenjualan($id_pembelian, $jumlah_penjualan, $harga_jual, $id_pengguna);
    }

    private function handleDelete()
    {
        $id_pembelian_to_delete = $_GET['id'];
        $this->penjualan->deletePenjualan($id_pembelian_to_delete);
    }

    public function getAllPenjualan()
    {
        return $this->penjualan->getAllPenjualan();
    }
}

?>
