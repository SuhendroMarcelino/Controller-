<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Penjualan</title>
</head>
<body>

<?php
// Include your class file
include_once 'Penjualan.php';

// Buat objek Penjualan
$penjualan = new Penjualan();

// Handle Create
if (isset($_POST['create'])) {
    $jumlah_penjualan = $_POST['jumlah_penjualan'];
    $harga_jual = $_POST['harga_jual'];
    $id_pengguna = $_POST['id_pengguna'];

    $penjualan->createPenjualan($jumlah_penjualan, $harga_jual, $id_pengguna);
}

// Handle Update
if (isset($_POST['update'])) {
    $id_pembelian = $_POST['id_pembelian'];
    $jumlah_penjualan = $_POST['jumlah_penjualan'];
    $harga_jual = $_POST['harga_jual'];
    $id_pengguna = $_POST['id_pengguna'];

    $penjualan->updatePenjualan($id_pembelian, $jumlah_penjualan, $harga_jual, $id_pengguna);
}

// Handle Delete
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id_pembelian_to_delete = $_GET['id'];
    $penjualan->deletePenjualan($id_pembelian_to_delete);
}

// Handle Read/Display
$penjualanList = $penjualan->getAllPenjualan();

?>

<!-- Form untuk Create dan Update -->
<form method="post" action="">
    <label for="jumlah_penjualan">Jumlah Penjualan:</label>
    <input type="text" name="jumlah_penjualan" required>
    
    <label for="harga_jual">Harga Jual:</label>
    <input type="text" name="harga_jual" required>
    
    <label for="id_pengguna">ID Pengguna:</label>
    <input type="text" name="id_pengguna" required>

    <?php if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) : ?>
        <!-- Jika sedang dalam mode edit, tampilkan input hidden untuk menyimpan ID penjualan yang akan diupdate -->
        <input type="hidden" name="id_pembelian" value="<?php echo $_GET['id']; ?>">
        <button type="submit" name="update">Update Penjualan</button>
    <?php else : ?>
        <button type="submit" name="create">Tambah Penjualan</button>
    <?php endif; ?>
</form>

<!-- Tabel untuk menampilkan data -->
<table border="1">
    <tr>
        <th>ID Penjualan</th>
        <th>Jumlah Penjualan</th>
        <th>Harga Jual</th>
        <th>ID Pengguna</th>
        <th>Action</th>
    </tr>
    <?php foreach ($penjualanList as $penjualanItem) : ?>
        <tr>
            <td><?php echo $penjualanItem['id_pembelian']; ?></td>
            <td><?php echo $penjualanItem['jumlah_penjualan']; ?></td>
            <td><?php echo $penjualanItem['harga_jual']; ?></td>
            <td><?php echo $penjualanItem['id_pengguna']; ?></td>
            <td>
                <a href="?action=edit&id=<?php echo $penjualanItem['id_pembelian']; ?>">Edit</a>
                <a href="?action=delete&id=<?php echo $penjualanItem['id_pembelian']; ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
