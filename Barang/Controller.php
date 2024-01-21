<?php

class Controller
{
    private $barang;

    public function __construct()
    {
        $this->barang = new Barang();
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
        $nama_barang = $_POST['nama_barang'];
        $keterangan = $_POST['keterangan'];
        $satuan = $_POST['satuan'];
        $id_pengguna = $_POST['id_pengguna'];

        $this->barang->createBarang($nama_barang, $keterangan, $satuan, $id_pengguna);
    }

    private function handleUpdate()
    {
        $id_barang = $_POST['id_barang'];
        $nama_barang = $_POST['nama_barang'];
        $keterangan = $_POST['keterangan'];
        $satuan = $_POST['satuan'];
        $id_pengguna = $_POST['id_pengguna'];

        $this->barang->updateBarang($id_barang, $nama_barang, $keterangan, $satuan, $id_pengguna);
    }

    private function handleDelete()
    {
        $id_barang_to_delete = $_GET['id'];
        $this->barang->deleteBarang($id_barang_to_delete);
    }

    public function getAllBarang()
    {
        return $this->barang->getAllBarang();
    }
}

?>
