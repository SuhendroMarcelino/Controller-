<?php

class Controller
{
    private $pengguna;

    public function __construct()
    {
        $this->pengguna = new Pengguna();
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
        $nama_pengguna = $_POST['nama_pengguna'];
        $password = $_POST['password'];
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $id_akses = $_POST['id_akses'];

        $this->pengguna->createPengguna($nama_pengguna, $password, $nama_depan, $nama_belakang, $no_hp, $alamat, $id_akses);
    }

    private function handleUpdate()
    {
        $id_pengguna = $_POST['id_pengguna'];
        $nama_pengguna = $_POST['nama_pengguna'];
        $password = $_POST['password'];
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $id_akses = $_POST['id_akses'];

        $this->pengguna->updatePengguna($id_pengguna, $nama_pengguna, $password, $nama_depan, $nama_belakang, $no_hp, $alamat, $id_akses);
    }

    private function handleDelete()
    {
        $id_pengguna_to_delete = $_GET['id'];
        $this->pengguna->deletePengguna($id_pengguna_to_delete);
    }

    public function getAllPengguna()
    {
        return $this->pengguna->getAllPengguna();
    }
}

?>
