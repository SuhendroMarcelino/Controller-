<?php

class Controller
{
    private $pembelian;

    public function __construct()
    {
        $this->pembelian = new Pembelian();
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
        $jumlah_pembelian = $_POST['jumlah_pembelian'];
        $harga_beli = $_POST['harga_beli'];
        $id_pengguna = $_POST['id_pengguna'];

        $this->pembelian->createPembelian($jumlah_pembelian, $harga_beli, $id_pengguna);
    }

    private function handleUpdate()
    {
        $id_pembelian = $_POST['id_pembelian'];
        $jumlah_pembelian = $_POST['jumlah_pembelian'];
        $harga_beli = $_POST['harga_beli'];
        $id_pengguna = $_POST['id_pengguna'];

        $this->pembelian->updatePembelian($id_pembelian, $jumlah_pembelian, $harga_beli, $id_pengguna);
    }

    private function handleDelete()
    {
        $id_pembelian_to_delete = $_GET['id'];
        $this->pembelian->deletePembelian($id_pembelian_to_delete);
    }

    public function getAllPembelian()
    {
        return $this->pembelian->getAllPembelian();
    }
}

?>
