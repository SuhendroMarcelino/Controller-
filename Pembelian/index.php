<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pembelian</title>
</head>
<body>

<?php
// Include your class file
include_once 'Pembelian.php';

// Buat objek Pembelian
$pembelian = new Pembelian();

// Handle Create
if (isset($_POST['create'])) {
    $jumlah_pembelian = $_POST['jumlah_pembelian'];
    $harga_beli = $_POST['harga_beli'];
    $id_pengguna = $_POST['id_pengguna'];

    $pembelian->createPembelian($jumlah_pembelian, $harga_beli, $id_pengguna);
}

// Handle Update
if (isset($_POST['update'])) {
    $id_pembelian = $_POST['id_pembelian'];
    $jumlah_pembelian = $_POST['jumlah_pembelian'];
    $harga_beli = $_POST['harga_beli'];
    $id_pengguna = $_POST['id_pengguna'];

    $pembelian->updatePembelian($id_pembelian, $jumlah_pembelian, $harga_beli, $id_pengguna);
}

// Handle Delete
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id_pembelian_to_delete = $_GET['id'];
    $pembelian->deletePembelian($id_pembelian_to_delete);
}

// Handle Read/Display
$pembelianList = $pembelian->getAllPembelian();

?>

<!-- Form untuk Create dan Update -->
<form method="post" action="">
    <label for="jumlah_pembelian">Jumlah Pembelian:</label>
    <input type="text" name="jumlah_pembelian" required>
    
    <label for="harga_beli">Harga Beli:</label>
    <input type="text" name="harga_beli" required>
    
    <label for="id_pengguna">ID Pengguna:</label>
    <input type="text" name="id_pengguna" required>

    <?php if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) : ?>
        <!-- Jika sedang dalam mode edit, tampilkan input hidden untuk menyimpan ID pembelian yang akan diupdate -->
        <input type="hidden" name="id_pembelian" value="<?php echo $_GET['id']; ?>">
        <button type="submit" name="update">Update Pembelian</button>
    <?php else : ?>
        <button type="submit" name="create">Tambah Pembelian</button>
    <?php endif; ?>
</form>

<!-- Tabel untuk menampilkan data -->
<table border="1">
    <tr>
        <th>ID Pembelian</th>
        <th>Jumlah Pembelian</th>
        <th>Harga Beli</th>
        <th>ID Pengguna</th>
        <th>Action</th>
    </tr>
    <?php foreach ($pembelianList as $pembelianItem) : ?>
        <tr>
            <td><?php echo $pembelianItem['id_pembelian']; ?></td>
            <td><?php echo $pembelianItem['jumlah_pembelian']; ?></td>
            <td><?php echo $pembelianItem['harga_beli']; ?></td>
            <td><?php echo $pembelianItem['id_pengguna']; ?></td>
            <td>
                <a href="?action=edit&id=<?php echo $pembelianItem['id_pembelian']; ?>">Edit</a>
                <a href="?action=delete&id=<?php echo $pembelianItem['id_pembelian']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
