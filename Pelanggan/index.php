<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pelanggan</title>
</head>

<body>

    <?php
    // Include your class files
    include_once 'PelangganModel.php';
    include_once 'PelangganController.php';

    // Buat objek PelangganController
    $pelangganController = new PelangganController();

    // Tangani permintaan dari pengguna
    $pelangganController->handleRequest();

    // Dapatkan data Pelanggan
    $pelangganList = $pelangganController->getAllPelanggan();
    ?>

    <!-- Form untuk Create dan Update -->
    <form method="post" action="">
        <label for="nama_pelanggan">Nama Pelanggan:</label>
        <input type="text" name="nama_pelanggan" required>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required>

        <label for="no_hp">No HP:</label>
        <input type="text" name="no_hp" required>

        <label for="id_barang">ID Barang:</label>
        <input type="text" name="id_barang" required>

        <?php if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) : ?>
            <input type="hidden" name="id_pelanggan" value="<?php echo $_GET['id']; ?>">
            <button type="submit" name="update">Update Pelanggan</button>
        <?php else : ?>
            <button type="submit" name="create">Tambah Pelanggan</button>
        <?php endif; ?>
    </form>

    <!-- Tabel untuk menampilkan data -->
    <table border="1">
        <tr>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>ID Barang</th>
            <th>Action</th>
        </tr>
        <?php foreach ($pelangganList as $pelangganItem) : ?>
            <tr>
                <td><?php echo $pelangganItem['id_pelanggan']; ?></td>
                <td><?php echo $pelangganItem['nama_pelanggan']; ?></td>
                <td><?php echo $pelangganItem['alamat']; ?></td>
                <td><?php echo $pelangganItem['no_hp']; ?></td>
                <td><?php echo $pelangganItem['id_barang']; ?></td>
                <td>
                    <a href="?action=edit&id=<?php echo $pelangganItem['id_pelanggan']; ?>">Edit</a>
                    <a href="?action=delete&id=<?php echo $pelangganItem['id_pelanggan']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>
