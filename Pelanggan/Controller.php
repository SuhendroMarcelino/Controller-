<?php

class PelangganController
{
    private $pelangganModel;

    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
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
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $id_barang = $_POST['id_barang'];

        $this->pelangganModel->createPelanggan($nama_pelanggan, $alamat, $no_hp, $id_barang);
    }

    private function handleUpdate()
    {
        $id_pelanggan = $_POST['id_pelanggan'];
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $id_barang = $_POST['id_barang'];

        $this->pelangganModel->updatePelanggan($id_pelanggan, $nama_pelanggan, $alamat, $no_hp, $id_barang);
    }

    private function handleDelete()
    {
        $id_pelanggan_to_delete = $_GET['id'];
        $this->pelangganModel->deletePelanggan($id_pelanggan_to_delete);
    }

    public function getAllPelanggan()
    {
        return $this->pelangganModel->getAllPelanggan();
    }
}

?>
