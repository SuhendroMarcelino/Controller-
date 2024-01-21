<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Barang</title>
</head>
<body>

<?php
// Include your class file
include_once 'Barang.php';

// Buat objek Barang
$barang = new Barang();

// Handle Create
if (isset($_POST['create'])) {
    $nama_barang = $_POST['nama_barang'];
    $keterangan = $_POST['keterangan'];
    $satuan = $_POST['satuan'];
    $id_pengguna = $_POST['id_pengguna'];

    $barang->createBarang($nama_barang, $keterangan, $satuan, $id_pengguna);
}

// Handle Update
if (isset($_POST['update'])) {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $keterangan = $_POST['keterangan'];
    $satuan = $_POST['satuan'];
    $id_pengguna = $_POST['id_pengguna'];

    $barang->updateBarang($id_barang, $nama_barang, $keterangan, $satuan, $id_pengguna);
}

// Handle Delete
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id_barang_to_delete = $_GET['id'];
    $barang->deleteBarang($id_barang_to_delete);
}

// Handle Read/Display
$barangList = $barang->getAllBarang();

?>

<!-- Form untuk Create dan Update -->
<form method="post" action="">
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" name="nama_barang" required>
    
    <label for="keterangan">Keterangan:</label>
    <textarea name="keterangan" required></textarea>
    
    <label for="satuan">Satuan:</label>
    <input type="text" name="satuan" required>
    
    <label for="id_pengguna">ID Pengguna:</label>
    <input type="text" name="id_pengguna" required>

    <?php if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) : ?>
        <!-- Jika sedang dalam mode edit, tampilkan input hidden untuk menyimpan ID barang yang akan diupdate -->
        <input type="hidden" name="id_barang" value="<?php echo $_GET['id']; ?>">
        <button type="submit" name="update">Update Barang</button>
    <?php else : ?>
        <button type="submit" name="create">Tambah Barang</button>
    <?php endif; ?>
</form>

<!-- Tabel untuk menampilkan data -->
<table border="1">
    <tr>
        <th>ID Barang</th>
        <th>Nama Barang</th>
        <th>Keterangan</th>
        <th>Satuan</th>
        <th>ID Pengguna</th>
        <th>Action</th>
    </tr>
    <?php foreach ($barangList as $barangItem) : ?>
        <tr>
            <td><?php echo $barangItem['id_barang']; ?></td>
            <td><?php echo $barangItem['nama_barang']; ?></td>
            <td><?php echo $barangItem['keterangan']; ?></td>
            <td><?php echo $barangItem['satuan']; ?></td>
            <td><?php echo $barangItem['id_pengguna']; ?></td>
            <td>
                <a href="?action=edit&id=<?php echo $barangItem['id_barang']; ?>">Edit</a>
                <a href="?action=delete&id=<?php echo $barangItem['id_barang']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
