<?php

class Controller
{
    private $akses;

    public function __construct()
    {
        $this->akses = new Akses();
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
        $nama_akses = $_POST['nama_akses'];
        $keterangan = $_POST['keterangan'];

        $this->akses->createAkses($nama_akses, $keterangan);
    }

    private function handleUpdate()
    {
        $id_akses = $_POST['id_akses'];
        $nama_akses = $_POST['nama_akses'];
        $keterangan = $_POST['keterangan'];

        $this->akses->updateAkses($id_akses, $nama_akses, $keterangan);
    }

    private function handleDelete()
    {
        $id_akses_to_delete = $_GET['id'];
        $this->akses->deleteAkses($id_akses_to_delete);
    }

    public function getAllAkses()
    {
        return $this->akses->getAllAkses();
    }
}

?>
