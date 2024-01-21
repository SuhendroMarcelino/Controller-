<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Supplier</title>
</head>

<body>

    <?php
    // Include your class files
    include_once 'SupplierModel.php';
    include_once 'SupplierController.php';

    // Buat objek SupplierController
    $supplierController = new SupplierController();

    // Tangani permintaan dari pengguna
    $supplierController->handleRequest();

    // Dapatkan data Supplier
    $supplierList = $supplierController->getAllSuppliers();
    ?>

    <!-- Form untuk Create dan Update -->
    <form method="post" action="">
        <label for="nama_supplier">Nama Supplier:</label>
        <input type="text" name="nama_supplier" required>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required>

        <label for="produk_supplier">Produk Supplier:</label>
        <input type="text" name="produk_supplier" required>

        <label for="id_barang">ID Barang:</label>
        <input type="text" name="id_barang" required>

        <?php if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) : ?>
            <input type="hidden" name="id_supplier" value="<?php echo $_GET['id']; ?>">
            <button type="submit" name="update">Update Supplier</button>
        <?php else : ?>
            <button type="submit" name="create">Tambah Supplier</button>
        <?php endif; ?>
    </form>

    <!-- Tabel untuk menampilkan data -->
    <table border="1">
        <tr>
            <th>ID Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>Produk Supplier</th>
            <th>ID Barang</th>
            <th>Action</th>
        </tr>
        <?php foreach ($supplierList as $supplierItem) : ?>
            <tr>
                <td><?php echo $supplierItem['id_supplier']; ?></td>
                <td><?php echo $supplierItem['nama_supplier']; ?></td>
                <td><?php echo $supplierItem['alamat']; ?></td>
                <td><?php echo $supplierItem['produk_supplier']; ?></td>
                <td><?php echo $supplierItem['id_barang']; ?></td>
                <td>
                    <a href="?action=edit&id=<?php echo $supplierItem['id_supplier']; ?>">Edit</a>
                    <a href="?action=delete&id=<?php echo $supplierItem['id_supplier']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>
